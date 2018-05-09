
//работа с ффильрром для категории
//найстройка фильтраф свойств для категории

$(document).on('click', '#superid', function () {
//рабочий элемент
    showHotels();
});
//работа с сортировкой товаров     //2и подргузка при скролинге или клике
$(document).on('click', '.href_sort', function () {
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
            items.push('<div class="product_item is_new" data-category="post-transition">\n' +
                '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 182px;height: 182px;" src="'+val.img+'" alt=""></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_price" >' + val.price + ' руб.</div>\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_name name"><div><a href="product.php?id='+val.id+'" tabindex="0">' + val.name.substr(0, 20) + '</a></div></div>\n' +
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
//https://github.com/akkez/perekrestok

//очистака корзины пр клике на отсеченый товар или просто очистить корзину
$(document).on('click', '.wishlist_content', function () {
    $.cookie('cadr_list',null);
    $.cookie('cadr_price', 0);
    Card_Clear();
});



//работа с фильтром
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



function   Catalog_bild(ids) {
    $.ajax({
        method: "POST",
        url: "dev/categore.php",
        dataType: 'json',
        data: {id: ids},
    }).done(function (data) {
        var items = [];
        $.each(data['data'], function (key, val) {
            /*items.push('<div class="col-md-3">\n' +
                '\t<figure class="card card-product">\n' +
                '\t\t<div class="img-wrap"> \n' +
                '\t\t\t<img src="'+val.img+'">\n' +
                //'\t\t\t<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>\n' +
                '\t\t</div>\n' +

                '\t</figure> <!-- card // -->\n' +
                '</div> ');*/
                         if(val.tipe==1){
                             var tupe='\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
                                 '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' ;
                         }else if(val.tipe==2){
                             var tupe='\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
                                 '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' ;
                         }else {
                             var tupe='';
                         }
  /*            items.push('<div class="product_item is_new" data-category="post-transition">\n' +
                '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 182px;height: 182px;" src="'+val.img+'" alt=""></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_price" >' + val.price + ' руб.</div>\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_name name">' +
                  '                             <a href="product.php?id='+val.id+'" tabindex="0">' + val.name.substr(0, 20) + '</a>' +
                  '                         </div>' +
                                //'</div>\n' +
                '\t\t\t\t\t\t\t\t</div>\n' +
               // '\t\t\t\t\t\t\t\t<div class="product_fav" data-add="0" data-price="' + val.price + '"  data-id="' + val.id + '"><i class="fas fa-heart"></i></div>\n' +
                '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
                  tupe+
                '\t\t\t\t\t\t\t\t</ul>\n' +
               /*   '\t\t<figcaption class="info-wrap">\n' +
                  '\t\t\t<div class="action-wrap">\n' +
                  '\t\t\t\t<a href="#" id="card-add" class="btn btn-success btn-sm float-right">В корзину</a>\n' +
                  '\t\t\t\t<div class="price-wrap h5">\n' +
             //     '\t\t\t\t\t<span class="price-new">' + val.price + '</span>\n' +
                //  '\t\t\t\t\t<del class="price-old">$1980</del>\n' +
                  '\t\t\t\t</div> <!-- price-wrap.// -->\n' +
                  '\t\t\t</div> <!-- action-wrap -->\n' +
                  '\t\t</figcaption>\n' +*/
/*
                '\t\t\t\t\t\t\t</div>');
                         this.elem='';
*/
             var buttonBuy='<button type="button" data-add="1" class="btn btn-sm btn-outline-warning">Купить</button>';
          /*  var buttonBuy =$('<button/>', {
                type:'button',
                text:'Купить',
                class: 'btn btn-sm btn-outline-warning',
                click: function() {
                    alert($(this).attr('data-system-id'));

                },
                'data-system-id': 100,
            });*/
            $('#result').append('<div class="product_item is_new" data-id="'+val.id+'" data-category="post-transition">\n' +
                '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 182px;height: 182px;" src="'+val.img+'" alt=""></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_price" >' + val.price + ' руб.</div>\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_name name"><div><a href="product.php?id='+val.id+'" tabindex="0">' + val.name.substr(0, 20) + '</a></div></div>\n' +
                '<div class="row babay" >' +
                '<div class="col">'+
                '                                <p class="incr-btn-minus" style=" font-size: 19px; display: inline-block; " data-action="decrease" href="#">–</p>\n' +
                '                                <input style="width: 53px; text-align: center; display: inline-block;" class=" form-control form-control-sm quantity inputGroup-sizing-sm" type="text" name="quantity" value="1"/>\n' +
                '                                <p class="incr-btn-pluse" style="font-size: 19px; display: inline-block; " data-action="increase" href="#">&plus;</p>\n' +
                '</div> ' +
                '<div class="col">'+buttonBuy+'</div> ' +
                '</div>'+
                '\t\t\t\t\t\t\t\t</div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_fav" data-add="0" data-price="' + val.price + '"  data-id="' + val.id + '"><i class="fas fa-heart"></i></div>\n' +
                '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' +
                '\t\t\t\t\t\t\t\t</ul>\n' +
                '\t\t\t\t\t\t\t</div>');

            /*var elementProd =$('<div/>', {
                class: 'product_border',
                click: function() {
                    alert($(this).attr('data-system-id'));
                },
                'data-system-id': 100,
            });*/
            /*var elementJq = $('<div/>', {
                title: val.id,
                html: elementProd,
                category:'',
                class: 'product_item is_new',
                click: function() {
                    alert($(this).attr('data-system-id'));
                },
                'data-system-id': 100,
            });*/


            /*
            * <div class="product_item is_new" data-category="post-transition">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 182px;height: 182px;" src="undefined" alt=""></div>
								<div class="product_content">
									<div class="product_price">100 руб.</div>
									<div class="product_name name"><div><a href="product.php?id=1" tabindex="0">Распродажа Водка Киз</a></div></div>
								</div>
								<div class="product_fav" data-add="0" data-price="100" data-id="1"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
									<li class="product_mark product_discount">-25%</li>
									<li class="product_mark product_new">new</li>
								</ul>
							</div>*/


      //      $('#result').append(elementJq);
           // $('<div>', element).appendTo('#result');
        });
       // $('#result').append(items);
        $('#products_found').text(data['data'].length);
       // alert('Построилось');
    });
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
    alert($(this).parents(".product_item").attr("data-id")+''+$(this).attr('data-add'));
    if(Number($(this).parents(".babay").children(".col").children(".quantity").val())>0){
        var items=Number($(this).parents(".babay").children(".col").children(".quantity").val());
        var col=Number($(this).parents(".product_item is_new").attr("data-id"));
    }
        if($(this).attr('data-add')==1){
            $(this).removeAttr( 'style' );
            $(this).attr('data-add',0);
            col=0;
        }else{
            $(this).attr('data-add',1);
            $(this).css("background", "#ef7f1b");
        }
        $.ajax({
            method: "POST",
            url: "dev/card.php",
            data: {item:items ,col: cols,type:$(this).attr('data-add')},
            dataType: 'json'
        }).done(function (data) {
            Card_work(data);
        });

    });



$(document).on('click', '.incr-btn-minus', function () {
    //  alert(1);
    if(Number($(this).parents(".babay").children(".col").children(".quantity").val())>0) {
        var vall = Number($(this).parents(".babay").children(".col").children(".quantity").val()) - 1;
        $(this).parents(".babay").children(".col").children(".quantity").val(vall);
    }
});

$(document).on('click', '.incr-btn-pluse', function () {
    //  alert(1);
   // if(Number($(this).parents(".babay").children(".col").children(".quantity").val())!=0){
        var vall=Number($(this).parents(".babay").children(".col").children(".quantity").val())+1;
        $(this).parents(".babay").children(".col").children(".quantity").val(vall);
    //}

});


$(document).on('click', '#card-add', function () {
    if($(this).attr('data-add')==1){
        $(this).removeAttr( 'style' );
        $(this).attr('data-add',0);
        //$(this).css("background", getRandomColor());
    }else{
        $(this).attr('data-add',1);
        $(this).css("background", "#ef7f1b");
    }
    $.ajax({
        method: "POST",
        url: "dev/card.php",
        data: {item: $(this).attr('data-id'),col: 1,status:$(this).attr('data-add')},
        dataType: 'json'
    }).done(function (data) {
        /*var items = [];
        $.each(data['data'], function (key, val) {
            items.push('<div class="product_item is_new" data-category="post-transition">\n' +
                '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_' + Math.floor((Math.random() * 10) + 1) + '.jpg" alt=""></div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_price" >' + val.price + ' руб.</div>\n' +
                '\t\t\t\t\t\t\t\t\t<div class="product_name name"><div><a href="product.php?id='+val.id+'" tabindex="0">' + val.name.substr(0, 20) + '</a></div></div>\n' +
                '\t\t\t\t\t\t\t\t</div>\n' +
                '\t\t\t\t\t\t\t\t<div class="product_fav" data-add="0" data-price="' + val.price + '"  data-id="' + val.id + '"><i class="fas fa-shopping-basket"></i></div>\n' +
                '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
                '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' +
                '\t\t\t\t\t\t\t\t</ul>\n' +
                '\t\t\t\t\t\t\t</div>');*/

        Card_work(data);
    }); });$(function(){

    $('.spinner .btn:first-of-type').on('click', function() {
        var btn = $(this);
        var input = btn.closest('.spinner').find('input');
        if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
            input.val(parseInt(input.val(), 10) + 1);
        } else {
            btn.next("disabled", true);
        }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
        var btn = $(this);
        var input = btn.closest('.spinner').find('input');
        if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
            input.val(parseInt(input.val(), 10) - 1);
        } else {
            btn.prev("disabled", true);
        }
    });

});
$(".incr-btn").on("click", function (e) {
    var $button = $(this);
    var oldValue = $button.parent().find('.quantity').val();
    $button.parent().find('.incr-btn[data-action="decrease"]').removeClass('inactive');
    if ($button.data('action') == "increase") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below 1
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
            $button.addClass('inactive');
        }
    }
    $button.parent().find('.quantity').val(newVal);
    e.preventDefault();
});
