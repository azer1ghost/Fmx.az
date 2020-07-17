<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include '../headerdb.php'?>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>
		<?php echo $print[ 'site_title'] ?>
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
	<!-- PAGE LEVEL STYLES -->
	<link href="../assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
</head>

<?php include '../header.php'?>
<div id="page-wrapper">
    <div id="page-inner">
            <div class="col-md-12" style="position: relative;   padding-left:35%; ">
                <?php include "../notification.php"?>
            </div>


			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						SMTP MAIL parametrləri
					</div>
					<div class="panel-body">
					<form role="form" action="../../setting/engine.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="site_id" value="<?php echo $print['site_id'] ?>">

						<label style="color: red"> Bu bölmədə proqramistdən icazəsiz dəyişiklik etmək olmaz!</label>
						<div class="form-group">
							<label>SMTP HOST</label>
							<input class="form-control" type="text" name="site_smtphost" value="<?php echo $print['site_smtphost'] ?>">
						</div>

						<div class="form-group">
							<label>SMTP PORT</label>
							<input class="form-control" type="text" name="site_smtpport" value="<?php echo $print['site_smtpport'] ?>">
						</div>

						<div class="form-group">
							<label>SMTP USER</label>
							<input class="form-control" type="text" name="site_smtpuser" value="<?php echo $print['site_smtpuser'] ?>">
						</div>

						<div class="form-group">
							<label>SMTP PASSWORD</label>
							<input class="form-control" type="text" name="site_smtppassword" value="<?php echo $print['site_smtppassword'] ?>">
						</div>

						<button type="submit" class="btn btn-info" name="smtpupdate" >Yadda Saxla</button>

						</form>
					</div>
				</div>
			</div>


	<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<?php include '../footer.php'?>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../assets/js/custom.js"></script>
<!-- PAGE LEVEL SCRIPTS -->
<script src="../assets/js/bootstrap-fileupload.js"></script>

<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(500, 1000).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3500);
 
});
</script>
</body>

</html>