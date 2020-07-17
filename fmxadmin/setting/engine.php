<!--######################################### SAYTIN MOTORU ########################################-->

<?php 
ob_start();
session_start();
			//Sesia basladildi *
include 'connect.php';  //baglanti temin edildi *
include 'function.php';


########################## admin login ######################
//---------------------------------------------------------------------//


if (isset($_POST['loggin'])) {  


$admin_login=$_POST['admin_name'];
$admin_password=md5($_POST['admin_password']);


		if ($admin_login && $admin_password ) {

		$sorgu=$db->prepare("SELECT * from admin WHERE admin_login=:name and  admin_password=:password");

		$sorgu->execute(array(
			'name'=>$admin_login,
			'password'=>$admin_password
		));

		$say=$sorgu->rowCount();

		if ($say>0) {
		
		$_SESSION['admin_login'] = $admin_login;


$site= "$sitename/fmxadmin/pages/login.php?login=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else {

$site= "$sitename/fmxadmin/pages/login.php?login=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }
		
}
}

//---------------------------------------------------------------------//




#######################################################################
##########################  Parametr Update  ##########################
if (isset($_POST['esasparametrupdate'])) {          #duyme adi
		


if($_FILES['site_logourl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/site_options/parametr.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['site_logourl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['site_logourl']["name"],strpos($_FILES['site_logourl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/site_options/parametr.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}

		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['site_logourl']["tmp_name"];
		@$name = $_FILES['site_logourl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$site_logourl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");

$save=$db->prepare("UPDATE site_options SET  #tablo adi

#sutun adi--> leqebi
site_title=:a, 							
site_sitename=:b,
site_author=:c,
site_analystic=:d,
site_keywords=:e,
site_description=:f,
site_logourl=:h


WHERE site_id={$_POST['site_id']}");
$update=$save->execute(array(
	
 #sutun leqebi --> adi
'a'=>$_POST['site_title'],     			
'b'=>$_POST['site_sitename'],
'c'=>$_POST['site_author'],
'd'=>$_POST['site_analystic'],
'e'=>$_POST['site_keywords'],
'f'=>$_POST['site_description'],
'h'=>$site_logourl
 ));

$site_id=$_POST['site_id'];

if($update) { 	
  
		 	$resim_sil=$_POST['site_logourl'];
		 	unlink("../../$resim_sil");

$site= "$sitename/fmxadmin/pages/site_options/parametr.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/site_options/parametr.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }



} else {

$save=$db->prepare("UPDATE site_options SET  #tablo adi

#sutun adi--> leqebi
site_title=:a, 							
site_sitename=:b,
site_author=:c,
site_analystic=:d,
site_keywords=:e,
site_description=:f

WHERE site_id={$_POST['site_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
'a'=>$_POST['site_title'],     			
'b'=>$_POST['site_sitename'],
'c'=>$_POST['site_author'],
'd'=>$_POST['site_analystic'],
'e'=>$_POST['site_keywords'],
'f'=>$_POST['site_description']
));


if($update) { 	

$site= "$sitename/fmxadmin/pages/site_options/parametr.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/site_options/parametr.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}
}
//---------------------------------------------------------------------//




#######################################################################
########################## social update ##############################
//---------------------------------------------------------------------//

if (isset($_POST['socialupdate'])) {          #duyme adi

$save=$db->prepare("UPDATE site_options SET  #tablo adi

 #sutun adi--> leqebi
	site_facebook=:a,
	site_instagram=:b,
	site_google=:c,
	site_youtube=:d


WHERE site_id={$_POST['site_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['site_facebook'],
	'b'=>$_POST['site_instagram'],
	'c'=>$_POST['site_google'],
	'd'=>$_POST['site_youtube']


));


if($update) { 	

$site= "$sitename/fmxadmin/pages/site_options/social.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/site_options/social.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}

//---------------------------------------------------------------------//








#######################################################################
########################## SMTP update ##############################
//---------------------------------------------------------------------//

if (isset($_POST['smtpupdate'])) {          #duyme adi

$save=$db->prepare("UPDATE site_options SET  #tablo adi

 #sutun adi--> leqebi
	site_smtphost=:a,
	site_smtpport=:b,
	site_smtpuser=:c,
	site_smtppassword=:d


WHERE site_id={$_POST['site_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['site_smtphost'],
	'b'=>$_POST['site_smtpport'],
	'c'=>$_POST['site_smtpuser'],
	'd'=>$_POST['site_smtppassword']


));


if($update) { 	

$site= "$sitename/fmxadmin/pages/site_options/smtp.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/site_options/smtp.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}

//---------------------------------------------------------------------//







########################## page update ######################
//---------------------------------------------------------------------//

if (isset($_POST['pageupdate'])) {          #duyme adi


if($_FILES['page_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['page_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['page_picurl']["name"],strpos($_FILES['page_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}

		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['page_picurl']["tmp_name"];
		@$name = $_FILES['page_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$page_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");

$save=$db->prepare("UPDATE pages SET  #tablo adi

#sutun adi--> leqebi
	page_name=:a,
	page_title=:b,
	page_text=:c,
	page_picurl=:h


WHERE page_id={$_POST['page_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['page_name'],
	'b'=>$_POST['page_title'],
	'c'=>$_POST['page_text'],
	'h'=>$page_picurl

));

$page_id=$_POST['page_id'];

if($update) { 	

  
		 	$resim_sil=$_POST['page_picurl'];
		 	unlink("../../$resim_sil");

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else {

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }




} else {


$save=$db->prepare("UPDATE pages SET  #tablo adi

#sutun adi--> leqebi
	page_name=:a,
	page_title=:b,
	page_text=:c

WHERE page_id={$_POST['page_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['page_name'],
	'b'=>$_POST['page_title'],
	'c'=>$_POST['page_text']

));


if($update) { 	

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}
}
//---------------------------------------------------------------------//




#########################################################################
########################## Page add #####################################
//---------------------------------------------------------------------//


if (isset($_POST['pageadd'])) {   			#duyme adi

	if($_FILES['page_picurl']["size"] > 3000000) {


$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['page_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['page_picurl']["name"],strpos($_FILES['page_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {


$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}
		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['page_picurl']["tmp_name"];
		@$name = $_FILES['page_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$page_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");
$save=$db->prepare("INSERT INTO pages SET   	#tablo adi     							

#sutun adi--> leqebi
	page_name=:a,
	page_title=:b,
	page_text=:c,
	page_picurl=:h ");
$insert=$save->execute(array( 					
 #sutun leqebi --> adi
	'a'=>$_POST['page_name'],
	'b'=>$_POST['page_title'],
	'c'=>$_POST['page_text'],
	'h'=> $page_picurl
	 ));

if($insert) {

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; } }

							}
#########################################################################
//---------------------------------------------------------------------//



#########################################################################
########################## Page delete ##################################
//---------------------------------------------------------------------//

if ($_GET['pagesil']=="ok"){	            #sil duymesinden gelen ad

	islemkontrol ();
 
		$sil=$db->prepare("DELETE from pages where page_id=:page_id"); #ne silinecek

		$kontrol=$sil->execute(array('page_id' => $_GET['page_id']));	#ne silinecek hardan

	if($kontrol)  { 

		$resim_sil=$_GET['pageimgdel'];
		 	 unlink("../../$resim_sil");
		
$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=del";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/pages/pages.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

							}

#########################################################################
//---------------------------------------------------------------------//





#########################################################################
############################# Slider add  ###############################
//---------------------------------------------------------------------//
if (isset($_POST['slideradd'])) {   	#duyme adi

if($_FILES['slider_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['slider_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['slider_picurl']["name"],strpos($_FILES['slider_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}

		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['slider_picurl']["tmp_name"];
		@$name = $_FILES['slider_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$slider_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");


$save=$db->prepare("INSERT INTO slider SET   	#tablo adi     							
#sutun adi--> leqebi
	slider_durum=:a,
	slider_sira=:b,
	slider_text=:c,
	slider_title=:d, 
	slider_picurl=:h");
$insert=$save->execute(array( 					
 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'b'=>$_POST['slider_sira'],
	'c'=>$_POST['slider_text'],
	'd'=>$_POST['slider_title'],
	'h'=> $slider_picurl
	 ));

if($insert) {

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

} }
#########################################################################
//---------------------------------------------------------------------//



########################## slider update ######################
//---------------------------------------------------------------------//

if (isset($_POST['sliderchange'])) {          #duyme adi

if($_FILES['slider_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['slider_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['slider_picurl']["name"],strpos($_FILES['slider_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}

		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['slider_picurl']["tmp_name"];
		@$name = $_FILES['slider_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$slider_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");

$slidersave=$db->prepare("UPDATE slider SET  #tablo adi

 #sutun adi--> leqebi
	slider_durum=:a,
	slider_sira=:b,
	slider_text=:c,
	slider_title=:d, 
	slider_picurl=:h


WHERE slider_id={$_POST['slider_id']}");
$update=$slidersave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'b'=>$_POST['slider_sira'],
	'c'=>$_POST['slider_text'],
	'd'=>$_POST['slider_title'],	
	'h'=> $slider_picurl

));

$slider_id=$_POST['slider_id'];

if($update) { 	

  
		 	$resim_sil=$_POST['slider_picurl'];
		 	unlink("../../$resim_sil");

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }





} else {

$slidersave=$db->prepare("UPDATE slider SET  #tablo adi

 #sutun adi--> leqebi
	slider_durum=:a,
	slider_text=:c,
	slider_title=:d,
	slider_sira=:b 

WHERE slider_id={$_POST['slider_id']}");
$update=$slidersave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'c'=>$_POST['slider_text'],
	'd'=>$_POST['slider_title'],
	'b'=>$_POST['slider_sira']

));


if($update) { 	

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}
}
//---------------------------------------------------------------------//






#######################################################################
########################## Slider img delete  #########################
//---------------------------------------------------------------------//

if ($_GET['slidersil']=="ok"){	            #sil duymesinden gelen ad

	 islemkontrol ();
 
		$sil=$db->prepare("DELETE from slider where slider_id=:slider_id"); #ne silinecek

		$kontrol=$sil->execute(array('slider_id' => $_GET['slider_id']));	#ne silinecek hardan

	if($kontrol) 

		 { 
			 $resim_sil=$_GET['sliderresimsil'];
		 	 unlink("../../$resim_sil");

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=del";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/slider/slider.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

							}

#########################################################################
//---------------------------------------------------------------------//








#########################################################################
############################# Services add  ###############################
//---------------------------------------------------------------------//
if (isset($_POST['servicesadd'])) {   	#duyme adi

if($_FILES['slider_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/services/services.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['slider_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['slider_picurl']["name"],strpos($_FILES['slider_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/services/services.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}

		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['slider_picurl']["tmp_name"];
		@$name = $_FILES['slider_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$slider_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");


$save=$db->prepare("INSERT INTO services SET   	#tablo adi     							
#sutun adi--> leqebi
	slider_durum=:a,
	slider_sira=:b,
	slider_text=:c,
	slider_title=:d,
	slider_link=:l, 
	slider_picurl=:h");
$insert=$save->execute(array( 					
 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'b'=>$_POST['slider_sira'],
	'c'=>$_POST['slider_text'],
	'l'=>$_POST['slider_link'],
	'd'=>$_POST['slider_title'],
	'h'=> $slider_picurl
	 ));

if($insert) {

$site= "$sitename/fmxadmin/pages/services/services.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/services/services.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

} }
#########################################################################
//---------------------------------------------------------------------//



########################## Services update ######################
//---------------------------------------------------------------------//

if (isset($_POST['serviceschange'])) {          #duyme adi

if($_FILES['slider_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/services/services.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['slider_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['slider_picurl']["name"],strpos($_FILES['slider_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/services/services.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}

		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['slider_picurl']["tmp_name"];
		@$name = $_FILES['slider_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$slider_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");

$slidersave=$db->prepare("UPDATE services SET  #tablo adi

 #sutun adi--> leqebi
	slider_durum=:a,
	slider_sira=:b,
	slider_text=:c,
	slider_title=:d,
	slider_link=:l, 
	slider_picurl=:h


WHERE slider_id={$_POST['slider_id']}");
$update=$slidersave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'b'=>$_POST['slider_sira'],
	'c'=>$_POST['slider_text'],
	'l'=>$_POST['slider_link'],
	'd'=>$_POST['slider_title'],	
	'h'=> $slider_picurl

));

$slider_id=$_POST['slider_id'];

if($update) { 	

  
		 	$resim_sil=$_POST['slider_picurl'];
		 	unlink("../../$resim_sil");

$site= "$sitename/fmxadmin/pages/services/services.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/services/services.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }





} else {

$slidersave=$db->prepare("UPDATE services SET  #tablo adi

 #sutun adi--> leqebi
	slider_durum=:a,
	slider_text=:c,
	slider_title=:d,
	slider_link=:l,
	slider_sira=:b 

WHERE slider_id={$_POST['slider_id']}");
$update=$slidersave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'c'=>$_POST['slider_text'],
	'd'=>$_POST['slider_title'],
	'l'=>$_POST['slider_link'],
	'b'=>$_POST['slider_sira']

));


if($update) { 	

$site= "$sitename/fmxadmin/pages/services/services.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/services/services.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}
}
//---------------------------------------------------------------------//






#######################################################################
########################## Services img delete  #########################
//---------------------------------------------------------------------//

if ($_GET['servicessil']=="ok"){	            #sil duymesinden gelen ad

	islemkontrol ();
 
		$sil=$db->prepare("DELETE from services where slider_id=:slider_id"); #ne silinecek

		$kontrol=$sil->execute(array('slider_id' => $_GET['slider_id']));	#ne silinecek hardan

	if($kontrol) 

		 { 
			 $resim_sil=$_GET['sliderresimsil'];
		 	 unlink("../../$resim_sil");

$site= "$sitename/fmxadmin/pages/services/services.php?durum=del";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/services/services.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

							}

#########################################################################
//---------------------------------------------------------------------//





#######################################################################
########################## Blog add Parametr  ######################
//---------------------------------------------------------------------//
if (isset($_POST['blogadd'])) {
	   			#duyme adi
if ($_POST['blog_gundem']) { $result=1 ; }
else { $result=0 ; }


if($_FILES['blog_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; 

exit;			
}

if($_FILES['blog_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['blog_picurl']["name"],strpos($_FILES['blog_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; 

exit;	
}

		$uploads_dir = '../../assets/images';                       #sekil yeri
		@$tmp_name = $_FILES['blog_picurl']["tmp_name"];
		@$name = $_FILES['blog_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$blog_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");


$save=$db->prepare("INSERT INTO blog SET   	#tablo adi     							
#sutun adi--> leqebi
	blog_name=:a,
	blog_text=:b,
	blog_keywords=:z,
	blog_date=:c,
	blog_durum=:e,
	blog_gundem=:y,
	blog_picurl=:h");
$insert=$save->execute(array( 					
 #sutun leqebi --> adi
	'a'=>$_POST['blog_name'],
	'b'=>$_POST['blog_text'],
	'z'=>$_POST['blog_keywords'],
	'c'=>$_POST['blog_date'],
	'e'=>$_POST['blog_durum'],
	'y'=>$result,
	'h'=> $blog_picurl
	 ));

if($insert) { 	

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

else { 

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; } 
}  }

#########################################################################
//---------------------------------------------------------------------//








########################## blog change ######################
//---------------------------------------------------------------------//

if (isset($_POST['blogupdate'])) {          #duyme adi

if ($_POST['blog_gundem']) {$result=1 ;}
else {$result=0 ;}

if($_FILES['blog_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['blog_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['blog_picurl']["name"],strpos($_FILES['blog_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; 

exit;	
}

		$uploads_dir = '../../assets/images';                       #sekil yeri
		@$tmp_name = $_FILES['blog_picurl']["tmp_name"];
		@$name = $_FILES['blog_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$blog_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");


$blogsave=$db->prepare("UPDATE blog SET  #tablo adi

#sutun adi--> leqebi
	blog_name=:a,
	blog_text=:b,
	blog_keywords=:z,
	blog_date=:c,
	blog_durum=:e,
	blog_gundem=:y, 
	blog_picurl=:h

WHERE blog_id={$_POST['blog_id']}");
$update=$blogsave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['blog_name'],
	'b'=>$_POST['blog_text'],
	'z'=>$_POST['blog_keywords'],
	'c'=>$_POST['blog_date'],
	'e'=>$_POST['blog_durum'],
	'y'=>$result,
	'h'=> $blog_picurl
	 ));

$blog_id=$_POST['blog_id'];

if($update) { 	

  
		 	$resim_sil=$_POST['blog_picurl'];
		 	unlink("../../$resim_sil");


	header("Location:../pages/blog/blog.php?durum=ok");			#islem basarili olduqda gedeceyi yer

} else { header("Location:../pages/blog/blog.php?durum=no"); }


} else {

$blogsave=$db->prepare("UPDATE blog SET  #tablo adi

 #sutun adi--> leqebi
	blog_name=:a,
	blog_text=:b,
	blog_keywords=:z,
	blog_date=:c,
	blog_gundem=:y,
	blog_durum=:e

WHERE blog_id={$_POST['blog_id']}");
$update=$blogsave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['blog_name'],
	'b'=>$_POST['blog_text'],
	'z'=>$_POST['blog_keywords'],
	'c'=>$_POST['blog_date'],
	'y'=>$result,
	'e'=>$_POST['blog_durum']

));


if($update) { 	

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

else { 

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}
}
//---------------------------------------------------------------------//





#######################################################################
########################## blog delete Parametr  ######################
//---------------------------------------------------------------------//

if ($_GET['blogsil']=="ok"){	            #sil duymesinden gelen ad

	islemkontrol ();
 
		$sil=$db->prepare("DELETE from blog where blog_id=:blog_id"); #ne silinecek

		$kontrol=$sil->execute(array('blog_id' => $_GET['blog_id']));	#ne silinecek hardan

	if($kontrol) 

		 { 
		 	$resim_sil=$_GET['blogresimsil'];
		 	unlink("../../$resim_sil"); 


$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

else { 

$site= "$sitename/fmxadmin/pages/blog/blog.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

							}

#########################################################################
//---------------------------------------------------------------------/












#######################################################################
########################## price update ##############################
//---------------------------------------------------------------------//

if (isset($_POST['pricechange'])) {          #duyme adi

$save=$db->prepare("UPDATE prices SET  #tablo adi

#sutun adi--> leqebi
	price_name=:a,
	price_durum=:b,
	price_sira=:c,
	price_cash=:d,
	price_text1=:e,
	price_text2=:f,
	price_text3=:g,
	price_text4=:h,
	price_text5=:j,
	price_text6=:k


WHERE price_id={$_POST['price_id']}");
$update=$save->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['price_name'],
	'b'=>$_POST['price_durum'],
	'c'=>$_POST['price_sira'],
	'd'=>$_POST['price_cash'],
	'e'=>$_POST['price_text1'],
	'f'=>$_POST['price_text2'],
	'g'=>$_POST['price_text3'],
	'h'=>$_POST['price_text4'],
	'j'=>$_POST['price_text5'],
	'k'=>$_POST['price_text6']


));


if($update) { 	

$site= "$sitename/fmxadmin/pages/price/prices.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/price/prices.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}

//---------------------------------------------------------------------//




#######################################################################
########################## menuadd Parametr  ######################
//---------------------------------------------------------------------//
if (isset($_POST['menuadd'])) {   			#duyme adi

if ($_POST['menu_mother']) {$result=1 ;}
else {$result=0 ;}

if ($_POST['menu_blank']) {$resultblank=1 ;}
else {$resultblank=0 ;}		

$save=$db->prepare("INSERT INTO menu SET   	#tablo adi     							
 #sutun adi--> leqebi
	menu_name=:a,
	menu_link=:b,
	menu_mother=:d,
	menu_blank=:h,
	menu_durum=:c ");
$insert=$save->execute(array( 					
 #sutun leqebi --> adi
	'a'=>$_POST['menu_name'],
	'b'=>$_POST['menu_link'],
	'd'=>$result,
	'h'=>$resultblank,
	'c'=>$_POST['menu_durum']
	 ));

if($insert) {

$site= "$sitename/fmxadmin/pages/menu/menu.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/menu/menu.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

							}
#########################################################################
//---------------------------------------------------------------------//


########################## menu update ######################
//---------------------------------------------------------------------//

if (isset($_POST['menuupdate'])) {          #duyme adi

if ($_POST['menu_mother']) {$result=1 ;}
else {$result=0 ;}

if ($_POST['menu_blank']) {$resultblank=1 ;}
else {$resultblank=0 ;}		

$menusave=$db->prepare("UPDATE menu SET  #tablo adi



 #sutun adi--> leqebi
	menu_name=:a,
	menu_link=:b,
	menu_mother=:d,
	menu_blank=:h,
	menu_durum=:c 

WHERE id={$_POST['menu_id']}");
$update=$menusave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['menu_name'],
	'b'=>$_POST['menu_link'],
	'd'=>$result,
	'h'=>$resultblank,
	'c'=>$_POST['menu_durum']

));


if($update) { 	

$site= "$sitename/fmxadmin/pages/menu/menu.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/menu/menu.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

							}

//---------------------------------------------------------------------//





#######################################################################
########################## menu delete ######################
//---------------------------------------------------------------------//

if ($_GET['menusil']=="ok"){	            #sil duymesinden gelen ad
 
		$sil=$db->prepare("DELETE from menu where id=:id"); #ne silinecek

		$kontrol=$sil->execute(array('id' => $_GET['id']));	#ne silinecek hardan

	if($kontrol) {

$site= "$sitename/fmxadmin/pages/menu/menu.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/menu/menu.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

							}

//---------------------------------------------------------------------//







#########################################################################
############################# Slider add  ###############################
//---------------------------------------------------------------------//
if (isset($_POST['employeeadd'])) {   	#duyme adi

if($_FILES['slider_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['slider_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['slider_picurl']["name"],strpos($_FILES['slider_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}

		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['slider_picurl']["tmp_name"];
		@$name = $_FILES['slider_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$slider_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");


$save=$db->prepare("INSERT INTO employee SET   	#tablo adi     							
#sutun adi--> leqebi
	slider_durum=:a,
	slider_sira=:b,
	slider_title=:d, 
	slider_picurl=:h");
$insert=$save->execute(array( 					
 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'b'=>$_POST['slider_sira'],
	'd'=>$_POST['slider_title'],
	'h'=> $slider_picurl
	 ));

if($insert) {

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

} }
#########################################################################
//---------------------------------------------------------------------//



########################## slider update ######################
//---------------------------------------------------------------------//

if (isset($_POST['employeechange'])) {          #duyme adi

if($_FILES['slider_picurl']["size"] > 3000000) {

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=big";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;			
}

if($_FILES['slider_picurl']["size"] > 0) {

$file_type=array('jpg','jpeg','png' );
$ext=strtolower(substr($_FILES['slider_picurl']["name"],strpos($_FILES['slider_picurl']["name"],'.')+1));
if(in_array($ext, $file_type) === false) {

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=filetype";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

exit;	
}

		$uploads_dir = '../../assets/images';                      #sekil yeri
		@$tmp_name = $_FILES['slider_picurl']["tmp_name"];
		@$name = $_FILES['slider_picurl']["name"];
		$xvalue3=rand(20000,32000);
		$xvalue4=rand(20000,32000);
		$xad=$xvalue3.$xvalue4;
		$slider_picurl=substr($uploads_dir, 6)."/".$xad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$xad$name");

$slidersave=$db->prepare("UPDATE employee SET  #tablo adi

 #sutun adi--> leqebi
	slider_durum=:a,
	slider_sira=:b,
	slider_title=:d, 
	slider_picurl=:h


WHERE slider_id={$_POST['slider_id']}");
$update=$slidersave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'b'=>$_POST['slider_sira'],
	'd'=>$_POST['slider_title'],	
	'h'=> $slider_picurl

));

$slider_id=$_POST['slider_id'];

if($update) { 	

  
		 	$resim_sil=$_POST['slider_picurl'];
		 	unlink("../../$resim_sil");

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }





} else {

$slidersave=$db->prepare("UPDATE employee SET  #tablo adi

 #sutun adi--> leqebi
	slider_durum=:a,
	slider_title=:d,
	slider_sira=:b 

WHERE slider_id={$_POST['slider_id']}");
$update=$slidersave->execute(array(

 #sutun leqebi --> adi
	'a'=>$_POST['slider_durum'],
	'd'=>$_POST['slider_title'],
	'b'=>$_POST['slider_sira']

));


if($update) { 	

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=ok";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

}
}
//---------------------------------------------------------------------//






#######################################################################
########################## Slider img delete  #########################
//---------------------------------------------------------------------//

if ($_GET['employeesil']=="ok"){	            #sil duymesinden gelen ad

	 islemkontrol ();
 
		$sil=$db->prepare("DELETE from employee where slider_id=:slider_id"); #ne silinecek

		$kontrol=$sil->execute(array('slider_id' => $_GET['slider_id']));	#ne silinecek hardan

	if($kontrol) 

		 { 
			 $resim_sil=$_GET['sliderresimsil'];
		 	 unlink("../../$resim_sil");

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=del";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ;

} else { 

$site= "$sitename/fmxadmin/pages/employee/employee.php?durum=no";

$meta='<meta HTTP-EQUIV="REFRESH" content="0; url=';

$link=  $meta.$site.'">' ;

echo $link ; }

							}

#########################################################################
//---------------------------------------------------------------------//


?>