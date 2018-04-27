
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog Post</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Аида статья новости">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/blog_single_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/blog_single_responsive.css">

</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <? include ('theme/head.php')?>
    </header>
    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/blog_single_background.jpg" data-speed="0.8"></div>
    </div>

    <!-- Single Blog Post -->

    <div class="single_post">
        <div class="container">
            <div class="row"  id="blog_page">
                <div class="single_post_title"></div>
                <div class="single_post_text"></div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Posts -->

<!-- Newsletter -->

<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="#">Aidaset</a></div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">+38 068 005 3570</div>
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
                    <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Разработанно в компанни  <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Aida Tech lab</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
                            <li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
                            <li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
                            <li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<!--<script src="js/blog_single_custom.js"></script>-->
<script src="js/aida_global.js"></script>
<script>


    function setLocation() {
        $.getJSON("dev/shop_list.json", function (data) {
            $.each(data, function (key, val) {
 var titel='';
                if(val.id==<?=$_GET['id']?>){
                    /*alert(val.id+' //--'+<?=$_GET['id']?>);
                    $('.single_post_title').html(data.title);
                    $('.single_post_text').html(data.body);*/
                    $('#blog_page').append('<div class="row">' +
                        '<div class="col-lg-8">' +
                            '<div class="single_post_title">'+val.title+'</div>' +
                            '<div class="single_post_text">'+val.time+'</div>                        ' +
                            '<div class="single_post_text">'+val.body+'</div>                        ' +
                        '</div>' +
                        '<div class="col-lg-4">' +
                            '<div class="blog_image" style="background-image:url('+val.url+')"></div>' +
                        '</div>'+
                        '</div>');
                    titel=val.title;
                    document.title = 'Магазин '+titel;
                    //console.log(titel);
                };

            });


            //работа с категорией товаров для прорисовки

        });
    }
    setLocation();
    var GlobalPage = new GlobalPage();
    GlobalPage.Category = Global_categori();
    GlobalPage.run();
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
</script>
</body>




