<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

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
                    Ana səhifədəki xidmətlərimiz
                     <a href="servicesadd.php"><button style="float: right; margin-bottom: 10px;" class="btn btn-success" >Yeni xidmət yarat</button></a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Şəkil</th>
                                    <th>Durum</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $slidersor=$db->prepare("select * from services order by  slider_sira ASC ");
                                      $slidersor->execute();
                                      $number=0; // id sayici
                                    while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){ $number++; //id sayici ++   ?>	
                                <tr>
                                    <td><?php echo $number?></td>
                                    <td><img style="width: 200px;" src="../../../<?php echo $slidercek['slider_picurl']?>"></td>
                                    <td>
                            <?php
                              if  ($slidercek['slider_durum']=="1"){

                                echo "AKTİV";}

                              else{
                                echo "GİZLİ";
                              }
                             ?>
                             
                             </td>
                                    <td><a href="serviceschange.php?slider_id=<?php echo $slidercek['slider_id'];  ?>"><button class="btn btn-primary">Düzənlə</button></a></td>
                                    <td><a href="../../setting/engine.php?servicessil=ok&sliderresimsil=<?php echo $slidercek['slider_picurl'] ?>&slider_id=<?php echo $slidercek['slider_id'] ?>" onclick="return confirm('Element silinsin?')"><button class="btn btn-danger">Sil</button></td>
                                </tr>
                               <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End  Hover Rows  -->
        </div>

    <!-- /. ROW  -->
</div>
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
    $(".alert").fadeTo(500, 1000).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 3500);
 
});
</script>

</body>

</html>