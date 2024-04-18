<?php
require_once 'services/services.php';
require_once 'model/Dog.php';
?>

<section id="portfolio" class="portfolio" >
    <div  class="container section-title" data-aos="fade-up">
        <h2><?php echo $db->GetText('GALLARY_TITLE');?></h2>
    </div>
    <div   id="" class="container">
        <div  class="isotope-layout"  data-layout="masonry"  data-sort="original-order">
            <ul class="portfolio-filters isotope-filters"  data-aos="fade-up" data-aos-delay="100">
                <?php
                $flag = false;
                $dog = array();
                foreach ($db->GetKennelDogs() as $item) {
                    $gender = $item->GetGender();
                    if(!empty($gender) && $gender != 'graduate')
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
