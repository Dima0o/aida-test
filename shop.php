<!DOCTYPE html>
<html lang="ru" >
<head>
    <title>Магазины</title>
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
                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between" id="blog_page">
                    </div>
                </div>

            </div>
        </div>

        <!-- Newsletter -->
        <!--футер глобальный-->
        <? include ('theme/footer.php')?>
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
        function Shop_bild() {
            return $.ajax({
                url: 'dev/shop_list.json',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, val) {
                        /*$('#blog_page').append('<div class="blog_post">\n' +
                            '<div class="blog_image" style="background-image:url('+val.url+')"></div>\n' +
                            '<div class="blog_text">'+val.title+'</br>'+val.time+'' +
                            ' <a href="shop_page.php?id='+val.id+'" type="button" class="btn btn-warning btn-xs">Подробнее</a>'+
                            '</div>\n' +
                            //'<div class="blog_button"><a href="shop_page.php?id='+val.id+'">Подробнее</a></div>\n' +
                            '</div>');*/
                        $('#blog_page').append('<div class="col-sm-6 col-md-6 col-lg-4 mt-4">\n' +
                            '<div class="card">\n' +
                            '<div class="card-block">\n' +
                          //  '<div class="blog_text">'+val.title+'</div>\n' +
                            '<div class="blog_image" style="background-image:url('+val.url+')"></div>'+
                            //'<div class="blog_text" style="font-weight:  100;">' +
                            '<div class="blog_text">'+val.title+'</br>'+val.time+'' +
                            '</div></div>\n' +
                            '<div class="card-footer">\n' +
                            '                        <a href=shop_page.php?id='+val.id+'" class="btn btn-secondary float-right btn-sm">Откликнутся</a>\n' +
                            '                         </div>                                </div>\n' +
                            '                            </div>');
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