
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Корзина</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">

     <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <? include ('theme/head.php')?>
    </header>

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img src="images/shopping_cart.jpg" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">MacBook Air 13</div>
                                        </div>
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Color</div>
                                            <div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text">1</div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text">$2000</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text">$2000</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">$2000</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_clear">Add to Cart</button>
                            <button type="button" class="button cart_button_checkout">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->
    <!--футер глобальный-->
    <? include ('theme/footer.php')?>
</div>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
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
<!--<script src="js/shop_custom.js"></script>-->

<script src="js/aida_global.js"></script>
<script>

    var GlobalPage = new GlobalPage();
    GlobalPage.Menu=['Акции и скидки', 'Магазины', 'Помощь', 'О нас'];
    GlobalPage.Category=Global_categori();
    //alert(Global_categori());
    GlobalPage.run();
    //filter bild https://bootsnipp.com/snippets/j6xjx

    $(document).ready(function(){
        $("#search").on('input', function postinput(){
            var search = $(this).val(); // this.value
            $.ajax({
                url: '../dev/sherch.php',
                data: {"search": search},
                type: 'post'
            }).done(function(responseData) {
                $("#resSearch").html(responseData);
            }).fail(function(search) {
                $("#resSearch").html(search);
                console.log('Failed');
            });
        });
    });
</script>
</body>

</html>