<?php include "widgets/auth.php"?>
<?php require "includes/cookie.php"?>
<?php
    if (isset($_POST['addProduct'])) {
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
        $cat = $_POST['category'];
        $hit = $_POST['hit'];
        if ($hit != '1') {
            $hit = '0';
        }
        $result = mysqli_query($con, "INSERT INTO `product_en`(`category_id`, `name`, `keywords`, `description`, `hit`) VALUES ('$cat', '$name_en', '$keywords_sql', '$desc_sql', '$hit')");
        $result = mysqli_query($con, "INSERT INTO `product_ru`(`category_id`, `name`, `keywords`, `description`, `hit`) VALUES ('$cat', '$name_ru', '$keywords_sql', '$desc_sql', '$hit')");
        $result = mysqli_query($con, "INSERT INTO `product_uz`(`category_id`, `name`, `keywords`, `description`, `hit`) VALUES ('$cat', '$name_uz_sql', '$keywords_sql', '$desc_sql', '$hit')");
        header("Location: /_admin?username=$admin[username]&password=$admin[password]&auth=$_GET[auth]");

    }
?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<?php $title = $addProd[$activeLang]?>
<head>
	<?php require "includes/head.php";?>
	<title><?= $title?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php"?>
    <section id="add_form" class="mb-5">
        <div class="container">
        <?php include 'widgets/backToAdmin.php'?>
            <h2 class="main-title"><?= $addProd[$activeLang]?></h2>
            <div class="underline red darken-2"></div>
            <div class="row">
                <div class="col l4 m6 s12 offset-l4 offset-m3">
                    <p class="grey-text center-align"><?= $noteAboutLangs[$activeLang]?></p>
                </div>
            </div>
            <form action="" method="post" class="mt-5">
                <div class="row">
                    <div class="input-field col l4 m6 s12">
                        <input id="en_name" name="en_name" type="text" class="validate" required>
                        <label for="en_name">En Name</label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                        <input id="ru_name" name="ru_name" type="text" class="validate" required>
                        <label for="ru_name">Ru Name</label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                        <input id="uz_name" name="uz_name" type="text" class="validate" required>
                        <label for="uz_name">Uz Name</label>
                    </div>
                    <div class="input-field col m12 s12">
                        <input id="keywords" name="keywords" type="text" class="validate" required>
                        <label for="keywords">Keywords</label>
                    <span class="helper-text"><?= $helperKeywords[$activeLang]?></span>
                    </div>
                    <div class="input-field col m12 s12">
                        <textarea id="description" name="description" type="text" required class="materialize-textarea" data-length="200"></textarea>
                        <label for="description">Description</label>
                    </div>
                    <div class="input-field col l4 m6 s12">
                    <select name="category">
                    <option value="unselected" selected disabled>Select a category</option>
                        <?php
                            foreach ($catArr as $cat) {
                                ?>
                                   <option value="<?= $cat['id']?>"><?= $cat['name']?></option> 
                                <?
                            }
                        ?>
                    </select>
                    </div>
                    <div class="col l4 m6 s12">
                        <p>
                            <br>
                            <label>
                                <input type="checkbox" class="green-text" name="hit" value="1">
                                <span>Hit</span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col l4 m6 s12 offset-l4 offset-m3">
                        <p class="grey-text center-align"><?= $getPhotos[$activeLang]?></p>
                    </div>
                </div>
                <div class="center-align">
                    <button name="addProduct" type="submit" class="btn amber"><?= $add[$activeLang]?></button>
                </div>
            </form>
        </div>
    </section>

    <?php require "includes/footer.php"?>
</body>

</html>