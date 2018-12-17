<?php
$active = explode("/", $_SERVER["REQUEST_URI"]);
$active = $active[1];
//echo $active;
?>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12">
                <a href="" id="toggle" class="visible-sm visible-xs"><span></span></a>
                <a href="./" class="logo"><img src="img/logo-desktop.svg" alt="" class="logo-desktop"><img src="img/logo-mobile.svg" alt="" class="logo-mobile"></a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 text-center nav-con">
                <ul class="main-nav">
                    <li <?=($active == '') ? "class='active'" : ""?>><a href="./">HOME</a></li>
                    <li <?=($active == 'about') ? "class='active'" : ""?>><a href="about">ABOUT US</a></li>
                    <li <?=($active == 'products') ? "class='active'" : ""?>><a href="./products">PRODUCTS</a></li>
                    <!--<li><a href="./">PARTNYORLARIMIZ</a></li>-->
                    <li <?=($active == 'contacts') ? "class='active'" : ""?>><a href="./contacts">CONTACT</a></li>

                 <li --><?//=($active == 'contacts') ? "class='active'" : ""?><!--><a href="./service_desk">SERVICE DESK</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 text-right faq-con">
                <a href="javascript:void(0)" class="faq"><img src="img/question.svg" alt=""></a>
            </div>
        </div>
    </div>
</header>