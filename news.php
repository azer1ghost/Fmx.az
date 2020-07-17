<?php include 'header.php' ?>



<div class="container">
    <div class="row">



        <div class="col-md-12">
            <div class="projectList">
                <h3 class="title">Sox Xəbərlər</h3>

<?php $blogsor=$db->prepare("SELECT * from blog order by blog_id desc ");
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
                         <ins><em><small><?php echo $blogcek['blog_date']?></small><br></em></ins>
                       <?php echo substr($blogcek['blog_text'],0,460)."<b>. . .</b>"; ?></p>
                        <a class="pull-right" href="single.php?post=<?php echo $blogcek['blog_id']?>&<?php echo seo($blogcek['blog_name'])?>">Ətraflı</a>
                    </div>
                </div>
   <?php } ?>

            </div>
        </div>

    </div>
</div>
</div>
</div>
<hr>


<?php include 'footer.php' ?>