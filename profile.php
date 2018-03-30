<?php
/**
 * Created by PhpStorm.
 * User: Anna T. Borodenko
 * Date: 22.03.2018
 * Time: 11:50
 */
session_start();
require_once ('app/home.php');
require_once ('core.php');
if(!R::testConnection()){
  exit('Нет подключения к бд');
};
$load_prod=R::find('prod',"`cod`=?",array(1));
$load_categori=R::find('categori',"`viev`=?",array(1));

function theme($tmp){
  if($tmp==1){
    return 'Товары';
  }elseif ($tmp==2){
    return array('Главная','Категория','Все');
  }
}

?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title><?=theme(1)?></title>
  <link rel="apple-touch-icon" href="../../../assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="../../../assets/images/favicon.ico">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../../../../global/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../../global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../../../assets/css/site.min.css">
  <!-- Plugins -->
  <link rel="stylesheet" href="../../../../global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="../../../../global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="../../../../global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="../../../../global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="../../../../global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="../../../../global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="../../../../global/vendor/bootstrap-select/bootstrap-select.css">
  <link rel="stylesheet" href="../../../assets/examples/css/apps/documents.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="../../../../global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="../../../../global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <!--[if lt IE 9]>
  <script src="../../../../global/vendor/html5shiv/html5shiv.min.js"></script>
  <![endif]-->
  <!--[if lt IE 10]>
  <script src="../../../../global/vendor/media-match/media.match.min.js"></script>
  <script src="../../../../global/vendor/respond/respond.min.js"></script>
  <![endif]-->
  <!-- Scripts -->
  <script src="../../../../global/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
  <style>#page-preloader {
      position: fixed;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      background: #000;
      z-index: 100500;
    }

    #page-preloader .spinner {
      width: 32px;
      height: 32px;
      position: absolute;
      left: 50%;
      top: 50%;
      background: url('/images/spinner.gif') no-repeat 50% 50%;
      margin: -16px 0 0 -16px;
    }</style>
