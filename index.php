<?php



    error_reporting(E_ALL);
    ini_set("display_errors",1);

    session_start();


    require_once 'services/database.php';
    require_once 'services/services.php';



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ranastar Grand kennel</title>

    <link rel="shortcut icon" href="assets/img/All/icon_b.ico" type="image/x-icon">






    <meta content="" name="description">
    <meta content="" name="keywords">



    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

<?php require 'views/header.php'?>
<main id="main">

    <section id="hero" class="hero">
        <img style="" src="assets/img/background/1.jpg" alt="" data-aos="fade-in">
    </section>

<?php
        require 'views/description.php';
        require 'views/faq.php';
        require 'views/portfolio.php';
        require 'views/puppies.php';
        require  'views/graduates.php';
        require 'views/exhibitions.php';
        require 'views/contact.php';
?>


</main>

<?php require 'views/footer.php'?>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="assets/js/ajax.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    window.onload = function () {
        var phpVariable = "<?php echo $ex->GetID(); ?>";
        filterSelectionEX(phpVariable);

        $(document).ready(function() {
            // Плавное появление элементов после загрузки страницы
            $('.portfolio-item').each(function(index) {
                var $item = $(this);
                setTimeout(function() {
                    $item.addClass('loaded');
                }, 100 * index); // Задержка для каждого элемента
            });
        });
        $(document).ready(function() {
            // Находим высоту содержимого внутри контейнера и применяем ее к контейнеру
            function adjustContainerHeight() {
                var contentHeight = $('#responseContainer').height(); // Получаем высоту содержимого
                $('#responseContainer').css('min-height', contentHeight); // Применяем высоту к контейнеру
            }

            // Вызываем функцию для коррекции высоты при загрузке страницы
            adjustContainerHeight();

            // Вызываем функцию для коррекции высоты при изменении размера окна
            $(window).resize(function() {
                adjustContainerHeight();
            });
        });
        $(document).ready(function(){
            $('#myForm').submit(function(event){
                // Предотвращаем стандартное поведение отправки формы
                event.preventDefault();

                // Получаем данные формы
                var formData = $(this).serialize();

                // Отправляем AJAX запрос
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response){
                        $('#myForm').trigger("reset");


                    },
                    error: function(xhr, status, error){
                        // Обработка ошибок, если они возникли
                        console.error(error);

                    }
                });
            });
        });
    }
</script>
</body>

</html>