<!DOCTYPE html>
<html lang="en">
<?php include 'fmxadmin/setting/connect.php';
      include 'fmxadmin/setting/function.php';
$sitesor=$db->prepare("select * from `site_options` where site_id=?");
$sitesor->execute(array(1));
$print=$sitesor->fetch(PDO::FETCH_ASSOC);
$actual_link = $_SERVER['PHP_SELF'];

define('TIMEZONE', 'Asia/Baku'); // Baku, Azerbaijan, Asia
date_default_timezone_set(TIMEZONE);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php echo $print['site_description'] ?>">

    <meta name="author" content="<?php echo $print['site_author'] ?>">

    <title><?php echo $print['site_title'] ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="themes/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/custom/css/flexslider.css" type="text/css" media="screen">
    <link rel="stylesheet" href="assets/custom/css/parallax-slider.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">

    <!-- Custom styles for this template -->

    <link href="assets/custom/css/business-plate.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/custom/img/logo.ico">

    <style>
 @media (min-width: 768px)
 { .container>.navbar-header,
.container>.navbar-collapse 
    margin-right: 0;
    margin-left: -1;
}
    </style>

</head>



<body>
    <!-- topHeaderSection -->
    <div class="topHeaderSection">
        <div class="header">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a class="navbar-brand" href="index.php"><img  class="logoimg" src="assets/custom/img/logo.png"  /></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
<?php $menusor=$db->prepare("SELECT * from menu  Where parent_id=0 order by  menu_sira ASC limit 7");
	  $menusor->execute();
while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){  ?>	

<?php if ($menucek['menu_durum']==1) {?>


<li <?php if ($menucek['menu_mother']==1) { ?> class="dropdown"  <?php } ?>><a href="<?php echo $menucek['menu_link']; ?>" <?php if ($menucek['menu_blank']==1) {?> target="_blank"<?php }?> <?php if ($menucek['menu_mother']==1) { ?> class="dropdown-toggle" data-toggle="dropdown" <?php } ?>><?php echo $menucek['menu_name']; if ($menucek['menu_mother']==1) {?><span class="arrow">▼</span></a>

<ul class="dropdown-menu">
<?php include 'navbar/while1.php' ; ?>
</ul>

<?php }  elseif ($menucek['menu_mother']==0){?></a></li><?php } }  elseif ($menucek['menu_durum']==0){    }}?> 
                    </ul>
                 
                        
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>