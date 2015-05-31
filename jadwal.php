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
                    <div class="pull-right">
                        <a href="tambah_jadwal.php" class="btn btn-small">Add</a>
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
                        <th>Kelas a</th>
                        <th>SKS</th>
                        <th>#</th>
                        <th>EUR</th>
                        <th>Highest day</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="primary">HTML5</td>
                        <td>87%</td>
                        <td>
                            <div class="progress progress-mini">
                              <div class="bar" style="width: 35%"></div>
                            </div>
                        </td>
                        <td>32,854</td>
                        <td>40,633</td>
                        <td>December 15, 2012</td>
                      </tr>
                      <tr>
                        <td class="primary">CSS3</td>
                        <td>57%</td>
                        <td>
                            <div class="progress progress-mini">
                              <div class="bar" style="width: 62%"></div>
                            </div>
                        </td>
                        <td>10,537</td>
                        <td>30,352</td>
                        <td>December 7, 2012</td>
                      </tr>
                      <tr>
                        <td class="primary">JavaScript 8.8</td>
                        <td>87%</td>
                        <td>
                            <div class="progress progress-mini">
                              <div class="bar" style="width: 40%"></div>
                            </div>
                        </td>
                        <td>39,104</td>
                        <td>33,241</td>
                        <td>December 21, 2012</td>
                      </tr>
                      <tr>
                        <td class="primary">HTML5</td>
                        <td>87%</td>
                        <td>
                            <div class="progress progress-mini">
                              <div class="bar" style="width: 85%"></div>
                            </div>
                        </td>
                        <td>32,854</td>
                        <td>40,633</td>
                        <td>December 15, 2012</td>
                      </tr>
                      <tr>
                        <td class="primary">CSS3</td>
                        <td>57%</td>
                        <td>
                            <div class="progress progress-mini">
                              <div class="bar" style="width: 89%"></div>
                            </div>
                        </td>
                        <td>10,537</td>
                        <td>30,352</td>
                        <td>December 7, 2012</td>
                      </tr>
                      <tr>
                        <td class="primary">JavaScript 8.8</td>
                        <td>87%</td>
                        <td>
                            <div class="progress progress-mini">
                              <div class="bar" style="width: 15%"></div>
                            </div>
                        </td>
                        <td>39,104</td>
                        <td>33,241</td>
                        <td>December 21, 2012</td>
                      </tr>
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
