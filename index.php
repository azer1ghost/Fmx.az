<?php include 'header.php' ?>
<!-- bannerSection -->
<div class="bannerSection">
    <div class="slider-inner">
        <div id="da-slider" class="da-slider">

<!-- .slide -->
<?php $slidersor=$db->prepare("select * from slider order by  slider_sira ASC limit 8");
	  $slidersor->execute();
while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){  ?>	

<?php if ($slidercek['slider_durum']==1) {?>


<?php $title=substr($slidercek['slider_title'], 3, 400) ;
      $text=substr($slidercek['slider_text'], 3, 400)     ?>


            <div class="da-slide">
                <h2><i><?php echo rtrim($title,"</p>"); ?></i></h2>
                <p><i><?php echo rtrim($text,"</p>"); ?></i></p>
                <div class="da-img"><img class="sliderimg" src="<?php echo $slidercek['slider_picurl']?>"  /></div>
            </div>

<?php }  elseif ($slidercek['slider_durum']==0) {?> 
<?php }?>
<!-- .slide --> <?php } ?>

            <nav class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
            </nav>
        </div>
        <!--/da-slider-->
    </div>
    <!--/slider-->
    <!--=== End Slider ===-->
</div>
<!-- highlightSection -->
<div class="highlightSection">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Qısaca Haqqımızda</h2>
                <em> Bizimlə əməkdaşlıq etməklə əlavə əmək və digər xərclərdən azad olun. </em><br><br>
                <?php echo $print['site_haqqimizda'] ?>
                </p>
            </div>
            <div class="col-md-4 align-right">
                <h4> "Fərdi Mühasibat Xidmətləri" MMC şirkəti haqda daha ətraflı məlumat üçün</h4>
                <a class="btn btn btn-brand" href="#contact">Əlaqə</a>
                </p>
            </div>
        </div>
    </div>
</div>




<hr>







<div class="services">
    <div class="container">
        <h1 class="center">XİDMƏTLƏR</h1>
        <div class="row">

<?php $slidersor=$db->prepare("select * from services order by  slider_sira ASC limit 8");
	  $slidersor->execute();
while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){  ?>	

<?php if ($slidercek['slider_durum']==1) {?>


<?php $title=substr($slidercek['slider_title'], 3, 400) ;
      $text=substr($slidercek['slider_text'], 3, 400)     ?>


            <div class="col-md-3">
                <div class="serviceshover">
                    <img src="<?php echo $slidercek['slider_picurl']?>" class="imgservices" title="project one">
                </div>
                <h3><a class="hover-effect" href="<?php echo $slidercek['slider_link']?>"><?php echo rtrim($title,"</p>"); ?></a></h3>
                <p><?php echo rtrim($text,"</p>"); ?></p>
            </div>
<?php }  elseif ($slidercek['slider_durum']==0) {?> 
<?php }?>
<!-- .slide --> <?php } ?>

        </div>
    </div>
</div>


