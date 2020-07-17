<?php include 'header.php';

    $pagesor=$db->prepare("SELECT * from pages where page_id=:page_id");

    $pagesor->execute(array('page_id' => $_GET['pageadress'])); 

    $printpage=$pagesor->fetch(PDO::FETCH_ASSOC);  
?>
<style>

</style>



<div class="highlightSection">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $printpage['page_title'] ?></h1>
                <?php echo $printpage['page_text'] ?><br><br> 
            </div>
            <div class="col-md-6">
                <img class="pages" src="<?php echo $printpage['page_picurl'] ?>" alt="<?php echo $printpage['page_picurl'] ?>">
            </div>

        </div>
    </div>
</div>




<hr>

<br><br>







<?php include 'footer.php' ?>