function GlobalPage(power) {
    this.titel = 'Главаная';

    // что делать по окончании процесса
    function onReady(data) {
        //alert(waterAmount );

        var items = [];
        $.each(data, function (key, val) {
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
        $.each(data, function (key, val) {
            items.push('<li><a href="catalog.php?id=' + val.id + '">' + val.name + '<i class="fas fa-chevron-down"></i></a></li>');
        });
        $('.cat_menu11').html(items);
    }

    function Menu(data) {
        // работа с новым меню

        $.getJSON("../dev/menu.json", function (data) {
            var items = [];
            $.each(data, function (key, val) {
                items.push('<li><a href="' + val.url + '">' + val.name + '<i class="fas fa-chevron-down"></i></a></li>');
            });
            //console.log(data);
            //  $('.cat_menu').html(items);
            $('.main_nav_dropdown').html(items);
        });
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

    this.run = function () {
        // переписать меню для сайта
        // CardShop();
        Menu(this.Menu);PageBild()
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
    $.getJSON("../dev/category_global.php", function (data) {
        var items = [];
        $.each(data, function (key, val) {
            //items.push('<li><a href="catalog.php?id='+val.id+'">' + val.name + '<i class="fas fa-chevron-down"></i></a></li>');
        });
        //console.log(data);
      //  $('.cat_menu').html(items);
        $.each(data, function (key, val) {
            items.push('<a href="catalog.php?id='+val.id+'" class="list-group-item list-group-item-action">' + val.name + ' </a>');
        });
        $('#catetoru').html(items);
    });

    /*   $.ajax({
           url: '../dev/category.php',
           type: 'GET',
           dataType: 'json',
           success: function (data) {
               return data;
           },
           error: function () {
               alert('Выполненно с ошибками getIssues');
           }
       });*/
}



/*<div class="sidebar_section">
                            <div class="sidebar_title" data-titel="categori">Категория</div>
                            <ul class="sidebar_categories" id="sidebar_categories">

                            </ul>
                        </div>*/

/*
function Filter(id) {
    return $.ajax({
        url: 'dev/filter.json',
        type: 'GET',
        //data:id,
        dataType: 'json'
        success: function (data) {
            //alert(id);*
            var items = [];
            $.each(data, function (key, value) {
                $('.shop_sidebar').append('<div class="sidebar_section"><div class="sidebar_title" data-titel="categori">'+value.name+'</div><div class="sidebar_categories" id="'+value.id+'" style="margin-top: 6px;"' +
                    '"></div></div>');
                var items = [];
                //console.log(val.data);

                    $.each(value.data, function (key, val) {
                        items.push('<label><input data-filter="'+val.value+'" type="checkbox" name="check"> <span class="label-text">'+val.name+'</span></label><br>');
                    });
                //console.log(items);
                $("#"+value.id).html(items);
            });
            $('.shop_sidebar').append('<a id="superid1" class="btn btn-sm btn-warning btn-lg btn-block"  type="button">Фильтр ***<span class="caret"></span></a>');
        },
        error: function () {
            alert('Выполненно с ошибками или категория пустая Filter');
        }
    });

}

*/
function log() {
    console.log('1');
};
$(document).on('click', '#superid', function () {
//рабочий элемент
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
    /*if ($.cookie('cadr_col_shop').length > 0) {
        //  $('.cart_price').html($.cookie('cookie_name'));
        //alert($.cookie('cart_price'));
    } else {
        //$('#cadr_col_shop').text('');
        // alert(22);
        var array = ["one", "two"];
        // $.cookie('cookie_name', array);
    }*/
    alert($.cookie("cadr_col_shop"));
    console.log($.cookie('cadr_col_shop'));
// получить значение существующих кукисов можно так:
// если запрашиваемых кукисов не существует, то эта функция вернет null
// а так можно удалить кукисы
}

function cadrMass(value) {
    var arr = [$.cookie('cookie_name')]
    arr.push(value);
    $.cookie('card_id', [arr]);
    // console.log($.cookie('cookie_name'));
    return arr;
}

function NullShop() {
    if ($.cookie('cart_count') == 0) {
        //$("div.content").remove()
        $('.cart_price').html('');
        $("div.cart_count").remove();
    } else {
        $('.cart_icon').append('<div class="cart_count"><span id="cadr_col_shop"></span></div>');
        //RenderCard( $.cookie('cart_count'),$.cookie('cart_price'));
        //$.cookie('cart_count',count);
    }
}

function RenderCard(count, summa) {
    //  NullShop();
    $('.cart_price').html(summa + 'руб.');
    $('.cart_price').attr("data-price", summa);
    $('#cadr_col_shop').text(count);

};
//$.cookie('masss',[arr]);
//alert($.cookie('masss')+'////');

/*
обновленная работа с корзиной при добавлении
 +через куки
 -через сессии
 -через обьекты
 */

function Card_Bild() {
    // alert("Card_Bild");
    //var js_obj = $.cookie('cadr_list').split(',');
    //alert($.cookie('cadr_list'));

     // discard the variable
  //  alert(js_obj);
   // console.log(js_obj);
   /* js_obj = $.cookie('cadr_list').split(',')
    if( $.cookie('cadr_list')!=null &&$.cookie('cadr_list')!="null"){
        $('#cadr_col_shop').html(js_obj.length);
        $('.cart_price').attr("data-price", $.cookie('cart_price'));
        $('.cart_price').text($.cookie('cadr_price')+' руб.');
    }*/
    /**/
    $.ajax({
        method: "POST",
        url: "dev/card.php",
        data: {item: $(this).attr('data-id'),col: $(this).attr('data-id')},
        dataType: 'json'
    }).done(function (data) {
        Card_work(data);
        //CardShop();
    });
 //   console.log($.cookie('cadr_price')+'++'+$.cookie('cadr_list'));


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

/*
рендеринг корзины при старте  глобальный
 +через куки
 -через сессии
 -через обьекты
*/

    /*  var js_obj = $.cookie('cadr_list').split(',');
    js_obj = js_obj.filter(function(e){return e});
    js_obj = js_obj.filter(function(x) {
        return x !== undefined && x !== null && x !== "null";
    });
    $.cookie('cadr_list', js_obj.join(','));
    var y = $.cookie('cadr_list').split(',');
    console.log(y);
    js_obj=[];
    $.each(y,function(index,value){

            js_obj.push(Number($(this).attr("data-id")));


        console.log(value+'*-/'+$(this).attr('data-id'));
    });
    console.log(js_obj);
    //var js_obj = $.cookie('cadr_list').split(','),temp = [];
    js_obj = js_obj.filter(function(e){return e});
    js_obj = js_obj.filter(function(x) {
        return x !== undefined && x !== null && x !== "null";
    });
    js_obj1=[];
    $.each(js_obj,function(index,value){
        js_obj1.push(Number(value.toString()));
    });
    js_obj=js_obj1;
    for(let i of js_obj)
        i && temp.push(i); // copy each non-empty value to the 'temp' array

    js_obj = temp;
    delete temp;
    $.cookie('cadr_list', js_obj.join(','));
    if($(this).attr('data-add')==1){

        //console.log(y);

        var number=$.cookie('cadr_price') - $(this).attr('data-price');
        //alert($.cookie('cadr_price') +'-'+$(this).attr('data-price')+'='+ number);
        if($.cookie('cadr_price')!=0){
            $.cookie('cadr_price',$.cookie('cadr_price') - $(this).attr('data-price'));
        };
        $(this).removeAttr( 'style' );
        //$(this).css("background", getRandomColor());
        $(this).attr("data-add",0);
    }else{

        $(this).css("background", getRandomColor());
        $(this).attr("data-add",1);
        $.cookie('cadr_price',$.cookie('cadr_price') + $(this).attr('data-price'));
    }*/

  /*
  * 28.04.2018
  * */

  //работа  корзиной через запись  с ключем сессии
   // $('#cadr_col_shop').html(1551);
    //$('.cart_price').attr("data-price", $.cookie('cart_price'));
    //$('.cart_price').text($.cookie('cadr_price')+' руб.')
    //Card_Bild();

 /*
 работа с футером и шапкой
 +/- шапка
  - футер чистить
  -футер заполнить
  - доп пункты
  */
 //https://themeforest.net/item/isomorphic-react-redux-admin-dashboard/20262330
 function PageBild() {
    // $('.top_bar_contact_item').remove();
     $('#head-naw').prepend('<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:aida-taganrog@yandex.ru">aida-taganrog@yandex.ru</a></div>');
     $('#head-naw').prepend('<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>8 (8634) 68-30-27</div>');

 }
 function Card_work(y) {

     $.each(y,function(index,data){
         $('#cadr_col_shop').html(data.item.length);
         $('.cart_price').attr("data-price", data.sum);
         $('.cart_price').text(data.sum+' руб.');
     });
 }
 //https://obninsksite.ru/blog/php-scripts/lesson-redbeanphp
function Page_bild(prod){
     $('.image_list').remove();
    $.ajax({
        method: "POST",
        url: "dev/prod_id.php",
        data: {id: prod},
        dataType: 'json'
    }).done(function (data1) {
        $.each(data1,function(index,data){
        //console.log(data);
            $('.image_selected').html('<img src="images/new_'+ Math.floor((Math.random() * 10) + 1) + '.jpg" alt="">');
            $('.product_category').text(data.category[0].name);
            $('.product_name').text(data.name);
            $('.text-prod').text(data.body);
            $('.product_rating').html(data.col[0].col);
            $('.product_price').text(data.price +' руб.');
            $('.image_selected').html('<img src="'+data.img +'" alt="">');
            console.log(data.col[0].name);
           // $('.product_name').text(data.option);
        });
        //свойства товара неорганиченны толкьо  в  api все что вернет рисует
        $.each(data1[0].option,function(index,data){
            $('.text-option').append(/*'<div class="col-sm-5 col-xs-6 tital " >'+data.name+':</div><div class="col-sm-7">'+data.value+'</div>\n' +
                '  <div class="clearfix"></div>\n' +
                '<div class="bot-border"></div>'*/


            '<span> <b>'+data.name+':</b>'+data.value+'</span> <br>'
            );
        });
    });
};//проверка кнопки в корзине есть или нету
//Recently Viewed работа  с рекоменддуемыми товарами
//обновлеине токена  чистка карзины




//работа с магазином точкой продаж


//<a id="main-shop" href="#">Петровская 14<i class="fas fa-chevron-down"></i></a>
//<ul id="list-shop"
function Shop_listing() {
    return $.ajax({
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
        }});
}


//https://bootsnipp.com/snippets/featured/ecommerce-product-detail


//https://bootsnipp.com/snippets/orOGB

//card //card   https://bootsnipp.com/snippets/O5mM8
Shop_listing();