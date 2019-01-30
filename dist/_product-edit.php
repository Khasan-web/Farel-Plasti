<?php include "widgets/auth.php"?>
<?php require "includes/language.php"?>
<?php require "includes/cookie.php"?>
<?php
    // get products
    $prod_en = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product_en` WHERE `id` = " . $_GET['id']));
    $prod_ru = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product_ru` WHERE `id` = " . $_GET['id']));
    $prod_uz = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product_uz` WHERE `id` = " . $_GET['id']));
    if ($activeLang == 'ru') {
        $product = $prod_ru;
    } else if ($activeLang == 'en') {
        $product = $prod_en;
    } else if ($activeLang == 'uz') {
        $product = $prod_uz;
    }
?>
<?php
    if (isset($_POST['editProduct'])) {
        $categories = mysqli_query($con, "SELECT * FROM `category_$activeLang`");
        $catArr = array();
        $count = 0;
        while ($catsData = mysqli_fetch_assoc($categories)) {
            $catArr[] = $catsData;
            $count++;
        }
        $name_en = $_POST['en_name'];
        $name_ru = $_POST['ru_name'];
        $name_uz = $_POST['uz_name'];
        $name_uz_split = str_split($name_uz);
        foreach ($name_uz_split as $char) {
            if ($char != "'") {
                $name_uz_sql .= $char;
            } else {
                $name_uz_sql .= "`";
            }
        }
        $keywords = $_POST['keywords'];
        $keywords_split = str_split($keywords);
        foreach ($keywords_split as $char) {
            if ($char != "'") {
                $keywords_sql .= $char;
            } else {
                $keywords_sql .= '`';
            }
        }
        $description = $_POST['description'];
        $desc_split = str_split($description);
        foreach ($desc_split as $char) {
            if ($char != "'") {
                $desc_sql .= $char;
            } else {
                $desc_sql .= "`";
            }
        }
        foreach ($catArr as $cat) {
            if ($product['category_id'] == $cat['id']) {
                $defaultCat = $cat;
            }
        }
        $cat = $_POST['category'];
        if ($_POST['category'] == null) {
            $cat = $defaultCat['id'];
        }
        $hit = $_POST['hit'];
        mysqli_query($con, "UPDATE `product_en` SET `category_id`='$cat',`name`='$name_en',`keywords`='$keywords_sql',`description`='$desc_sql',`hit`='$hit' WHERE `id`=" . $_GET['id']);
        mysqli_query($con, "UPDATE `product_ru` SET `category_id`='$cat',`name`='$name_ru',`keywords`='$keywords_sql',`description`='$desc_sql',`hit`='$hit' WHERE `id`=" . $_GET['id']);
        mysqli_query($con, "UPDATE `product_uz` SET `category_id`='$cat',`name`='$name_uz_sql',`keywords`='$keywords_sql',`description`='$desc_sql',`hit`='$hit' WHERE `id`=" . $_GET['id']);
        header('refresh:0');
    }
?>
<?php
    if (isset($_POST['removeProd'])) {
        mysqli_query($con, "DELETE FROM `product_en` WHERE `id` = " . $_GET['id']);
        mysqli_query($con, "DELETE FROM `product_ru` WHERE `id` = " . $_GET['id']);
        mysqli_query($con, "DELETE FROM `product_uz` WHERE `id` = " . $_GET['id']);
        header("Location: /_admin?username=$admin[username]&password=$admin[password]&auth=$_GET[auth]");
    }
?>
<?php
    $admin_data = mysqli_query($con, "SELECT * FROM `admin`");
    $admin = mysqli_fetch_assoc($admin_data);
    if ($_GET['username']  != $admin['username'] || $_GET['password']  != $admin['password'] || $_GET['auth']  != $admin['auth_key']) {
        header("Location: /_login.php");
    }