<div id="generic_price_table">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--PRICE HEADING START-->
                    <div class="price-heading clearfix">
                        <h1>Qiymətlər və Paketlər</h1>
                    </div>
                    <!--//PRICE HEADING END-->
                </div>
            </div>
        </div>
        <div class="container">

            <!--BLOCK ROW START-->
            <div class="row">
 <?php $prices=$db->prepare("select * from prices order by price_sira ASC ");
       $prices->execute();
       $number=0; // id sayici
 while($printprices=$prices->fetch(PDO::FETCH_ASSOC)){ $number++; //id sayici ++   ?>
 
<?php if ($printprices['price_durum']==1) {?>

<?php $text1=substr($printprices['price_text1'], 3, 400) ;
      $text2=substr($printprices['price_text2'], 3, 400) ;
      $text3=substr($printprices['price_text3'], 3, 400) ; 
      $text4=substr($printprices['price_text4'], 3, 400) ; 
      $text5=substr($printprices['price_text5'], 3, 400) ; 
      $text6=substr($printprices['price_text6'], 3, 400) ;  
      ?>

                <div class="col-md-4">
                    <!--PRICE CONTENT START-->
                    <div class="generic_content <? if($number==2) { echo "active"; } ?> clearfix">
                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price  clearfix">
                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content  clearfix">
                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span><?php echo $printprices['price_name']?></span>
                                </div>
                                <!--//HEAD END-->
                            </div>
                            <!--//HEAD CONTENT END-->
                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign"><img src="assets/custom/img/azn.png"></span>
                                <span class="currency"><?php echo $printprices['price_cash']?></span>
                                <span class="cent" style="display:none">.99</span>
                                <span class="month">/Ay</span>
                                </span>
                            </div>
                            <!--//PRICE END-->
                        </div>
                        <!--//HEAD PRICE DETAIL END-->

                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                            <ul>
                                <li><?php echo $text1 ?></li>
                                <li><?php echo $text2 ?></li>
                                <li><?php echo $text3 ?></li>
                                <li><?php echo $text4 ?></li>
                                <li><?php echo $text5 ?></li>
                                <li><?php echo $text6 ?></li>
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->

                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                            <a class="" href="">Qeydiyyat</a>
                        </div>
                        <!--//BUTTON END-->

                    </div>
                    <!--//PRICE CONTENT END-->

                </div>
                
<?php }  elseif ($printprices['price_durum']==0) {?> 
<?php }}?>


                <div class="col-md-4"  style="display:none">

                    <!--PRICE CONTENT START-->
                    <div class="generic_content active clearfix">

                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">

                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">

                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Standard</span>
                                </div>
                                <!--//HEAD END-->

                            </div>
                            <!--//HEAD CONTENT END-->

                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">
                                <span class="price">
                                    <span class="sign"><img src="assets/custom/img/azn.png"></span>
                                <span class="currency">100</span>
                                <span class="cent" style="display:none">.99</span>
                                <span class="month">/Ay</span>
                                </span>
                            </div>
                            <!--//PRICE END-->

                        </div>
                        <!--//HEAD PRICE DETAIL END-->

                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                            <ul>
                                <li>Əlavə Dəyər (18 %) <br> Mənfəət vergi ödəyicisi (20 %)<br> fiziki şəxslər</li>
                                <li>Vergilər Nazirliyinə</li>
                                <li>Statistika Komitəsinə</li>
                                <li>Əhalinin Məşğulluğu Fonduna<br> hesabatlarının hazırlanması və təqdim edilməsi.</li>
                                <li><br></li>
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->

                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                            <a class="" href="">Qeydiyyat</a>
                        </div>
                        <!--//BUTTON END-->

                    </div>
                    <!--//PRICE CONTENT END-->

                </div>

                <div class="col-md-4" style="display:none">

                    <!--PRICE CONTENT START-->
                    <div class="generic_content clearfix">

                        <!--HEAD PRICE DETAIL START-->
                        <div class="generic_head_price clearfix">

                            <!--HEAD CONTENT START-->
                            <div class="generic_head_content clearfix">

                                <!--HEAD START-->
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Premium</span>
                                </div>
                                <!--//HEAD END-->

                            </div>
                            <!--//HEAD CONTENT END-->

                            <!--PRICE START-->
                            <div class="generic_price_tag clearfix">
                                <span class="price">
                                   <span class="sign"><img src="assets/custom/img/azn.png"></span>
                                <span class="currency">300</span>
                                <span class="cent" style="display:none">.99</span>
                                <span class="month">/Ay</span>
                                </span>
                            </div>
                            <!--//PRICE END-->

                        </div>
                        <!--//HEAD PRICE DETAIL END-->

                        <!--FEATURE LIST START-->
                        <div class="generic_feature_list">
                            <ul>
                                <li>"Standart" Paket xidmətləri daxil olmaqla</li>
                                <li>Kadrlar üzrə hesabat</li>
                                <li>Mühasibat haqq-hesabının bərpası</li>
                                <li>Müəssisənin əsas vasitələrinin<br> inventarizasiyasının keçirilməsi</li>
                                <li>Debitor və kreditor borcunun<br> analizi və inventarizasiyası</li>
                                <li>Vergi qoyma üzrə məsləhət</li>
                            </ul>
                        </div>
                        <!--//FEATURE LIST END-->

                        <!--BUTTON START-->
                        <div class="generic_price_btn clearfix">
                            <a class="" href="">Qeydiyyat</a>
                        </div>
                        <!--//BUTTON END-->

                    </div>
                    <!--//PRICE CONTENT END-->

                </div>

            </div>
            <!--//BLOCK ROW END-->

        </div>
    </section>
