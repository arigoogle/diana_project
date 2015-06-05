<?php  
  require_once 'libs/konek.php';
  
    if (isset($_POST['tekan'])) 
    {
      $username     = $_POST['username'];
      $password     = md5( $_POST['password'] );
      $siapin_query = "INSERT INTO tb_user (username,password) VALUES ('$username','$password')";
      $do_query     = mysql_query($siapin_query);
      header("location:user.php");
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
                    <h1>Tambah User</h1>
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
                              <label class="control-label" for="input01">Username</label>
                              <div class="controls">
                                <input type="text" class="input-large" id="input01" name="username">
                              </div>
                          </div>
                          <div class="control-group">
                              <label class="control-label" for="input01">Password</label>
                              <div class="controls">
                                <input type="password" class="input-large" id="input01" name="password">
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
