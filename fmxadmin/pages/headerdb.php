<?php include '../../setting/connect.php';
      include_once '../../setting/function.php';

$sitesor=$db->prepare("select * from `site_options` where site_id=?");
$sitesor->execute(array(1));
$print=$sitesor->fetch(PDO::FETCH_ASSOC);



define('TIMEZONE', 'Asia/Baku'); // Baku, Azerbaijan, Asia
date_default_timezone_set(TIMEZONE);

$adminsor=$db->prepare("select * from admin where admin_login=:login");
$adminsor->execute(array(
'login' => $_SESSION['admin_login'] )); 

	$say=$adminsor->rowCount();

    if($say==0){

header("Location:../login.php?durum=nolog");
exit;
    }

$admincek=$adminsor->fetch(PDO::FETCH_ASSOC);

?>
