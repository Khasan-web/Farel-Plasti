<?php include "includes/connection/db.php"?>
<?php
    if (isset($_POST['editCategory'])) {
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
            if ($char != '\'') {
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
        $sql = mysqli_query($con, "UPDATE `category_en` SET `name`='$name_en',`keywords`='$keywords_sql',`description`='$desc_sql' WHERE `id`=" . $_GET['id']);
        mysqli_query($con, "UPDATE `category_ru` SET `name`='$name_ru',`keywords`='$keywords_sql',`description`='$desc_sql' WHERE `id`=" . $_GET['id']);
        mysqli_query($con, "UPDATE `category_uz` SET `name`='$name_uz_sql',`keywords`='$keywords_sql',`description`='$desc_sql' WHERE `id`=" . $_GET['id']);
        header('refresh:0');
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
<html lang="<?= $_GET['lang']?>">

<head>
	<?php require "includes/head.php";?>
	<title>Category Edit | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>
    
    
	<?php
        // get products
        $products = mysqli_query($con, "SELECT COUNT(`id`) AS `product_count` FROM `product_en` WHERE `category_id` = " . $_GET['id']);
        $product_count = mysqli_fetch_assoc($products);
        $product_count = $product_count['product_count'];
	?>
    <?php
        // get category
        $category_en = mysqli_query($con, "SELECT * FROM `category_en` WHERE `id` = " . $_GET['id']);
        $category_ru = mysqli_query($con, "SELECT * FROM `category_ru` WHERE `id` = " . $_GET['id']);
        $category_uz = mysqli_query($con, "SELECT * FROM `category_uz` WHERE `id` = " . $_GET['id']);
        $catArr = array();
        while ($catsData = mysqli_fetch_assoc($category_en)) {
            $catArr[] = $catsData;
        }
        while ($catsData = mysqli_fetch_assoc($category_ru)) {
            $catArr[] = $catsData;
        }
        while ($catsData = mysqli_fetch_assoc($category_uz)) {
            $catArr[] = $catsData;
        }
        if ($activeLang == 'en') {
            $i = 0;
        } else if ($activeLang == 'ru') {
            $i = 1;
        } else if ($activeLang == 'uz') {
            $i = 2;
        }
    ?>
    
    <section id="category_edit">
        <div class="container">
        <?php include 'widgets/backToAdmin.php'?>
            <h2 class="main-title"><?= $catArr[$i]['name']?></h2>
			<div class="underline red darken-2"></div>
                <div class="card horizontal mt-5">
                    <div class="row m-0 w-100">
                        <div class="col l4 m12">
                            <div class="card-image p-5" style="max-width: 100%">
                                <img src="img/home/categories/<?= $catArr[$i]['illustration']?>" style="width: 100%">
                            </div>
                        </div>
                        <div class="col l8 m12">
                            <div class="card-stacked">
                                <div class="card-content">
                                <span class="grey-text mr-4">Keywords:</span> 
                                <p class="mb-5"><?= $catArr[$i]['keywords']?></p>
                                <span class="grey-text mr-4">Description:</span> 
                                <p class="mb-5"><?= $catArr[$i]['description']?></p>
                                <span class="grey-text mr-4">Quantity of products:</span> 
                                <p class="mb-5"><?= $product_count?></p>
                                </div>
                                <div class="card-action">
                                    <a href="#" class="btn btn-small amber">See products</a>
                                    <a href="#" class="btn btn-small red">Remove the category</a>
                                    <a href="#" class="btn btn-small blue">Edit the category</a>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
        </div> <!-- /container -->
    </section>

    <section id="edit_form" class="my-5 pt-5">
        <div class="container">
            <h2 class="main-title"><?= $edit?></h2>
            <div class="underline red darken-2"></div>
            <form action="" method="post" class="mt-5">
                <div class="row">
                    <div class="input-field col l4 m6 s12">
                    <input id="en_name" name="en_name" type="text" class="validate" required value="<?= $catArr[0]['name']?>">
                    <label for="en_name">En Name</label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                    <input id="ru_name" name="ru_name" type="text" class="validate" required value="<?= $catArr[1]['name']?>">
                    <label for="ru_name">Ru Name</label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                    <input id="uz_name" name="uz_name" type="text" class="validate" required value="<?= $catArr[2]['name']?>">
                    <label for="uz_name">Uz Name</label>
                    </div>
                    <div class="input-field col m12 s12">
                    <input id="keywords" name="keywords" type="text" class="validate" required value="<?= $catArr[$i]['keywords']?>">
                    <label for="keywords">Keywords</label>
                    <span class="helper-text"><?= $helperKeywords?></span>
                    </div>
                    <div class="input-field col m12 s12">
                    <textarea id="description" name="description" type="text" required class="materialize-textarea" data-length="200"><?= $catArr[$i]['description']?></textarea>
                    <label for="description">Description</label>
                    </div>
                </div>
                <div class="center-align">
                    <button name="editCategory" type="submit" class="btn amber"><?= $edit?></button>
                </div>
            </form>
        </div>
    </section>

    <?php require "includes/footer.php"?>
</body>

</html>