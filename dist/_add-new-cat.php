<?php include "widgets/auth.php"?>
<?php require "includes/cookie.php"?>
<?php
    if (isset($_POST['addCategory'])) {
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
        mysqli_query($con, "INSERT INTO `category_en`(`name`, `keywords`, `description`) VALUES ('$name_en','$keywords_sql','$desc_sql')");
        mysqli_query($con, "INSERT INTO `category_ru`(`name`, `keywords`, `description`) VALUES ('$name_ru','$keywords_sql','$desc_sql')");
        mysqli_query($con, "INSERT INTO `category_uz`(`name`, `keywords`, `description`) VALUES ('$name_uz','$keywords_sql','$desc_sql')");
        header('refresh:0');

    }
?>
<!DOCTYPE html>
<html lang="<?= $activeLang?>">
<?php $title = $addCat[$activeLang]?>
<head>
	<?php require "includes/head.php";?>
	<title><?= $title?> | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php"?>
    <section id="add_form" class="mb-5">
        <div class="container">
        <?php include 'widgets/backToAdmin.php'?>
            <h2 class="main-title"><?= $addCat[$activeLang]?></h2>
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
                </div>
                <div class="center-align">
                    <div class="row">
                        <div class="col l4 m6 s12 offset-l4 offset-m3">
                            <p class="grey-text center-align"><?= $getIllustration[$activeLang]?></p>
                        </div>
                    </div>
                    <button name="addCategory" type="submit" class="btn amber"><?= $create[$activeLang]?></button>
                </div>
            </form>
        </div>
    </section>

    <?php require "includes/footer.php"?>
</body>

</html>