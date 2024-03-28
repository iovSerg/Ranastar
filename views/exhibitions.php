<section id="exhibitions" class="portfolio">

    <!--  Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <?php echo $db->GetText('EXHIBITIONS_TITLE');?>
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

                    $filters_ex[".filter-" . $item->GetID()] = $item->GetCity() ." ". $item->GetDate();

                    foreach ($item->GetPath() as $path) {
                        $portfolioItems_ex[] = array(
                            "src" => $path,
                            "title" => $item->GetName() ." ".$item->GetDate(),
                            "filterClass" => $item->GetID(),
                            "article" => $item->GetArticle()
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
                        echo "<h4>{$db->GetText($item['article'])}</h4>";
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

            </div>


        </div>
    </div>


    </div>

</section>