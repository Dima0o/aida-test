function GlobalPage(power) {
    this.titel = 'Главаная';

    // что делать по окончании процесса
    function onReady(data) {
        //alert(waterAmount );

        var items = [];
        $.each(data, function(key, val) {
            //   val random=random.m
            items.push('<li class="page_menu_item has-children"><a href="#">' + val + '<i class="fa fa-angle-down"></i></a></li>');
            //    alert(val);
        });
        //$(id).html(items);
        $('.page_menu_nav').html(items);
    }

    this.Menu = [];
    this.Category = [];

    function Categiru1(data) {

        var items = [];
        $.each(data, function(key, val) {
            items.push('<li><a href="catalog.php?id=' + val.id + '">' + val.name + '<i class="fas fa-chevron-down"></i></a></li>');
        });
        $('.cat_menu11').html(items);
    }

    function Menu(data) {
        // работа с новым меню
        $.ajax({
            method: "POST",
            url: "dev/menu.json",
            dataType: 'json',
            data: {
                id: ids
            },
        }).ajaxSuccess(function(data) {
            $.each(data, function(key, val) {
                items.push('<li><a href="' + val.url + '">' + val.name + '<i class="fas fa-chevron-down"></i></a></li>');
            });
            $('.main_nav_dropdown').html(items);
        });
        /*   $.getJSON("../dev/menu.json", function (data) {
               var items = [];
               $.each(data, function (key, val) {
                   items.push('<li><a href="' + val.url + '">' + val.name + '<i class="fas fa-chevron-down"></i></a></li>');
               });
               //console.log(data);
               //  $('.cat_menu').html(items);
               $('.main_nav_dropdown').html(items);
           });*/
        //alert('items');
        /* var items = [];
             $.each(data, function (key, val) {
                 items.push('<li class="page_menu_item has-children"><a href="#">'+val+'<i class="fa fa-angle-down"></i></a></li>');
             });
         $('.page_menu_nav').html(items);
             var items = [];
             $.each(data, function (key, val) {
                 items.push('<li><a href="index.html">'+val+'<i class="fas fa-chevron-down"></i></a></li>');
             });*/
        // $('.top_bar_menu').html(items);
    }

    this.run = function() {
        // переписать меню для сайта
        // CardShop();
        Menu(this.Menu);
        PageBild()
        //  NullShop();
        /*if (isNaN($.cookie('cadr_price'))){
            $.cookie('cadr_price',0);
        }else if ($.cookie('cadr_price')==null) {
            $.cookie('cadr_price',0);
        };*/
        $('.cart_text').html('<a href="card.php">Корзина</a>');
        $('.wishlist_text').html('<a href="#">Избранные</a>');
        $('.wishlist_count').html($.cookie('cadr_list'));
        //проверка на массив
        //работа с очисткой футера
        $('.newsletter').remove();
        Card_Bild();
    };

}

function Global_categori() {
    $.getJSON("../dev/category_global.php", function(data) {
        var items = [];
        $.each(data, function(key, val) {
            //items.push('<li><a href="catalog.php?id='+val.id+'">' + val.name + '<i class="fas fa-chevron-down"></i></a></li>');
        });
        //console.log(data);
        //  $('.cat_menu').html(items);
        $.each(data, function(key, val) {
            items.push('<a href="catalog.php?id=' + val.id + '" class="list-group-item list-group-item-action">' + val.name + ' </a>');
        });
        $('#catetoru').html(items);
    });
}


function log() {
    console.log('1');
};
$(document).on('click', '#superid', function() {
    showHotels();
});

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

//https://codepen.io/desandro/pen/Wwabpr
//https://progschool.clickmeeting.com/2018-04-19_3966_22417
//Работа с корзиной  а куда деватся
//Акции//Магазины**//Вакансии**//Партнёрам//Контакты
//работа с корзиной
//Акции//Магазины//Вакансии//Партнёрам//Контакты
function CardShops() {
    $('#cadr_col_shop').text($.cookie('cadr_col_shop'));
    //    $('.cart_price').html($.cookie('cart_count'));
    $('.cart_count').text($.cookie('cart_count'));
    $('.cart_text').html('<a href="card.php">Корзина</a>');
}

function cadrMass(value) {
    var arr = [$.cookie('cookie_name')]
    arr.push(value);
    $.cookie('card_id', [arr]);
    return arr;
}

function NullShop() {
    if ($.cookie('cart_count') == 0) {
        //$("div.content").remove()
        $('.cart_price').html('');
        $("div.cart_count").remove();
    } else {
        $('.cart_icon').append('<div class="cart_count"><span id="cadr_col_shop"></span></div>');
    }
}

function RenderCard(count, summa) {
    //  NullShop();
    $('.cart_price').html(summa + 'руб.');
    $('.cart_price').attr("data-price", summa);
    $('#cadr_col_shop').text(count);
};

function getRandom()
{
    return Math.random();
}

function Card_Bild() {

  //  alert($.cookie('cookie_name'));
    $.ajax({
        method: "POST",
        url: "dev/card.php",
        data: {
          //  item: $(this).attr('data-id'),
            token:$.cookie('PHPSESSID'),
           // col: $(this).attr('data-id')
        },
        dataType: 'json'
    }).done(function(data) {
        Card_work(data);
    });
}

function Card_Clear() {
    //alert("Card_Clear");
    $('.cart_price').html('');
    $("div.cart_count").remove();
}

//глобальный модуль
function count(obj) {
    var count = 0;
    for (var prs in obj) {
        if (obj.hasOwnProperty(prs)) count++;
    }
    return count;
}

//кривая может не работать
function ClearMass(origin) {
    var result = [];
    for (var i = 0; i < origin.length; i++) {
        if (i in origin) {
            result.push(origin[i]);
        }
    }

    return result;
}

