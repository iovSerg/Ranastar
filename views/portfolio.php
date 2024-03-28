<section id="portfolio" class="portfolio">
    <div class="container section-title" data-aos="fade-up">
        <?php echo $data->GetText('GALLARY_TITLE');?>
    </div>

    <div class="container">

        <div class="isotope-layout"  data-layout="masonry"  data-sort="original-order">

            <ul class="portfolio-filters isotope-filters"  data-aos="fade-up" data-aos-delay="100">
                <?php
                // Ассоциативный массив, где ключ - класс фильтра, значение - название фильтра

                $filters = array(

                );
                $portfolioItems = array(

                );


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
                foreach ($portfolioItems as $item) {
                    $filterClass = strtolower($item['filterClass']); // Приводим к нижнему регистру класс фильтра
                    $isActiveClass = $filterClass === strtolower($activeFilter) ? 'active' : ''; // Проверяем, соответствует ли класс фильтра классу текущего элемента


                    echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$filterClass} {$isActiveClass}\">";
                    echo "<img src=\"{$item['src']}\" class=\"img-fluid\" alt=\"\">";
                    echo "<div class=\"portfolio-info\">";
                    echo "<h4>{$item['title']}</h4>";
                    echo "<a href=\"{$item['src']}\" data-gallery=\"portfolio-gallery-{$filterClass}\" class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
                    echo "</div>";
                    echo "</div>";

                }
                ?>

                <?php
                //Работающий
                /* foreach ($portfolioItems as $item) {
                     $filterClass = strtolower($item['filterClass']); // Приводим к нижнему регистру класса фильтра
                     $isActiveClass = $filterClass === strtolower($activeFilter) ? 'active' : ''; // Проверяем, соответствует ли класс фильтра классу текущего элемента


                     echo "<div class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$filterClass} {$isActiveClass}\">";
                     echo "<img src=\"{$item['src']}\" class=\"img-fluid\" alt=\"\">";
                     echo "<div class=\"portfolio-info\">";
                     echo "<h4>{$item['title']}</h4>";
                     echo "<a href=\"{$item['src']}\" data-gallery=\"portfolio-gallery-{$filterClass}\" class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
                     echo "</div>";
                     echo "</div>";
                 }*/


                ?>

            </div><!-- End isotope-container -->


        </div>
    </div>


    </div>

</section>