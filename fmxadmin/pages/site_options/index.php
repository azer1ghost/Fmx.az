<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>
		ADMIN PANEL
	</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include '../header.php' ?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include "../notification.php"?>
                        <h1>Xoş Gəlmisiniz!</h1>
                        <h1 class="page-subhead-line">Buradan siz saytin bütün parametrlərini dəyişə bilərsiniz. </h1>
                        
               <!--/.ROW-->
                <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                           Qısa yollar
                        </div>
                        <div class="panel-body">
                            <div class="row">

<a href="../pages/pages.php">
	<div class="col-md-3 ">
		<div class="alert alert-info text-center">
			<i class="fa fa-desktop fa-5x"></i>
			<h3>50+ Page </i></h3> Səhifələr
		</div>
	</div>
</a>

<a href="../blog/blog.php">
	<div class="col-md-3 ">
		<div class="alert alert-success text-center">
			<i class="fa fa-bars fa-5x"></i>
			<h3>300+ Post</h3> Xəbərlər
		</div>
	</div>
</a>

<a href="../services/services.php">
	<div class="col-md-3 ">
		<div class="alert alert-warning text-center">
			<i class="fa fa-fax fa-5x"></i>
			<h3>56+ Geri bilidirm</h3> Xidmətlər
		</div>
	</div>
</a>

<a href="">
	<div class="col-md-3 ">
		<div class="alert alert-danger text-center">
			<i class="fa fa-envelope fa-5x"></i>
			<h3>30+ Bildiriş </h3> Statistika
		</div>
	</div>
</a>

                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <!--/.ROW-->
                       






                    </div>
                </div>
         

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
<?php include '../footer.php' ?>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


</body>

</html>