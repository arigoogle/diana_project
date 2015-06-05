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
  include'libs/header.php'; 
?>

<!-- Navbar
  ================================================== -->
<div class="navbar navbar-static-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <a class="brand" href="#">INSPIRITAS</a>
      

      <div class="nav-collapse collapse" id="main-menu">
        <div class="auth pull-right">
            <img class="avatar" src="images/littke.png">
            <span class="name">Diana</span><br/>
            <span class="links">
                <a href="#">Settings</a>
                <a href="login.php">Logout</a>
            </span>
        </div>
      </div>
    </div>
  </div>
</div>

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
