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
		<!-- /. ROW  -->
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						Başlıca
					</div>
					<div class="panel-body">
						<form role="form" action="../../setting/engine.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="site_id" value="<?php echo $print['site_id'] ?>">
						<input type="hidden" name="site_logourl" value="<?php echo $print['site_logourl'] ?>">

							<div class="form-group">
								<label>Title</label>
								<input class="form-control" type="text" name="site_title" value="<?php echo $print['site_title'] ?>">
								<p class="help-block">Saytın title-nı bu bölməyə daxil edin
								</p>
							</div>

							<div class="form-group">
								<label>Şirkət adı</label>
								<input class="form-control" type="text" name="site_sitename" value="<?php echo $print['site_sitename'] ?>">
								<p class="help-block">Şirkətin adını yazın</p>
							</div>

							<div class="form-group">
								<label>Müəllif</label>
								<input class="form-control" type="text" name="site_author" value="<?php echo $print['site_author'] ?>">
								<p class="help-block">Google-da göstəriləcək müəllif</p>
							</div>

							<div class="form-group">
								<label>Google anaystic code</label>
								<input class="form-control" type="text" name="site_analystic" value="<?php echo $print['site_analystic'] ?>">
								<p class="help-block">Google anaystic izləmə adını yazın</p>
							</div>

							<div class="form-group">
								<label>Google Açar sözlər</label>
								<textarea class="form-control" rows="3" name="site_keywords" ><?php echo $print['site_keywords'] ?></textarea>
							</div>

							<div class="form-group">
								<label>Google Alt yazı </label>
								<textarea class="form-control" rows="3" name="site_description" ><?php echo $print['site_description'] ?></textarea>
								<p class="help-block">Google-da göstəriləcək bir cümləlik haqqında yazısı</p>
							</div>
							<button type="submit" class="btn btn-info" name="esasparametrupdate" >Yadda Saxla</button>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-4">Logo Yüklə</label>
				<div class="">
					<div class="fileupload fileupload-new" data-provides="fileupload" style="float: left;">
						<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
						<div>
							<span class="btn btn-file btn-success"><span class="fileupload-new">Şəkili seç</span>
							<span class="fileupload-exists">Dəyişdir</span>
							<input type="file" name="site_logourl" >
							</span>
							<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Seçiləni sil</a>
						</div>
					</div>
					<label>Hazırda yüklü olan</label>
					<img style="float:left; padding-left:70px; width: 200px; height: auto;" src="../../../<?php echo $print['site_logourl'] ?>">
				</div>
			</div>

			</form>
		</div>
	</div>
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