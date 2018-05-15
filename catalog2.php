<?
//header('http://aida.k99969kp.beget.tech/blog.html');
//header('Location: http://aida.k99969kp.beget.tech/blog.html');
//header("Location: http://aida.k99969kp.beget.tech/blog.html");
//exit;
session_start();
/*  foreach ($_GET as $key=>$value){
      $_SESSION[$key]=$value;
  };*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Каталог</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>.count-input {
            position: relative;
            width: 100%;
            max-width: 165px;
            margin: 10px 0;
        }
        .count-input input {
            width: 100%;
            height: 36.92307692px;
            border: 1px solid #000;
            border-radius: 2px;
            background: none;
            text-align: center;
        }
        .count-input input:focus {
            outline: none;
        }
        .count-input .incr-btn {
            display: block;
            position: absolute;
            width: 30px;
            height: 30px;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            line-height: 30px;
            top: 50%;
            right: 0;
            margin-top: -15px;
            text-decoration:none;
        }
        .count-input .incr-btn:first-child {
            right: auto;
            left: 0;
            top: 46%;
        }
        .count-input.count-input-sm {
            max-width: 125px;
        }
        .count-input.count-input-sm input {
            height: 36px;
        }
        .count-input.count-input-lg {
            max-width: 200px;
        }
        .count-input.count-input-lg input {
            height: 70px;
            border-radius: 3px;
        }</style>
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <? include ('theme/head.php')?>
    </header>

    <!-- Home -->

  <!--  <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" style="background-color: #ef7f1b"
             data-image-src=""></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Рекламный текст</h2>
        </div>
    </div>-->

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <ul class="list-group shop_sidebar">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <!-- работа с боковым  элементоу управления для  категорий-->
                    </div>
                <!--
                    <input class="checkbox" type="checkbox" name="brand[]" value="checkbox1" id="checkbox1" />
                    <input class="checkbox" type="checkbox" name="brand[]" value="checkbox2" id="checkbox2" />
                    <button onclick="getCheckedCheckBoxes()"> Кто выбран? </button>
                -->
                </div>

                <div class="col-lg-10">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span id="products_found" data-size="products_found">186</span> найденно
                            </div>
                            <div class="shop_sorting">
                                <span>Сортировка по:</span>


                                <ul>
                                    <li>
                                        <span class="sorting_text">По популярности убывание<i
                                                    class="fas fa-chevron-down"></i></span>
                                        <ul>
                                            <li class="shop_sorting_button href_sort" data-sort="ORDER BY name DESC"><span
                                                        class="glyphicon glyphicon-sort-by-attributes"
                                                        aria-hidden="true"></span> По популярности убывание
                                            </li>
                                            <li class="shop_sorting_button href_sort" data-sort="ORDER BY name ASC"><span
                                                        class="glyphicon glyphicon-sort-by-attributes"
                                                        aria-hidden="true"></span> По популярности возрастание
                                            </li>
                                            <li class="shop_sorting_button href_sort" data-sort="ORDER BY id DESC"><span
                                                        class="glyphicon glyphicon-sort-by-attributes"
                                                        aria-hidden="true"></span> По Цене убывания
                                            </li>
                                            <li class="shop_sorting_button href_sort" data-sort="ORDER BY id ASC"><span class="glyphicon glyphicon-sort-by-attributes"aria-hidden="true"></span> По Цене возрастания</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid row grid" id="result">


                            <!--samo-->
                        </div>
                        <!--Navigation -->

                    </div>
                </div>
            </div>
        </div>
    </div>

  <!--футер глобальный-->
    <? include ('theme/footer.php')?>
</div>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script
        src="http://code.jquery.com/ui/1.11.0-beta.1/jquery-ui.js"
        integrity="sha256-q5raG0xmu2guatVMnFCPiZAbKKY5ZX0Wq0Uvar+qN78="
        crossorigin="anonymous"></script>

<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="//npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<!--<script src="js/shop_custom.js"></script>--->
<script src="js/aida_global.js"></script>
<script src="js/catalog.js"></script>

<script>

    var GlobalPage = new GlobalPage();
    //GlobalPage.Menu=['Акции и скидки', 'Магазины', 'Помощь', 'О нас'];
    GlobalPage.Category = Global_categori();
    //alert(Global_categori());
    GlobalPage.run();
    //filter bild https://bootsnipp.com/snippets/j6xjx

    $(document).ready(function () {
        $("#search").on('input', function postinput() {
            var search = $(this).val(); // this.value
            $.ajax({
                url: '../dev/sherch.php',
                data: {"search": search},
                type: 'post'
            }).done(function (responseData) {
                $("#resSearch").html(responseData);
            }).fail(function (search) {
                $("#resSearch").html(search);
                console.log('Failed');
            });
        });
    });
    Categori_ui(<?=$_GET['id']?>);
    Catalog_bild(<?=$_GET['id']?>);
   // Filter(<?=$_GET['id']?>);

</script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>
</html>