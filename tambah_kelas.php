<?php  
  require_once 'libs/konek.php';
  require_once 'libs/helper.php';
  
    if (isset($_POST['tekan'])) 
    {
      $kelas   = $_POST['kelas'];
      $siapin_query = "INSERT INTO tb_kelas (kelas) VALUES ('$kelas')";
      $do_query     = mysql_query($siapin_query);

      //eksekusi perubahan data( function ada di helper.php)
      doChangesData();
      
      header("location:kelas.php");
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
                    <div class="pull-right">
                        <a href="tambah_dosen.php" class="btn btn-small">Add</a>
                    </div>
                    <h1>Tambah Kelas</h1>
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
                              <label class="control-label" for="input01">Tambah Kelas</label>
                              <div class="controls">
                                <input type="text" class="input-large" id="input01" name="kelas">
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
