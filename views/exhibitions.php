<?php
require_once 'services/services.php';
require_once 'model/Exhibitions.php';
?>

<section id="exhibitions" class="portfolio">
    <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $db->GetText('EXHIBITIONS_TITLE');?></h2>
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

            /*echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$ex->GetID()} {$activeClass}\">";
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

            }*/

            ?>
        </div>
    </div>
    </div>

</section>