</head>
<body class="animsition site-navbar-small app-documents">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse"
     role="navigation">
  <div class="navbar-header">

    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
            data-toggle="collapse">
      <i class="icon wb-more-horizontal" aria-hidden="true"></i>
    </button>
    <a class="navbar-brand navbar-brand-center" href="../../index.html">
      <img class="navbar-brand-logo navbar-brand-logo-normal" src="../../../assets/images/logo.png"
           title="Remark">
      <img class="navbar-brand-logo navbar-brand-logo-special" src="../../../assets/images/logo-blue.png"
           title="Remark">
      <span class="navbar-brand-text hidden-xs-down"> Remark</span>
    </a>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
            data-toggle="collapse">
      <span class="sr-only">Toggle Search</span>
      <i class="icon wb-search" aria-hidden="true"></i>
    </button>
  </div>
  <div class="navbar-container container-fluid">
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
      <!-- Navbar Toolbar -->
      <ul class="nav navbar-toolbar">
        <li class="nav-item hidden-float" id="toggleMenubar">
          <a class="nav-link" data-toggle="menubar" href="#" role="button">
            <i class="icon hamburger hamburger-arrow-left">
              <span class="sr-only">Toggle menubar</span>
              <span class="hamburger-bar"></span>
            </i>
          </a>
        </li>


        <li class="nav-item dropdown dropdown-fw dropdown-mega">

          <div class="dropdown-menu" role="menu">
            <div class="mega-content">
              <div class="row">
                <div class="col-xs-12 col-md-4">
                  <h5>UI Kit</h5>
                  <ul class="blocks-2">
                    <li class="mega-menu m-0">
                      <ul class="list-icons">
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../advanced/animation.html">Animation</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../uikit/buttons.html">Buttons</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../uikit/colors.html">Colors</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../uikit/dropdowns.html">Dropdowns</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../uikit/icons.html">Icons</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../advanced/lightbox.html">Lightbox</a>
                        </li>
                      </ul>
                    </li>
                    <li class="mega-menu m-0">
                      <ul class="list-icons">
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../uikit/modals.html">Modals</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../uikit/panel-structure.html">Panels</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../structure/overlay.html">Overlay</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../uikit/tooltip-popover.html ">Tooltips</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../advanced/scrollable.html">Scrollable</a>
                        </li>
                        <li><i class="wb-chevron-right-mini" aria-hidden="true"></i>
                          <a href="../../uikit/typography.html">Typography</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <div class="col-xs-12 col-md-4">
                  <h5>Media
                    <span class="tag tag-pill tag-success">4</span>
                  </h5>
                  <ul class="blocks-3">
                    <li>
                      <a class="thumbnail m-0" href="javascript:void(0)">
                        <img class="w-full" src="../../../../global/photos/placeholder.png" alt="..." />
                      </a>
                    </li>
                    <li>
                      <a class="thumbnail m-0" href="javascript:void(0)">
                        <img class="w-full" src="../../../../global/photos/placeholder.png" alt="..." />
                      </a>
                    </li>
                    <li>
                      <a class="thumbnail m-0" href="javascript:void(0)">
                        <img class="w-full" src="../../../../global/photos/placeholder.png" alt="..." />
                      </a>
                    </li>
                    <li>
                      <a class="thumbnail m-0" href="javascript:void(0)">
                        <img class="w-full" src="../../../../global/photos/placeholder.png" alt="..." />
                      </a>
                    </li>
                    <li>
                      <a class="thumbnail m-0" href="javascript:void(0)">
                        <img class="w-full" src="../../../../global/photos/placeholder.png" alt="..." />
                      </a>
                    </li>
                    <li>
                      <a class="thumbnail m-0" href="javascript:void(0)">
                        <img class="w-full" src="../../../../global/photos/placeholder.png" alt="..." />
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-xs-12 col-md-4">
                  <h5 class="m-b-0">Accordion</h5>
                  <!-- Accordion -->
                  <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true"
                       role="tablist">
                    <div class="panel">
                      <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                        <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion"
                           aria-expanded="false" aria-controls="siteMegaCollapseOne">
                          Collapsible Group Item #1
                        </a>
                      </div>
                      <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne"
                           role="tabpanel">
                        <div class="panel-body">
                          De moveat laudatur vestra parum doloribus labitur sentire partes, eripuit praesenti
                          congressus ostendit alienae, voluptati ornateque accusamus
                          clamat reperietur convicia albucius.
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <div class="panel-heading" id="siteMegaAccordionHeadingTwo" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseTwo"
                           data-parent="#siteMegaAccordion" aria-expanded="false"
                           aria-controls="siteMegaCollapseTwo">
                          Collapsible Group Item #2
                        </a>
                      </div>
                      <div class="panel-collapse collapse" id="siteMegaCollapseTwo" aria-labelledby="siteMegaAccordionHeadingTwo"
                           role="tabpanel">
                        <div class="panel-body">
                          Praestabiliorem. Pellat excruciant legantur ullum leniter vacare foris voluptate
                          loco ignavi, credo videretur multoque choro fatemur
                          mortis animus adoptionem, bello statuat expediunt naturales.
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <div class="panel-heading" id="siteMegaAccordionHeadingThree" role="tab">
                        <a class="panel-title collapsed" data-toggle="collapse" href="#siteMegaCollapseThree"
                           data-parent="#siteMegaAccordion" aria-expanded="false"
                           aria-controls="siteMegaCollapseThree">
                          Collapsible Group Item #3
                        </a>
                      </div>
                      <div class="panel-collapse collapse" id="siteMegaCollapseThree" aria-labelledby="siteMegaAccordionHeadingThree"
                           role="tabpanel">
                        <div class="panel-body">
                          Horum, antiquitate perciperet d conspectum locus obruamus animumque perspici probabis
                          suscipere. Desiderat magnum, contenta poena desiderant
                          concederetur menandri damna disputandum corporum.
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Accordion -->
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <!-- End Navbar Toolbar -->
      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
             aria-expanded="false" data-animation="scale-up" role="button">
            <i class="icon wb-shopping-cart" aria-hidden="true" style="font-size: 27px"></i>

            <span id="cadr_number" class="tag tag-pill tag-danger up"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
            <div class="dropdown-menu-header">
              <h5>Ваша корзина пуста</h5>
              <span class="tag tag-round tag-danger"></span>
            </div>
            <div class="list-group">
              <div data-role="container">
                <div data-role="content" id="card">


                </div>
              </div>
            </div>
            <div class="dropdown-menu-footer">
              <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                <i class="icon md-settings" aria-hidden="true"></i>
              </a>
              <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                Перейти в корзину
              </a>
            </div>
          </div>
        </li>


      </ul>
      <!-- End Navbar Toolbar Right -->
    </div>
    <!-- End Navbar Collapse -->
    <!-- Site Navbar Seach -->
    <div class="collapse navbar-search-overlap" id="site-navbar-search">
      <form role="search">
        <div class="form-group">
          <div class="input-search">
            <i class="input-search-icon wb-search" aria-hidden="true"></i>
            <input type="text" class="form-control" name="site-search" placeholder="Search...">
            <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                    data-toggle="collapse" aria-label="Close"></button>
          </div>
        </div>
      </form>
    </div>
    <!-- End Site Navbar Seach -->
  </div>
