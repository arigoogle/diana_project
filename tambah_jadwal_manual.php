<?php  
  require_once 'libs/konek.php';
  
  if( isset($_GET['a']) && $_GET['a'] == 'delete' ) {

    $id = (int)$_GET['id'];
    mysql_query("DELETE FROM tb_jadwal WHERE id_jadwal='$id'");
    // echo mysql_error();
    header('location:jadwal.php?e=d-sukses');
    exit();
  }

  //array hari
  $arrayHari = array(
        0 => "Senin",
        1 => "Selasa",
        2 => "Rabu",
        3 => "Kamis",
        4 => "Jumat",
    );

  //array pukul
  $arrayPukul = array(
        "08:00" => "08.00",
        "09:00" => "09.00",
        "10:00" => "10.00",
        "11:00" => "11.00",
        "13:00" => "13.00",
        "14:00" => "14.00",
    );

  //matakuliah
  $dataMk  = mysql_query( "SELECT * FROM tb_matakuliah ORDER BY nama_mk ASC" );

  //dosen
  $dataDosen  = mysql_query( "SELECT * FROM tb_dosen ORDER BY nama_dosen ASC" );

  //kelas
  $dataKelas  = mysql_query( "SELECT * FROM tb_kelas ORDER BY kelas ASC" );

  $hari   = null;
  $pukul  = null;
  $mk     = null;
  $dosen  = null;
  $kelas  = null;

  $id = null;
  //jika halaman yang direquest merupakan edit jadwal;
  if( isset( $_GET['id'] ) ) {
    $id = $_GET['id'];
    $q = mysql_query("SELECT * FROM tb_jadwal WHERE id_jadwal='$id'");
    $r = mysql_fetch_array( $q );
    $jamArray = explode('-', $r['pukul']);
    $startCurrentTime = $jamArray[0];
    $hari   = $r['hari'];
    $pukul  = str_replace('.', ':', $startCurrentTime);
    $mk     = $r['id_mk'];
    $dosen  = $r['id_dosen'];
    $kelas  = (string)$r['id_kelas'];
  }


  //get all data from field
  if( isset( $_POST['periksajadwal'] ) || isset( $_POST['tekan'] ) ) {
    $hari   = $_POST['hari'];
    $pukul  = $_POST['pukul'];
    $mk     = $_POST['mk'];
    $dosen  = $_POST['dosen'];
    $kelas  = $_POST['kelas'];

    //cari data matakuliah
    $cariMk = mysql_fetch_array( mysql_query( "SELECT sks FROM tb_matakuliah WHERE id_mk='$mk'" ) );
    $jumlahSks = $cariMk['sks'];
    $lamaPerkuliahan = $jumlahSks * 50;
    $startTimeRaw = strtotime( $pukul );
    $endTimeRaw = strtotime("+$lamaPerkuliahan minutes", $startTimeRaw);
  }

  //periksa jadwal
  $resultPeriksa = array();
  if( isset( $_POST['periksajadwal'] ) ) {

    //cek kelas dan jam
    $newPukul = str_replace(':', '.', $pukul);
    $qKelasJam = mysql_query( "SELECT * FROM tb_jadwal WHERE id_kelas='$kelas' AND hari='$hari' AND jam_awal<='$endTimeRaw'" );
    $cekKelasJam = (bool)mysql_num_rows( $qKelasJam );
    if( ! $cekKelasJam ) {
      $resultPeriksa[] = array(
            'detail' => 'Kelas dan Jam Perkuliahan',
            'note' => '<span class="label label-success">Kelas dan jam perkuliahan bisa dipakai</span>',
        );
    } else {
      $resultPeriksa[] = array(
            'detail' => 'Kelas dan Jam Perkuliahan',
            'note' => '<span class="label label-danger">Kelas dan jam perkuliahan tidak bisa dipakai</span>',
        );

    }

    //cek apakah dosen sudah mengajar pada jam yang ditentukan
    $qJamDosen = mysql_query( "SELECT * FROM tb_jadwal WHERE hari='$hari' AND id_dosen='$dosen' AND jam_awal<='$endTimeRaw'" );
    $cekJamDosen = (bool)mysql_num_rows( $qJamDosen );
    if( ! $cekJamDosen ) {
      $resultPeriksa[] = array(
            'detail' => 'Jadwal Dosen',
            'note' => '<span class="label label-success">Dosen bisa mengajar pada jam yang ditentukan.</span>',
        );
    } else {
      $resultPeriksa[] = array(
            'detail' => 'Jadwal Dosen',
            'note' => '<span class="label label-danger">Dosen tidak bisa mengajar pada jam yang ditentukan.</span>',
        );

    }

    //cek dosen telah mengajar apa saja
    $qCekDosen = mysql_query( "SELECT  nama_mk FROM tb_jadwal LEFT JOIN tb_matakuliah ON tb_jadwal.id_mk=tb_matakuliah.id_mk WHERE id_dosen='$dosen'" );
    if( mysql_num_rows( $qCekDosen ) > 0 ) {

      $namaMK = array();
      while ( $r = mysql_fetch_array( $qCekDosen ) ) {

        $namaMK[] = $r['nama_mk'];
      }

      $namaMK = implode(', ', $namaMK);
      $resultPeriksa[] = array(
            'detail' => 'Status Dosen',
            'note' => "<span class=\"label label-warning\">Dosen yang disebutkan telah mengisi matakuliah $namaMK.</span>",
        );
    } else {
      $resultPeriksa[] = array(
              'detail' => 'Status Dosen',
              'note' => '<span class="label label-success">Dosen terkait belum mengisi matakuliah apapun.</span>',
          );
    }

    //cek matakuliah telah ampu oleh dosen siapa saja
    $qCekMk = mysql_query( "SELECT nama_dosen FROM tb_jadwal LEFT JOIN tb_dosen ON tb_jadwal.id_dosen=tb_dosen.id_dosen WHERE id_mk='$mk'" );
    
    if( mysql_num_rows( $qCekMk ) > 0 ) {

      $namaDosen = array();
      while ( $r = mysql_fetch_array( $qCekMk ) ) {
        
        $namaDosen[] = $r['nama_dosen'];
      }

      $namaDosen = implode(', ', $namaDosen);
      $resultPeriksa[] = array(
              'detail' => 'Status Matakuliah',
              'note' => "<span class=\"label label-warning\">Mata Kuliah terkait sudah diampu oleh $namaDosen.</span>",
          );
    } else {

      $resultPeriksa[] = array(
              'detail' => 'Status Matakuliah',
              'note' => '<span class="label label-success">Mata Kuliah terkait belum diampu oleh siapapun.</span>',
          );
    }

  }

  //input jadwal
  if( isset( $_POST['tekan'] ) && empty( $_POST['id_jadwal'] ) ) {
    
    //cari sks
    $qSks = mysql_fetch_array( mysql_query( "SELECT sks FROM tb_matakuliah WHERE id_mk='$mk'" ) );
    $sks = $qSks['sks'];
    $totalJam = 50 * $sks;

    $startTime = date("H.i", strtotime( $pukul ) );
    $endTimeRaw = strtotime("+$totalJam minutes", strtotime( $pukul ));
    $endTime = date("H.i", $endTimeRaw);
    $time = $startTime . " - " . $endTime; 
    $query = mysql_query("INSERT INTO tb_jadwal(id_mk, id_dosen, id_kelas, pukul, hari, is_auto_generate) VALUES('$mk', '$dosen', '$kelas', '$time', '$hari','0')");
    header('location:jadwal.php?e=manual-sukses');
  } elseif( isset( $_POST['tekan'] ) && ! empty( $_POST['id_jadwal'] ) ) {

    $id = $_POST['id_jadwal'];

    //cari sks
    $qSks = mysql_fetch_array( mysql_query( "SELECT sks FROM tb_matakuliah WHERE id_mk='$mk'" ) );
    $sks = $qSks['sks'];
    $totalJam = 50 * $sks;

    $startTime = date("H.i", strtotime( $pukul ) );
    $endTimeRaw = strtotime("+$totalJam minutes", strtotime( $pukul ));
    $endTime = date("H.i", $endTimeRaw);
    $time = $startTime . " - " . $endTime; 
    $query = mysql_query("UPDATE tb_jadwal SET hari='$hari',
                                                id_mk='$mk',  
                                                id_dosen='$dosen',
                                                id_kelas='$kelas',
                                                pukul='$time'
                                          WHERE id_jadwal='$id'");

    header('location:jadwal.php?e=edit-sukses');

  }


?>

<?php 
  include'header.php'; 
?>

<div class="container">
    <div class="row-fluid">
        <div class="span3">
            <aside>
                <?php include 'menu.php'; ?>
            </aside>
        </div>
        <div class="span9" id="content-wrapper">
            <div id="content">

                <!-- Navbar
                ================================================== -->
                <section id="stats">
                  <header>
                    <h1>Tambah Jadwal Manual</h1>
                  </header>
                  
                </section>
                
                <!-- Tables
                ================================================== -->
                
                <!-- Forms
                ================================================== -->
                <section id="forms">
                  <?php if( count( $resultPeriksa ) > 0 ): ?>
                  <div class="sub-header">
                    <h2>Hasil periksa jadwal</h2>
                  </div>
                  <table class="table table-striped full-section table-hover">
                    <thead>
                      <tr>
                        <th>Rincian</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for( $i=0; $i < count( $resultPeriksa ); $i++ ): ?>
                      <tr>
                        <td><?php echo $resultPeriksa[ $i ]['detail'] ?></td>
                        <td><?php echo $resultPeriksa[ $i ]['note'] ?></td>
                      </tr>
                      <?php endfor; ?>                  
                    </tbody>
                  </table>
                  <?php endif; ?>

                  <div class="sub-header">
                    <h2>Form</h2>
                  </div>
                  <div class="alert alert-info">Klik tombol "Periksa Jadwal", untuk menghindari data jadwal yang sama.</div>
                  <div class="row-fluid">
                    <div class="span12">
                      <form class="form-horizontal" method="POST">
                          <div class="control-group">
                              <label class="control-label" for="hari">Hari</label>
                              <div class="controls">
                                <input type="hidden" name="id_jadwal" value="<?php echo $id ?>">
                                <select name="hari" id="hari" class="input-small">
                                  <?php foreach( $arrayHari as $key => $value ) : ?>
                                      
                                      <?php if( $key === (int)$hari ) : ?>

                                        <option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?></option>
                                      <?php else: ?>
                                      
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label" for="input02">Pukul</label>
                              <div class="controls">
                                <select name="pukul" id="input02" class="input-small">
                                  <?php foreach( $arrayPukul as $key => $value ) : ?>
                                    
                                    <?php if( $key === $pukul ) : ?>
                                       
                                        <option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?></option>
                                      <?php else: ?>
                                        
                                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                                </select>
                                <p class="help-block">Jam perkuliahan dimulai.</p>
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label" for="input03">Mata Kuliah</label>
                              <div class="controls">
                                <select name="mk" id="input03" class="input-xlarge">
                                  <?php while( $r = mysql_fetch_array( $dataMk ) ) : ?>
                                    
                                    <?php if( $r['id_mk'] === $mk ) : ?>
                                    
                                        <option value="<?php echo $r['id_mk']; ?>" selected="selected"><?php echo $r['nama_mk']; ?></option>
                                      <?php else: ?>

                                        <option value="<?php echo $r['id_mk']; ?>"><?php echo $r['nama_mk']; ?></option>
                                      <?php endif; ?>
                                  <?php endwhile; ?>
                                </select>
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label" for="input04">Dosen</label>
                              <div class="controls">
                                <select name="dosen" id="input04" class="input-xlarge">
                                  <?php while( $r = mysql_fetch_array( $dataDosen ) ) : ?>
                                    
                                    <?php if( $r['id_dosen'] === $dosen ) : ?>
                                        <option value="<?php echo $r['id_dosen']; ?>" selected="selected"><?php echo $r['nama_dosen']; ?></option>
                                      <?php else: ?>
                                        <option value="<?php echo $r['id_dosen']; ?>"><?php echo $r['nama_dosen']; ?></option>
                                      <?php endif; ?>
                                  <?php endwhile; ?>
                                </select>
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label" for="input05">Kelas</label>
                              <div class="controls">
                                <select name="kelas" id="input05" class="input-large">
                                  <?php while( $r = mysql_fetch_array( $dataKelas ) ) : ?>
                                    
                                    <?php if( $r['id_kelas'] === $kelas ) : ?>
                                        <option value="<?php echo $r['id_kelas']; ?>" selected="selected"><?php echo $r['kelas']; ?></option>
                                      <?php else: ?>
                                        <option value="<?php echo $r['id_kelas']; ?>"><?php echo $r['kelas']; ?></option>
                                      <?php endif; ?>
                                  <?php endwhile; ?>
                                </select>
                              </div>
                          </div>
                      <div class="form-actions">
                        <button type="submit" class="btn btn-info" name="periksajadwal">Periksa Jadwal</button>
                        <button type="submit" class="btn btn-primary" name="tekan">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                      </div>
                  </form>
                </section>
                <!-- END form -->



                


              

              

            </section>

            </div>
        </div>
    </div>
</div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/inspiritas.js"></script>
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>


  </body>
</html>
