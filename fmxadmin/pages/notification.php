
<?php if ($_GET['durum']=='ok') { ?>
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	  <i class="fa fa-check fa-2x" aria-hidden="true"><span style="font-size:17px;">Bilgiləriniz uğurla WebSaytıza göndərildi.</span></i>
</div>


<?php }  elseif($_GET['durum']=='no') {?>
 <div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Bilgiləriniz yenilənə bilmədi. Təkrar cəhd edin. Problem davam edərsə developer ilə əlaqə saxlayın! 
</div>


<?php }  elseif($_GET['durum']=='big') {?>
 <div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Yükləmək istədiyiniz şəklin həcmi 3MB-dan yüksək ola bilməz!


<?php }  elseif($_GET['durum']=='filetype') {?>
 <div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Yükləmək istədiyiniz şəklin növü jpg, png və ya jpeg olmalidir.
</div>

<?php }  elseif($_GET['durum']=='del') {?>
 <div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	 <i class="fa fa-check fa-2x" aria-hidden="true"><span style="font-size:17px;">Element uğurla silindi.</span></i>
</div>

<?php }  elseif($_GET['login']=='ok') {?>
 <div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<div style=" font-size:2em; vertical-align:middle; float:left;" >
                    <i class="fa fa-spinner fa-spin"></i> 
                </div>

                <div style="float:left; padding-top:12px; padding-left: 10px" >Daxil olusunuz, xahiş edirik gözləyin...</div>
                <div style="clear:both;"></div> <a href="#" class="alert-link"></a>
</div>
<meta http-equiv="Refresh" content="3;URL=http://localhost/fmx.az/fmxadmin/pages" />

<?php }  elseif($_GET['login']=='no') {?>
 <div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Giriş parametrləri səhvdir.Unutmayın ki, 3 səhv daxil etmədə İp adresiniz qeydə alıır. Əgər adminsizizsə DEVELOPER ilə əlaqə saxlayın.
</div>

<?php }  elseif($_GET['durum']=='nolog') {?>
 <div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Hesaba daxil olmamısınz...
</div>

<?php }  elseif($_GET['durum']=='error') {?>
 <div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Icazəsiz əməliyyat...
</div>

<?php }  elseif($_GET['durum']=='exit') {?>
 <div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	 <i class="fa fa-check fa-2x" aria-hidden="true"><span style="font-size:17px;">Uğurla çıxış edildi</span></i>
</div>


<?php } ?>
