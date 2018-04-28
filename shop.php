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
    <style>#breadcrumbs-four{
            overflow: hidden;
            width: 100%;
        }

        #breadcrumbs-four li{
            float: left;
            margin: 0 .5em 0 1em;
        }

        #breadcrumbs-four a{
            background: #ddd;
            padding: .7em 1em;
            float: left;
            text-decoration: none;
            color: #444;
            text-shadow: 0 1px 0 rgba(255,255,255,.5);
            position: relative;
        }

        #breadcrumbs-four a:hover{
            background: #efc9ab;
        }
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        #breadcrumbs-four a::before,
        #breadcrumbs-four a::after{
            content:'';
            position:absolute;
            top: 0;
            bottom: 0;
            width: 1em;
            background: #ddd;
            transform: skew(-10deg);
        }

        #breadcrumbs-four a::before{

            left: -.5em;
            border-radius: 5px 0 0 5px;
        }

        #breadcrumbs-four a:hover::before{
            background: #efc9ab;
        }

        #breadcrumbs-four a::after{
            right: -.5em;
            border-radius: 0 5px 5px 0;
        }

        #breadcrumbs-four a:hover::after{
            background: #efc9ab;
        }

        #breadcrumbs-four .current,
        #breadcrumbs-four .current:hover{
            font-weight: bold;
            background: none;
        }

        #breadcrumbs-four .current::after,
        #breadcrumbs-four .current::before{
            content: normal;
        }</style>

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
                <h2 id="titel_page"></h2>
            </div>
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
                    $('#titel_page').text('Наши магазины');
                    $.each(data, function (key, val) {
                        /*$('#blog_page').append('<div class="blog_post">\n' +
                            '<div class="blog_image" style="background-image:url('+val.url+')"></div>\n' +
                            '<div class="blog_text">'+val.title+'</br>'+val.time+'' +
                            ' <a href="shop_page.php?id='+val.id+'" type="button" class="btn btn-warning btn-xs">Подробнее</a>'+
                            '</div>\n' +
                            //'<div class="blog_button"><a href="shop_page.php?id='+val.id+'">Подробнее</a></div>\n' +
                            '</div>');*/
                        $('#blog_page').append(
                            '<div class="col-sm-6 col-md-6 col-lg-4 mt-4">\n' +
                                '<div class="card">\n' +
                                    '<div class="card-block">\n' +
                                  //  '<div class="blog_text">'+val.title+'</div>\n' +
                                        '<div class="blog_image" style="background-image:url('+val.url+')"></div>'+
                                    //'<div class="blog_text" style="font-weight:  100;">' +
                                        '<div class="blog_text">'+val.title+
                                            '<div class="single_post_text">'+val.time+'</div>                        ' +
                                            '<div class="single_post_text">'+val.body+'</div>                        ' +
                                        '</div>' +
                                    '</div>\n' + //shop_page.php?id='+val.id+'
                                    '<div class="card-footer">\n' +
                                        '<a href="#" class="btn btn-warning float-right btn-sm">Выбрать **</a>\n' +
                                    '</div>' +
                                '</div>\n' +
                            '</div>');
                    });
                },
                error: function () {
                    alert('Выполненно с ошибками или категория пустая Shop_bild');
                }
            });
        }


    </script>
</body>
</html>