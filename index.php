<?php



    error_reporting(E_ALL);
    ini_set("display_errors",1);

    session_start();

    require "services/DataLang.php";
    require "services/DataDogs.php";
    require "services/DataExhibitions.php";

    $dataEx = new DataExhibitions();
    $dataText = new DataLang();
    $dataDogs = new DataDogs($dataText->GetLangKey());

    $dogs = $dataDogs->GetDogs();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


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

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="#testimonials" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 style="color: gold"><?php echo $dataText->GetText('HEADER_TITLE'); ?></h1>

        </a>

        <!-- Nav Menu -->
        <nav  id="navmenu" class="navmenu">


                <ul >

                    <li><a href="#hero" class="active"><?php echo $dataText->GetText('HEADER_TOP'); ?></a></li>
                    <li><a href="#testimonials" class="active"><?php echo $dataText->GetText('HEADER_HOME'); ?></a></li>
                    <li><a href="#faq" class="active"><?php echo $dataText->GetText('HEADER_FAQ'); ?></a></li>
                    <li><a href="#portfolio" class="active"><?php echo $dataText->GetText('HEADER_GALLARY'); ?></a></li>
                    <li><a href="#puppies" class="active"><?php echo $dataText->GetText('HEADER_PUPPIES'); ?></a></li>
                    <li><a href="#graduates" class="active"><?php echo $dataText->GetText('HEADER_GRADUATES'); ?></a></li>
                    <li><a href="#exhibitions" class="active"><?php echo $dataText->GetText('HEADER_EXHIBITIONS'); ?></a></li>
                    <li><a href="#contact" class="active"><?php echo $dataText->GetText('HEADER_CONTACT'); ?></a></li>
                    <li class="dropdown has-dropdown" ><a href="#"><span><?php echo $dataText->GetText('HEADER_LANG'); ?></span> <i class="bi bi-chevron-down"></i></a>
                        <ul class="dd-box-shadow" style="left: -100%">
                            <?php
                            foreach ($dataText->list_lang as $key => $value) {
                                echo '<li><a href="#" onclick="setCookieAndAlert(\'' . $value . '\')">' . $key . '</a></li>';
                            }
                            ?>



                        </ul>
                    </li>
                </ul>
            <script>
                function setCookieAndAlert(key) {
                    document.cookie = "language=" + key + "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
                    location.reload();
                }
            </script>

            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav><!-- End Nav Menu -->
        <!--<script>
            $(document).ready(function(){
                $('.lang-link').click(function(e){
                    alert("Not work");
                    e.preventDefault();
                    var key = $(this).data('key');
                    $.ajax({
                        url: 'index.php', // Путь к вашему PHP-скрипту
                        type: 'GET',
                        data: {key: key},
                        success: function(response){
                            alert(response); // Вывод результата
                        }
                    });
                });
            });
        </script>-->
<!--        <a class="btn-getstarted" href="index.html#about">Get Started</a>-->

    </div>
</header><!-- End Header -->

