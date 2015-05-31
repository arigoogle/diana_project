<?php  
  require_once 'libs/konek.php';
  // mengambil data tabel mata kuliah
  $query    = "SELECT * FROM tb_matakuliah";
  $do_query = mysql_query($query);
?>
<!DOCTYPE htmlu>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Inspiritas - a free Bootstrap theme by Ripple</title>
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
            <span class="name">Jonatan Littke</span><br/>
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
                    <div class="pull-right">
                        <a href="tambah_matkul.php" class="btn btn-small">Add</a>
                    </div>
                    <h1>Dashboard</h1>
                  </header>
                  
                </section>
                
                <!-- Tables
                ================================================== -->
                <section id="tables">
                  <table class="table table-striped full-section table-hover">
                    <thead>
                      <tr>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($a= mysql_fetch_array($do_query)) :  ?>
                        <tr>
                          <td class="primary"><?php echo $a['nama_mk']; ?></td>
                          <td class="primary"><?php echo $a['sks']; ?></td>
                          <td>
                              <a class="btn btn-small" href="edit_matkul.php?id_mk=<?php echo $a['id_mk'] ?>">Edit</a>
                              <a class="btn btn-small btn-danger" href="delete_matkul.php?id_mk=<?php echo $a['id_mk'] ?>">Delete</a>
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
