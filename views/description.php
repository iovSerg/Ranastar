<section id="description" class="testimonials">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                <h3><?php echo $db->GetText('MAIN_TITLE'); ?></h3>
                <p>
                    <?php echo $db->GetText('MAIN_ABOUT'); ?>
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
                        foreach ($db->GetAllDogs() as $dog) {

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
                                        <span><?php echo $db->GetText($dog->GetAbout()); ?></span>
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

</section>