<main id="main">
    <!-- Hero Section - Home Page -->
    <section id="hero" class="hero">
        <img style="" src="assets/img/background/1.jpg" alt="" data-aos="fade-in">
    </section><!-- End Hero Section -->

    <!-- Testimonials Section - Home Page -->
    <section id="testimonials" class="testimonials">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                    <h3><?php echo $dataText->GetText('MAIN_TITLE'); ?></h3>
                    <p>
                        <?php echo $dataText->GetText('MAIN_ABOUT'); ?>
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

                    <div class="swiper">
                        <script type="application/json" class="swiper-config">
                            {
                                "loop": true,
                                "speed": 600,
                                "autoplay": {
                                    "delay": 5000
                                },
                                "slidesPerView": "auto",
                                "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                }
                            }
                        </script>
                        <div class="swiper-wrapper">

                            
                            
                            <?php
                            foreach ($dataDogs->GetDogs() as $dog) {

                                $gender = $dog->GetGender();
                                 if(!empty($gender))
                                 {


                              ?> <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">

                                        <img src="<?php  echo $dog->GetAvatar();?>" class="testimonial-img flex-shrink-0" alt="" width="200" height="200">
                                        <div>
                                            <h3><?php echo $dog->GetFullName() . " ";?>
                                                <?php


                                                echo  " " . $gender; ?></h3>

                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span><?php echo $dog->GetAbout(); ?></span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->



           <?php
                           }  }
                        ?>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- End Testimonials Section -->
    <!-- Recent-posts Section - Home Page -->

    <!-- Faq Section - Home Page -->
    <section id="faq" class="faq">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="content px-xl-5">
                        <?php
                      echo $dataText->GetText('FAQ_DESCRIPTION');
                        ?>

                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">

                        <div class="faq-item">
                            <h3><span class="num"><?php echo $dataText->GetText('FAQ_1_TITLE')?></h3>
                            <div class="faq-content">
                               <p>

                                   <?php echo $dataText->GetText('FAQ_1')?>
                               </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num"> <?php echo $dataText->GetText('FAQ_2_TITLE')?> </span></h3>

                            <div class="faq-content">
                               <p>
                                   <?php echo $dataText->GetText('FAQ_2')?>
                               </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num"> <?php echo $dataText->GetText("FAQ_3_TITLE")?></h3>
                            <div class="faq-content">
                                <p>
                                    <?php
                                    echo  $dataText->GetText('FAQ_3');
                                    ?>

                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num"> <?php echo $dataText->GetText('FAQ_4_TITLE');?></h3>
                            <div class="faq-content">
                                <p>
                                    <?php
                                    echo  $dataText->GetText('FAQ_4');
                                    ?>
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3><span class="num"> <?php echo $dataText->GetText('FAQ_5_TITLE')?></h3>
                            <div class="faq-content">
                                <p>
                                    <?php
                                    echo $dataText->GetText('FAQ_5');
                                    ?>
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div>
            </div>

        </div>

    </section><!-- End Faq Section -->

    <!-- Portfolio Section - Home Page -->
    <section id="portfolio" class="portfolio">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <?php echo $dataText->GetText('GALLARY_TITLE');?>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout"  data-layout="masonry"  data-sort="original-order">

                <ul class="portfolio-filters isotope-filters"  data-aos="fade-up" data-aos-delay="100">
                    <?php
                    // Ассоциативный массив, где ключ - класс фильтра, значение - название фильтра

                    $filters = array();
                    $portfolioItems = array();


                    foreach ($dogs as $item) {

                        if(strlen($item->GetGender())>0)
                        {
                            $filters[".filter-" . strtolower($item->GetName())] = $item->GetName();

                            foreach ($item->GetPaths() as $path) {
                                $portfolioItems[] = array(
                                    "src" => $path,
                                    "title" => $item->GetFullName(), // Исправлено на вызов метода GetFullName()
                                    "filterClass" => $item->GetName()
                                );
                            }
                        }
                    }

                    $flag = false;
                    foreach ($filters as $filter => $label) {
                        if($flag === false)
                        {
                            $flag = true;
                            $activeFilter = $label;
                            $activeClass = "filter-active";
                        }
                        else $activeClass ="";


                        echo "<li data-filter=\"  $filter  \" class=\"$activeClass\">$label</li>";
                    }

                    ?>


                </ul>


            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
   <!-- --><?php
    // Здесь можете использовать цикл или другие средства для вывода данных элементов портфолио
    // Например:
                /*foreach ($portfolioItems as $item) {
                    $filterClass = strtolower($item['filterClass']); // Приводим к нижнему регистру класс фильтра
                    $isActiveClass = $filterClass === strtolower($activeFilter) ? 'active' : ''; // Проверяем, соответствует ли класс фильтра классу текущего элемента


                        echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$filterClass} {$isActiveClass}\">";
                        echo "<img src=\"{$item['src']}\" class=\"img-fluid\" alt=\"\">";
                        echo "<div class=\"portfolio-info\">";
                        echo "<h4>{$item['title']}</h4>";
                        echo "<a href=\"{$item['src']}\" data-gallery=\"portfolio-gallery-{$filterClass}\" class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
                        echo "</div>";
                        echo "</div>";

                }*/
                foreach ($portfolioItems as $item) {
                    $filterClass = strtolower($item['filterClass']); // Приводим к нижнему регистру класса фильтра
                    $isActiveClass = $filterClass === strtolower($activeFilter) ? 'active' : ''; // Проверяем, соответствует ли класс фильтра классу текущего элемента

                    // Определяем, нужно ли отображать текущий элемент
                    $displayStyle = $isActiveClass ? 'block' : 'none';

                    echo "<div style=\"display: $displayStyle;\" class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$filterClass} {$isActiveClass}\">";
                    echo "<img src=\"{$item['src']}\" class=\"img-fluid\" alt=\"\">";
                    echo "<div class=\"portfolio-info\">";
                    echo "<h4>{$item['title']}</h4>";
                    echo "<a href=\"{$item['src']}\" data-gallery=\"portfolio-gallery-{$filterClass}\" class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
                    echo "</div>";
                    echo "</div>";
                }


    ?>

