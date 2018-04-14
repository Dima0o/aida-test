<? session_start();
/*  foreach ($_GET as $key=>$value){
      $_SESSION[$key]=$value;
  };*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
    <link href="../plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="../plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/shop_responsive.css">
    <style>
        /* работа с чекбоксами*/
        @keyframes check {0% {height: 0;width: 0;}
            25% {height: 0;width: 10px;}
            50% {height: 20px;width: 10px;}
        }
        .checkbox{background-color:#fff;display:inline-block;height:28px;margin:0 .25em;width:28px;border-radius:4px;border:1px solid #ccc;float:right}
        .checkbox span{display:block;height:28px;position:relative;width:28px;padding:0}
        .checkbox span:after{-moz-transform:scaleX(-1) rotate(135deg);-ms-transform:scaleX(-1) rotate(135deg);-webkit-transform:scaleX(-1) rotate(135deg);transform:scaleX(-1) rotate(135deg);-moz-transform-origin:left top;-ms-transform-origin:left top;-webkit-transform-origin:left top;transform-origin:left top;border-right:4px solid #fff;border-top:4px solid #fff;content:'';display:block;height:20px;left:3px;position:absolute;top:15px;width:10px}
        .checkbox span:hover:after{border-color:#999}
        .checkbox input{display:none}
        .checkbox input:checked + span:after{-webkit-animation:check .8s;-moz-animation:check .8s;-o-animation:check .8s;animation:check .8s;border-color:#555}
        .checkbox input:checked + .default:after{border-color:#444}
        .checkbox input:checked + .primary:after{border-color:#2196F3}
        .checkbox input:checked + .success:after{border-color:#8bc34a}
        .checkbox input:checked + .info:after{border-color:#3de0f5}
        .checkbox input:checked + .warning:after{border-color:#FFC107}
        .checkbox input:checked + .danger:after{border-color:#f44336}
    </style>
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="../images/phone.png" alt=""></div>
                            8(8634)68 30 26
                        </div>
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="../images/mail.png" alt=""></div>
                            <a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_menu">

                            </div>
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="../images/user.svg" alt=""></div>
                                <div><a href="#">Регистрация</a></div>
                                <div><a href="#">Войти</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="#">Aidaset</a></div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <input type="search" required="required" id="search" class="header_search_input"
                                               placeholder="Поиск...">

                                        <button id="search_button" type="submit" class="header_search_button trans_300"
                                                value="Submit"><img src="../images/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <!--<div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="../images/heart.png" alt=""></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="#">Избранные</a></div>
                                    <div class="wishlist_count">115</div>
                                </div>
                            </div>-->

                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="../images/cart.png" alt="">
                                        <div class="cart_count"><span></span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="?dev=cart">Корзина</a></div>
                                        <div class="cart_price"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="main_nav_content d-flex flex-row">


                            <div class="cat_menu_container">
                                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                    <div class="cat_burger"><span></span><span></span><span></span></div>
                                    <div class="cat_menu_text">Категории</div>
                                </div>

                                <ul class="cat_menu" id="cat_menu">

                                </ul>
                            </div>

                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown" id="nav_heder">
                                </ul>
                            </div>

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner">
                                            <span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Menu -->

        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="page_menu_content">

                            <div class="page_menu_search">
                                <form action="#">
                                    <input type="search" required="required" class="page_menu_search_input"
                                           placeholder="Search for products...">
                                </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item has-children">
                                    <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item">
                                    <a href="#">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                        <li class="page_menu_item has-children">
                                            <a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            <ul class="page_menu_selection">
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item"><a href="contact.html">contact<i
                                                class="fa fa-angle-down"></i></a></li>
                            </ul>

                            <div class="menu_contact">
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="../images/phone_white.png" alt=""></div>
                                    8(8634)68 30 26
                                </div>
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="../images/mail_white.png" alt=""></div>
                                    <a href="mailto:shop@aidaset.ru">shop@aidaset.ru</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" style="background-color: #ef7f1b"
             data-image-src="..."></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title"><? var_dump($_GET); ?></h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title" data-titel="categori">Категория</div>
                            <ul class="sidebar_categories" id="sidebar_categories">

                            </ul>
                        </div>

                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">Brands</div>
                            <ul class="brands_list" id="filter">

                            </ul>
                        </div>


                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span data-size="products_found">186</span> найденные товары
                            </div>
                            <div class="shop_sorting">
                                <span>Сотрировка по:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">По популярности<i
                                                    class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button"
                                                data-isotope-option='{ "sortBy": "original-order" }'>По рейтингу
                                            </li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>
                                                По алфаиту
                                            </li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>
                                                По цене
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid row" id="result">
                            <div class="product_grid_border"></div>
                            <!--samo-->

                            <a href="#" onclick="return changeHash(2)">Сортировка по Имени</a>
                        </div>
                        <!--Navigation -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Недавно просмотренные -->
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="../images/send.png" alt=""></div>
                            <div class="newsletter_title">Подписаться на рассылку</div>
                            <div class="newsletter_text"><p>... и получите купон% 20 для первой покупки.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="#" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required"
                                       placeholder="Введите ваш адрес электронной почты">
                                <button class="newsletter_button">Подписатся</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">Отписатся</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="#">OneTech</a></div>
                        </div>
                        <div class="footer_title">Got Question? Call Us 24/7</div>
                        <div class="footer_phone">8(8634)68 30 26</div>
                        <div class="footer_contact_text">
                            <p>17 Princess Road, London</p>
                            <p>Grester London NW18JR, UK</p>
                        </div>
                        <div class="footer_social">
                            <ul>

                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Find it Fast</div>
                        <ul class="footer_list">
                            <li><a href="#">Computers & Laptops</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Smartphones & Tablets</a></li>
                            <li><a href="#">TV & Audio</a></li>
                        </ul>
                        <div class="footer_subtitle">Gadgets</div>
                        <ul class="footer_list">
                            <li><a href="#">Car Electronics</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <ul class="footer_list footer_list_2">
                            <li><a href="#">Video Games & Consoles</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Computers & Laptops</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Customer Care</div>
                        <ul class="footer_list">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Order Tracking</a></li>
                            <li><a href="#">Wish List</a></li>
                            <li><a href="#">Customer Services</a></li>
                            <li><a href="#">Returns / Exchange</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Product Support</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This template is made with <i class="fa fa-heart"
                                                                                aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="../images/logos_1.png" alt=""></a></li>
                                <li><a href="#"><img src="../images/logos_2.png" alt=""></a></li>
                                <li><a href="#"><img src="../images/logos_3.png" alt=""></a></li>
                                <li><a href="#"><img src="../images/logos_4.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>

<script>
    $("#result").on("click", ".add", function () {
        var caunts = Number($('#cadr_number').html());
        caunts = caunts + 1;
        var conut = $('[data-role="container"]').css("height");
        conut = Number(conut.substr(0, conut.length - 2));
        if (conut + 80 > 270) {
            conut = 230;
        }
        else {
            conut = conut + 80;
        }
        ;
        $('#cadr_number').html(caunts);
        //var blok= $(this).closest(".panel");
        //console.log();
        $('[data-role="container"]').css({'height': '' + conut + 'px'});
        $('#card').append('<a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">\n' +
            '                      <div class="media">\n' +
            '                        <div class="media-left p-r-10">\n' +
            '                         <img class="card-img-top" src="../' + $(this).attr('src') + '">\n' +
            '                        </div>\n' +
            '                        <div class="media-body">\n' +
            '                          <h6 class="media-heading">' + $(this).attr('data-name') + '</h6>\n' +
            '                          <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">' + $(this).attr('data-price') + '</time>\n' +
            '                        </div>\n' +
            '                      </div>\n' +
            '                    </a>');
        //console.log(conut);
    });

    //каталог

    //работа с получение категорий

    function CategoreShow(e, uid) {
        Animation('#result');
        $.ajax({
            type: "POST",
            dataType: "json",
            data: "cat=" + uid,
            // url: 'lol.php',
            url: 'dev/caterori.php',
            success: function (data) {
                Bild_Blok(data, '#cat_muenu');
            }
        });
    };

    function PageCatalog1(uid) {
        PagePorfile(uid);
        // console.log($(this).attr('data-name'));
        var data = '<div class="page vertical-align text-xs-center layout-full" data-animsition-in="fade-in" data-animsition-out="fade-out">\n' +
            '  <div class="page-content vertical-align-middle">\n' +
            '    <i class="icon wb-tadpole icon-spin page-maintenance-icon" aria-hidden="true" style="font-size: 64px;"></i>\n' +
            '  </div>\n' +
            '</div>\n';
        //  $('#result').html(data);
        /* $.ajax({
           type: "POST",
           data: "primer=" + uid,
           url: 'app/profile.php',
           success: function(data) {
             $(".active").text('Продукты такие');
             $('#result').html(data);
             var arr = ["Яблоко", "Апельсин", "Груша"];


           }
         });*/
    };

    function PageCatalog(uid) {
        Animation("#result");
        $.getJSON("https://jsonplaceholder.typicode.com/users/" + uid, function (data) {
            {
                //console.log(data);
                Bild_Blok(data, "#result");
            }
        });
    };

    function Animation(id) {
        var data = ' <div class="example-loading example-well h-150 vertical-align text-xs-center">\n' +
            '                  <div class="loader vertical-align-middle loader-grill"></div>\n' +
            '                </div>';
        $(id).html(data);
    }

    function Bild_Blok(data, id) {
        // alert(typeof data);
        var items = [];

        $.each(data, function (key, val) {
            //   val random=random.m
            items.push('<!-- Product Item -->\n' +
                '\t\t\t\t\t\t\t<div class="product_item discount col-md-3">\n' +
                '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="../images/featured_1.png" alt=""></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_price">$' + val.price + '<span>$' + val.price + '</span></div>\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_name"><div><a href="#" tabindex="0">' + val.name + '</a></div></div>\n' +
                '\t\t\t\t\t\t\t\t</div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_fav"><i class="fas fa-heart"></i></div>\n' +
                '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' +
                '\t\t\t\t\t\t\t\t</ul>\n' +
                '\t\t\t\t\t\t\t</div>');
        });
        $(id).html(items);
        $('[data-size="products_found"]').text(data.length);
        $('[data-titel="categori"]').text(data.titel);
    }

    function getRandomData(bellFactor) {
        var bellFactor = 100;

        //http://stackoverflow.com/questions/1295584/most-efficient-way-to-create-a-zero-filled-javascript-array


        return Math.floor((Math.random() * 1000000) + 1);
    }

    //конец работы с категориями
    $('[data-toggle = categori]').click(function () {
        console.log(this);
        //     alert( "Handler for .click() called." );
        log()
    });

    //https://bootsnipp.com/snippets/yNWWa
    //отрисовка профиля страницы
    function errors(error, id) {
        $(id).html('<a class="btn btn-primary btn-round btn-xs" href="../index.html">Обновить ошибку</a>\n' + 'ошибка ' + error);
    }

    function menu_cat(data, id) {
        // var li='<li><a href="#">Computers & Laptops <i class="fas fa-chevron-right ml-auto"></i></a></li>';
        var items = [];
        $.each(data, function (key, val) {
            //   val random=random.m
            items.push('<li><a href="' + setLocation('#book/' + val.uid) + '">' + val.name + '</a></li>');
        });
        // alert(items);
        $(id).html(items);
    }

    //подгрузка главная при загрузке страницы
    $(document).ready(function () {


       // getIssues();
        filter_bild();
        runPage(location.hash);
        /*$.getJSON("dev/catalog_new.php", function (data) {

		//
        });*/
        document.title = "Главная";
        ///	$('[data-titel=categori]').text('Категории');
        //  var menuActive = false;
        //var header = $('.header');

    });

    function getIssues() {
        return $.ajax({
            url: 'http://aida.k99969kp.beget.tech/dev/catalog_new.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                //console.log();
                Bild_Blok(data['data'], "#result");
            },
            error: function () {
                alert('Выполненно с ошибками getIssues');
            }
        });
    }

    function filter_bild() {
        return $.ajax({
            url: 'http://aida.k99969kp.beget.tech/dev/theme.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                var items = [];
                $.each(data, function (key, val) {
                    //val random=random.m;
                    var url = val.name;
                    items.push('<li><a class="target" href="javascript:setLocation(' + val.id + ')" data-url="' + val.uid + '">' + val.name + '</a></li>');
                    //  items.push('<li><a class="target" href="#" onclick="return setAttr('sort','name') data-url="'+val.uid+'">'+val.name+'</a></li>');
                });
                // alert(items);
                $("#sidebar_categories").html(items);
            },
            error: function () {
                alert('Выполненно с ошибками filter_bild');
            }
        });
    }

    function filter_date(id) {

        return $.ajax({
            url: 'http://aida.k99969kp.beget.tech/dev/theme.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                return data;
            }
        });
    }

    function setLocation(id) {
        $.getJSON("http://aida.k99969kp.beget.tech/dev/theme.php", function (data) {
            $.each(data, function (key, val) {
                //alert(val.uid+ "  "+ id);
                if (val.id == id) {
                    // alert(val.id+ "  "+ id);
                    //location.href ='/#/'+val.uid;
                    //location.hash = '/#/'+val.uid;
                    $("#result").html();
                    getIssues_id(id);

                    try {
                        history.replaceState(null, null, '?categori=' + id);
                    }
                    catch (e) {
                        location.hash = '#categori_' + id;
                    }
                }
                //работа с категорией товаров для прорисовки
            });
        });
    }

    $("#search_button").click(function () {
        setLocation_all_page($("#search").val());
    });

    function setLocation_all_page(url) {
        //location.href ='/#/'+val.uid;
        //location.hash = '/#/'+val.uid;
        alert("href:" + location.href + "--hash:" + location.hash);
        location.hash = '#/' + url;
        $("#result").text(location.hash = '/' + url);
        // getIssues_id(val.uid);

    }

    function getIssues_id(id) {
        return $.ajax({
            url: 'http://aida.k99969kp.beget.tech/dev/index.php?catalog_id="' + id + '"',
            type: 'GET',
            //data:id,
            dataType: 'json',
            success: function (data) {
                Bild_Blok(data, "#result");
                $('[data-size="products_found"]').text(data.length);
                $('[data-titel="categori"]').text(data.titel);
            },
            error: function () {
                alert('Выполненно с ошибками или категория пустая getIssues_id');
            }
        });
    }

    function setAttr(prmName, val) {
        var res = '';
        var d = location.href.split("#")[0].split("?");
        var base = d[0];
        var query = d[1];
        if (query) {
            var params = query.split("&");
            for (var i = 0; i < params.length; i++) {
                var keyval = params[i].split("=");
                if (keyval[0] != prmName) {
                    res += params[i] + '&';
                }
            }
        }
        res += prmName + '=' + val;
        window.location.href = base + '?' + res;
        return false;
    }

    function changeHash(id) {

        try {
            history.replaceState(null, null, '?categori=' + id);
        }
        catch (e) {
            location.hash = '#categori_' + id;
        }

    }


    //отрисовка шаблона получене  json
    function runPage() {
        /*$.ajax({
            url: 'http://aida.k99969kp.beget.tech/dev/index_test.php',
            // url: 'https://jsonplaceholder.typicode.com/users/',
            data: url,
            dataType: 'html',
            type:"POST",
            success: function(data){
                console.log(data);
                $('#result').html(data);
            },
            error: function (data) {
                //console.log(data);
                var url = "http://aida.k99969kp.beget.tech/error/404.php";
                $(location).attr('href',url);
            } //
        });*/
        $.post("../dev/index_test.php", {
                hash: location.search,
                href: location.href,
            },
            function (data) {
                Bild_Shop(data);
            }, "html");
    }

    //отрисовка параметров
    function Bild_Shop(data) {
        $('#result').html(data);
    }

    //  menu=['Акции и скидки','Магазины','Помощь','О нас'];

    function CoffeeMachine(power) {
        this.titel = 'Главаная';
        this.user = false;
        this.cart_shop = function () {
            this.cart = {count: '', total: '', item: [{name: '', price: '', col: ''}]};
        };
        this.Recently_Viewed = [{name: '', avatar: '', price: [''], item_discount: '', item_new: 1}];
        this.menu = ['Акции и скидки', 'Магазины', 'Помощь', 'О нас'];
        this.waterAmount = [];

        // физическая константа - удельная теплоёмкость воды для getBoilTime
        var WATER_HEAT_CAPACITY = 40;

        // расчёт времени для кипячения
        function getBoilTime() {
            return this.waterAmount * WATER_HEAT_CAPACITY * 80 / power; // ошибка!
        }

        // что делать по окончании процесса
        function onReady(data) {
            //alert(waterAmount );

            var items = [];
            $.each(data, function (key, val) {
                //   val random=random.m
                items.push('<li><a href="#">' + val + '<i class="fas fa-chevron-down"></i></a></li>');
                //    alert(val);
            });
            //$(id).html(items);
            $('#nav_heder').html(items);

        }

        this.run = function () {
            setTimeout(onReady(this.waterAmount), getBoilTime());
        };

    }


    var coffeeMachine = new CoffeeMachine(100);
    coffeeMachine.waterAmount = ['Акции и скидки', 'Магазины', 'Помощь', 'О нас'];
    //onReady(coffeeMachine.waterAmount);
    coffeeMachine.run();


    //функция запроса параметров страницы
    function Page_load() {
        //https://jsonplaceholder.typicode.com/posts/1
        return $.ajax({
            url: 'http://aida.k99969kp.beget.tech/dev/shop.json',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                var items = [];
                $.each(data, function (key, val) {
                    //   val random=random.m
                //    items.push('<li><label><input type="checkbox" name="check" ' + status(val.status) + '> <span class="label-text">' + val.name + '</span></label></li>');
                    items.push('<li class="list-group-item">' + val.name + '<label class="checkbox"><input type="checkbox"  ' + status(val.status) +'/><span class="warning"></span></label></li>');
                    //alert(val +'Page_load');
                });
                //$(id).html(items);
                $('#filter').html(items);
            },
            error: function () {
                alert('Не строится');
            }
        });
    }

    function status(t) {
        if (t == true) {
            return 'checked'
        }
    }

    //контструктор блока фильтра
    function Filtr(data){
        var select ='<div class="sidebar_section">\n' +
            '\t\t\t\t\t\t\t<div class="sidebar_subtitle brands_subtitle">Brands</div>\n' +
            '<ul class="list-group list-group-flush">\n' +
            '                    <li class="list-group-item">\n' +
            '                        Bootstrap Checkbox Default\n' +
            '                                <label class="checkbox">\n' +
            '                                        <input type="checkbox" />\n' +
            '                                        <span class="default"></span>\n' +
            '                                    </label>\n' +
            '                    </li>\n' +
            '                    <li class="list-group-item">\n' +
            '                        Bootstrap Checkbox Primary\n' +
            '                                                                <label class="checkbox">\n' +
            '                                        <input type="checkbox" />\n' +
            '                                        <span class="primary"></span>\n' +
            '                                    </label>\n' +
            '                    </li>\n' +
            '                    <li class="list-group-item">\n' +
            '                        Bootstrap Checkbox Success\n' +
            '                                                                <label class="checkbox">\n' +
            '                                        <input type="checkbox" />\n' +
            '                                        <span class="success"></span>\n' +
            '                                    </label>\n' +
            '                    </li>\n' +
            '                    <li class="list-group-item">\n' +
            '                        Bootstrap Checkbox Info\n' +
            '                                                               <label class="checkbox">\n' +
            '                                        <input type="checkbox" />\n' +
            '                                        <span class="info"></span>\n' +
            '                                    </label>\n' +
            '                    </li>\n' +
            '                    <li class="list-group-item">\n' +
            '                        Bootstrap Checkbox Warning\n' +
            '<label class="checkbox"><input type="checkbox" /><span class="warning"></span></label></li>\n' +
            '                    <li class="list-group-item">\n' +
            '                        Bootstrap Checkbox Danger\n' +
            '                                                              <label class="checkbox">\n' +
            '                                        <input type="checkbox" />\n' +
            '                                        <span class="danger"></span>\n' +
            '                                    </label>\n' +
            '                    </li>\n' +
            '                </ul>'+
            '\t\t\t\t\t\t</div>';
        var chek='';

    }



    Page_load();
</script>

<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/greensock/TweenMax.min.js"></script>
<script src="../plugins/greensock/TimelineMax.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/greensock/animation.gsap.min.js"></script>
<script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../../plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>


</body>

</html>