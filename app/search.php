<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">

<head>
	<?php require "includes/head.php";?>
    <?php 
    // get search data
    $search = htmlspecialchars($_GET['search']);
    $split = str_split($search);
    foreach($split as $char) {
        if ($char != "'") {
            $searchStr .= $char; 
        } else {
            $searchStr .= '`';
        }
    }

    if(preg_match("/^[a-zA-Z0-9]+$/", $searchStr)) {
        $products = mysqli_query($con, "SELECT * FROM `product_en` WHERE `name` LIKE '%{$searchStr}%'");
        if (!mysqli_num_rows($products)) {
            $products = mysqli_query($con, "SELECT * FROM `product_uz` WHERE `name` LIKE '%{$searchStr}%'");
            $categories = mysqli_query($con, "SELECT * FROM `category_uz`");
        } else {
            $categories = mysqli_query($con, "SELECT * FROM `category_en`");
        }
    } else {
        $products = mysqli_query($con, "SELECT * FROM `product_ru` WHERE `name` LIKE '%{$searchStr}%'");
        $categories = mysqli_query($con, "SELECT * FROM `category_ru`");
    }

    $prodArr = array();
    while ($prodData = mysqli_fetch_assoc($products)) {
        $prodArr[] = $prodData;
    }

    $catArr = array();
    while ($catsData = mysqli_fetch_assoc($categories)) {
        $catArr[] = $catsData;
    }

    $title = $search_title[$activeLang] . " - " . $searchStr;
    ?>
	<title><?= $title?> | Farel Plastic</title>
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
                                
                                foreach ($prodArr as $product) {

                                    ?>

                                    <div class="col s12 l3 m4 product">
                                        <a href="product.php?id=<?= $product['id']?>">
                                            <div class="card z-depth-1 waves-effect">
                                                <div class="p-5 cardImg pb-0 valign-wrapper">
                                                    <img src="img/products/<?php $preview = explode(", ", $product['imgs']);echo $preview[0];?>" alt="" class="w-100">
                                                </div>
                                                <div class="card-content">
                                                    <span class="card-title name mb-0">
                                                        <?= $product['name'];?>
                                                    </span>
                                                    <p class="category">
                                                    <?php
                                                        foreach ($catArr as $cat) {
                                                            if ($cat['id'] == $product['category_id']) {
                                                                echo $cat['name'];
                                                            }
                                                        }
                                                    ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
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
</body>

</html>`    