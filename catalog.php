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
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <? include ('theme/head.php')?>
    </header>

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" style="background-color: #ef7f1b"
             data-image-src=""></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Рекламный текст</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <!-- работа с боковым  элементоу управления для  категорий-->
                    </div>

                </div>

                <div class="col-lg-10">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span id="products_found"
                                                                  data-size="products_found">186</span> найденные товары
                            </div>
                            <div class="shop_sorting">
                                <span>Сортировка по:</span>


                                <ul>
                                    <li>
                                        <span class="sorting_text">По популярности убывание<i
                                                    class="fas fa-chevron-down"></i></span>
                                        <ul>
                                            <li class="shop_sorting_button href_sort" data-sort="popularity_up"><span
                                                        class="glyphicon glyphicon-sort-by-attributes"
                                                        aria-hidden="true"></span> По популярности убывание
                                            </li>
                                            <li class="shop_sorting_button href_sort" data-sort="popularity_down"><span
                                                        class="glyphicon glyphicon-sort-by-attributes"
                                                        aria-hidden="true"></span> По популярности возрастание
                                            </li>
                                            <li class="shop_sorting_button href_sort" data-sort="price _up"><span
                                                        class="glyphicon glyphicon-sort-by-attributes"
                                                        aria-hidden="true"></span> По Цене убывания
                                            </li>
                                            <li class="shop_sorting_button href_sort" data-sort="price_down"
                                            "><span class="glyphicon glyphicon-sort-by-attributes"
                                                    aria-hidden="true"></span> По Цене возрастания</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid row grid" id="result">
                            <div class="product_grid_border"></div>
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
<script src="js/aida_global.js"></script>
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
    Prod_div(<?=$_GET['id']?>);
    //  Filter(<?=$_GET['id']?>);

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