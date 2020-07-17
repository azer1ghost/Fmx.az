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

<?php    

	$pagesor=$db->prepare("SELECT * from pages where page_id=:page_id");

    $pagesor->execute(array('page_id' => $_GET['page_id'])); 

	$printpage=$pagesor->fetch(PDO::FETCH_ASSOC); 
	$mother_id=$printpage['parent_id']
	
	?>



						<form role="form" action="../../setting/engine.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="page_id" value="<?php echo $printpage['page_id'] ?>">
							<input type="hidden" name="page_picurl" value="<?php echo $printpage['page_picurl'] ?>">


							<div class="col-md-12">
							<div class="form-group">
								<label>Səhifə linki <?php echo $printpage['page_mother'] ?></label>
								<p class="help-block"><ins>pages.php?pageadress=<?php echo $printpage['page_id']; ?>&<?php echo seo($printpage['page_name'])?></ins></p>
								<button type="button" onclick="copytext('pages.php?pageadress=<?php echo $printpage['page_id']; ?>&<?php echo seo($printpage['page_name'])?>')"><i class="fa fa-copy" > Linki kopyala</i></button>
							</div>
							<hr>
							</div><div class="clearfix"></div>
	
						<div class="col-md-9">
							<div class="form-group">
								<label>Səhifə adı </label>
								<input class="form-control" type="text" name="page_name" value="<?php echo $printpage['page_name'] ?>">
								<p class="help-block">Səhifənin adını bu bölməyə daxil edin
								</p>
							</div>
						</div>




				<div class="col-md-3">
					<div class="form-group">
                        <label class="control-label col-lg-4">Şəkli</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../../../<?php echo $printpage['page_picurl'] ?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Şəkli seç</span><span class="fileupload-exists">Dəyişdir</span><input name="page_picurl" type="file" ></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Sil</a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
						<div class="clearfix"></div>

							<div class="form-group">
								<label>Səhifə başlığı</label>
								<input class="form-control" type="text" name="page_title" value="<?php echo $printpage['page_title'] ?>">
								<p class="help-block">Səhifə başlığını  yazın</p>
							</div>
							<textarea name="page_text">
								<?php echo $printpage[ 'page_text'] ?> </textarea>
							<script>
								CKEDITOR.replace('page_text');
							</script>

							<button type="submit" style="float: right; margin: 15px;" class="btn btn-info" name="pageupdate">Yadda Saxla</button>
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