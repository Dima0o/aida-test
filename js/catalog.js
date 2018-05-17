//работа с ффильрром для категории
//найстройка фильтраф свойств для категории

$(document).on('click', '#superid', function () {
//рабочий элемент
    showHotels();
});
//работа с сортировкой товаров     //2и подргузка при скролинге или клике
$(document).on('click', '.href_sort1', function () {
    var items = [];
    //  alert($(this).attr("data-sort"));
    $("input:checked").each(function (id) {
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
            items.push('<div class="product_item is_new " data-category="post-transition">\n' +
   '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
   '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 182px;height: 182px;" src="' + val.img + '" alt=""></div>\n' +
   '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
   '\t\t\t\t\t\t\t\t\t<div class="product_price" >' + val.price + ' руб.</div>\n' +
   '\t\t\t\t\t\t\t\t\t<div class="product_name name"><div><a href="product.php?id=' + val.id + '" tabindex="0">' + val.name.substr(0, 20) + '</a></div></div>\n' +
   '\t\t\t\t\t\t\t\t</div>\n' +
   '\t\t\t\t\t\t\t\t<div class="product_fav" data-add="0" data-price="' + val.price + '"  data-id="' + val.id + '"><i class="fas fa-heart"></i></div>\n' +
   '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
   '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
   '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' +
   '\t\t\t\t\t\t\t\t</ul>\n' +
   '\t\t\t\t\t\t\t</div>');
        });
        $('#result').html(items);
        $('#products_found').text(data['data'].length);
    });
});
$(document).on('click', '.wishlist_content', function () {
    $.cookie('cadr_list', null);
    $.cookie('cadr_price', 0);
    Card_Clear();
});
function showHotels() {
    var items = [];
    $("input:checked").each(function (id) {
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
function Catalog_bild() {
    var ids=1;
    $.ajax({
        method: "POST",
        url: "dev/categore.php",
        dataType: 'json',
        data: {id: ids},
    }).done(function (data) {
        product_category(data);
    });
}
function product_category(data) {
    var items = [];
    $.each(data['data'], function (key, val) {
        if (val.tipe == 1) {
            var tupe = '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
   '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n';
        } else if (val.tipe == 2) {
            var tupe = '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
   '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n';
        } else {
            var tupe = '';
        }
        var buttonBuy = '<button type="button" data-add="1" class="btn btn-sm btn-outline-warning">Купить</button>';

        var Whishlist = $('<button/>', {
            text: '<i class="icon-heart"></i>',
            //title:'Whishlist',
            class: 'btn',
            click: function() {
                alert($(this).attr('data-system-id'));
            },
            'data-system-id': 100,
            //'data-toggle':,
            'data-system-id': 100,
            'data-toggle':'tooltip'

        });

       /* $('<div>', {
            class: 'grid-item',
            append: $('<div>').add(
                .add($('<div>',{class:'product-badge text-danger',text:'50% Off'}))
                .add( $('<a>',{class:'product-thumb'}.add($('<img>'){src:'img/shop/products/01.jpg',alt:val.name})))
                .add($('<h3>',{class:'product-title'}.add($('<a>'){href:'#',text:val.name})))
                .add($('<h4>',{class:'product-price',text:val.price+' руб.'}))
                /*append: $('<div>'),{class:'product-buttons',html:' <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="icon-heart"></i></button>\n' +
                '                    <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>'}
            }        }))
            .appendTo('#catalog');
            */

        var product_badge = $('<div>',{class:'product-badge text-danger',text:'50% Off'});
        var product_thumb =  $('<a>',{class:'product-thumb' ,html:$('<img>',{src:'img/shop/products/01.jpg',alt:val.name})});
        var product_title = $('<h3>',{class:'product-title', html:$('<a>',{href:'#',text:val.name})});
        var product_price = $('<h4>',{class:'product-price',text:val.price+' руб.'})
        var product_buttons = '<button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="icon-heart"></i></button>' +
            '<button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>';

        /*$('<div>', {
            class: 'grid-item',
            html: product_badge+product_thumb+product_title+product_price+product_buttons
        }).appendTo('#catalog');});*/
       $('#catalog').append($('<div>').append($('<div>').append(product_badge,product_thumb,product_title,product_price,product_buttons).addClass('product-card')).addClass('grid-item'));

    });
           // class: 'grid-item',.appendTo('#catalog');});
          //  append: product_badge+product_thumb+product_title+product_price+product_buttons
            //  })
        var elementJq = $('<div/>', {
            title: 24,
            text: 24,
            class: 'item',
            click: function() {
                alert($(this).attr('data-system-id'));
            },
            // если jQuery не находит метода с таким названием
            // то вставляет атрибут
            'data-system-id': 100,
            'hh_hh_hh': true,
        });
  //  console.log(elementJq);});

    /*/**/
        //var grid_item=
        //$('#wrapper').append(grid_item);
      /*  $('<input>', {
            type: 'text',
            name: 'newTextField',
            title: 'Вводи в меня! Вводи в меня полностью!',
            css: {
                position: 'relative',
                top: '50px'
            },
            val: 50,
        }).appendTo('#wrapper');
*/
      //  $('#wrapper').append(elementJq).append(elementClassic);
     /*   $('#catalog').append('<div class="grid-item">\n' +
            '<div class="product-card">\n' +
            '  <div class="product-badge text-danger">50% Off</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/01.jpg" alt="Product"></a>\n' +
            '  <h3 class="product-title"><a href="shop-single.html">'+val.name.slice(0,-3)+'</a></h3>\n' +
            '  <h4 class="product-price">\n' +
                val.price+
            '  </h4>\n' +
            '  <div class="product-buttons">\n' +
              Whishlist+
            '    <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="'+val.name+'" data-toast-message="В корзине">В корзину</button>\n' +
            '  </div>\n' +
            '</div>\n' +
            ' </div>');

            <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
            <div class="product-badge text-danger">50% Off</div>
            <a class="product-thumb"><img src="img/shop/products/01.jpg" alt="EVA Запарка банная Кладовая природы 20г Б21/212"></a>
                <h3 class="product-title"><a href="#">EVA Запарка банная Кладовая природы 20г Б21/212</a></h3>
            <h4 class="product-price">404 руб.</h4>
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist">            <i class="icon-heart"></i></button>
                <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
            </div>
    });*/
  //  console.log(Whishlist);
  //  $('#catalog').css('height','');
  //  $('#products_found').text(data['data'].length);

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
   '  <div class="sidebar_title" data-titel="categori">Категория</div>\n' +
   '  <ul class="sidebar_categories" id="sidebar_categories">\n' +
   '\n' +
   '  </ul>\n' +
   '           </div>');
            //console.log(data['data']);
            //$.each(data, function (key, val) {
            $.each(data['data'], function (key, val) {
   //   val random=random.m
   var status = '';
   if (val.id == id) {
       status = 'style="color: #ef7f1b;"';
   }
   items.push('<li><a href="?id=' + val.id + '" ' + status + '>' + val.name + '</a></li>');
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

$(document).on('click', '.btn-outline-warning', function () {
    if (Number($(this).parents(".babay").children(".col").children(".quantity").val()) > 0) {
        var cols = Number($(this).parents(".babay").children(".col").children(".quantity").val());
        var items = Number($(this).parents(".product_item").attr("data-id"));
    }

    if ($(this).attr('data-add') == 1) {
        $(this).parents(".babay").children(".col").children(".quantity").val(0);
    }
    console.log()
    $.ajax({
        method: "POST",
        url: "dev/card.php",
        data: {item: items, kol: cols, status: $(this).attr('data-add')},
        dataType: 'json'
    }).done(function (data) {
        Card_work(data);
    });
    if ($(this).attr('data-add') == 1) {
        $(this).removeAttr('style');
        $(this).attr('data-add', 0);
        col = 0;
    } else {
        $(this).attr('data-add', 1);
        $(this).css("background", "#ef7f1b");
    }
});


$(document).on('click', '.incr-btn-minus', function () {
    if (Number($(this).parents(".babay").children(".col").children(".quantity").val()) > 0) {
        var vall = Number($(this).parents(".babay").children(".col").children(".quantity").val()) - 1;
        $(this).parents(".babay").children(".col").children(".quantity").val(vall);
    }
});
$(document).on('click', '.incr-btn-pluse', function () {
    var vall = Number($(this).parents(".babay").children(".col").children(".quantity").val()) + 1;
    $(this).parents(".babay").children(".col").children(".quantity").val(vall);
});


$(document).on('click', '.product_fav', function () {

    /*$.ajax({
        method: "POST",
        url: "dev/card.php",
        data: {item: $(this).attr('data-id'), col: 1, status: $(this).attr('data-add')},
        dataType: 'json'
    }).done(function (data) {
        Card_work(data);
    });*/

    setLocation($(this).attr('data-id'));
});

/**
 заменить иконки
 разнести скрипты по файлам чтобы меньше путатся
 подчистить коменты
 страницу сделать корзину
 страница товара подправить
 сделать иконки другие

 */

//работа с полноценной сортировкой
/*
*
######## изменение (редактирование) Url без перезагрузки

Набор методов JS позволяющих легко манипульровать GET параметрами в адресной строке без перезагрузки страницы.

$.urlVar('page') - вернёт значение GET параметра page или если такого не существует - undefined
$.urlVar('page',value) - устаноавливает значение GET параметра page= value
$.delUrlVal('page') - удаляет GET параметр page из url
$.getUrlVars() - возвращает имена(идексы) всех GET параметров
*/
function setLocation(curLoc){
    try {
        history.pushState(null, null, curLoc);

        history.pushState({param: 'Value'}, '', 'myurl.html');
        window.history.pushState('page2', 'Title', '/page2.php');
        return;
    } catch(e) {}
    //location.hash = location.hash + curLoc;

}
 //получить


function getCheckedCheckBoxes() {
    var checkboxes = document.getElementsByClassName('checkbox');
    var checkboxesChecked = []; // можно в массиве их хранить, если нужно использовать
    for (var index = 0; index < checkboxes.length; index++) {
        if (checkboxes[index].checked) {
            checkboxesChecked.push(checkboxes[index].value); // положим в массив выбранный
            alert(checkboxes[index].value); // делайте что нужно - это для наглядности
        }
    }
    return checkboxesChecked; // для использования в нужном месте
}



//работа с сортировкой товаров     //2и подргузка при скролинге или клике
$(document).on('click', '.href_sort', function () {
    $('#result').remove();
    $.ajax({
        method: "POST",
        url: "dev/categore.php",
        data: {name: 1 , sort:$(this).attr("data-sort")},
        dataType: 'json'
    }).done(function (data) {
        $('#result').html('<h1>Рендер</h1>');
        console.log('//'+data.titel);
        product_category(data);
    });
});

//https://www.dns-shop.ru/my-feedback-tickets/ticket/view/?guid=fd00dc13-1a91-4090-9093-6e20d65c3d52