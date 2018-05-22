<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Trilogy Shop
    </title>
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" media="screen" href="css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="css/styles.min.css">
    <!-- Modernizr-->


    <!--      ADD GOOGLE ANALYTICS HERE            -->


</head>
<!-- Body-->
<body>
<!-- Shop Filters Modal-->
<div class="modal fade" id="modalShopFilters" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Shop Filters</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Widget Categories-->
                <section class="widget widget-categories">
                    <h3 class="widget-title">Shop Categories</h3>
                    <ul id="widget-categories">

                    </ul>
                </section>
                <!-- Widget Price Range-->
                <section class="widget">
                    <h3 class="widget-title">Price Range</h3>
                    <select class="form-control">
                        <option>0 - $100</option>
                        <option>$100 - $200</option>
                        <option>$200 - $500</option>
                        <option>$500 - $1000</option>
                        <option>$1000 - $5000</option>
                    </select>
                </section>
                <!-- Widget Brand Filter-->
                <section class="widget">
                    <h3 class="widget-title">Filter by Brand</h3>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="adidas">
                        <label class="custom-control-label" for="adidas">Adidas&nbsp;<span class="text-muted">(254)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="bilabong">
                        <label class="custom-control-label" for="bilabong">Bilabong&nbsp;<span class="text-muted">(39)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="klein">
                        <label class="custom-control-label" for="klein">Calvin Klein&nbsp;<span class="text-muted">(128)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="nike">
                        <label class="custom-control-label" for="nike">Nike&nbsp;<span class="text-muted">(310)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="bahama">
                        <label class="custom-control-label" for="bahama">Tommy Bahama&nbsp;<span class="text-muted">(42)</span></label>
                    </div>
                </section>
                <!-- Widget Size Filter-->
                <section class="widget">
                    <h3 class="widget-title">Filter by Size</h3>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="xl">
                        <label class="custom-control-label" for="xl">XL&nbsp;<span class="text-muted">(208)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="l">
                        <label class="custom-control-label" for="l">L&nbsp;<span class="text-muted">(311)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="m">
                        <label class="custom-control-label" for="m">M&nbsp;<span class="text-muted">(485)</span></label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="s">
                        <label class="custom-control-label" for="s">S&nbsp;<span class="text-muted">(213)</span></label>
                    </div>
                </section>
                <!-- Promo Banner-->
                <section class="promo-box" style="background-image: url(img/banners/01.jpg);">
                    <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
                    <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                        <h4 class="text-light text-thin text-shadow">Рекламная запись</h4>
                        <h3 class="text-bold text-light text-shadow">Горячий сыр</h3><a class="btn btn-sm btn-warning" href="#">Shop Now</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- Topbar-->
<div class="topbar">
    <div class="topbar-column"><a class="hidden-md-down" href="mailto:support@tshop.com"><i class="icon-mail"></i>&nbsp; support@tshop.com</a><a class="hidden-md-down" href="tel:00331697720"><i class="icon-bell"></i>&nbsp; 00 33 169 7720</a><a class="social-button sb-facebook shape-none sb-dark" href="#" target="_blank"><i class="socicon-facebook"></i></a><a class="social-button sb-twitter shape-none sb-dark" href="#" target="_blank"><i class="socicon-twitter"></i></a><a class="social-button sb-instagram shape-none sb-dark" href="#" target="_blank"><i class="socicon-instagram"></i></a><a class="social-button sb-pinterest shape-none sb-dark" href="#" target="_blank"><i class="socicon-pinterest"></i></a>
    </div>
    <div class="topbar-column"><a class="hidden-md-down" href="#"><i class="icon-download"></i>&nbsp; Get mobile app</a>
        <div class="lang-currency-switcher-wrap">
            <div class="lang-currency-switcher dropdown-toggle"><span class="language"><img alt="English" src="img/flags/GB.png"></span><span class="currency">$ USD</span></div>
            <div class="dropdown-menu">
                <div class="currency-select">
                    <select class="form-control form-control-rounded form-control-sm">
                        <option value="usd">$ USD</option>
                        <option value="usd">€ EUR</option>
                        <option value="usd">£ UKP</option>
                        <option value="usd">¥ JPY</option>
                    </select>
                </div><a class="dropdown-item" href="#"><img src="img/flags/FR.png" alt="Français">Français</a><a class="dropdown-item" href="#"><img src="img/flags/DE.png" alt="Deutsch">Deutsch</a><a class="dropdown-item" href="#"><img src="img/flags/IT.png" alt="Italiano">Italiano</a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar-->
