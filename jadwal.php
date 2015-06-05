<?php 
require_once 'libs/konek.php';
require_once 'libs/helper.php';

$msg = null;
if( hasChange() === '1' ) {

  $msg = "<div class='alert alert-warning'>Ada data baru telah masuk. Tekan \"Generate Jadwal\" untuk acak ulang jadwal.</div>"; 
}

if( isset( $_GET['e'] ) && $_GET['e'] == 'n'  ) {
  
  $msg = "<div class='alert alert-success'>Acak jadwal telah selesai dilakukan.</div>"; 
} elseif( isset( $_GET['e'] ) && $_GET['e'] == 'manual-sukses' ) {
  
  $msg = "<div class='alert alert-success'>Penambahan jadwal berhasil dilakukan.</div>"; 
} elseif( isset( $_GET['e'] ) && $_GET['e'] == 'edit-sukses' ) {
  
  $msg = "<div class='alert alert-success'>Jadwal berhasil diubah.</div>"; 
}

$query = "SELECT * FROM tb_jadwal LEFT JOIN tb_matakuliah ON tb_jadwal.id_mk = tb_matakuliah.id_mk
                                  JOIN tb_dosen ON tb_jadwal.id_dosen = tb_dosen.id_dosen
                                  JOIN tb_kelas ON tb_jadwal.id_kelas = tb_kelas.id_kelas
                                  ORDER BY hari ASC";
$doQuery = mysql_query( $query );

?>

<?php 
  include'libs/header.php'; 
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
                    <div class="pull-right">
                        <a href="tambah_jadwal_manual.php" class="btn btn-small">Add Jadwal Manual</a>
                        <a onclick="return confirm('Jadwal akan diacak ulang. Lanjutkan?')" href="tambah_jadwal.php" class="btn btn-primary btn-small">Generate Jadwal</a>
                    </div>
                    <h1>Jadwal</h1>
                  </header>
                  
                </section>
                
                <!-- Tables
                ================================================== -->
                <section id="tables">
                  <?php echo $msg; ?>
                  <table class="table table-striped full-section table-hover">
                    <thead>
                      <tr>
                        <th>Hari</th>
                        <th>Pukul</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th>Ruang</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while( $r = mysql_fetch_array( $doQuery ) ): ?>
                        <tr>
                          <td><?php echo kodeHari( $r['hari'] ); ?></td>
                          <td><?php echo $r['pukul']; ?></td>
                          <td><?php echo $r['nama_mk']; ?></td>
                          <td><?php echo $r['sks']; ?></td>
                          <td><?php echo $r['nama_dosen']; ?></td>
                          <td><?php echo $r['kelas']; ?></td>
                          <td><a href="tambah_jadwal_manual.php?id=<?php echo $r['id_jadwal'] ?>" class="btn btn-small btn-info">Ubah</a></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </section>
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
