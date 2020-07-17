<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FMX Login</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<?php include '../setting/connect.php';

$sitesor=$db->prepare("select * from `site_options` where site_id=?");
$sitesor->execute(array(1));
$print=$sitesor->fetch(PDO::FETCH_ASSOC);
?>
</head>
<body >
            <div class="col-md-12" style="position: absolute; padding-top: 40px; ">
                <?php include "notification.php"?>
            </div>
    <div class="container">
    
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="../../<?php echo $print['site_logourl'] ?>" />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div class="panel-body">
                     <form role="form" action="../setting/engine.php" method="POST">
                        <hr />
                        <h5>Admin panelə daxil olmaq üçün login və şifrəni müvafiq xanalara yazın</h5>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="text" class="form-control" name="admin_name" placeholder="İstifadəçi adı" required autofocus>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                             <input type="password" class="form-control" name="admin_password" placeholder="Şifrə" required>
                        </div>


                     <button type="submit" name="loggin" class="btn btn-primary ">Daxil Ol</button>
                    
                 </form>
                 
             </div>

         </div>


     </div>
 </div>

</body>
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.js"></script>
<script>
$(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 6000);
});
</script>
</html>
