<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="#description" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 style="color: gold"><?php echo $db->GetText('HEADER_TITLE'); ?></h1>

        </a>
        <nav  id="navmenu" class="navmenu">
            <ul >
                <li><a href="#hero" class="active"><?php echo $db->GetText('HEADER_TOP'); ?></a></li>
                <li><a href="#description" class="active"><?php echo $db->GetText('HEADER_HOME'); ?></a></li>
                <li><a href="#faq" class="active"><?php echo $db->GetText('HEADER_FAQ'); ?></a></li>
                <li><a href="#portfolio" class="active"><?php echo $db->GetText('HEADER_GALLARY'); ?></a></li>
                <li><a href="#puppies" class="active"><?php echo $db->GetText('HEADER_PUPPIES'); ?></a></li>
                <li><a href="#graduates" class="active"><?php echo $db->GetText('HEADER_GRADUATES'); ?></a></li>
                <li><a href="#exhibitions" class="active"><?php echo $db->GetText('HEADER_EXHIBITIONS'); ?></a></li>
                <li><a href="#contact" class="active"><?php echo $db->GetText('HEADER_CONTACT'); ?></a></li>
                <li class="dropdown has-dropdown" ><a href="#"><span><?php echo $db->GetText('HEADER_LANG'); ?></span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dd-box-shadow" style="left: -100%">
                        <?php
                        foreach ($db->GetListLang() as $key => $value) {
                            echo '<li><a href="#" onclick="setCookieAndAlert(\'' . $value . '\')">' . $key . '</a></li>';
                        }
                        ?>

                    </ul>
                </li>
            </ul>
            <script>
                function setCookieAndAlert(key) {
                    document.cookie = "language=" + key + "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
                    window.location.reload();
                }
            </script>

            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>