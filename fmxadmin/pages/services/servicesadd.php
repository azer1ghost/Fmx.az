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

	<script src="https://cdn.ckeditor.com/4.7.3/basic/ckeditor.js"></script>
</head>

<?php include '../header.php'?>
<div id="page-wrapper">
	
		
		<!-- /. ROW  -->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						Yeni xidmət əlavə et
					</div>
					<div class="panel-body">
						<form role="form" action="../../setting/engine.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="slider_id" >

				<div class="col-md-6">
					<div class="form-group">
                        <label class="control-label col-lg-4">Seçilmiş şəkil</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Şəkli seç</span><span class="fileupload-exists">Dəyişdir</span><input name="slider_picurl" type="file" required></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Sil</a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Xidmətin durumu</label>
								<div class="radio">
									 

                                                <label>
                                                    <input type="radio" name="slider_durum" id="optionsRadios1" value="1" checked="">Göstər
                                                </label>

												 <label>
                                                    <input type="radio" name="slider_durum" id="optionsRadios1" value="0" >Gizlə
                                                </label>
									

                                  </div>
								<p class="help-block">Xidmətin aktiv və ya passiv olduğunu təyin edin
								</p>
							</div>
						</div>

                        
						<div class="col-md-2">
							<div class="form-group">
								<label>Xidmətin sırasını seçin</label>
								<input class="form-control" type="number" required name="slider_sira" >
								<p class="help-block">Xidmətin sirası 
								</p><br>
							</div>
						</div>
					<div class="clearfix"></div>


					<div class="col-md-6">
						<div class="form-group">
								<label>Xidmətin başlığı</label>
								<textarea name="slider_title"></textarea>
							<script>
								CKEDITOR.replace('slider_title');
							</script>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
								<label>Xidmətin mətni</label>
								<textarea name="slider_text"></textarea>
							<script>
								CKEDITOR.replace('slider_text');
							</script>
						</div>
					</div>			


							<button type="submit" style="float: right; margin: 15px;" class="btn btn-info" name="servicesadd">Yadda Saxla</button>
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

</body>

</html>