</nav>
<div class="site-menubar site-menubar-light">
  <div class="site-menubar-body">
    <div>
      <div>

      </div>
    </div>
  </div>
</div>
<!-- Page -->
<div class="page">
  <div class="page-header">
    <!-- хлебные крошки  через функцию-->
    <h1 class="page-title m-b-10"><?=theme(1)?></h1>
    <ol class="breadcrumb">
      <?
      $i=1;
      foreach (theme(2) as $key=>$value){
        if($i==count(theme(2))){
          echo '<li class="breadcrumb-item active">'.$value.'</li>';
        }else{
          echo '<li class="breadcrumb-item"><a href="../../index2.html">'.$value.'</a></li>';
        }
        $i++;
      }


      ?>


    </ol>
    <!-- хлебные крошки  через функцию-->
  </div>
  <div class="page-content">
    <!--Селектор -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-btn">
          <select data-plugin="selectpicker" data-style="btn-outline">
            <option>Getting started</option>
            <option>Configuration</option>
            <option>Developer Tourial</option>
            <option>Compatible article</option>
          </select>
        </div>
        <button type="submit" class="input-search-btn">
          <i class="icon wb-search" aria-hidden="true"></i>
        </button>
        <input type="text" class="form-control" placeholder="Search the knowledge base...">
      </div>
    </div>
    <?require_once('app/profile.php');?>
  </div>
</div>

<!-- Footer -->
<footer class="site-footer">
  <div class="site-footer-legal">© 2017 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
  <div class="site-footer-right">
    Crafted with <i class="red-600 wb wb-heart"></i> by <a href="http://themeforest.net/user/amazingSurge">amazingSurge</a>
  </div>
</footer>
<!-- Core  -->
<script src="../../../../global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
<script src="../../../../global/vendor/jquery/jquery.js"></script>
<script src="../../../../global/vendor/tether/tether.js"></script>
<script src="../../../../global/vendor/bootstrap/bootstrap.js"></script>
<script src="../../../../global/vendor/animsition/animsition.js"></script>
<script src="../../../../global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="../../../../global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
<script src="../../../../global/vendor/asscrollable/jquery-asScrollable.js"></script>
<!-- Plugins -->
<script src="../../../../global/vendor/switchery/switchery.min.js"></script>
<script src="../../../../global/vendor/intro-js/intro.js"></script>
<script src="../../../../global/vendor/screenfull/screenfull.js"></script>
<script src="../../../../global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="../../../../global/vendor/bootstrap-select/bootstrap-select.js"></script>
<script src="../../../../global/vendor/stickyfill/stickyfill.min.js"></script>
<!-- Scripts -->
<script src="../../../../global/js/State.js"></script>
<script src="../../../../global/js/Component.js"></script>
<script src="../../../../global/js/Plugin.js"></script>
<script src="../../../../global/js/Base.js"></script>
<script src="../../../../global/js/Config.js"></script>
<script src="../../../assets/js/Section/Menubar.js"></script>
<script src="../../../assets/js/Section/Sidebar.js"></script>
<script src="../../../assets/js/Section/PageAside.js"></script>
<script src="../../../assets/js/Plugin/menu.js"></script>
<!-- Config -->
<script src="../../../../global/js/config/colors.js"></script>
<script src="../../../assets/js/config/tour.js"></script>
<script>
  Config.set('assets', '../../../assets');
  function getJSONP(url, success) {

    var ud = '_' + +new Date,
      script = document.createElement('script'),
      head = document.getElementsByTagName('head')[0]
        || document.documentElement;

    window[ud] = function(data) {
      head.removeChild(script);
      success && success(data);
    };

    script.src = url.replace('callback=?', 'callback=' + ud);
    head.appendChild(script);

  }


