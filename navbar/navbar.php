<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
<nav id='cssmenu'>
<div id="head-mobile"></div>
<div class="button"></div>
<ul>


<?php $menusor=$db->prepare("SELECT * from menu  Where parent_id=0 order by  menu_sira ASC limit 7");
	  $menusor->execute();
while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){  ?>	


<?php if ($menucek['menu_durum']==1) {?>


<li <?php if ($menucek['menu_mother']==1) { ?> class="dropdown"  <?php } ?> ><a href="<?php echo $menucek['menu_link']; ?>" <?php if ($menucek['menu_blank']==1) {?> target="_blank"<?php }?> <?php if ($menucek['menu_mother']==1) { ?> class="dropdown-toggle" data-toggle="dropdown" <?php } ?>><?php echo $menucek['menu_name']; if ($menucek['menu_mother']==1) {?></a>

<ul class="dropdown-menu">
<?php include 'while1.php';?>
</ul>

<?php }  elseif ($menucek['menu_mother']==0){?></a></li><?php } }  elseif ($menucek['menu_durum']==0){    }}?> 

		</ul>
	</nav>
</header>
<script src="js/index.js"></script>
<script src="js/jquery.min.js"></script>
</body>
<script src="navbar/js/index.js"></script>
</html>
