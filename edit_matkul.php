<?php  
  require_once 'libs/konek.php';
  
  $id_mk     = null;
  $nama_mk   = null;
  $sks       = null;
  if (isset($_GET['id_mk'])) 
  {
    $id_mk = $_GET['id_mk'];

    //persiapan ambil data
    $data = "SELECT * FROM tb_matakuliah WHERE id_mk=$id_mk";
    //ambil data yg sudah di persiapkan
    $ambil_data = mysql_query($data);
    while ( $a = mysql_fetch_array($ambil_data))

    {
      
      $id_mk        = $a['id_mk'];
      $sks          = $a['sks'];
      $nama_mk      = $a['nama_mk'];

    }
  }
  if (isset($_POST['tekan'])) 
    {
      $nama_mk      = $_POST['nama_mk'];
      $sks          = $_POST['sks'];
      $siapin_query = "UPDATE tb_matakuliah SET nama_mk='$nama_mk' , sks='$sks' WHERE id_mk=$id_mk";
      $do_query     = mysql_query($siapin_query);

      header("location:matkul.php");
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
                    <h1>Edit Mata Kuliah</h1>
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
                              <input type="hidden" name="id_mk" value="<?php echo $id_mk ?>"> <br>
                              <label class="control-label" for="input01">Mata Kuliah</label>
                              <div class="controls">
                                <input type="text" class="input-large" id="input01" name="nama_mk" value="<?php echo $nama_mk ?>">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label" for="input01">SKS</label>
                              <div class="controls">
                                <input type="text" class="input-large" id="input01" name="sks" value="<?php echo $sks ?>">
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