</script>
<script type="text/javascript">
  //корзина
  /* $("#result").on("click",".tag",function() {
      console.log($(this).text());
    });*/

  $("#result").on("click",".add",function() {
//  $('.add').click(function() {
    var caunts=Number($('#cadr_number').html());
    caunts=caunts+1;
    var conut= $('[data-role="container"]').css("height");
    conut=Number(conut.substr( 0,conut.length - 2));
    if (conut+80 > 270 ) {
      conut=230;
    }
    else {
      conut=conut+80;
    };
    $('#cadr_number').html(caunts);
    //var blok= $(this).closest(".panel");
    //console.log();
    $('[data-role="container"]').css({'height': ''+conut+'px'});
    $('#card').append('<a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">\n' +
      '                      <div class="media">\n' +
      '                        <div class="media-left p-r-10">\n' +
      '                         <img class="card-img-top" src="'+$(this).attr('src')+'">\n' +
      '                        </div>\n' +
      '                        <div class="media-body">\n' +
      '                          <h6 class="media-heading">'+$(this).attr('data-name')+'</h6>\n' +
      '                          <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">'+$(this).attr('data-price')+'</time>\n' +
      '                        </div>\n' +
      '                      </div>\n' +
      '                    </a>');
    //console.log(conut);
  });

  //каталог

  //работа с получение категорий

  function showMessage(e,uid) {

    console.log($(this).attr('data-name'));
    var data= '<div class="page vertical-align text-xs-center layout-full" data-animsition-in="fade-in" data-animsition-out="fade-out">\n' +
      '  <div class="page-content vertical-align-middle">\n' +
      '    <i class="icon wb-settings icon-spin page-maintenance-icon" aria-hidden="true" style="font-size: 64px;"></i>\n' +
      '  </div>\n' +
      '</div>\n';
    $('#result').html(data);
    $.ajax({
      type: "POST",
      data: "primer=" + uid,
      url: 'lol.php',
      success: function(data) {
        $(".active").text(e);
        $('#result').html(data);
      }
    });
  };
  function PageCatalog(uid) {

    console.log($(this).attr('data-name'));
    var data= '<div class="page vertical-align text-xs-center layout-full" data-animsition-in="fade-in" data-animsition-out="fade-out">\n' +
      '  <div class="page-content vertical-align-middle">\n' +
      '    <i class="icon wb-settings icon-spin page-maintenance-icon" aria-hidden="true" style="font-size: 64px;"></i>\n' +
      '  </div>\n' +
      '</div>\n';
    $('#result').html(data);
    $.ajax({
      type: "POST",
      data: "primer=" + uid,
      url: 'app/profile.php',
      success: function(data) {
        $(".active").text('Продукты такие');
        $('#result').html(data);
      }
    });
  };
</script>
<!-- Page -->
<script src="../../../assets/js/Site.js"></script>
<script src="../../../../global/js/Plugin/asscrollable.js"></script>
<script src="../../../../global/js/Plugin/slidepanel.js"></script>
<script src="../../../../global/js/Plugin/switchery.js"></script>
<script src="../../../../global/js/Plugin/bootstrap-select.js"></script>
<script src="../../../assets/js/Site.js"></script>
<script src="../../../assets/js/App/Documents.js"></script>
<script src="../../../assets/examples/js/apps/documents.js"></script>
</body>
</html>
