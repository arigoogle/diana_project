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
} elseif( isset( $_GET['e'] ) && $_GET['e'] == 'd-sukses' ) {
  
  $msg = "<div class='alert alert-success'>Jadwal berhasil dihapus.</div>"; 
}

$query = "SELECT * FROM tb_jadwal left JOIN tb_matakuliah ON tb_jadwal.id_mk = tb_matakuliah.id_mk
                                  left JOIN tb_dosen ON tb_jadwal.id_dosen = tb_dosen.id_dosen
                                  left JOIN tb_kelas ON tb_jadwal.id_kelas = tb_kelas.id_kelas
                                  ORDER BY hari,jam_awal ASC";
$doQuery = mysql_query( $query );

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
                  <div class="alert alert-info">
                    Keterangan : 
                    <span class="label label-success">A</span> = Jadwal dari hasil auto generate.
                    <span class="divider"></span> 
                    <span class="label label-warning">M</span> = Jadwal dari penambahan secara manual.<br>
                  </div>
                  <?php echo $msg; ?>
                  <table class="table table-striped full-section table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>#</th>
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
                      <?php $no=0; while( $r = mysql_fetch_array( $doQuery ) ): ?>
                        <tr>
                          <?php
                            $no++;
                            $mode = null;
                            if( $r['is_auto_generate'] ) {
                              $mode = '<span class="label label-success">A</span>';
                            } else {
                              $mode = '<span class="label label-warning">M</span>';
                            }
                          ?>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $mode; ?></td>
                          <td><?php echo kodeHari( $r['hari'] ); ?></td>
                          <td><?php echo humanizeJam( $r['jam_awal'], $r['jam_akhir'] ); ?></td>
                          <td><?php echo $r['nama_mk']; ?></td>
                          <td><?php echo $r['sks']; ?></td>
                          <td><?php echo ( ! empty( $r['nama_dosen'] ) ? $r['nama_dosen'] : '<span class="label label-danger">Dosen belum ada</span>' ); ?></td>
                          <td><?php echo $r['kelas']; ?></td>
                          <td>
                            <a href="tambah_jadwal_manual.php?id=<?php echo $r['id_jadwal'] ?>" class="btn btn-small btn-info">Ubah</a>
                            <a href="tambah_jadwal_manual.php?a=delete&id=<?php echo $r['id_jadwal'] ?>" onclick="return confirm('Anda yakin ingin menghapus data?');" class="btn btn-small btn-danger">hapus</a>
                          </td>
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
<?php include 'footer.php' ?>