?>
<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<?php $title = $prod_edit[$activeLang];?>
<head>
	<?php require "includes/head.php";?>
	<title><?= $title?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>

    <section id="product_edit">
        <div class="container">
        <?php include 'widgets/backToAdmin.php'?>
            <h2 class="main-title"><?= $product['name']?></h2>
			<div class="underline red darken-2"></div>
                <div class="card horizontal mt-5">
                    <div class="row m-0 w-100">
                        <div class="col l4 m12">
                            <div class="card-image p-5" style="max-width: 100%">
                            <img src="img/products/<?php $preview = explode(", ", $product['imgs']);echo $preview[0];?>" alt="" class="w-100-not-important materialboxed">
                                <div class="row mt-5">
                                    <?php
                                        foreach ($preview as $img) {
                                            ?>
                                                <div class="col s4 option">
                                                    <img src="img/products/<?= $img?>" alt="" class="w-100">
                                                </div>
                                            <?
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col l8 m12">
                            <div class="card-stacked">
                                <div class="card-content">
                                <span class="grey-text mr-4"><?= $category[$activeLang]?>:</span> 
                                <p class="mb-5">
                                <?php
                                    foreach ($catArr as $cat) {
                                        if ($cat['id'] == $product['category_id']) {
                                            echo $cat['name'];
                                        }
                                    }
                                ?>
                                </p>
                                <span class="grey-text mr-4"><?= $keywords[$activeLang]?>:</span> 
                                <p class="mb-5"><?= $product['keywords']?></p>
                                <span class="grey-text mr-4"><?= $desc[$activeLang]?>:</span> 
                                <p class="mb-5"><?= $product['description']?></p>
                                <span class="grey-text mr-4"><?= $hit[$activeLang]?>:</span> 
                                <p class="mb-5">
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
                                </p>
                                </div>
                                <div class="card-action">
                                <a href="category.php?category=<?php foreach ($catArr as $cat) {if ($cat['id'] == $product['category_id']) {echo $cat['id'];}}?>" class="amber white-text btn-small"><?= $seeThisCat[$activeLang]?></a>
                                    <a href="#edit_form" class="btn btn-small blue">Edit the product</a>
                                    <form action="" method="post" style="display: inline">
                                        <button type="submit" name="removeProd" onclick="return confirm('Remove this product?');" class="btn btn-small red">Remove the product</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
        </div> <!-- /container -->
    </section>

    <section id="edit_form" class="my-5 pt-5">
        <div class="container">
            <h2 class="main-title"><?= $edit[$activeLang]?></h2>
            <div class="underline red darken-2"></div>
            <div class="row">
                <div class="col l4 m6 s12 offset-l4 offset-m3">
                    <p class="grey-text center-align"><?= $noteAboutLangs[$activeLang]?></p>
                </div>
            </div>
            <form action="" method="post" class="mt-5">
                <div class="row">
                    <div class="input-field col l4 m6 s12">
                        <input id="en_name" name="en_name" type="text" class="validate" required value="<?= $prod_en['name']?>">
                        <label for="en_name">En <?= $name[$activeLang]?></label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                        <input id="ru_name" name="ru_name" type="text" class="validate" required value="<?= $prod_ru['name']?>">
                        <label for="ru_name">Ru <?= $name[$activeLang]?></label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                        <input id="uz_name" name="uz_name" type="text" class="validate" required value="<?= $prod_uz['name']?>">
                        <label for="uz_name">Uz <?= $name[$activeLang]?></label>
                    </div>
                    <div class="input-field col m12 s12">
                        <input id="keywords" name="keywords" type="text" class="validate" required value="<?= $product['keywords']?>">
                        <label for="keywords"><?= $keywords[$activeLang]?></label>
                    <span class="helper-text"><?= $helperKeywords[$activeLang]?></span>
                    </div>
                    <div class="input-field col m12 s12">
                        <textarea id="description" name="description" type="text" required class="materialize-textarea" data-length="200"><?= $product['description']?></textarea>
                        <label for="description"><?= $desc[$activeLang]?></label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                    <select name="category">
                        <option value="<?= $product['category_id']?>" disabled selected class="left-align left"><?php foreach ($catArr as $cat) { if ($cat['id'] == $product['category_id']) {echo $cat['name'];}}?>
                        </option>
                        <?php
                            foreach ($catArr as $cat) {
                                if ($cat['id'] != $product['category_id']) {
                                ?>
                                   <option value="<?= $cat['id']?>"><?= $cat['name']?></option> 
                                <?
                                }
                            }
                        ?>
                    </select>
                    </div>
                    <div class="col l4 m6 s12">
                        <p>
                            <br>
                            <label>
                                <input type="checkbox" class="green-text" name="hit"  
                                <?php 
                                    if ($product['hit'] == '1') { 
                                        echo 'checked'; 
                                    }
                                ?>
                                value="1"
                                >
                                <span><?= $hit[$activeLang]?></span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="center-align">
                    <button name="editProduct" type="submit" class="btn amber"><?= $edit[$activeLang]?></button>
                </div>
            </form>
        </div>
    </section>

    <?php require "includes/footer.php"?>
</body>

</html>