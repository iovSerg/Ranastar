<?php
require_once 'services/services.php';
require_once 'model/Dog.php';
?>

<section id="portfolio" class="portfolio" >
    <div  class="container section-title" data-aos="fade-up">
        <?php echo $db->GetText('GALLARY_TITLE');?>
    </div>
    <div   id="liContainer" class="container">
        <div  class="isotope-layout"  data-layout="masonry"  data-sort="original-order">
            <ul class="portfolio-filters isotope-filters"  data-aos="fade-up" data-aos-delay="100">
                <?php
                $flag = false;
                $dog = array();
                foreach ($db->GetAllDogs() as $item) {
                    $gender = $item->GetGender();
                    if(!empty($gender))
                    {
                        if($flag === false)
                        {
                            $dog = $item;
                            $flag = true;
                            $activeClass = "filter-active";
                        }
                        else $activeClass ="";

                        echo "<li onclick=\"filterSelection('{$item->GetID()}')\" class=\"selector {$activeClass}\">{$item->GetName()}</li>";
                    }
                }
                ?>


            </ul>
            <div  class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">


            </div>
        </div>
        <div id="responseContainer" style="margin-top: 20px"  class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php

            foreach ($dog->GetPaths() as $item) {
                echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$dog->GetName()} active\">";
                echo "<img src=\"{$item}\" class=\"img-fluid\" alt=\"\">";
                echo "<div class=\"portfolio-info\">";
                echo "<h4>{$dog->GetFullName()}</h4>";
                echo "<a href=\"{$item}\" data-gallery=\"portfolio-gallery-{$dog->GetName()}\" class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
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

    function filterSelection(c) {
        console.log(c);
        $.ajax({
            type: "POST",
            url: 'index.php',
            dataType: 'json',
            data: { dog : c},
            success: function(response) {
                $('#responseContainer').empty();

                // Проходим по каждому элементу в массиве response и создаем соответствующую HTML-структуру
                response.forEach(function(item) {
                    var portfolioItem = $('<div >', {
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
                    $('#responseContainer').append(portfolioItem);
                });
                // Если вы хотели использовать $('#responseContainer').html(response);, то раскомментируйте эту строку
            }
        });
    }
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
</script>