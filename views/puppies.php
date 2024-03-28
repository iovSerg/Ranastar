<section id="puppies" class="portfolio">
    <div class="container section-title" data-aos="fade-up">
        <?php echo $data->GetText('PUPPIES_TITLE');?>
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