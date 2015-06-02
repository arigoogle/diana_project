<?php  
  require_once 'libs/konek.php';
  header('Refresh: 3; URL=dosen.php');
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
                    <h1>Tambah Dosen</h1>
                  </header>
                  
                </section>
                
                <!-- Tables
                ================================================== -->
                <!-- Miscellaneous
              ================================================== -->
                <section id="miscellaneous">
                    <div class="sub-header">
                      <h2>Alerts</h2>
                    </div>

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="alert alert-success">
                              <a class="close">&times;</a>
                              <strong>Sukses</strong> Data berhasil disimpan.
                            <div>
                        </div>
                    </div>
                    <!-- <div class="row-fluid">
                        <div class="span12">
                            <div class="alert alert-error">
                              <a class="close">&times;</a>
                              <strong>Error</strong> Change a few things up and try submitting again.
                            </div>
                        </div>
                    </div> -->
                </section>
              <!-- end miscellneous -->
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