</div><!-- End isotope-container -->


                  </div>
              </div>


        </div>

    </section><!-- End Portfolio Section -->
    <section id="exhibitions" class="portfolio">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <?php echo $dataText->GetText('EXHIBITIONS_TITLE');?>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout"  data-layout="masonry"  data-sort="original-order">

                <ul class="portfolio-filters isotope-filters"  data-aos="fade-up" data-aos-delay="100">
                    <?php
                    // Ассоциативный массив, где ключ - класс фильтра, значение - название фильтра
                    $ex = $dataEx->GetExhibitions();
                    $filters_ex = array();
                    $portfolioItems_ex = array();


                    foreach ($ex as $item) {

                        $filters_ex[".filter-" . $item->GetID()] = $item->GetCity();

                        foreach ($item->GetPath() as $path) {
                            $portfolioItems_ex[] = array(
                                "src" => $path,
                                "title" => $item->GetName(),
                                "filterClass" => $item->GetID(),
                                "about" => $item->GetAbout()
                            );
                        }
                    }

                    $flag = false;
                    foreach ($filters_ex as $filter => $label) {
                        if($flag === false)
                        {
                            $flag = true;
                            $activeFilter = $label;
                            $activeClass = "filter-active";
                        }
                        else $activeClass ="";


                        echo "<li data-filter=\"  $filter  \" class=\"$activeClass\">$label</li>";
                    }

                    ?>


                </ul>


                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <!-- --><?php
                    // Здесь можете использовать цикл или другие средства для вывода данных элементов портфолио
                    // Например:
                    $flag = false;
                    foreach ($portfolioItems_ex as $item) {

                        $filterClass = strtolower($item['filterClass']); // Приводим к нижнему регистру класс фильтра
                        $isActiveClass = $filterClass === strtolower($activeFilter) ? 'active' : ''; // Проверяем, соответствует ли класс фильтра классу текущего элемента*/


                        if(!$flag)
                        {
                            $flag = true;
                            echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$filterClass} {$isActiveClass}\">";
                            echo "<h4>{$item['about']}</h4>";
                            echo "</div>";
                        }
                        else
                        {
                            echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$filterClass} {$isActiveClass}\">";
                            echo "<img src=\"{$item['src']}\" class=\"img-fluid\" alt=\"\">";
                            echo "<div class=\"portfolio-info\">";
                            echo "<h4>{$item['title']}</h4>";
                            echo "<a href=\"{$item['src']}\" data-gallery=\"portfolio-gallery-{$filterClass}\" class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
                            echo "</div>";
                            echo "</div>";
                        }


                    }


                    ?>

                </div><!-- End isotope-container -->


            </div>
        </div>


        </div>

    </section><!-- End Portfolio Section -->

    <section id="puppies" class="portfolio">
        <div class="container section-title" data-aos="fade-up">
            <?php echo $dataText->GetText('PUPPIES_TITLE');?>
        </div>
        <div class="container">
            <div class="isotope-layout"  data-layout="masonry"  data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">


                    <?php

                    $puppies= array();
                    foreach ($dogs as $item) {

                      if($item->GetName() == 'PUPPIES')
                      {
                        $puppies = $item->GetPaths();

                      }



                    }
                    foreach ($puppies as $puppy) {

                        echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item \">";
                        echo "<img src=\"{$puppy}\" class=\"img-fluid\" alt=\"\">";
                        echo "<div class=\"portfolio-info\">";

                        echo "<a href=\"{$puppy}\"  class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
                        echo "</div>";
                        echo "</div>";

                    }

                    ?>


                </div>
            </div>
        </div>


    </section>

    <section id="graduates" class="portfolio">
        <div class="container section-title" data-aos="fade-up">
            <?php echo $dataText->GetText('GRADUATES_TITLE');?>
        </div>
    </section>
    <!-- Pricing Section - Home Page -->

    <!-- Contact Section - Home Page -->
    <section id="contact" class="contact">

        <!--  Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2><?php echo $dataText->GetText('CONTACT_TITLE'); ?></h2>

        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                               <?php echo $dataText->GetText('CONTACT_ADRESS')?>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                              <?php echo $dataText->GetText('CONTACT_TELEPHONE');?>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                               <?php echo $dataText->GetText('CONTACT_EMAIL');?>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-clock"></i>
                              <?php echo $dataText->GetText('CONTACT_TIME');?>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Технические работы</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- End Contact Section -->

</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span style="color: gold"><?php echo $dataText->GetText('HEADER_TITLE'); ?></span>
                </a>
                <div class="social-links d-flex mt-4">


                    <a href="https://www.tiktok.com/@ranastargrand?_t=8kfzov4n1Ub&_r=1" target="_blank" ><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100015100426786&paipv=0&eav=AfZmIBAH7SS0B0l6nCQJhQqak5DHu7gd07BPDaGGSjUbsKPcrdXhDIdAg5NS_eFxM6c" ><i class="bi bi-facebook"></i></a>
                    <a href="https://www.youtube.com/@kennelranastargrand.japane1104" target="_blank"><i class="bi bi-youtube"></i></a>
                    <a href="https://www.instagram.com/ranastargrand/?igsh=cWc1MmR3enN2dzV2&utm_source=qr" target="_blank"><i class="bi bi-instagram"></i></a>

                </div>
            </div>





            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
               <?php echo $dataText->GetText('FOOTER_TITLE');?>

            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
               <?php echo $dataText->GetText('FOOTER_CONTACT');?>
            </div>
        </div>
    </div>



</footer><!-- End Footer -->

<!-- Scroll Top Button -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



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