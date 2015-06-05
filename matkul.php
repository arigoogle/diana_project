<?php  
  require_once 'libs/konek.php';
  // mengambil data tabel mata kuliah
  $query    = "SELECT * FROM tb_matakuliah";
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
                        <a href="tambah_matkul.php" class="btn btn-small">Add</a>
                    </div>
                    <h1>Mata Kuliah</h1>
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