//глобальная  штука для того чтобы с куки не балывались
if (!navigator.cookieEnabled) {
    alert('Включите cookie для комфортной работы с этим сайтом');
}


//https://themeforest.net/item/isomorphic-react-redux-admin-dashboard/20262330
function PageBild() {
    // $('.top_bar_contact_item').remove();
    $('#head-naw').prepend('<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:aida-taganrog@yandex.ru">aida-taganrog@yandex.ru</a></div>');
    $('#head-naw').prepend('<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>8 (8634) 68-30-27</div>');

}

//глобальная работа с корзиной
function Product_cancel(type, id, elelm, cols) {
    $.ajax({
        method: "POST",
        url: "dev/card.php",
        data: {
            item: id,
            kol: cols,
            token:$.cookie('token'),
            status: elelm.attr('data-add')
        },
        dataType: 'json'
    }).done(function(data) {
        //  console.log(data);
        Card_work(data);
    });
}

//отрисовка корзины   работает на массиве из dev/card.php через токен
function Card_work(y) {
  //  console.log(y);
    $.each(y, function(index, data) {
       // $.cookie('token',data.token);
        //$.cookie('testName',data.token);
        $('#count').html(data.item.length);
        $('#subtotal').text(data.sum + ' руб.');
        //работа с  элементами массива в  кторые входит немного данных
        $('#card-list').html('');
        $.each(data['item'], function(key, val) {
            var cancel = $('<span>', {
                html: '<i class="icon-cross"></i>',
                //title:'Whishlist',
                class: 'dropdown-product-remove',
                click: function() {
                  //  alert(1212312312312);
                    Product_cancel($(this).attr('data-add'), $(this).attr('data-id'), $(this), 1);
                },
                'data-id': val.prod,
                'data-add': 1
            });
            var img = $('<a>', {
                href: 'card.php',
                //title:'Whishlist',
                class: 'dropdown-product-thumb',
                html:'<img src="'+val.img+'" alt="'+val.name+'">'
            });
            var prod = $('<div>', {
                //title:'Whishlist',
                class: 'dropdown-product-info',
                html:'<a class="dropdown-product-title" href="shop-single.html">' + val.name + '</a><span class="dropdown-product-details">' + val.kol + ' x ₽' + val.prise + '</span>'
            });

            $('#card-list')
                .append($('<div>')
                        .append(cancel,img,prod)
                .addClass('dropdown-product-item'));

            /*$('#card-list').append('<div class="dropdown-product-item">' + cancel + '<a class="dropdown-product-thumb" href="shop-single.html"><img src="' + val.img + '" alt="' + val.name + '"></a>\n' +
                '                  <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">' + val.name + '</a><span class="dropdown-product-details">' + val.kol + ' x ₽' + val.prise + '</span></div>\n' +
                '                </div>');*/
        });
        //работа с выпадающим списокм товаров для  корзины
    });
    // alert($.cookie('token'));
    //     console.log(y);
}
//https://obninsksite.ru/blog/php-scripts/lesson-redbeanphp
function Page_bild(prod) {
    $('.image_list').remove();
    $.ajax({
        method: "POST",
        url: "dev/prod_id.php",
        data: {
            id: prod
        },
        dataType: 'json'
    }).done(function(data1) {
        $.each(data1, function(index, data) {
            //console.log(data);
            $('.image_selected').html('<img src="images/new_' + Math.floor((Math.random() * 10) + 1) + '.jpg" alt="">');
            $('.product_category').text(data.category[0].name);
            $('.product_name').text(data.name);
            $('.text-prod').text(data.body);
            $('.product_rating').html(data.col[0].col);
            $('.product_price').text(data.price + ' руб.');
            $('.image_selected').html('<img src="' + data.img + '" alt="">');
            console.log(data.col[0].name);
            // $('.product_name').text(data.option);
        });
        //свойства товара неорганиченны толкьо  в  api все что вернет рисует
        $.each(data1[0].option, function(index, data) {
            $('.text-option').append(
                /*'<div class="col-sm-5 col-xs-6 tital " >'+data.name+':</div><div class="col-sm-7">'+data.value+'</div>\n' +
                                '  <div class="clearfix"></div>\n' +
                                '<div class="bot-border"></div>'*/


                '<span> <b>' + data.name + ':</b>' + data.value + '</span> <br>'
            );
        });
    });
}; //проверка кнопки в корзине есть или нету
//Recently Viewed работа  с рекоменддуемыми товарами
//обновлеине токена  чистка карзины




//работа с магазином точкой продаж


//<a id="main-shop" href="#">Петровская 14<i class="fas fa-chevron-down"></i></a>
//<ul id="list-shop"
function Shop_listing() {
    /*  return $.ajax({
          url: 'dev/shop_list.json',
          type: 'GET',
          dataType: 'json',
          success: function (data) {
           //   console.log(data);

              $('#main-shop').text($.cookie('main-shop'));
              $.each(data, function (key, val) {
                  var elementLi = $('<li/>', {
                    //  title: title,
                      'data-id':val.id,
                      html:'<a href="#">' + val.title + '</a>',
                      click: function() {
                          $('#main-shop').text($(this).text());
                          $.cookie('main-shop',$(this).text());
                         // alert($(this).attr('data-id'));
                      },
                      //'data-system-id': 100,
                  });
                  $('#list-shop').append(elementLi);
              });
          }});*/
}


//https://bootsnipp.com/snippets/featured/ecommerce-product-detail


//https://bootsnipp.com/snippets/orOGB

//card //card   https://bootsnipp.com/snippets/O5mM8
//Shop_listing();
//глобальный вызов постройки карзины

