//работа с ффильрром для категории
//найстройка фильтраф свойств для категории
$(document).on('click', '#superid', function() {
    //рабочий элемент
    showHotels();
});
//работа с сортировкой товаров//2и подргузка при скролинге или клике
$(document).on('click', '.href_sort1', function() {
    var items = [];
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
   data: {
  name: items
   },
   dataType: 'json'
    }).done(function(data) {
   var items = [];
   $.each(data['data'], function(key, val) {
  items.push('<div class="product_item is_new " data-category="post-transition">' +
 '\t\t\t\t\t\t\t\t<div class="product_border"></div>' +
 '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 182px;height: 182px;" src="' + val.img + '" alt=""></div>' +
 '\t\t\t\t\t\t\t\t<div class="product_content">' +
 '\t\t\t\t\t\t\t\t\t<div class="product_price" >' + val.price + ' руб.</div>' +
 '\t\t\t\t\t\t\t\t\t<div class="product_name name"><div><a href="product.php?id=' + val.id + '" tabindex="0">' + val.name.substr(0, 20) + '</a></div></div>' +
 '\t\t\t\t\t\t\t\t</div>' +
 '\t\t\t\t\t\t\t\t<div class="product_fav" data-add="0" data-price="' + val.price + '"  data-id="' + val.id + '"><i class="fas fa-heart"></i></div>' +
 '\t\t\t\t\t\t\t\t<ul class="product_marks">' +
 '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>' +
 '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>' +
 '\t\t\t\t\t\t\t\t</ul>' +
 '\t\t\t\t\t\t\t</div>');
   });
   $('#result').html(items);
   $('#products_found').text(data['data'].length);
    });
});
$(document).on('click', '.wishlist_content', function() {
    $.cookie('cadr_list', null);
    $.cookie('cadr_price', 0);
    Card_Clear();
});

function showHotels() {
    var items = [];
    $("input:checked").each(function(id) {
   items.push($(this).data("filter"));
    });
    console.log(items);
    $("#products_found").attr("data-size", "products_found").text(items);
    $.ajax({
   method: "POST",
   url: "dev/some.php",
   data: {
  name: items,
  location: "Boston"
   },
   dataType: 'json'
    }).done(function(msg) {
   alert("Data Saved: " + msg);
    });
}

function Catalog_bild() {

    var ids = 1;

    $.ajax({
   method: "POST",
   url: "dev/output.php",
   //url: "dev/categore.php",
   dataType: 'json',
   data: {
  keys:f(keys),
  id: ids


   },
    }).done(function(data) {
   product_category(data);
    });
}

function product_category(data) {
    var items = [];
    $.each(data['data'], function(key, val) {
   if (val.event != null) {
  var product_badge = $('<div>', {
 class: val.event.class,
 text: val.event.name
  });
   } else {
  product_badge = '';
   }

   var product_thumb = $('<a>', {
  class: 'product-thumb',
  html: $('<img>', {
 src: 'img/shop/products/0'+Math.floor((Math.random() * 9) + 1)+'.jpg',
 alt: val.name
  })
   });
   var product_title = $('<h3>', {
  class: 'product-title',

  html: $('<a>', {
 href: '#',
 click: function() {
//переход
Page_Bild($(this).attr('data-item'));
 },
 'data-item':val.id,
 text: val.name.substring(0, 20)

  })
   });
   var product_price = $('<h4>', {
  class: 'product-price',
  text: val.price + ' руб.'
   })
   //лайк
   var Whishlist = $('<button>', {
  html: '<i class="icon-heart"></i>',
  //title:'Whishlist',
  class: 'btn btn-outline-secondary btn-sm btn-wishlist',
  click: function() {
 //лайки
  },
  'data-id': val.id,
  'data-add': 0,
  'data-toast': '1',
  'data-toast-type': 'success',
  'data-toast-position': 'topRight',
  'data-toast-icon': 'icon-circle-check',
  'data-toast-title': 'Product',
  'data-toast-message': 'successfuly added to cart!',
  'data-toggle': 'tooltip'
   });
   //кашелка
   var Product = $('<button>', {
  html: val.status.html,

  click: function() {
 Product_add($(this), 1);
  },
  //   role: 'alert',
  //  class: 'btn btn-outline-warning btn-sm',
  'data-id': val.id,
  class: val.status.class,
  'data-add': val.status.add,
  // 'data-toast': 3,
  // 'data-toast-type': 'danger',
  // 'data-toast-position': 'topRight',
  // 'data-toast-icon': 'icon-circle-check',
  // 'data-toast-title': val.name,
  // 'data-toast-message': 'добавлен в корзину',
  // 'data-toggle': 'tooltip'
   });
   $('#catalog').append($('<div>').append($('<div>').append(product_badge, product_thumb, product_title, product_price, Whishlist, Product).addClass('product-card')).addClass('grid-item col-md-4'));
    });
    $(this).css("background", "#ef7f1b");
    $('#catalog').css('height', 'auto');
    document.title = data.titel;

    //console.log($('.shop-sorting').last());
}


