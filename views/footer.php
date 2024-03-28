<footer id="footer" class="footer">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span style="color: gold"><?php echo $db->GetText('HEADER_TITLE'); ?></span>
                </a>
                <div class="social-links d-flex mt-4">


                    <a href="https://www.tiktok.com/@ranastargrand?_t=8kfzov4n1Ub&_r=1" target="_blank" ><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100015100426786&paipv=0&eav=AfZmIBAH7SS0B0l6nCQJhQqak5DHu7gd07BPDaGGSjUbsKPcrdXhDIdAg5NS_eFxM6c" ><i class="bi bi-facebook"></i></a>
                    <a href="https://www.youtube.com/@kennelranastargrand.japane1104" target="_blank"><i class="bi bi-youtube"></i></a>
                    <a href="https://www.instagram.com/ranastargrand/?igsh=cWc1MmR3enN2dzV2&utm_source=qr" target="_blank"><i class="bi bi-instagram"></i></a>

                </div>
            </div>





            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <?php echo $db->GetText('FOOTER_TITLE');?>

            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <?php echo $db->GetText('FOOTER_CONTACT');?>
            </div>
        </div>
    </div>



</footer>