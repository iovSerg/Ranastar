<?php



    error_reporting(E_ALL);
    ini_set("display_errors",1);

    session_start();

    require "services/DataLang.php";
    require "services/DataDogs.php";
    require "services/DataExhibitions.php";
    

    $data = new DataLang();
    $dataDogs = new DataDogs($data->GetLangKey());
    $dataEx = new DataExhibitions($data->GetLangKey());

    $dogs = $dataDogs->GetDogs();
if(isset($_POST["name"])){

    $name = $_POST["name"];
    echo $name;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ranastar Grand kennel</title>

    <link href="assets/img/All/icon_b.png" rel="icon">


    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
   <!-- <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

    <!-- Fonts -->


    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

<?php require 'views/header.php'?>
<main id="main">

    <section id="hero" class="hero">
        <img style="" src="assets/img/background/1.jpg" alt="" data-aos="fade-in">
    </section>

<?php require 'views/description.php'?>
<?php require 'views/faq.php'?>
<?php require 'views/portfolio.php'?>

</main>

<?php require 'views/footer.php'?>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script>

    d/*ocument.addEventListener('DOMContentLoaded', function() {
        // Обработчик клика по кнопкам фильтра
        document.querySelectorAll('.filter-button').forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                // Показываем только изображения, соответствующие выбранному фильтру
                document.querySelectorAll('.gallery-image').forEach(image => {
                    if (filter === 'all' || image.getAttribute('data-filter') === filter) {
                        image.classList.remove('hidden');
                    } else {
                        image.classList.add('hidden');
                    }
                });
                // Помечаем выбранную кнопку как активную, а остальные - нет
                document.querySelectorAll('.filter-button').forEach(btn => {
                    btn.classList.remove('filter-active');
                });
                this.classList.add('filter-active');
            });
        });
    });*/
</script>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>