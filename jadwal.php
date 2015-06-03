<?php 
require_once 'libs/konek.php';
require_once 'libs/helper.php';

$msg = null;
if( hasChange() === '1' ) {

  $msg = "<div class='alert alert-warning'>Ada data baru telah masuk. Tekan \"Generate Jadwal\" untuk acak ulang jadwal.</div>"; 
}

if( isset( $_GET['e'] ) && $_GET['e'] == 'n'  ) {
  $msg = "<div class='alert alert-success'>Acak jadwal telah selesai dilakukan.</div>"; 
}

$query = "SELECT * FROM tb_jadwal LEFT JOIN tb_matakuliah ON tb_jadwal.id_mk = tb_matakuliah.id_mk
                                  JOIN tb_dosen ON tb_jadwal.id_dosen = tb_dosen.id_dosen
                                  JOIN tb_kelas ON tb_jadwal.id_kelas = tb_kelas.id_kelas
                                  ORDER BY hari ASC";
$doQuery = mysql_query( $query );

?>
<!DOCTYPE html>
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
                    <div class="pull-right">
                        <a href="tambah_jadwal.php" class="btn btn-primary btn-small">Generate Jadwal</a>
                    </div>
                    <h1>Jadwal</h1>
                  </header>
                  
                </section>
                
                <!-- Tables
                ================================================== -->
                <section id="tables">
                  <?php echo $msg; ?>
                  <table class="table table-striped full-section table-hover">
                    <thead>
                      <tr>
                        <th>Hari</th>
                        <th>Pukul</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th>Ruang</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while( $r = mysql_fetch_array( $doQuery ) ): ?>
                        <tr>
                          <td><?php echo kodeHari( $r['hari'] ); ?></td>
                          <td><?php echo $r['pukul']; ?></td>
                          <td><?php echo $r['nama_mk']; ?></td>
                          <td><?php echo $r['sks']; ?></td>
                          <td><?php echo $r['nama_dosen']; ?></td>
                          <td><?php echo $r['kelas']; ?></td>
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
