<?php

// default

if (!isset($_GET['lang'])) {
    if (!isset($_COOKIE['lang'])) {
        $_GET['lang'] = 'en';
    }
}

// active language

if (!$_GET['lang']) {
    $activeLang = $_COOKIE['lang'];
} else {
    $activeLang = $_GET['lang'];
}

// if lang value is not appropirate for the options

if ($_GET['lang'] != 'ru') {
    if ($_GET['lang'] != 'uz') {
        $_GET['lang'] = 'en';
    }
}


// english

if ($_GET['lang'] == 'en' || $_COOKIE['lang'] == 'en') {

    // common
    $qu = "som";
    
    // navbar
    $home = "Home";
    $about = "About Us";
    $cats = "Categories";
    $contact = "Contacts";
    $language = "Language";
    $searchPlaceholder = "Search products";

    // home
    $homeCardTitle1 = "Wide selection";
    $homeCardTitle2 = "Experience";
    $homeCardTitle3 = "Excellent quality";

    // about
    $aboutTitle = "About Farel Plastic";
    $aboutCompany = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. <br> The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters";

}

// russian

if ($_GET['lang'] == 'ru' || $_COOKIE['lang'] == 'ru') {

    // common
    $qu = "сум";
    
    // navbar
    $home = "Главная";
    $about = "О Нас";
    $cats = "Категории";
    $contact = "Контакты";
    $language = "Язык";
    $searchPlaceholder = "Поиск товаров...";

    // home
    $homeCardTitle1 = "Широкий выбор";
    $homeCardTitle2 = "Опыт работы";
    $homeCardTitle3 = "Отличное качество";

    // about
    $aboutTitle = "О Farel Plastic";
    $aboutCompany = "Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. <br>Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона";


}

// uzbek

if ($_GET['lang'] == 'uz' || $_COOKIE['lang'] == 'uz') {

    // common
    $qu = "so'm";
    
    // navbar
    $home = "Asosiy";
    $about = "Biz Haqimizda";
    $cats = "Kategoriyalar";
    $contact = "Kontaktlar";
    $language = "Til";
    $searchPlaceholder = "Mahsulotlarni qidirish";

    // home
    $homeCardTitle1 = "Keng tanlov";
    $homeCardTitle2 = "Ish tajribasi";
    $homeCardTitle3 = "Katta sifat";

    // about
    $aboutTitle = "Farel Plastic Haqidan";
    $aboutCompany = "Dizayn va kompozitsiyani baholash vaqtida o'qiladigan matn kontsentratsiyaga to'sqinlik qiladigan narsa aniqlangan. <br> Lore Ipsum ko'p yoki kamroq standart shablonni to'ldirishni ta'minlaganligi uchun ishlatiladi.";

    // contact

}


