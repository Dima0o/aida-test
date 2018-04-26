

function GlobalPage(power) {
    this.titel = 'Главаная';

    // что делать по окончании процесса
    function onReady(data) {
        //alert(waterAmount );

        var items = [];
        $.each(data, function (key, val) {
            //   val random=random.m
            items.push('<li class="page_menu_item has-children"><a href="#">'+val+'<i class="fa fa-angle-down"></i></a></li>');
            //    alert(val);
        });
        //$(id).html(items);
        $('.page_menu_nav').html(items);

    }
    this.Menu=[];
    this.Category=[];
    function Categiru1(data) {

        var items = [];
        $.each(data, function (key, val) {
            items.push('<li><a href="catalog.php?id='+val.id+'">'+val.name+'<i class="fas fa-chevron-down"></i></a></li>');
        });
        $('.cat_menu11').html(items);
    }
    function Menu(data) {
        // работа с новым меню

        $.getJSON("../dev/menu.json", function (data) {
            var items = [];
            $.each(data, function (key, val) {
                items.push('<li><a href="'+val.url+'">'+val.name+'<i class="fas fa-chevron-down"></i></a></li>');
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
        Menu(this.Menu);
        NullShop();
    };

}
function Global_categori() {
    $.getJSON("../dev/category_global.php", function (data) {
        var items = [];
        $.each(data, function (key, val) {
            items.push('<li><a href="catalog.php?id=2">'+val+'<i class="fas fa-chevron-down"></i></a></li>');
        });
        //console.log(data);
        $('.cat_menu').html(items);
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
//http://aida.k99969kp.beget.tech/dev/category.php
function Categori_ui(id) {
    return $.ajax({
        url: 'dev/category.php?id="' + id + '"',
        type: 'GET',
        //data:id,
        dataType: 'json',
        success: function (data) {
            var items = [];
            $('.shop_sidebar').prepend('<div class="sidebar_section">\n' +
                '                            <div class="sidebar_title" data-titel="categori">Категория</div>\n' +
                '                            <ul class="sidebar_categories" id="sidebar_categories">\n' +
                '\n' +
                '                            </ul>\n' +
                '                        </div>');
            //console.log(data['data']);
            //$.each(data, function (key, val) {
                $.each(data['data'], function (key, val) {
                //   val random=random.m
                     var status='';
                    if (val.id == id) {
                        status='style="color: #ef7f1b;"';
                    }
                items.push('<li><a href="?id='+val.id+'" '+status+'>'+val.name+'</a></li>');
                });
            //});
            $('#sidebar_categories').html(items);
            //$('[data-size="products_found"]').text(data.length);
            $('[data-titel="categori"]').text(data.titel);

        },
        error: function () {
            alert('Выполненно с ошибками или категория пустая getIssues_id');
        }
    });

}
function Prod_div(ids) {
    $.ajax({
        method: "POST",
        url: "dev/categore.php",
        dataType: 'json',
        //data: {id: ids},
    }).done(function (data) {
        var items = [];
        $.each(data['data'], function (key, val) {
            items.push('<div class="product_item is_new" data-category="post-transition">\n' +
                '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_' + Math.floor((Math.random() * 10) + 1) + '.jpg" alt=""></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_price" >' + val.price + ' руб.</div>\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_name name"><div><a href="#" tabindex="0">' + val.name.substr(0, 20) + '</a></div></div>\n' +
                '\t\t\t\t\t\t\t\t</div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_fav" data-price="' + val.price + '"  data-id="' + val.id + '"><i class="fas fa-shopping-basket"></i></div>\n' +
                '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' +
                '\t\t\t\t\t\t\t\t</ul>\n' +
                '\t\t\t\t\t\t\t</div>');
        });
        $('#result').append(items);
        $('#products_found').text(data.col);
      //  alert('7878');
    });
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
function log(){
    console.log('1');
};
$(document).on('click','#superid',function(){
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

//работа с фильтром
function showHotels() {
    var items = [];
    $("input:checked").each(function(id) {
        items.push($(this).data("filter"));
    })
    console.log(items);
    $("#products_found").attr("data-size", "products_found").text(items);

    $.ajax({
        method: "POST",
        url: "dev/some.php",
        data: {name: items, location: "Boston"},
        dataType: 'json'
    }).done(function (msg) {
        alert("Data Saved: " + msg);
    });
}
//https://codepen.io/desandro/pen/Wwabpr
//https://progschool.clickmeeting.com/2018-04-19_3966_22417
//Работа с корзиной  а куда деватся
//Акции//Магазины**//Вакансии**//Партнёрам//Контакты
//работа с корзиной
//Акции//Магазины//Вакансии//Партнёрам//Контакты
function CardShop() {
    $('#cadr_col_shop').html($.cookie('cadr_col_shop'));
//    $('.cart_price').html($.cookie('cart_count'));
    $('.cart_count').html($.cookie('cart_count'));
    $('.cart_text').html('<a href="card.php">Корзина</a>');
    if($.cookie('cadr_col_shop').length >0){
      //  $('.cart_price').html($.cookie('cookie_name'));
      //alert($.cookie('cart_price'));
    }else{
        //$('#cadr_col_shop').text('');
       // alert(22);
        var array = [ "one", "two" ];
       // $.cookie('cookie_name', array);
    }
// получить значение существующих кукисов можно так:
// если запрашиваемых кукисов не существует, то эта функция вернет null
// а так можно удалить кукисы
}

function cadrMass(value) {
    var arr =[$.cookie('cookie_name')]
    arr.push(value);
    $.cookie('card_id',[arr]);
   // console.log($.cookie('cookie_name'));
return arr;
}
//работа с ффильрром для категории
//найстройка фильтраф свойств для категории

$(document).on('click','#superid',function(){
//рабочий элемент
    showHotels();
});
//работа с сортировкой товаров     //2и подргузка при скролинге или клике
$(document).on('click','.href_sort',function(){
  var items=[];
    //  alert($(this).attr("data-sort"));
    $("input:checked").each(function(id) {
        items.push($(this).data("filter"));
    })
   // sorting_text
    $(".href_sort").removeAttr("style");
    $(this).css("color", "orange");
    $('.sorting_text').text($(this).text());
    items.push($(this).attr("data-sort"));
   // $("#products_found").attr("data-size", "products_found").text(items);
    $.ajax({
        method: "POST",
        url: "dev/some.php",
        data: {name: items},
        dataType: 'json'
    }).done(function (data) {
        var items = [];
        $.each(data['data'], function (key, val) {
            items.push('<div class="product_item is_new" data-category="post-transition">\n' +
                '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_' + Math.floor((Math.random() * 10) + 1) + '.jpg" alt=""></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_price" >' + val.price + ' руб.</div>\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_name name"><div><a href="#" tabindex="0">' + val.name.substr(0, 20) + '</a></div></div>\n' +
                '\t\t\t\t\t\t\t\t</div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_fav" data-price="' + val.price + '"  data-id="' + val.id + '"><i class="fas fa-shopping-basket"></i></div>\n' +
                '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' +
                '\t\t\t\t\t\t\t\t</ul>\n' +
                '\t\t\t\t\t\t\t</div>');
        });
        $('#result').html(items);
        $('#products_found').text(data.col);
    });
});
//https://github.com/akkez/perekrestok

//очистака корзины пр клике на отсеченый товар или просто очистить корзину
$(document).on('click','.wishlist_content',function(){
    $.cookie('cart_count', 0);
    $.cookie('cart_price', 0);
});
function NullShop() {
    if($.cookie('cart_count')==0 ){
        //$("div.content").remove()
        $('.cart_price').html('');
        $("div.cart_count").remove();
    }else{
        $('.cart_icon').append('<div class="cart_count"><span id="cadr_col_shop"></span></div>');
        //RenderCard( $.cookie('cart_count'),$.cookie('cart_price'));
        //$.cookie('cart_count',count);
    }
}
function RenderCard(count,summa) {
  //  NullShop();
    $('.cart_price').html(summa+'руб.');
    $('.cart_price').attr("data-price",summa);
    $('#cadr_col_shop').text(count);

};
var arr = [{
    "id": 1,
    "time": "<p><strong>График работы:</strong> ПН-ВС с 9:00 до 23:00</p>",
    "title": "ПивАссортимент на Чехова, 43",
    "body": "<p><strong>Как найти:</strong> пересечение ул. Чехова и пер. Некрасовского, новое девятиэтажное здание, напротив «ВИСТ-Таганрог»<br><strong>Трамваи:</strong> 1-3, 2, 3, 5, 8, 9 (остановка «Радиотехнический университет»)<br><strong>М/Т:&nbsp;</strong>6, 60, 73 (остановка на пер. Некрасовском)</p>"
},
    {
        "id": 1,
        "title": "ПивАссортимент на Украинском, 19",
        "time": "<p><strong>График работы:</strong> ПН-ВС с 9:00 до 23:00</p>",
        "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
    },
    {
        "id": 1,
        "title": "Айдасеть на Петровской, 14",
        "time": "<p><strong>График работы:</strong> ПН-ВС с 9:00 до 23:00</p>",
        "body": "<p><strong>Как найти:</strong> напротив магазина Айдасеть на Александровской, 40В<br><strong>Трамваи:</strong> 1-3, 2, 3, 5, 8, 9 (остановка «Октябрьская площадь»)<br><strong>М/Т:&nbsp;</strong>6, 60, 73 (остановка на пер. Украинском)</p>"
    }];

//$.cookie('masss',[arr]);
//alert($.cookie('masss')+'////');

/*
обновленная работа с корзиной при добавлении
 +через куки
 -через сессии
 -через обьекты
 */

$(document).on('click', '.product_fav', function () {
    //поиск товара в текушей корзине

    if ($.inArray($(this).attr("data-id"), $.cookie('cadr_list'))) {

       /* $.cookie('cadr_list') = jQuery.grep($.cookie('cadr_list'), function (value) {
            return value != $(this).attr("data-id");
        });*/
        if (count($.cookie('cadr_list')) == 0){
            Card_Clear();
        } else {
            Card_Bild();
        }
    } else {
        Card_Bild();
    }
});

function Card_Bild() {
    alert("Card_Bild");
    $('#cadr_col_shop').html(count($.cookie('cadr_list')));
    $('.cart_price').attr("data-price", $.cookie('cart_price'));
}
function Card_Clear() {
    alert("Card_Clear");
    $('.cart_price').html('');
    $("div.cart_count").remove();
}

//глобальный модуль
function count(obj) {
    var count = 0;
    for(var prs in obj)
    {
        if(obj.hasOwnProperty(prs)) count++;
    }
    return count;
}


/*
рендеринг корзины при старте  глобальный
 +через куки
 -через сессии
 -через обьекты
*/


