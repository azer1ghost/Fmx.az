
<?php

$mother2=$menucek1['id'];

	  $menusor2=$db->prepare("SELECT * from menu Where parent_id=$mother2 order by  menu_sira ASC limit 10");
	  $menusor2->execute();
while($menucek2=$menusor2->fetch(PDO::FETCH_ASSOC)){  ?> 

<?php if ($menucek2['menu_durum']==1) {?>

<li><a href="<?php echo $menucek2['menu_link']; ?>" <?php if ($menucek2['menu_blank']==1) {?> target="_blank"<?php }?> ><?php echo $menucek2['menu_name']; ?></a></li>


<?php } elseif ($menucek2['menu_durum']==0){    }}?>

          
