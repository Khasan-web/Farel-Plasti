<?php include "widgets/auth.php"?>
<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<head>
	<?php require "includes/head.php";?>
    <?php
        // get products 
        $products = mysqli_query($con, "SELECT * FROM `product_$activeLang` WHERE `category_id` = " . (int)$_GET['id']);
        $countProd = 0;
        $prodArr = array();
        while ($prodData = mysqli_fetch_assoc($products)) {
            $prodArr[] = $prodData;
            $countProd++;
        }
    ?>
    <?php
        // get category
        $category = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `category_" . $activeLang . "` WHERE `id` = " . (int)$_GET['id']));
    ?>
    <? $title = $category['name']?>
	<title><?= $title?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>

    <section id="category_products" class="info">
        <div class="container">
        <?php include 'widgets/backToAdmin.php'?>
            <h2 class="main-title"><?= $category['name']?></h2>
			<div class="underline red darken-2"></div>
            <div class="card mx-4">
            <div class="card-content">
                <div class="cart-title">
                    <h4 class="not-found-title m-0 pb-5"><?= $prod[$activeLang]?> : <?= $countProd?></h4>
                    <div class="mb-4">
                        <a href="#" class="btn btn-small green waves-effect"><?= $addNew[$activeLang]?></a>
                    </div>
                </div>
                <table class="responsive-table striped highlight">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th><?= $name[$activeLang]?></th>
                        <th><?= $category[$activeLang]?></th>
                        <th><?= $keywords[$activeLang]?></th>
                        <th><?= $desc[$activeLang]?></th>
                        <th><?= $hit[$activeLang]?></th>
                        <th><?= $edit[$activeLang]?></th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach ($prodArr as $product) {
                                ?>
                                    <tr>
                                        <td><?= $product['id']?></td>
                                        <td><a href="/product?id=<?= $product['id']?>"><?= $product['name']?></a></td>
                                        <td><?= $category['name']?></td>
                                        <td><?= mb_substr($product['keywords'], 0, 20, 'utf-8')?>...</td>
                                        <td><?= mb_substr($product['description'], 0, 50, 'utf-8')?>...</td>
                                        <td>
                                        <?php 
                                            if ($product['hit'] == '1') {
                                                ?>
                                                    <i class="material-icons green-text mr-5">check</i>
                                                <?
                                            } else {
                                                ?>
                                                    <i class="material-icons grey-text mr-5">close</i>
                                                <?   
                                            }
                                        ?>
                                        </td>
                                        <td><a href="/_product-edit?username=<?= $admin['username']?>&password=<?= $admin['password']?>&auth=<?= $_COOKIE['auth_key']?>&id=<?= $product['id']?>" class="btn btn-small btn-floating btn-flat amber waves-effect"><i class="material-icons">edit</i></a></td>
                                    </tr>
                                <?
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php require "includes/footer.php"?>
</body>

</html>