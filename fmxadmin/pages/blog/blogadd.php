<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include '../headerdb.php'?>
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
						Xəbər əlavə et
					</div>
					<div class="panel-body">





						<form role="form" action="../../setting/engine.php" method="POST" enctype="multipart/form-data">
							
<input type="hidden" name="blog_id" >
<input type="hidden" name="blog_date" value="<?php echo date("d.m.Y") ?>">


							
						<div class="col-md-3">
							<div class="form-group">
								<label>Xəbər adı</label>
								<input class="form-control" type="text" name="blog_name" >
								<p class="help-block">Xəbərin adını bu bölməyə daxil edin
								</p>
							</div>
						</div>

						

						<div class="col-md-4">
							<div class="form-group">
								<label>Xəbər durumu</label>
								<div class="radio">

                                                <label>
                                                    <input type="radio" name="blog_durum" id="optionsRadios1" value="1" checked="">Aktiv
                                                </label>

												 <label>
                                                    <input type="radio" name="blog_durum" id="optionsRadios1" value="0" >Passiv
                                                </label>
							
                                  </div>
								<p class="help-block">Xəbərin aktiv və ya passiv olduğunu təyin edin 
								</p>
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>Səhifənin sırasını seçin</label>
								

            <input type="checkbox"  class="chk-col-green" value="1" name="blog_gundem" >

								<p class="help-block">Gündəm
								</p><br>
							</div>
						</div>

				<div class="col-md-3">
					<div class="form-group">
                        <label class="control-label col-lg-4">Şəkli</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Şəkli seç</span><span class="fileupload-exists">Dəyişdir</span><input name="blog_picurl" required type="file" ></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Sil</a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
						<div class="clearfix"></div>

							<div class="form-group">
								<label>Keywords</label>
								<input class="form-control" type="text" name="blog_keywords" >
								<p class="help-block">Səhifə başlığını  yazın</p>
							</div>
							<textarea name="blog_text"></textarea>
							<script>
								CKEDITOR.replace('blog_text');
							</script>

							<button type="submit" style="float: right; margin: 15px;" class="btn btn-info" name="blogadd">Yadda Saxla</button>
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