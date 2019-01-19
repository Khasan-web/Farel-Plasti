<?php
    if ($_GET['auth'] != $_COOKIE['auth_key']) {
        header("Location: /_login.php");
    }
    if (isset($_GET['logout'])) {
        unset($_COOKIE['auth_key']);
        setcookie('auth_key', null, -1, '/');
        header("Location: /_login.php");
    }
?>
<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $_GET['lang']?>">

<head>
	<?php require "includes/head.php";?>
	<title>Admin | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>

    <?php
        $admin_data = mysqli_query($con, "SELECT * FROM `admin`");
        $admin = mysqli_fetch_assoc($admin_data);
    ?>
    
	<!-- get products -->
	<?php
		$products = mysqli_query($con, "SELECT * FROM `product_" . $activeLang . "`");
        $countProd = 0;
		$prodArr = array();
		while ($prodData = mysqli_fetch_assoc($products)) {
            $prodArr[] = $prodData;
            $countProd++;
		}
	?>
	<!-- get categories -->
    <?php
        $categories = mysqli_query($con, "SELECT * FROM `category_" . $activeLang . "`");
        $catArr = array();
        $count = 0;
		while ($catsData = mysqli_fetch_assoc($categories)) {
            $catArr[] = $catsData;
            $count++;
		}
    ?>
    
    <section id="functions">
        <div class="container">
            <h2 class="main-title">Admin Panel</h2>
			<div class="underline red darken-2"></div>
            <div class="row">
                <div class="col m4 s12 offset-m4">
                    <div class="card">
                        <div class="card-content align-center">
                            <p class="center-align">Hello <?= $_GET['username']?>! Here you can edit, delete and add new the products or categories</p>
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
                        <h4 class="not-found-title m-0 pb-5">Categories | <?= $count?></h4>
                        <div class="mb-4">
                            <a href="#" class="btn btn-small green waves-effect">Add new</a>
                        </div>
                    </div>
                    <table class="responsive-table striped highlight">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Keywords</th>
                            <th>Description</th>
                            <th>See products</th>
                            <th>Edit</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach ($catArr as $cat) {
                                    ?>
                                        <tr>
                                            <td><?= $cat['id']?></td>
                                            <td><a href="/category.php?category=<?= $cat['id']?>"><?= $cat['name']?></a></td>
                                            <td><?= mb_substr($cat['keywords'], 0, 50, 'utf-8')?>...</td>
                                            <td><?= mb_substr($cat['description'], 0, 80, 'utf-8')?>...</td>
                                            <td><a href="" class="btn btn-small btn-floating btn-flat red waves-effect"><i class="material-icons">menu</i></a></td>
                                            <td><a href="/_category-edit.php?username=<?= $admin['username']?>&password=<?= $admin['password']?>&auth=<?= $_COOKIE['auth_key']?>&id=<?= $cat['id']?>" class="btn btn-small btn-floating btn-flat amber waves-effect"><i class="material-icons">edit</i></a></td>
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

    <section id="products" class="mt-5 info">
        <div class="mx-4">
            <div class="card">
                <div class="card-content">
                    <div class="cart-title">
                        <h4 class="not-found-title m-0 pb-5">All products | <?= $countProd?></h4>
                        <div class="mb-4">
                            <a href="#" class="btn btn-small green waves-effect">Add new</a>
                        </div>
                    </div>
                    <table class="responsive-table striped highlight">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Keywords</th>
                            <th>Description</th>
                            <th>Hit</th>
                            <th>Price</th>
                            <th>Edit</th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                                foreach ($prodArr as $product) {
                                    ?>
                                        <tr>
                                            <td><?= $product['id']?></td>
                                            <td><a href="/product.php?id=<?= $product['id']?>"><?= $product['name']?></a></td>
                                            <td>
                                            <?php 
                                                foreach ($catArr as $cat) {
                                                    if ($cat['id'] == $product['category_id']) {
                                                        echo $cat['name'];
                                                    }
                                                }
                                            ?>
                                            </td>
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
                                            <td><?= $product['name']?></td>
                                            <td><button class="btn btn-small btn-floating btn-flat amber waves-effect"><i class="material-icons">edit</i></button></td>
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

<?php require "includes/footer.php"?>
</body>

</html>