<?php
ob_start();
session_start();


function islemkontrol () {

    if (empty($_SESSION['admin_login'])) {
        
        Header("Location:../pages/login.php?durum=error");
        exit;
    }
}


function seo($s) {
 $az = array('ş','Ş','ə','Ə','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
 $eng = array('s','s','e','e','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
 $s = str_replace($az,$eng,$s);
 $s = strtolower($s);
 $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
 $s = preg_replace('/\s+/', '-', $s);
 $s = preg_replace('|-+|', '-', $s);
 $s = preg_replace('/#/', '', $s);
 $s = str_replace('.', '', $s);
 $s = trim($s, '-');
 return $s;
}


function tarix($aaa) {
 $en = array('Jan','Feb','March','Apr','May','jun','jul','Aug','Sep','Oct','Nov','Dec');
 $aze = array('Yanvar','Fevral','Mart','Aptel','May','Iyun','Iyul','Avqust','Sentyabr','Oktyabr','Noyabr','Dekabr');
 $aaa = str_replace($en,$aze,$aaa);
 $aaa = trim($aaa, '-');
 return $aaa;
}



?>