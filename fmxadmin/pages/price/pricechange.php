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
						Paket düzənləyin
					</div>
					<div class="panel-body">

	<?php    

	$price=$db->prepare("SELECT * from prices where price_id=:price_id");

    $price->execute(array('price_id' => $_GET['price_id'])); 

	$print=$price->fetch(PDO::FETCH_ASSOC); 
	
	?>
						<form role="form" action="../../setting/engine.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="price_id" value="<?php echo $print['price_id'] ?>">

						<div class="col-md-4">
							<div class="form-group">
								<label>Paket adı</label>
								<input class="form-control" value="<?php echo $print['price_name'] ?>" type="text" name="price_name" >
								<p class="help-block">Paket adını bu bölməyə daxil edin
								</p>
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>Paket qiyməti</label>
								<input class="form-control" value="<?php echo $print['price_cash'] ?>" type="text" name="price_cash" >
								<p class="help-block">Paket qiymətini bu bölməyə daxil edin
								</p>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>Paket durumu</label>
								<div class="radio">
									 <?php if  ($print['price_durum']=="1"){ ?>

                                                <label>
                                                    <input type="radio" name="price_durum" id="optionsRadios1" value="1" checked="">Aktiv
                                                </label>

												 <label>
                                                    <input type="radio" name="price_durum" id="optionsRadios1" value="0" >Passiv
                                                </label>
									 <?php } else { ?>
												<label>
                                                    <input type="radio" name="price_durum" id="optionsRadios1" value="1" >Aktiv
                                                </label>

												 <label>
                                                    <input type="radio" name="price_durum" id="optionsRadios1" value="0" checked="">Passiv
                                                </label>
									 <?php } ?>

                                  </div>
								<p class="help-block">Paketin aktiv və ya passiv olduğunu təyin edin
								</p>
							</div>
						</div>

                        
						<div class="col-md-2">
							<div class="form-group">
								<label>Paket sırasını seçin</label>
								<input class="form-control" type="number" value="<?php echo $print['price_sira'] ?>" name="price_sira" >
								<p class="help-block">Paket sirası 
								</p><br>
							</div>
						</div>
							<div class="clearfix"></div>


					<div class="col-md-6">
						<div class="form-group">
								<label>1-ci sətir Paket mətni</label>
								<textarea name="price_text1">
								<?php echo $print[ 'price_text1'] ?> </textarea>
							<script>
								CKEDITOR.replace('price_text1');
							</script>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
								<label>2-ci sətir Paket mətni</label>
								<textarea name="price_text2">
								<?php echo $print[ 'price_text2'] ?> </textarea>
							<script>
								CKEDITOR.replace('price_text2');
							</script>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
								<label>3-cü sətir Paket mətni</label>
								<textarea name="price_text3">
								<?php echo $print[ 'price_text3'] ?> </textarea>
							<script>
								CKEDITOR.replace('price_text3');
							</script>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
								<label>4-cü sətir Paket mətni</label>
								<textarea name="price_text4">
								<?php echo $print[ 'price_text4'] ?> </textarea>
							<script>
								CKEDITOR.replace('price_text4');
							</script>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
								<label>5-ci sətir Paket mətni</label>
								<textarea name="price_text5">
								<?php echo $print[ 'price_text5'] ?> </textarea>
							<script>
								CKEDITOR.replace('price_text5');
							</script>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
								<label>6-cı sətir Paket mətni</label>
								<textarea name="price_text6">
								<?php echo $print[ 'price_text6'] ?> </textarea>
							<script>
								CKEDITOR.replace('price_text6');
							</script>
						</div>
					</div>

							<button type="submit" style="float: right; margin: 15px;" class="btn btn-info" name="pricechange">Yadda Saxla</button>
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