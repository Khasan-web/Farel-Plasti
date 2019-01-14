<!DOCTYPE html>
<html lang="en">

<head>
	<?php require "includes/head.php";?>
    <!-- getting search data -->
    <?php 
    $search = htmlspecialchars($_GET['search']);
    $split = str_split($search);
    foreach($split as $char) {
        if ($char != "'") {
            $searchStr .= $char; 
        } else {
            $searchStr .= '`';
        }
    }

    $products = mysqli_query($con, "SELECT * FROM `product_" . $_GET['lang'] . "` WHERE `name` LIKE '%{$searchStr}%'");
    $categories = mysqli_query($con, "SELECT * FROM `category_" . $_GET['lang'] . "`");
    $catsArr = array();
    while ($catsData = mysqli_fetch_assoc($categories)) {
        $catsArr[] = $catsData;
    }
    
    ?>
	<title>
		<?= $searchStr?> | Farel Plastic</title>
</head>


<body>
	<?php require "includes/navbar.php";?>

	<section id="searchPage">
		<h2 class="main-title">Поиск по запросу:
			<?= $searchStr?>
		</h2>
		<div class="underline red darken-2"></div>
		<div class="container">
            <?php
            
                if (mysqli_num_rows($products) && $searchStr != null) {
                    ?>

                        <div class="row mt-5 pt-5 center-align">
                            <?php
                                
                                while ($product = mysqli_fetch_assoc($products)) {

                                    ?>

                                        <div class="col s12 l3 m4 product">
                                            <div class="card z-depth-1 waves-effect">
                                                <div class="p-5 pb-0">
                                                    <img src="img/home/testImg/DS_000063.jpg" alt="" class="w-100">
                                                </div>
                                                <div class="card-content">
                                                    <span class="card-title name mb-0"><?= $product['name']?></span>
                                                    <p class="category">
                                                    <?php
                                                        foreach ($catsArr as $cat) {
                                                            if ($cat['id'] == $product['category_id']) {
                                                                echo $cat['name'];
                                                            }
                                                        }
                                                    ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    <?

                                }

                            ?>
                        </div>

                    <?
                } else {
                    ?>
                        <h2 class="not-found-title">Товары не найдены...</h2>
                    <?
                }

            ?>
		</div>
	</section>

	<?php require "includes/footer.php"?>

<script src="js/libs.min.js"></script>
<script src="js/common.js"></script>
</body>

</html>