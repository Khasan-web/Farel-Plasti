<?php

// default

if (!isset($_COOKIE["lang"])) {
    setcookie("lang", "en", time() + (86400 * 30), '/');
    header("refresh:0");
}

// active language

$activeLang = $_COOKIE["lang"];

// if lang value is not appropriate for the options

if ($_GET["lang"] != "ru") {
    if ($_GET["lang"] != "uz") {
        $_GET["lang"] = "en";
    }
}

// navbar
$home = [
    "en" => "Home",
    "ru" => "Главная",
    "uz" => "Asosiy",
];
$about = [
    "en" => "About Us",
    "ru" => "О Нас",
    "uz" => "Biz Haqimizda",
];
$cats = [
    "en" => "Categories",
    "ru" => "Категории",
    "uz" => "Kategoriyalar",
];
$language = [
    "en" => "Language",
    "ru" => "Язык",
    "uz" => "Til",
];
$searchPlaceholder = [
    "en" => "Search products...",
    "ru" => "Поиск товаров...",
    "uz" => "Mahsulotlarni qidirish",
];


// home
$aboutCardTitle1 = [
    "en" => "Wide selection",
    "ru" => "Широкий выбор",
    "uz" => "Keng tanlov",
];

$aboutCardTitle2 = [
    "en" => "Experience",
    "ru" => "Опыт работы",
    "uz" => "Ish tajribasi",
];

$aboutCardTitle3 = [
    "en" => "Excellent quality",
    "ru" => "Отличное качество",
    "uz" => "Katta sifat",
];

$welcome = [
    "en" => "Welcome on farelplastic.uz!",
    "ru" => "Добропожаловать на farelplastic.uz!",
    "uz" => "Farelplastic.uz xush kelibsiz!",
];

$welcomeInfo = [
    "en" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque",
    "ru" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque",
    "uz" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, accusantium laudantium. Cumque",
];

$getMore = [
    "en" => "Get more!",
    "ru" => "Узнать больше!",
    "uz" => "Batafsi",
];

$aboutCard1 = [
    "en" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
    "ru" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
    "uz" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
];

$aboutCard2 = [
    "en" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
    "ru" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
    "uz" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
];
$aboutCard3 = [
    "en" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
    "ru" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
    "uz" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
];
$edit = [
    "en" => "Edit",
    "ru" => "Изменить",
    "uz" => "O'zgartirish",
];
$add = [
    "en" => "Add",
    "ru" => "Добавить",
    "uz" => "Qo'shish",
];
$catsTitle = [
    "en" => "Categories",
    "ru" => "Категории",
    "uz" => "Kategoriyalar",
];
$popProdTitle = [
    "en" => "Popular Products",
    "ru" => "Популярные Продукты",
    "uz" => "Ommabop Mahsulotlar",
];
$partnersTitle = [
    "en" => "Our Partners",
    "ru" => "Наши Партнеры",
    "uz" => "Hamkorlarimiz",
];



// about
$aboutTitle = [
    "en" => "About Farel Plastic",
    "ru" => "О Farel Plastic",
    "uz" => "Farel Plastic Haqidan",
];
$aboutCompany = [
    "en" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. <br> The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters",
    "ru" => "Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. <br>Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона",
    "uz" => "Dizayn va kompozitsiyani baholash vaqtida o'qiladigan matn kontsentratsiyaga to'sqinlik qiladigan narsa aniqlangan. <br> Lore Ipsum ko'p yoki kamroq standart shablonni to'ldirishni ta'minlaganligi uchun ishlatiladi.",
];


// contacts
$contact = [
    "en" => "Contacts",
    "ru" => "Контакты",
    "uz" => "Kontaktlar",
];
$address = [
    "en" => "Address",
    "ru" => "Адрес",
    "uz" => "Manzil",
];
$phone = [
    "en" => "Phone number",
    "ru" => "Номер телефона",
    "uz" => "Telefon raqami",
];
$email = [
    "en" => "Email",
    "ru" => "Email",
    "uz" => "Email",
];


// categories
$seeProd = [
    "en" => "See Products",
    "ru" => "Посмотреть Товары",
    "uz" => "Mahsulotlarni ko'rish",
];
$seeThisCat = [
    "en" => "See this category",
    "ru" => "Посмотреть эту категорию",
    "uz" => "Kategoriyani ko'rish",
];


