<?php
require_once 'services/services.php';
require_once 'model/Exhibitions.php';
?>

<section id="exhibitions" class="portfolio">
    <div class="container section-title" data-aos="fade-up">
        <?php echo $db->GetText('EXHIBITIONS_TITLE');?>
    </div>
    <div class="container">
        <div  class="isotope-layout"  data-layout="masonry"  data-sort="original-order">
            <ul class="portfolio-filters isotope-filters"  data-aos="fade-up" data-aos-delay="100">

                <?php
                $flag = false;
                $ex = array();
                foreach ($db->GetAllExhibitions() as $item) {

                    if($flag === false)
                    {
                        $ex = $item;
                        $flag = true;
                        $activeClass = "filter-active";
                    }
                    else $activeClass ="";
                    $city = $item->GetCity()." ".$item->GetDate();
                    echo "<li onclick=\"filterSelectionEX('{$item->GetID()}')\" class=\"selector {$activeClass}\">{$city}</li>";
                }
                ?>

            </ul>
            <div  class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">


            </div>
        </div>
        <div id="responseContainerEX" style="margin-top: 20px"  class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php

            echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$ex->GetID()} {$activeClass}\">";
            echo "<h4>{$db->GetText($ex->GetArticle())}</h4>";
            echo "</div>";

            foreach ($ex->GetPaths() as $item) {
                echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$ex->GetName()} active\">";
                echo "<img src=\"{$item}\" class=\"img-fluid\" alt=\"\">";
                echo "<div class=\"portfolio-info\">";
                echo "<h4>{$ex->GetName()}</h4>";
                echo "<a href=\"{$item}\" data-gallery=\"portfolio-gallery-{$ex->GetCity()}\" class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
                echo "</div>";
                echo "</div>";

            }

            ?>
        </div>
    </div>
    </div>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    function filterSelectionEX(c) {
        console.log(c);
        $.ajax({
            type: "POST",
            url: 'index.php',
            dataType: 'json',
            data: { exhibitions : c},
            success: function(response) {
                $('#responseContainerEX').empty();

// Создаем первый блок с данными из response
                var firstPortfolioItem = $('<div>', {
                    class: 'col-lg-4 col-md-6 portfolio-item isotope-item filter-' + response[0].title
                });

                var h4First = $('<h4>').text(response[0].article); // Используем значение article из response
                firstPortfolioItem.append(h4First);

// Добавляем первый блок на страницу
                $('#responseContainerEX').append(firstPortfolioItem);

// Добавляем остальные блоки на страницу
                response.forEach(function(item, index) {
                    if (index !== 0) { // Пропускаем первый элемент, так как его уже добавили выше
                        var portfolioItem = $('<div>', {
                            class: 'col-lg-4 col-md-6 portfolio-item isotope-item filter-' + item.filterClass + (item.isActive ? ' active' : '')
                        });

                        var img = $('<img>', {
                            src: item.src,
                            class: 'img-fluid',
                            alt: ''
                        });

                        var portfolioInfo = $('<div>', {
                            class: 'portfolio-info'
                        });

                        var h4 = $('<h4>').text(item.title);

                        var a = $('<a>', {
                            href: item.src,
                            'data-gallery': 'portfolio-gallery-' + item.filterClass,
                            class: 'glightbox preview-link'
                        }).append($('<i>', {
                            class: 'bi bi-zoom-in'
                        }));

                        portfolioInfo.append(h4, a);
                        portfolioItem.append(img, portfolioInfo);
                        $('#responseContainerEX').append(portfolioItem);
                    }
                });


            }
        });
    }

</script>