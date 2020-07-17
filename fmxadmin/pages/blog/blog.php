<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>
		ADMIN PANEL
	</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include '../header.php' ?>

<div id="page-wrapper">
    <div id="page-inner">
            <div class="col-md-12" style="position: relative;   padding-left:35%; ">
                <?php include "../notification.php"?>
            </div>
        <div class="col-md-12">
            <!--    Hover Rows  -->
            <div class="panel panel-default">
                <div class="panel-heading" style="line-height: 35px;">
                    Xəbərlər
                    <a href="blogadd.php"><button style="float: right; margin-bottom: 10px;" class="btn btn-success" >Yeni xəbər yazısı yarat</button></a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Şəkil</th>
                                    <th>Ad</th>
                                    <th>Tarix</th>
                                    <th>Düzənlə</th>
                                    <th>Sil</th>
                                </tr>
                            </thead>
                            <tbody>

                               
<?php $blogsor=$db->prepare("SELECT * from blog order by blog_id desc ");
	  $blogsor->execute();
$number=0; // id sayici
while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)){
$number++; //id sayici ++  ?>	


   <tr>
            <td>
                <?php echo $number ?>
            </td>
            

            <td>
                <div class="row">
                    <img align="center" height="250" width="150" src="../../../<?php echo $blogcek['blog_picurl'] ?>" class="img-responsive">
                 </div>   
            </td>  

            <td>                        
               <?php echo $blogcek['blog_name'] ?>
            </td> 

            <td>                        
               <?php echo$blogcek['blog_date']; ?>
            </td>
	        <td>

                <a href="blogchange.php?blog_id=<?php echo $blogcek['blog_id'];  ?>">
                <button class="btn btn-primary">Düzənlə</button>
                </a>
            </td>

            <td>
                <a href="../../setting/engine.php?blogsil=ok&blogresimsil=<?php echo $blogcek['blog_picurl'] ?>&blog_id=<?php echo $blogcek['blog_id'] ?>" onclick="return confirm('<?php echo $blogcek['blog_name'] ?> adlı post silinsin?')">
               <button class="btn btn-danger">Sil</button></a>
            </td>            
            
    </tr>
    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End  Hover Rows  -->
        </div>

    </div>

    <!-- /. ROW  -->



    <!--  end  Context Classes  -->
</div>
</div>
<!-- /. ROW  -->



<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<?php include '../footer.php' ?>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../assets/js/custom.js"></script>

<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3500);
 
});
</script>

</body>

</html>