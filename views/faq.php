<section id="faq" class="faq">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="content px-xl-5">
                   <h2> <?php echo $db->GetText('FAQ_DESCRIPTION'); ?></h2>

                </div>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                <div class="faq-container">

                    <div class="faq-item">
                        <h3><span class="num"> 1.</span> <span> <?php echo $db->GetText('FAQ_1_TITLE')?></span></h3>
                        <div class="faq-content">
                            <p>

                                <?php echo $db->GetText('FAQ_1')?>
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">

                        <h3><span class="num"> 2. </span> <span><?php echo $db->GetText('FAQ_2_TITLE')?></span></h3>  </span></h3>

                        <div class="faq-content">
                            <p>
                                <?php echo $db->GetText('FAQ_2')?>
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num">3.</span> <span> <?php echo $db->GetText("FAQ_3_TITLE")?></span></h3>
                        <div class="faq-content">
                            <p>
                                <?php
                                echo  $db->GetText('FAQ_3');
                                ?>

                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num">4.</span> <span> <?php echo $db->GetText('FAQ_4_TITLE');?></span></h3>
                        <div class="faq-content">
                            <p>
                                <?php
                                echo  $db->GetText('FAQ_4');
                                ?>
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num">5.</span> <span> <?php echo $db->GetText('FAQ_5_TITLE')?></span></h3>
                        <div class="faq-content">
                            <p>
                                <?php
                                echo $db->GetText('FAQ_5');
                                ?>
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                </div>

            </div>
        </div>

    </div>

</section>