</div>


<div class="testimonails">
    <div class="container">
        <blockquote class="">
            <h5>Qeyd</h5>
            <p>Öz biznesinə yenicə başlayan şirkətlər, ştatda yüksək ixtisaslı mühasibi saxlamaq imkanlarına malik deyillər, təcrübəsiz mühasiblərin isə xidmətləri ciddi problemlərə gətirib çıxarır."Fərdi Mühasibat Xidmətləri" MMC şirkəti sizin məsələnənizin
                həlli üçün mühasibat, vergi, audit və kadrlar uçotu kimi sahələrdə kifayət qədər təcrübəyə və resurslara malikdir.</p>
            <small>"Fərdi Mühasibat Xidmətləri" MMC </small>
        </blockquote>
    </div>
</div>

<div id="contact" class="container">
    <div class="row">

        <div class="col-md-6">
            <div class="projectList">
                <h3 class="title">Sox Xəbərlər</h3>

<?php $blogsor=$db->prepare("SELECT * from blog Where blog_gundem=1 order by blog_id desc limit 3");
	  $blogsor->execute();
$number=0; // id sayici
while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)){
$number++; //id sayici ++  ?>	

                <div class="media">
                    <a class="pull-left" href="single.php?post=<?php echo $blogcek['blog_id']?>&<?php echo seo($blogcek['blog_name'])?>">
                        <div class="serviceshover2">
                            <img src="<?php echo $blogcek['blog_picurl']?>" class="projectImg imgservices2">
                        </div>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="single.php?post=<?php echo $blogcek['blog_id']?>&<?php echo seo($blogcek['blog_name'])?>"><?php echo $blogcek['blog_name']?></a></h4>
                         <ins><em><small><?php echo $blogcek['blog_date']?></small></em><br></ins>
                       <?php echo substr($blogcek['blog_text'],0,160)."<b>. . .</b>"; ?></p>
                        <a class="pull-right" href="single.php?post=<?php echo $blogcek['blog_id']?>&<?php echo seo($blogcek['blog_name'])?>">Ətraflı</a>
                    </div>
                </div>
   <?php } ?>

            </div>
        </div>

<div class="col-md-2"><br></div>

<div class="col-md-4">
    <div  class="projectList">

        <h3>Bizə yazın</h3>
        <div>
            <form class="form" role="form">
                <div class="form-group">
                    <input type="email" name="" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="name" name="" class="form-control" placeholder="Ad & Soyad">
                </div>
                <div class="form-group">
                    <select class="form-control">
                        <option value="" selected disabled hidden required >Əlaqə növü seç</option>
                        <option value="" >Sual</option>
                        <option value="" >Təklif</option>
                        <option value="" >İrad</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea style="height:90px;" type="text" name="" class="form-control" placeholder="Mesajınız"></textarea>
                </div>


                <button type="submit" name="" style="float:right;" class="btn btn-brand">Göndər</button>
            </form>
        </div>

    </div>
</div>
    </div>
</div>
</div>
</div>
<hr>

 <div class="container">
    <h3 class="title">Əməkdaşlarımız</h3>
    <div class="clientSection">
        <div class="row">
<?php $slidersor=$db->prepare("select * from employee order by  slider_sira ASC limit 12");
	  $slidersor->execute();
while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){  	
if ($slidercek['slider_durum']==1) {
$title=$slidercek['slider_title'];
$picurl=$slidercek['slider_picurl'];  ?>

            <div class="col-md-1">
                <a href="javascript:void(0)"><img alt="" style="max-width:70px; height: 50px" src="<? echo $picurl?>">
                <p><? echo $title?></p></a>
            </div>

<?php }  elseif ($slidercek['slider_durum']==0) {?> 
<?php }?>
<!-- .slide --> <?php } ?>
            
        </div>
    </div>
</div> 

<?php include 'footer.php' ?>