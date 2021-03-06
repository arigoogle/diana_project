<?php  
  require_once 'libs/konek.php';
  require_once 'libs/helper.php';
  
    if (isset($_POST['tekan'])) 
    {
      $nama_mk      = $_POST['nama_mk'];
      $sks          = $_POST['sks'];
      $siapin_query = "INSERT INTO tb_matakuliah (nama_mk,sks) VALUES ('$nama_mk','$sks')";
      $do_query     = mysql_query($siapin_query);

      //eksekusi perubahan data( function ada di helper.php)
      doChangesData();
      
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
                    <h1>Tambah Mata Kuliah</h1>
                  </header>
                  
                </section>
                
                
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
                              <label class="control-label" for="input01">Mata Kuliah</label>
                              <div class="controls">
                                <input type="text" class="input-large" id="input01" name="nama_mk">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label" for="input01">SKS</label>
                              <div class="controls">
                                <input type="text" class="input-large" id="input01" name="sks">
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

