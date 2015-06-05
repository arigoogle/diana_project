<?php  
  require_once 'libs/konek.php';
  
  $id_dosen     = null;
  $dosen  = null;
  if (isset($_GET['id_dosen'])) 
  {
    $id_dosen = $_GET['id_dosen'];

    //persiapan ambil data
    $data = "SELECT * FROM tb_dosen WHERE id_dosen=$id_dosen";
    //ambil data yg sudah di persiapkan
    $ambil_data = mysql_query($data);
    while ( $a = mysql_fetch_array($ambil_data))

    {
      
      $id_dosen     = $a['id_dosen'];
      $dosen  = $a['nama_dosen'];

    }
  }
  if (isset($_POST['tekan'])) 
    {
      $dosen   = $_POST['nama_dosen'];
      $siapin_query = "UPDATE tb_dosen SET nama_dosen='$dosen' WHERE id_dosen=$id_dosen";
      $do_query     = mysql_query($siapin_query);

      header("location:dosen.php");
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
                    <h1>Edit Dosen</h1>
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
                            <input type="hidden" name="id" value="<?php echo $id ?>"> <br>
                            <label class="control-label" for="input01">Nama Dosen</label>
                            <div class="controls">
                              <input type="text" class="input-large" id="input01" name="nama_dosen" value="<?php echo $dosen ?>"> 
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