//то что падает в корзину не важно что
function Product_add(elelm, cols) {
    //if (Number($(this).parents(".babay").children(".col").children(".quantity").val()) > 0) {
    //  var cols = Number($(this).parents(".babay").children(".col").children(".quantity").val());
    // var items = Number($(this).parents(".product_item").attr("data-id"));
    //alert($("#card").hasClass("count"));
    // alert($('#count').html());
    // var test = $.cookie('token');
    $.ajax({
   method: "POST",
   url: "dev/card.php",
   data: {
  item: elelm.attr('data-id'),
  kol: cols,
  status: elelm.attr('data-add')
   },
   dataType: 'json'
    }).done(function(data) {
   Card_work(data);
    });

    if (elelm.hasClass('btn-outline-warning')) {
   elelm.removeClass('btn-outline-warning').addClass('btn-success');
   elelm.html('<i class="icon-bag"></i> В корзине');
   elelm.attr('data-add', 1);
    } else if (elelm.hasClass('btn-success')) {
   elelm.removeAttr('style');
   elelm.attr('data-add', 0);
   elelm.removeClass('btn-success').addClass('btn-outline-warning');
   elelm.html('<i class="icon-bag"></i> В корзину');
    }
}
// глобаольное получение  параметров
/**-/
 *

 console.log(keys);*/

var search = window.location.search.substr(1),
    keys = {};

search.split('&').forEach(function(item) {
    item = item.split('=');
    keys[item[0]] = item[1];
});

function f() {
    return Array.from(arguments);
}



