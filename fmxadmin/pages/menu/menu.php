<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include '../headerdb.php'; $list=getFullListFromDB($db); ?>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>
		<?php echo $print['site_title'] ?>
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
	<!-- PAGE LEVEL STYLES -->
	<link href="../assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />

	<link href="../assets/css/jquery-nestable.css" rel="stylesheet" />
</head>

<?php include '../header.php'?>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="col-md-12" style="position: relative;   padding-left:35%; ">
			<?php include "../notification.php"?>
		</div>
		<!-- /. ROW  -->
		<section class="content">
				<!-- Draggable Handles -->
				<div class="col-lg-4 col-md-6 ">
						<div class="card">
							<div class="header">
								<h2>
                                Menu Locations
                                <small style="color: green">AutoSave</small>
                                </h2>
							</div>
							<menu id="nestable-menu">
								<button type="button" data-action="expand-all">Aç</button>
								<button type="button" data-action="collapse-all">Bağla</button>
							</menu>
							<div class="body">
								<div class="clearfix m-b-20">

									<div class="cf nestable-lists">
										<div class="dd" id="nestable">
											<?php displayList($list); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- #END# Draggable Handles -->
                    </div>
            
        </section>
        <section class="content">
            <div class="col-md-6">
                <div class="header">
					<h2> Menu Düzənləmələri</h2>
                </div>
                <a href="menuadd.php">
                    <button type="button" class="btn btn-block btn-sm btn-success waves-effect">
                        Yeni menu əlavə et
                    </button>
                </a>
                <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Ad</th>
                        <th>Durum</th>
                        <th>Düzənlə</th>
                        <th>Sil</th>
                     </tr>
                </thead>
                <tbody>
<?php $menusor=$db->prepare("select * from menu order by menu_sira ASC ");
	  $menusor->execute();
$number=0;
while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){
$number++;
 ?>	
                    <tr>
                        <td><?php echo $number ?></td>
                        <td><?php echo $menucek['menu_name'] ?></td>

                        <td>
                            <?php  if ($menucek['menu_durum']==1) {?> 
                                <i style="color: green" class="fa fa-eye"> Aktiv</i>

                            <?php } elseif ($menucek['menu_durum']==0) {?> 
                                <i style="color: red" class="fa fa-eye-slash"> Passiv</i>

                            <?php } ?>
                        </td>

                        <td>
                            <a href="menuchange.php?id=<?php echo $menucek['id']; ?>">
                                <button type="button" class="btn btn-sm btn-primary">
                                    Düzənlə
                                </button>
                            </a>
                        </td>

                        <td>
                            <a  href="../../setting/engine.php?menusil=ok&id=<?php echo $menucek['id'] ?>" 
                                onclick="return confirm('<?php echo $menucek['menu_name'];?> silinsinmi?')">

                                <button type="button" class="btn btn-sm btn-danger">
                                    Sil
                                </button>
                            </a>
                        </td>

                    </tr>
<?php } ?>
                </tbody>
            </table>
            </div>
        </section>
<div class="clearfix"></div>
	</div>
</div>



<!-- /. WRAPPER  -->
<?php include '../footer.php'?>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../assets/js/custom.js"></script>
<!-- PAGE LEVEL SCRIPTS -->
<script src="../assets/js/bootstrap-fileupload.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery.nestable.js"></script>
 <script>
$(document).ready(function () {
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        $.ajax({
            method: "POST",
            url: "../../setting/saveList.php",
            data: {
                list: list.nestable('serialize')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert("Unable to save new list order: " + errorThrown);
        });
    };

    $('#nestable').nestable({
        group: 1,
        maxDepth: 7,
    }).on('change', updateOutput);
});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 1000).slideUp(1000, function() {
				$(this).remove();
			});
		}, 3500);
	});
    
        $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

</script>

</body>

</html>

<?php
function getFullListFromDB($db, $parent_id = 0) {
    $sql = "
        SELECT id, parent_id, menu_name
        FROM menu 
        WHERE parent_id = :parent_id
        ORDER BY menu_sira
    ";

    $statement = $db->prepare($sql);
    $statement->bindValue(':parent_id', $parent_id, PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as &$value) {
        $subresult = getFullListFromDB($db, $value["id"]);

        if (count($subresult) > 0) {
            $value['children'] = $subresult;
        }
    }
    unset($value);

    return $result;
}

function displayList($list) {
?>
    <ol class="dd-list">
    <?php foreach($list as $item): ?>
    <li class="dd-item" data-id="<?php echo $item["id"]; ?>"><div class="dd-handle"><?php echo $item["menu_name"]; ?>
    </div>
    <?php if (array_key_exists("children", $item)): ?>
    <?php displayList($item["children"]); ?>
    <?php endif; ?>
    </li>
    <?php endforeach; ?>
    </ol>
<?php
}
?>