$similarProd = [
    "en" => "Similar Products",
    "ru" => "Похожие продукты",
    "uz" => "Shu Mahsulotlar",
];


// admin
$helperKeywords = [
    "en" => "Name and word 'plastic' in 3 languages",
    "ru" => "Имя и слово 'пластик' на 3 языках",
    "uz" => "Ism va so'z 'plastik' 3 tilda",
];
$noteAboutLangs = [
    "en" => "Fields requiring translations should have the same meaning in different languages.",
    "ru" => "Поля требующие переводы должны иметь одинаковый смысл на разных языка.",
    "uz" => "Tarjimani talab qiladigan joylar turli tillarda bir xil ma'noga ega bo'lishi kerak.",
];
$login = [
    "en" => "Authentication",
    "ru" => "Аутентификация",
    "uz" => "Autentifikatsiya",
];
$admin_title = [
    "en" => "Admin panel",
    "ru" => "Админ панель",
    "uz" => "Admin paneli",
];
$cat_edit = [
    "en" => "Edit the category",
    "ru" => "Изменить категорию",
    "uz" => "Kategoriyani o'zgartiris",
];
$prod_edit = [
    "en" => "Edit the product",
    "ru" => "Изменить продукт",
    "uz" => "Mahsulotni o'zgartirish",
];
$search_title = [
    "en" => "Search",
    "ru" => "Поиск",
    "uz" => "Qidirmoq",
];
$addProd = [
    "en" => "Create Product",
    "ru" => "Создать Продукт",
    "uz" => "Productni yaratish",
];
$addCat = [
    "en" => "Create Product",
    "ru" => "Создать Категорию",
    "uz" => "Kategoriyani yaratish",
];
$create = [
    "en" => "Create",
    "ru" => "Создать",
    "uz" => "Yaratish",
];
$getIllustration = [
    "en" => "After creating the category, contact the programmer for a new illustration.",
    "ru" => "После создания категории, обратитесь к программисту для получения новой иллюстрации.",
    "uz" => "Kategoriyani yaratganingizdan, yangi illyustratsiya olish uchun programmist bilan bog'laning.",
];
$getPhotos = [
    "en" => "After creating the product, contact the programmer and give the photo of new product. They will be optimized",
    "ru" => "После создания продукта свяжитесь с программистом и дайте фото нового товара. Они будут оптимизированы",
    "uz" => "Mahsulotni yaratganingizdan so'ng dasturchiga murojaat qiling va yangi mahsulotning rasmini bering. Ular optimallashtiriladi",
];
$allProd = [
    "en" => "All Products",
    "ru" => "Все Продукты",
    "uz" => "Hamma Mahsulotlari",
];
$addNew = [
    "en" => "Add New",
    "ru" => "Добавить",
    "uz" => "Yangisini qo'shish",
];
$name = [
    "en" => "Name",
    "ru" => "Имя",
    "uz" => "Ism",
];
$category = [
    "en" => "Category",
    "ru" => "Категория",
    "uz" => "Kategoriya",
];
$keywords = [
    "en" => "Keywords",
    "ru" => "Ключевые слова",
    "uz" => "Kalit so'zlar",
];
$desc = [
    "en" => "Description",
    "ru" => "Описание",
    "uz" => "Ta'rif",
];
$hit = [
    "en" => "Hit",
    "ru" => "Хит",
    "uz" => "Hit",
];
$qty = [
    "en" => "Quantity of products",
    "ru" => "Количество продуктов",
    "uz" => "Mahsulotlar soni",
];
$remove = [
    "en" => "Remove the category",
    "ru" => "Удалить категорию",
    "uz" => "Kategoriyani o'chirish",
];
$prod = [
    "en" => "Products",
    "ru" => "Продуктов",
    "uz" => "Mahsulotlar",
];
$backAdmin = [
    "en" => "Back to Admin Panel",
    "ru" => "Вернуться в админ панель",
    "uz" => "Admin Panelga qaytish",
];
$aboutAdmin = [
    "en" => "Hello admin! Here you can edit, delete and add new products or categories",
    "ru" => "Привет админ! Здесь вы можете редактировать, удалять и добавлять новые товары или категории",
    "uz" => "Salom administrator! Bu erda siz mahsulotlarni va kategoriyalarni tahrir qilishingiz mumkin, yana o'chirish munkun, yo'ki yangisini qoshish",
];