function Categori_ui(id) {

    return $.ajax({
   url: 'dev/category.php?id="' + id + '"',
   type: 'GET',
   //data:id,
   dataType: 'json',
   success: function(data) {
  var items = [];
  $('.shop_sidebar').prepend('<div class="sidebar_section">' +
 '  <div class="sidebar_title" data-titel="categori">Категория</div>' +
 '  <ul class="sidebar_categories" id="sidebar_categories">' +
 '  </ul>' +
 ' </div>');
  //console.log(data['data']);
  //$.each(data, function (key, val) {
  $.each(data['data'], function(key, val) {
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
   error: function() {
  alert('Выполненно с ошибками или категория пустая getIssues_id');
   }
    });

}

$(document).on('click', '.incr-btn-minus', function() {
    if (Number($(this).parents(".babay").children(".col").children(".quantity").val()) > 0) {
   var vall = Number($(this).parents(".babay").children(".col").children(".quantity").val()) - 1;
   $(this).parents(".babay").children(".col").children(".quantity").val(vall);
    }
});
$(document).on('click', '.incr-btn-pluse', function() {
    var vall = Number($(this).parents(".babay").children(".col").children(".quantity").val()) + 1;
    $(this).parents(".babay").children(".col").children(".quantity").val(vall);
});


$(document).on('click', '.product_fav', function() {
    setLocation($(this).attr('data-id'));
});
/*/
function setLocation(curLoc) {
    try {
   history.pushState(null, null, curLoc);

   history.pushState({
  param: 'Value'
   }, '', 'myurl.html');
   window.history.pushState('page2', 'Title', '/page2.php');
   return;
    } catch (e) {}
}*/

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
//работа с сортировкой товаров//2и подргузка при скролинге или клике
$(document).on('click', '.href_sort', function() {
    $('#result').remove();
    $.ajax({
   method: "POST",
   url: "dev/output.php",
   //url: "dev/categore.php",
   cache: false,
   data: {
  name: 1,
  sort: $(this).attr("data-sort")
   },
   dataType: 'json'
    }).done(function(data) {
   $('#result').html('<h1>Рендер</h1>');
   console.log('//' + data.titel);
   product_category(data);
    });
});
//каталог товаров с вложенностью
function categoru_list() {
    $.ajax({
   method: "POST",
   url: "dev/category.php",
   cache: false,
   //data: {},
   dataType: 'json'
    }).done(function(data) {
   $.each(data, function(key, val1) {
  $.each(val1['item'], function(key, val) {
 // работа с перезагрузкой  категории  и передавать туда категорию для формирования  даты
 //переделать компонет для  события клик
 //работа с активным типом  через юрл в ответе
   /*   lincs = $('<a>', {
href: '#',
text: val.name,
click: function() {
    alert($(this).attr('data-id'));
},
'data-id': val.url
 });
 var list = $('<li>', {
class:'has-children expanded',
app
click: function() {
    Product_add($(this).attr('data-add'), $(this).attr('data-id'), $(this), 1);
},
'data-id': val.id,
'data-add': val.id
 });
    /*  $('#widget-categories-2').append($('<li>')
.addClass('has-children expanded')
.append($('<a>')
    .text(val.name), '<span>'+val.col+'</span>')).click(EntryCategory(val.uid));
*/
 // старый подход


 ///новый подход
 $('<li>', {
 class:'has-children expanded',
on: {
    click: function(event){
   EntryCategory(val.id);
    }
    //,
   /* mouseover: function(event){
   alert("На меня навели мышку");
   $(this).off('mouseover');
    }*/
},
append: $('<a>',{
    text:val.name
}).add($('<span>',
   {
  text: val.col
   }))

 })
.appendTo('#widget-categories-2');

  });
   });
    });
}
function  EntryCategory(id) {
  //  alert(id);
    var ids = id;
    $.ajax({
   method: "GET",
   url: "dev/output.php",
   //url: "dev/categore.php",
   dataType: 'json',
   data: {

  id: ids,
  keys:f(keys)
   },
    }).done(function(data) {
   $("#catalog").html('');
   product_category(data);
   //alert(location.href+'?categoru='+id);
   //location.href=location.href=bla-bla;
   setLocation('?categoru='+ids);

   $('#nav-bars').show();
   $('.pagination').show();
   //return false;
   //return false;
    });
}

function delPrm(Url,Prm) {
    var a=Url.split('?');
    var re = new RegExp('(\\?|&)'+Prm+'=[^&]+','g');
    Url=('?'+a[1]).replace(re,'');
    Url=Url.replace(/^&|\?/,'');
    var dlm=(Url=='')? '': '?';
    return a[0]+dlm+Url;
};
function setLocation(curLoc){

    history.pushState({}, '', curLoc);
    //проверку на профаил страницу
    /*history.pushState({}, '', curLoc2);
    var url=location.hash;

   // url=delPrm(url,'undfined');
    try {
   history.pushState(null, null,  delPrm(url,curLoc1)+'='+curLoc2);
   return;
    } catch(e) {}
    location.hash = '#' +  delPrm(url,curLoc1)+'='+curLoc2;*/
}
// работа с профилем товара
function Page_Bild(id){
    $.ajax({
   method: "GET",
   url: "dev/output.php",
   //url: "dev/categore.php",
   dataType: 'json',
   data: {
  profile: id
   },
    }).done(function(data) {
   $("#catalog").html('');
   product_hide(data);

    });
};
function product_hide(data) {
    var items = [];
    //$(this).css("background", "#ef7f1b");
    //$('#catalog').css('height', 'auto');
    document.title = data.titel;
    $.each(data['data'], function(key, val){


    let Product = $('<button>', {
   html: val.status.html,

   click: function() {
  Product_add($(this), 1);
   },
   //   role: 'alert',
   //  class: 'btn btn-outline-warning btn-sm',
   'data-id': val.id,
   class: val.status.class,
   'data-add': val.status.add,
   // 'data-toast': 3,
   // 'data-toast-type': 'danger',
   // 'data-toast-position': 'topRight',
   // 'data-toast-icon': 'icon-circle-check',
   // 'data-toast-title': val.name,
   // 'data-toast-message': 'добавлен в корзину',
   // 'data-toggle': 'tooltip'
    });
  setLocation('?profile='+val.id);
   $('#catalog').html('<div class="col-md-6">' +
   ' <div class="product-gallery">' +
   //'<span class="product-badge text-danger">30% Off</span>' +
   '<div class="gallery-wrapper" data-pswp-uid="1">' +
   '    <div class="gallery-item active">' +
   '   <a href="img/shop/single/01.jpg" data-hash="one" data-size="1000x667"></a>' +
   '    </div>' +
   '    <div class="gallery-item">' +
   '   <a href="img/shop/single/02.jpg" data-hash="two" data-size="1000x667"></a>' +
   '    </div>' +
   '    <div class="gallery-item">' +
   '   <a href="img/shop/single/03.jpg" data-hash="three" data-size="1000x667"></a>' +
   '    </div>' +
   '    <div class="gallery-item">' +
   '   <a href="img/shop/single/04.jpg" data-hash="four" data-size="1000x667"></a>' +
   '    </div>' +
   '    <div class="gallery-item">' +
   '   <a href="img/shop/single/05.jpg" data-hash="five" data-size="1000x667"></a>' +
   '    </div>' +
   '</div>' +
   '<div class="product-carousel owl-carousel owl-loaded owl-drag">' +
   '    ' +
   '    ' +
   '    ' +
   '    ' +
   '    ' +
   '<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: 0.25s; width: 2616px;"><div class="owl-item active" style="width: 523.031px;"><div data-hash="one">' +
   '   <img src="img/shop/single/01.jpg" alt="Product">' +
   '    </div></div><div class="owl-item" style="width: 523.031px;"><div data-hash="two">' +
   '   <img src="img/shop/single/02.jpg" alt="Product">' +
   '    </div></div><div class="owl-item" style="width: 523.031px;"><div data-hash="three">' +
   '   <img src="img/shop/single/03.jpg" alt="Product">' +
   '    </div></div><div class="owl-item" style="width: 523.031px;"><div data-hash="four">' +
   '   <img src="img/shop/single/04.jpg" alt="Product">' +
   '    </div></div><div class="owl-item" style="width: 523.031px;"><div data-hash="five">' +
   '   <img src="img/shop/single/05.jpg" alt="Product">' +
   '</div></div></div></div><div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div></div><div class="owl-dots disabled"></div></div>' +
   '</div>' +
   '  </div>' +
   '  <!-- Product Info-->' +
   '  <div class="col-md-6">' +
   ' <div class="padding-top-2x mt-2 hidden-md-up"></div>' +
   ' <div class="rating-stars">' +
   '<i class="icon-star filled"></i>' +
   '<i class="icon-star filled"></i>' +
   '<i class="icon-star filled"></i>' +
   '<i class="icon-star filled"></i>' +
   '<i class="icon-star"></i>' +
   ' </div>' +
   ' <span class="text-muted align-middle">&nbsp;&nbsp;4.2 | 3 Отзывы покупателей</span>' +
   ' <h2 class="padding-top-1x text-normal">'+val.name+'</h2>' +
   ' <span class="h2 d-block">'+val.price +' руб</span>'+
   ' <p>'+val.about+'</p>' +
   ' ' +
   ' <div class="pt-1 mb-2">' +
   '<span class="text-medium"><b>штрих код:</b></span>'+val.code+'</div>' +
   '<div class="pt-1 mb-2">' +
   '<div class="pt-1 mb-2">' +
   '<span class="text-medium"><b>Производитель:</b></span>Бренд</div>' +
   '<div class="pt-1 mb-2">' +
   ' <div class="padding-bottom-1x mb-2">' +
   '<span class="text-medium"><b>Метки:&nbsp;</b></span>' +
   '<a class="navi-link" href="#">Men’s shoes,</a>' +
   '<a class="navi-link" href="#"> Snickers,</a>' +
   '<a class="navi-link" href="#"> Sport shoes</a>' +
   ' </div>' +
   ' <hr class="mb-3">' +
   ' <div class="d-flex flex-wrap justify-content-between">' +
   '<div class="entry-share mt-2 mb-2">' +
   '    <span class="text-muted">Поделиться:</span>' +
   '    <div class="share-links">' +
   '   <a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">' +
   '  <i class="socicon-facebook"></i>' +
   '   </a>' +
   '   <a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">' +
   '  <i class="socicon-twitter"></i>' +
   '   </a>' +
   '   <a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram">' +
   '  <i class="socicon-instagram"></i>' +
   '   </a>' +
   '   <a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google +">' +
   '  <i class="socicon-googleplus"></i>' +
   '   </a>' +
   '    </div>' +
   '</div>' +
   '<div id="sp-buttons" class="sp-buttons mt-2 mb-2">' +
   '    <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist">' +
   '   <i class="icon-heart"></i>' +
   '    </button>' +
   '</div>' +
   ' </div>' +
   '  </div>');
        $("#sp-buttons").append(Product);
    });

    //изменение

    //работа с катеорией убрать юрл

   // setLocation('?profile',val.id);
    //alert(location.hash);
    $('#nav-bars').hide();
    $('.pagination').hide();

    //console.log($('#catalog').html());

}

function Routing(data_in,data_out) {
    var str = '../images/patterns/0/0/1/1.png';
    //   str=data_in.replace(, '');
    //alert(location.hash);
    if(data_in!=data_out){

    };
}


//работа с  товаром
//работа с каталогом
/*
function Element (name, template, type) {
    this.name = name;
    this.type = type;  // <-- добавлена строка
    this.classes = ["formClass"];
    this.template = template;
};
// debugger;
function InputElement (name, template, type) {
    Element.call(this);
    this.type = type;
};
Element.prototype.draw = function (parentElement) {
    $Element = $(this.template);
    $Element.attr("name", this.name);
    $Element.addClass(this.classes.join(""));
    if( this.type) $Element.attr("type", this.type); // <-- исправлена строка
    $(parentElement).prepend($Element);
    return $Element;
};

var testForm = new Element("form", "<form></form>");
var testInput = new Element("input", "<input></input>", "password");
testForm.draw("body");
testInput.draw("form");*/
function titel(){
    $('.page-title').html('');
    //alert(1);
}
titel();