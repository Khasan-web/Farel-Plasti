<?php include "widgets/auth.php"?>
<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<?php $title = $admin_title[$activeLang]?>
<head>
	<?php require "includes/head.php"?>
	<title><?= $title?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php"?>
	<?php
        // get products 
		$products = mysqli_query($con, "SELECT * FROM `product_" . $activeLang . "`");
        $countProd = 0;
		$prodArr = array();
		while ($prodData = mysqli_fetch_assoc($products)) {
            $prodArr[] = $prodData;
            $countProd++;
		}
	?>
    
    <section id="functions">
        <div class="container">
            <h2 class="main-title"><?= $admin_title[$activeLang]?></h2>
			<div class="underline red darken-2"></div>
            <div class="row">
                <div class="col m4 s12 offset-m4">
                    <div class="card">
                        <div class="card-content align-center">
                            <p class="center-align"><?= $aboutAdmin[$activeLang]?></p>
                        </div>
                    </div>
                    <div class="center-align">
                        <form action="" method="get">
                            <button type="submit" name="logout" class="btn btn-flat white waves-effect">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="categories" class="info">
        <div class="mx-4">
            <div class="card">
                <div class="card-content">
                    <div class="cart-title">
                        <h4 class="not-found-title m-0 pb-5"><?= $cats[$activeLang]?> | <?= $count?></h4>
                        <div class="mb-4">
                            <a href="/_add-new-cat?username=<?= $admin['username']?>&password=<?= $admin['password']?>&auth=<?= $_GET['auth']?>" class="btn btn-small green waves-effect"><?= $addNew[$activeLang]?></a>
                        </div>
                    </div>
                    <table class="responsive-table striped highlight">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th><?= $name[$activeLang]?></th>
                            <th><?= $keywords[$activeLang]?></th>
                            <th><?= $desc[$activeLang]?></th>
                            <th><?= $seeProd[$activeLang]?></th>
                            <th><?= $edit[$activeLang]?></th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach ($catArr as $cat) {
                                    ?>
                                        <tr>
                                            <td><?= $cat['id']?></td>
                                            <td><a href="/category?category=<?= $cat['id']?>"><?= $cat['name']?></a></td>
                                            <td><?= mb_substr($cat['keywords'], 0, 50,'UTF-8')?>...</td>
                                            <td><?= mb_substr($cat['description'], 0, 80,'UTF-8')?>...</td>
                                            <td><a href="/_category-products?username=<?= $admin['username']?>&password=<?= $admin['password']?>&auth=<?= $_COOKIE['auth_key']?>&id=<?= $cat['id']?>" class="btn btn-small btn-floating btn-flat red waves-effect"><i class="material-icons">menu</i></a></td>
                                            <td><a href="/_category-edit?username=<?= $admin['username']?>&password=<?= $admin['password']?>&auth=<?= $_COOKIE['auth_key']?>&id=<?= $cat['id']?>" class="btn btn-small btn-floating btn-flat amber waves-effect"><i class="material-icons">edit</i></a></td>
                                        </tr>
                                    <?
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id="products_admin" class="mt-5 info">
        <div class="card mx-4">
            <div class="card-content">
                <div class="cart-title">
                    <h4 class="not-found-title m-0 pb-5"><?= $allProd[$activeLang]?> | <?= $countProd?></h4>
                    <div class="mb-4">
                    <a href="/_add-new-prod?username=<?= $admin['username']?>&password=<?= $admin['password']?>&auth=<?= $_GET['auth']?>" class="btn btn-small green waves-effect"><?= $addNew[$activeLang]?></a>
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
                                        <td>
                                        <?php 
                                            foreach ($catArr as $cat) {
                                                if ($cat['id'] == $product['category_id']) {
                                                    echo $cat['name'];
                                                }
                                            }
                                        ?>
                                        </td>
                                        <td><?= mb_substr($product['keywords'], 0, 20,'UTF-8')?>...</td>
                                        <td><?= mb_substr($product['description'], 0, 80,'UTF-8')?>...</td>
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
                                        <td><a href="/_product-edit?username=<?= $admin['username']?>&password=<?= $admin['password']?>&auth=<?= $_GET['auth']?>&id=<?= $product['id']?>" class="btn btn-small btn-floating btn-flat amber waves-effect"><i class="material-icons">edit</i></a></td>
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