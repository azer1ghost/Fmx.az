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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
</head>

<?php include '../header.php'?>
<div id="page-wrapper">

		
		<!-- /. ROW  -->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						Səhifə məzmununu dəyiş
					</div>
					<div class="panel-body">

						<form role="form" action="../../setting/engine.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="menu_id">

						<div class="col-md-4">
							<div class="form-group">
								<label>Menu adı</label>
								<input class="form-control" type="text" name="menu_name" >
								<p class="help-block">Menu adını bu bölməyə daxil edin
								</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Menu durumu</label>
								<div class="radio">
									 
                                                <label>
                                                    <input type="radio" name="menu_durum" id="optionsRadios1" value="1" checked="">Aktiv
                                                </label>

												 <label>
                                                    <input type="radio" name="menu_durum" id="optionsRadios1" value="0" >Passiv
                                                </label>
									 
                                  </div>
								<p class="help-block">Menu-nun aktiv və ya passiv olduğunu təyin edin 
								</p>
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>Parent</label><br>
								
            						<input type="checkbox" class="form-check"   value="1" name="menu_mother" >
            			
								<p class="help-block">Alt menu-ları var
								</p>
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>BLANK</label><br>
								
            						<input type="checkbox" class="form-check"  value="1" name="menu_blank" >
            					
								<p class="help-block">Yeni səhifədə açılsın
								</p>
							</div>
						</div>


						<div class="clearfix"></div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Menu linki</label>
								<input class="form-control" type="text" name="menu_link" value="javascript:void(0)">
								<p class="help-block">Menu linkini  yazın</p>
							</div>
						</div>
							
							<button type="submit" style="float: right; margin: 15px;" class="btn btn-info" name="menuadd">Yadda Saxla</button>
					</div>
				</div>
			</div>

		</form>
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

<script>
    function copytext(text) {
        var textField = document.createElement('textarea');
        textField.innerText = text;
        document.body.appendChild(textField);
        textField.select();
        document.execCommand('copy');
        textField.remove();
    }
</script>

</body>

</html>