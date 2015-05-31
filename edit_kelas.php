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

<!DOCTYPE htmlu>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Diana Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="inspiritas.css" rel="stylesheet">
</head>

<body>

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
                <a href="#">Logout</a>
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
                    <h1>Dashboard</h1>
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
