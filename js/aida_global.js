

function GlobalPage(power) {
    this.titel = 'Главаная';
    this.user = false;
    this.cart_shop = function () {
        this.cart = {count: '', total: '', item: [{name: '', price: '', col: ''}]};
    };
    this.Recently_Viewed = [{name: '', avatar: '', price: [''], item_discount: '', item_new: 1}];
    this.menu = ['Акции и скидки', 'Магазины', 'Помощь', 'О нас'];
    this.waterAmount = [];

    // физическая константа - удельная теплоёмкость воды для getBoilTime
    var WATER_HEAT_CAPACITY = 40;

    // расчёт времени для кипячения
    function getBoilTime() {
        return this.waterAmount * WATER_HEAT_CAPACITY * 80 / power; // ошибка!
    }

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
    function Categiru(data) {

        var items = [];
        $.each(data, function (key, val) {
            items.push('<li><a href="catalog.php?id='+val.id+'">'+val.name+'<i class="fas fa-chevron-down"></i></a></li>');
        });
        $('.cat_menu').html(items);
    }
    function Menu(data) {
            var items = [];
            $.each(data, function (key, val) {
                items.push('<li class="page_menu_item has-children"><a href="#">'+val+'<i class="fa fa-angle-down"></i></a></li>');
            });
        $('.page_menu_nav').html(items);
            var items = [];
            $.each(data, function (key, val) {
                items.push('<li><a href="index.html">'+val+'<i class="fas fa-chevron-down"></i></a></li>');
            });
        $('.main_nav_dropdown').html(items);
    }
    this.run = function () {
        Menu(this.Menu);
     //   Categiru(this.Category);
    };

}
function Global_categori() {
    $.getJSON("../dev/category_global.php", function (data) {
        var items = [];
        $.each(data, function (key, val) {
            items.push('<li><a href="categori.php?id='+val.id+'">'+val.name+'<i class="fas fa-chevron-down"></i></a></li>');
        });
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
function Prod_div(id) {
    return $.ajax({
        url: 'dev/categore.php?id="' + id + '"',
        type: 'GET',
        //data:id,
        dataType: 'json',
        success: function (data) {
            var items = [];
            /*$('.shop_sidebar').html('<div class="sidebar_section">\n' +
                '                            <div class="sidebar_title" data-titel="categori">Категория</div>\n' +
                '                            <ul class="sidebar_categories" id="sidebar_categories">\n' +
                '\n' +
                '                            </ul>\n' +
                '                        </div>');
            console.log(data['data']);*/
            //$.each(data, function (key, val) {
            $.each(data['data'], function (key, val) {
                items.push('<div class="product_item is_new" data-category="post-transition">\n' +
                    '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
                    '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_'+Math.floor((Math.random() * 10) + 1)+'.jpg" alt=""></div>\n' +
                    '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
                    '\t\t\t\t\t\t\t\t\t<div class="product_price">$'+val.price+'</div>\n' +
                    '\t\t\t\t\t\t\t\t\t<div class="product_name name"><div><a href="#" tabindex="0">'+val.name.substr(0,20)+'</a></div></div>\n' +
                    '\t\t\t\t\t\t\t\t</div>\n' +
                    '\t\t\t\t\t\t\t\t<div class="product_fav"><i class="fas fa-heart"></i></div>\n' +
                    '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
                    '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
                    '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' +
                    '\t\t\t\t\t\t\t\t</ul>\n' +
                    '\t\t\t\t\t\t\t</div>');
            });
            //});
            $('#result').html(items);
            //$('[data-size="products_found"]').text(data.length);
            //$('[data-titel="categori"]').text(data.titel);
        },
        error: function () {
            alert('Выполненно с ошибками или категория пустая getIssues_id');
        }
    });

}

/*<div class="sidebar_section">
                            <div class="sidebar_title" data-titel="categori">Категория</div>
                            <ul class="sidebar_categories" id="sidebar_categories">

                            </ul>
                        </div>*/
function Filter(id) {
    return $.ajax({
        url: 'dev/filter.json',
        type: 'GET',
        //data:id,
        dataType: 'json',
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
            $('.shop_sidebar').append('<a id="superid" class="btn btn-sm btn-warning btn-lg btn-block"  type="button">Фильтр <span class="caret"></span></a>');
        },
        error: function () {
            alert('Выполненно с ошибками или категория пустая Filter');
        }
    });

}
function log(){
    console.log('1');
};

$(document).on('click','#superid',function(){
//рабочий элемент
    showHotels();
});
function showHotels() {
    var items = [];
    $("input:checked").each(function(id) {
        //alert( $("body").data("bar"));
        items.push($(this).data("filter"));
    })
    console.log(items);
    $('data-size-products_found').text(items);
    //$("#result").load("resort.php", { 'resort[]': tagsArray });
}


var iso = new Isotope( '#result', {
    itemSelector: '.product-item',
    layoutMode: 'fitRows',
    getSortData: {
        name: '.name',
        weight: function( itemElem ) {
            var weight = itemElem.querySelector('.weight').textContent;
            return parseFloat( weight.replace( /[\(\)]/g, '') );
        }
    }
});

// bind sort button click
var sortByGroup = document.querySelector('.sort-by-button-group');
sortByGroup.addEventListener( 'click', function( event ) {
    // only button clicks
    if ( !matchesSelector( event.target, '.button' ) ) {
        return;
    }
    var sortValue = event.target.getAttribute('data-sort-value');
    iso.arrange({ sortBy: sortValue });
});

// change is-checked class on buttons
var buttonGroups = document.querySelectorAll('.button-group');
for ( var i=0; i < buttonGroups.length; i++ ) {
    buttonGroups[i].addEventListener( 'click', onButtonGroupClick );
}

function onButtonGroupClick( event ) {
    // only button clicks
    if ( !matchesSelector( event.target, '.button' ) ) {
        return;
    }
    var button = event.target;
    button.parentNode.querySelector('.is-checked').classList.remove('is-checked');
    button.classList.add('is-checked');
}
//https://codepen.io/desandro/pen/Wwabpr
//https://progschool.clickmeeting.com/2018-04-19_3966_22417
