<?php  
  require_once 'libs/konek.php';
  require_once 'libs/helper.php';

  //matakuliah
  $dataMk  = mysql_query( "SELECT * FROM tb_matakuliah ORDER BY nama_mk ASC" );
  
    if (isset($_POST['tekan'])) 
    {
      $nama_dosen   = $_POST['nama_dosen'];
      $siapin_query = "INSERT INTO tb_dosen (nama_dosen) VALUES ('$nama_dosen')";
      $do_query     = mysql_query($siapin_query);

      // memasukkan data ampu dosen
      $id_mk = json_encode( $_POST['id_mk'] ); // convert dari array php ke array json
      
      //cari di dosen
      $q_dosen = mysql_fetch_array( mysql_query("SELECT id_dosen FROM tb_dosen WHERE nama_dosen='$nama_dosen'") );
      $id_dosen = $q_dosen['id_dosen'];

      $siapin_query = "INSERT INTO tb_ampu_dosen (id_dosen, id_mk) VALUES ('$id_dosen', '$id_mk') ";
      $do_query     = mysql_query($siapin_query);
      
      //eksekusi perubahan data( function ada di helper.php)
      doChangesData();
      
      header("location:sukses.php");
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
                    <h1>Tambah Dosen</h1>
                  </header>
                  
                </section>
                
                <!-- Tables
                ================================================== -->
                
                <!-- Forms
                ================================================== -->
                <section id="forms">
                  <div class="sub-header">
                    <h2>Forms</h2>
                  </div>

                  <div class="row-fluid">
                    <div class="span12">
                      <form class="form-horizontal" method="POST">
                          <div class="control-group">
                            <label class="control-label" for="input01">Nama Dosen</label>
                            <div class="controls">
                              <input type="text" class="input-large" id="input01" name="nama_dosen">
                            </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label" for="input03">Mata Kuliah</label>
                              <div class="controls">
                                <select name="id_mk[]" id="input03" class="input-xlarge" multiple>
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
                      <div class="form-actions">
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

<?php include 'footer.php' ?>

