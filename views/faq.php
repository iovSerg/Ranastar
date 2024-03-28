<section id="faq" class="faq">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="content px-xl-5">
                    <?php
                    echo $data->GetText('FAQ_DESCRIPTION');
                    ?>

                </div>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                <div class="faq-container">

                    <div class="faq-item">
                        <h3><span class="num"><?php echo $data->GetText('FAQ_1_TITLE')?></h3>
                        <div class="faq-content">
                            <p>

                                <?php echo $data->GetText('FAQ_1')?>
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num"> <?php echo $data->GetText('FAQ_2_TITLE')?> </span></h3>

                        <div class="faq-content">
                            <p>
                                <?php echo $data->GetText('FAQ_2')?>
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num"> <?php echo $data->GetText("FAQ_3_TITLE")?></h3>
                        <div class="faq-content">
                            <p>
                                <?php
                                echo  $data->GetText('FAQ_3');
                                ?>

                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num"> <?php echo $data->GetText('FAQ_4_TITLE');?></h3>
                        <div class="faq-content">
                            <p>
                                <?php
                                echo  $data->GetText('FAQ_4');
                                ?>
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3><span class="num"> <?php echo $data->GetText('FAQ_5_TITLE')?></h3>
                        <div class="faq-content">
                            <p>
                                <?php
                                echo $data->GetText('FAQ_5');
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