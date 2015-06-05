<?php  
  require_once 'libs/konek.php';
  
  $id_kelas     = null;
  $kelas        = null;
  if (isset($_GET['id_kelas'])) 
  {
    $id_kelas = $_GET['id_kelas'];

    //persiapan ambil data
    $data = "SELECT * FROM tb_kelas WHERE id_kelas=$id_kelas";
    //ambil data yg sudah di persiapkan
    $ambil_data = mysql_query($data);
    while ( $a  = mysql_fetch_array($ambil_data))

    {
      
      $id_kelas     = $a['id_kelas'];
      $kelas        = $a['kelas'];

    }
  }
  if (isset($_POST['tekan'])) 
    {
      $kelas   = $_POST['kelas'];
      $siapin_query = "UPDATE tb_kelas SET kelas='$kelas' WHERE id_kelas=$id_kelas";
      $do_query     = mysql_query($siapin_query);

      header("location:kelas.php");
    }


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
                    <h1>Edit Kelas</h1>
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
                            <input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>"> <br>
                            <label class="control-label" for="input01">Kelas</label>
                            <div class="controls">
                              <input type="text" class="input-large" id="input01" name="kelas" value="<?php echo $kelas ?>"> 
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
