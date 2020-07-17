<?php include 'header.php' ?>



<div class="container">
    <div class="row">



        <div class="col-md-12">
            <div class="projectList">
                <h3 class="title">Sox Xəbərlər</h3>

<?php 
    $blogsor=$db->prepare("SELECT * from blog where blog_id=:post");

    $blogsor->execute(array('post' => $_GET['post'])); 

    $blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

    $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
 ?>	

                <div class="media">
                    <div class="col-md-4 media-body"> 
                        <img class="single" src="<?php echo $blogcek['blog_picurl']?>" >
                    </div>

                     <div class="col-md-8 media-body"> 
                        <h2 style="color: #ff4800; " class="media-heading"><?php echo $blogcek['blog_name']?></h2>
                        <small><?php echo $blogcek['blog_date']?></small><br>
                       <?php echo $blogcek['blog_text']; ?></p>
                    </div>
                   
                </div>


            </div>
        </div>

    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer.php' ?>