<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="navbar navbar-sticky">
    <!-- Search-->
    <form class="site-search" method="get">
        <input type="text" name="site_search" placeholder="Type to search...">
        <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
    </form>
    <div class="site-branding">
        <div class="inner">
            <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
            <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
            <!-- Site Logo--><a class="site-logo" href="index.html"><img src="http://aidaset.ru/wp-content/themes/Aida%20Template%20Mark%201/images/vacancyAida.png" alt="tshop"></a>
        </div>
    </div>
    <!-- Main Navigation-->
    <nav class="site-menu">
        <ul id="header-main">
            <li class="has-megamenu"><a href="index.html"><span>Home</span></a></li>
            <li class="active"><a href="shop-grid-ls.html"><span>Shop</span></a></li>
            <li class="active"><a href="about.html"><span>About</span></a></li>
        </ul>
    </nav>
    <!-- Toolbar-->
    <div class="toolbar">
        <div class="inner">
            <div class="tools">
                <div class="search"><i class="icon-search"></i></div>
                <div class="account"><a href="account-orders.html"></a><i class="icon-head"></i>
                    <ul class="toolbar-dropdown">
                        <li class="sub-menu-user">
                            <div class="user-ava"><img src="img/account/user-ava-sm.jpg" alt="Daniel Adams">
                            </div>
                            <div class="user-info">
                                <h6 class="user-name">Daniel Adams</h6><span class="text-xs text-muted">290 Reward points</span>
                            </div>
                        </li>
                        <li><a href="account-profile.html">My Profile</a></li>
                        <li><a href="account-orders.html">Orders List</a></li>
                        <li><a href="account-wishlist.html">Wishlist</a></li>
                        <li class="sub-menu-separator"></li>
                        <li><a href="#"> <i class="icon-unlock"></i>Logout</a></li>
                    </ul>
                </div>
                <div id="cart" class="cart">
                    <a href="cart.html"></a><i class="icon-bag"></i><span id="count" class="count">3</span><span
                        id="subtotal"   class="subtotal">$289.68</span>
                    <div class="toolbar-dropdown" id="card-list">
                        <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/01.jpg" alt="Product"></a>
                            <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Unionbay Park</a><span class="dropdown-product-details">1 x $43.90</span></div>
                        </div>
                        <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/02.jpg" alt="Product"></a>
                            <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Daily Fabric Cap</a><span class="dropdown-product-details">2 x $24.89</span></div>
                        </div>
                        <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/03.jpg" alt="Product"></a>
                            <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Haan Crossbody</a><span class="dropdown-product-details">1 x $200.00</span></div>
                        </div>
                        <div class="toolbar-dropdown-group">
                            <div class="column"><span class="text-lg">Total:</span></div>
                            <div class="column text-right"><span class="text-lg text-medium">$289.68&nbsp;</span></div>
                        </div>
                        <div class="toolbar-dropdown-group">
                            <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.html">View Cart</a></div>
                            <div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.html">Checkout</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
            <div class="column">
                <h1>Shop Grid Left Sidebar</h1>
            </div>
            <div class="column">
                <ul class="breadcrumbs">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="separator">&nbsp;</li>
                    <li>Shop Grid Left Sidebar</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
        <div class="row">
            <!-- Products-->
            <div class="col-xl-9 col-lg-8 order-lg-2">
                <!-- Shop Toolbar-->
                <div class="shop-toolbar padding-bottom-1x mb-2">
                    <div class="column">
                        <div class="shop-sorting">
                            <label for="sorting">Sort by:</label>
                            <select class="form-control" id="sorting">
                                <option>Popularity</option>
                                <option>Low - High Price</option>
                                <option>High - Low Price</option>
                                <option>Avarage Rating</option>
                                <option>A - Z Order</option>
                                <option>Z - A Order</option>
                            </select><span class="text-muted">Найденно:&nbsp;</span><span class="shop-col">1 - 12 items</span>
                        </div>
                    </div>
                    <div class="column">
                        <div class="shop-view"><a class="grid-view active" href="shop-grid-ls.html"><span></span><span></span><span></span></a><a class="list-view" href="shop-list-ls.html"><span></span><span></span><span></span></a></div>
                    </div>
                </div>
                <!-- Products Grid-->
                <div class="isotope-grid cols-3 mb-2 row" id="catalog">
                    <!-- Product-->


                </div>
                <!-- Pagination-->
                <nav class="pagination">
                    <div class="column">
                        <ul class="pages">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li>...</li>
                            <li><a href="#">12</a></li>
                        </ul>
                    </div>
                    <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
                </nav>
            </div>
            <!-- Sidebar          -->
            <div class="col-xl-3 col-lg-4 order-lg-1">
                <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
                <aside class="sidebar sidebar-offcanvas">
                    <!-- Widget Categories-->
                    <section class="widget widget-categories">
                        <h3 class="widget-title">Shop Categories</h3>
                        <ul id="widget-categories-2">

                        </ul>
                    </section>
                    <!-- Widget Price Range-->
                    <section class="widget widget-categories">
                        <h3 class="widget-title">Price Range</h3>
                        <form class="price-range-slider" method="post" data-start-min="250" data-start-max="650" data-min="0" data-max="1000" data-step="1">
                            <div class="ui-range-slider"></div>
                            <footer class="ui-range-slider-footer">
                                <div class="column">
                                    <button class="btn btn-outline-primary btn-sm" type="submit">Filter</button>
                                </div>
                                <div class="column">
                                    <div class="ui-range-values">
                                        <div class="ui-range-value-min">$<span></span>
                                            <input type="hidden">
                                        </div>&nbsp;-&nbsp;
                                        <div class="ui-range-value-max">$<span></span>
                                            <input type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </form>
                    </section>
                    <!-- Widget Brand Filter-->
                    <section class="widget">
                        <h3 class="widget-title">Filter by Brand</h3>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="adidas">
                            <label class="custom-control-label" for="adidas">Adidas&nbsp;<span class="text-muted">(254)</span></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="bilabong">
                            <label class="custom-control-label" for="bilabong">Bilabong&nbsp;<span class="text-muted">(39)</span></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="klein">
                            <label class="custom-control-label" for="klein">Calvin Klein&nbsp;<span class="text-muted">(128)</span></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="nike">
                            <label class="custom-control-label" for="nike">Nike&nbsp;<span class="text-muted">(310)</span></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="bahama">
                            <label class="custom-control-label" for="bahama">Tommy Bahama&nbsp;<span class="text-muted">(42)</span></label>
                        </div>
                    </section>
                    <!-- Widget Size Filter-->
                    <section class="widget">
                        <h3 class="widget-title">Filter by Size</h3>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="xl">
                            <label class="custom-control-label" for="xl">XL&nbsp;<span class="text-muted">(208)</span></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="l">
                            <label class="custom-control-label" for="l">L&nbsp;<span class="text-muted">(311)</span></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="m">
                            <label class="custom-control-label" for="m">M&nbsp;<span class="text-muted">(485)</span></label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="s">
                            <label class="custom-control-label" for="s">S&nbsp;<span class="text-muted">(213)</span></label>
                        </div>
                    </section>
                    <!-- Promo Banner-->
                    <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
                        <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
                        <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
                            <h4 class="text-light text-thin text-shadow">Рекламная запись</h4>
                            <h3 class="text-bold text-light text-shadow">Горячий сыр</h3><a class="btn btn-sm btn-warning" href="#">Пордробнее</a>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
    <!-- Site Footer-->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Contact Info-->
                    <section class="widget widget-light-skin">
                        <h3 class="widget-title">Get In Touch With Us</h3>
                        <p class="text-white">Phone: 00 33 169 7720</p>
                        <ul class="list-unstyled text-sm text-white">
                            <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                            <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                        </ul>
                        <p><a class="navi-link-light" href="#">support@tshop.com</a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
                    </section>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- Mobile App Buttons-->
                    <section class="widget widget-light-skin">
                        <h3 class="widget-title">Our Mobile App</h3><a class="market-button apple-button mb-light-skin"
                                                                       href="#"><span
                                class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a
                            class="market-button google-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span
                                class="mb-title">Google Play</span></a>
                    </section>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- About Us-->
                    <section class="widget widget-links widget-light-skin">
                        <h3 class="widget-title">About Us</h3>
                        <ul>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">About tshop</a></li>
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Our Blog</a></li>
                        </ul>
                    </section>
                </div>
                <div class="col-lg-3 col-md-6">
                    <!-- Account / Shipping Info-->
                    <section class="widget widget-links widget-light-skin">
                        <h3 class="widget-title">Account &amp; Shipping Info</h3>
                        <ul>
                            <li><a href="#">Your Account</a></li>
                            <li><a href="#">Shipping Rates & Policies</a></li>
                            <li><a href="#">Refunds & Replacements</a></li>
                            <li><a href="#">Taxes</a></li>
                            <li><a href="#">Delivery Info</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                        </ul>
                    </section>
                </div>
            </div>
            <hr class="hr-light mt-2 margin-bottom-2x">
            <div class="row">
                <div class="col-md-7 padding-bottom-1x">
                    <!-- Payment Methods-->
                    <div class="margin-bottom-1x" style="max-width: 615px;"><img src="img/payment_methods.png" alt="Payment Methods">
                    </div>
                </div>
                <div class="col-md-5 padding-bottom-1x">
                    <div class="margin-top-1x hidden-md-up"></div>
                    <!--Subscription-->
                    <form class="subscribe-form" action="//rokaux.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=1194bb7544" method="post" target="_blank" novalidate>
                        <div class="clearfix">
                            <div class="input-group input-light">
                                <input class="form-control" type="email" name="EMAIL" placeholder="Your e-mail"><span class="input-group-addon"><i class="icon-mail"></i></span>
                            </div>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="icon-check"></i></button>
                        </div><span class="form-text text-sm text-white opacity-50">Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.</span>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
<!-- Backdrop-->
<div class="site-backdrop"></div>
<!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="http://code.jquery.com/ui/1.11.0-beta.1/jquery-ui.js" integrity="sha256-q5raG0xmu2guatVMnFCPiZAbKKY5ZX0Wq0Uvar+qN78=" crossorigin="anonymous"></script>
<script src="js/global.js"></script>
<script src="js/catalog.js"></script>
<script src="js/aida_global.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script src="https://unpkg.com/masonry-layout@4.2.1/dist/masonry.pkgd.min.js"></script>
<script>
    categoru_list();
    Catalog_bild();
    Menu();

//поиск  и  глобальный кнонстуркор функци и классов
</script>
    <script type="text/javascript" src="js/scripts.min.js" defer></script>
    <script src="js/vendor.min.js" defer></script>
   <!-- <script src="js/scripts.min.js" defer></script>-->
</body>
</html>
