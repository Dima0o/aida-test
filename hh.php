<!DOCTYPE html>
<html lang="ru" >
<head>
    <title>Вакансии</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/blog_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
    <?
    //https://stackblitz.com/edit/react-j8rudf?file=style.css
    //https://qdmnxyolbqd.angular.stackblitz.io/
    ?>


</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <? include ('theme/head.php')?>
    </header>
    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll"
             data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Technological Blog</h2>
        </div>
    </div>

    <!-- Blog -->

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Вакансии</h1>
                    <p>Работа в сети супермаркетов «Айдасеть» — это достойная работа с полным социальным пакетом и соблюдением всех трудовых норм.
                        Хотите работать в молодом дружном коллективе? Тогда Вам к нам! С полным списком открытых вакансий Вы можете ознакомиться ниже.</p>


                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between row" id="blog_page">


                    </div>

                </div>

            </div>
        </div>

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                            <div class="newsletter_title_container">
                                <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                                <div class="newsletter_title">Sign up for Newsletter</div>
                                <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                            </div>
                            <div class="newsletter_content clearfix">
                                <form action="#" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required"
                                           placeholder="Enter your email address">
                                    <button class="newsletter_button">Subscribe</button>
                                </form>
                                <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
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
                            <div class="copyright_content">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                Все права защищены | Разработанно в компанни <i class="fa fa-heart"
                                                                                aria-hidden="true"></i> by <a href="#"
                                                                                                              target="_blank">Aida
                                    Tech lab</a>
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
    <script>
        /*  angular.module('myApp', []);
          var myApp=angular.module('myApp');
          myApp.controller('phoneController', function($scope) {
           $http.get("dev/shop_list.json")
         .then(function(response) {
          $scope.phones = response.data;
         });
           //$scope.phones = []

          });*/
        //https://geekbrains.ru/posts/learn_react


    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
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
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <!--  <script src="js/blog_custom.js"></script>-->
    <script src="js/aida_global.js"></script>
    <script>
        Shop_bild();
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

        //работа с маггазином
       /* ContentData(data){
            var items=[];
            $.each(data, function (key, val1) {
                items.push('<div class="blog_text">'+val1.requirement+'</br>'+val1.responsibility+'</div>');
            });
           // return  items;
        }*/
        function Shop_bild() {
            return $.ajax({
                url: 'https://api.hh.ru/vacancies?employer_id=1199053',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data['items'], function (key, val) {
                        //var items = [];
                        //alert(val.snippet.requirement);
                        //value=ContentData(val.snippet);
                       /* $('#blog_page').append('<div class="blog_post">\n' +
                            '<div class="blog_image" style="background-image:url()"></div>\n' +
                            '<div class="blog_text">'+val.name+'</div>\n' +
                            '<div class="blog_text">'+val.name+'</div>\n' +
                            '<div class="blog_text">' +
                                val.snippet.requirement+'</br>' +
                                val.snippet.responsibility+
                            '</div>'+
                            '</div>');*/

                        $('#blog_page').append( ' <div class="col-sm-6 col-md-6 col-lg-6 mt-6">\n' +
                       '                                <div class="card">\n' +
                       //'                                    <img class="card-img-top" src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif">\n' +
                       '                                    <div class="card-block">\n' +
                            '<div class="blog_text">'+val.name+'</div>\n' +
                                '<div class="blog_text" style="font-weight:  100;">' +
                                    '<b style="text-indent: 1.5em">Обязанности:</b> '+val.snippet.responsibility+'</br>' +
                                    '<b style="text-indent: 1.5em">Требования:</b> '+ val.snippet.requirement+'</br>' +
                                    '<b style="text-indent: 1.5em">Адрес:</b> '+val.address.city+' '+ val.address.street+' '+ val.address.building+'</br>' +
                                '</div>'+
                        '</div>\n' +
                         '<div class="card-footer">\n' +
                            '                        <small>Зарплата  от  '+val.salary.from+' до '+val.salary.to+' руб. </small>\n' +
                            '                        <a href="'+val.apply_alternate_url+'" class="btn btn-secondary float-right btn-sm">Откликнутся</a>\n' +
                            '                    </div>'+
                       '                                </div>\n' +
                       '                            </div>');

                      /*  $('#blog_page').append('<div class="row">' +
                            '<div class="col-lg-8">' +
                            '<div class="single_post_title">'+val.name+'</div>' +
                            '<div class="single_post_text">'+val.name+'</div>                        ' +
                            '<div class="single_post_text">'+val.name+'</div>                        ' +
                            '</div>' +
                            '<div class="col-lg-4">' +
                            '<div class="blog_image" style="background-image:url('+val.name+')"></div>' +
                            '</div>'+
                            '</div>');*/
                    });
                },
                error: function () {
                    alert('Выполненно с ошибками или категория пустая getIssues_id');
                }
            });
        }
    </script>
</body>
</html>