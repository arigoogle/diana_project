<?php  
  require_once 'libs/konek.php';
  // mengambil tulisan3
  $query    = "SELECT * FROM tb_kelas";
  $do_query = mysql_query($query);


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
                    <div class="pull-right">
                        <a href="tambah_kelas.php" class="btn btn-small">Add</a>
                    </div>
                    <h1>Kelas</h1>
                  </header>
                  
                </section>
                
                <!-- Tables
                ================================================== -->
                <section id="tables">
                  <table class="table table-striped full-section table-hover">
                    <thead>
                      <tr>
                        <th>Kelas</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($a= mysql_fetch_array($do_query)) :  ?>
                        <tr>
                          <td class="primary"><?php echo $a['kelas']; ?></td>
                          <td>
                            <a class="btn btn-small" href="edit_kelas.php?id_kelas=<?php echo $a['id_kelas'] ?>">Edit</a>
                            <a class="btn btn-small btn-danger" href="delete_kelas.php?id_kelas=<?php echo $a['id_kelas'] ?>">Delete</a>
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
