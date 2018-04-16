$("#result").on("click", ".add", function () {
    var caunts = Number($('#cadr_number').html());
    caunts = caunts + 1;
    var conut = $('[data-role="container"]').css("height");
    conut = Number(conut.substr(0, conut.length - 2));
    if (conut + 80 > 270) {
        conut = 230;
    }
    else {
        conut = conut + 80;
    }
    ;
    $('#cadr_number').html(caunts);
    //var blok= $(this).closest(".panel");
    //console.log();
    $('[data-role="container"]').css({'height': '' + conut + 'px'});
    $('#card').append('<a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">\n' +
        '                      <div class="media">\n' +
        '                        <div class="media-left p-r-10">\n' +
        '                         <img class="card-img-top" src="../' + $(this).attr('src') + '">\n' +
        '                        </div>\n' +
        '                        <div class="media-body">\n' +
        '                          <h6 class="media-heading">' + $(this).attr('data-name') + '</h6>\n' +
        '                          <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">' + $(this).attr('data-price') + '</time>\n' +
        '                        </div>\n' +
        '                      </div>\n' +
        '                    </a>');
    //console.log(conut);
});

//каталог

//работа с получение категорий

function CategoreShow(e, uid) {
    Animation('#result');
    $.ajax({
        type: "POST",
        dataType: "json",
        data: "cat=" + uid,
        // url: 'lol.php',
        url: 'dev/caterori.php',
        success: function (data) {
            Bild_Blok(data, '#cat_muenu');
        }
    });
};

function PageCatalog1(uid) {
    PagePorfile(uid);
    // console.log($(this).attr('data-name'));
    var data = '<div class="page vertical-align text-xs-center layout-full" data-animsition-in="fade-in" data-animsition-out="fade-out">\n' +
        '  <div class="page-content vertical-align-middle">\n' +
        '    <i class="icon wb-tadpole icon-spin page-maintenance-icon" aria-hidden="true" style="font-size: 64px;"></i>\n' +
        '  </div>\n' +
        '</div>\n';
    //  $('#result').html(data);
    /* $.ajax({
       type: "POST",
       data: "primer=" + uid,
       url: 'app/profile.php',
       success: function(data) {
         $(".active").text('Продукты такие');
         $('#result').html(data);
         var arr = ["Яблоко", "Апельсин", "Груша"];


       }
     });*/
};

function PageCatalog(uid) {
    Animation("#result");
    $.getJSON("https://jsonplaceholder.typicode.com/users/" + uid, function (data) {
        {
            //console.log(data);
            Bild_Blok(data, "#result");
        }
    });
};

function Animation(id) {
    var data = ' <div class="example-loading example-well h-150 vertical-align text-xs-center">\n' +
        '                  <div class="loader vertical-align-middle loader-grill"></div>\n' +
        '                </div>';
    $(id).html(data);
}

function Bild_Blok(data, id) {
    // alert(typeof data);
    var items = [];

    $.each(data, function (key, val) {
        //   val random=random.m
        items.push('<!-- Product Item -->\n' +
            '\t\t\t\t\t\t\t<div class="product_item discount col-md-3">\n' +
            '\t\t\t\t\t\t\t\t<div class="product_border"></div>\n' +
            '\t\t\t\t\t\t\t\t<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="../images/featured_1.png" alt=""></div>\n' +
            '\t\t\t\t\t\t\t\t<div class="product_content">\n' +
            '\t\t\t\t\t\t\t\t\t<div class="product_price">$' + val.price + '<span>$' + val.price + '</span></div>\n' +
            '\t\t\t\t\t\t\t\t\t<div class="product_name"><div><a href="#" tabindex="0">' + val.name + '</a></div></div>\n' +
            '\t\t\t\t\t\t\t\t</div>\n' +
            '\t\t\t\t\t\t\t\t<div class="product_fav"><i class="fas fa-heart"></i></div>\n' +
            '\t\t\t\t\t\t\t\t<ul class="product_marks">\n' +
            '\t\t\t\t\t\t\t\t\t<li class="product_mark product_discount">-25%</li>\n' +
            '\t\t\t\t\t\t\t\t\t<li class="product_mark product_new">new</li>\n' +
            '\t\t\t\t\t\t\t\t</ul>\n' +
            '\t\t\t\t\t\t\t</div>');
    });
    $(id).html(items);
    $('[data-size="products_found"]').text(data.length);
    $('[data-titel="categori"]').text(data.titel);
}

function getRandomData(bellFactor) {
    var bellFactor = 100;

    //http://stackoverflow.com/questions/1295584/most-efficient-way-to-create-a-zero-filled-javascript-array


    return Math.floor((Math.random() * 1000000) + 1);
}

//конец работы с категориями
$('[data-toggle = categori]').click(function () {
    console.log(this);
    //     alert( "Handler for .click() called." );
    log()
});

//https://bootsnipp.com/snippets/yNWWa
//отрисовка профиля страницы
function errors(error, id) {
    $(id).html('<a class="btn btn-primary btn-round btn-xs" href="../index.html">Обновить ошибку</a>\n' + 'ошибка ' + error);
}

function menu_cat(data, id) {
    // var li='<li><a href="#">Computers & Laptops <i class="fas fa-chevron-right ml-auto"></i></a></li>';
    var items = [];
    $.each(data, function (key, val) {
        //   val random=random.m
        items.push('<li><a href="' + setLocation('#book/' + val.uid) + '">' + val.name + '</a></li>');
    });
    // alert(items);
    $(id).html(items);
}

//подгрузка главная при загрузке страницы
$(document).ready(function () {


    // getIssues();
    filter_bild();
    runPage(location.hash);
    /*$.getJSON("dev/catalog_new.php", function (data) {

    //
    });*/
    document.title = "Главная";
    ///	$('[data-titel=categori]').text('Категории');
    //  var menuActive = false;
    //var header = $('.header');

});

function getIssues() {
    return $.ajax({
        url: 'http://aida.k99969kp.beget.tech/dev/catalog_new.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            //console.log();
            Bild_Blok(data['data'], "#result");
        },
        error: function () {
            alert('Выполненно с ошибками getIssues');
        }
    });
}

function filter_bild() {
    return $.ajax({
        url: 'http://aida.k99969kp.beget.tech/dev/theme.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // console.log(data);
            var items = [];
            $.each(data, function (key, val) {
                //val random=random.m;
                var url = val.name;
                items.push('<li><a class="target" href="javascript:setLocation(' + val.id + ')" data-url="' + val.uid + '">' + val.name + '</a></li>');
                //  items.push('<li><a class="target" href="#" onclick="return setAttr('sort','name') data-url="'+val.uid+'">'+val.name+'</a></li>');
            });
            // alert(items);
            $("#sidebar_categories").html(items);
        },
        error: function () {
            alert('Выполненно с ошибками filter_bild');
        }
    });
}

function filter_date(id) {

    return $.ajax({
        url: 'http://aida.k99969kp.beget.tech/dev/theme.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            return data;
        }
    });
}

function setLocation(id) {
    $.getJSON("http://aida.k99969kp.beget.tech/dev/theme.php", function (data) {
        $.each(data, function (key, val) {
            //alert(val.uid+ "  "+ id);
            if (val.id == id) {
                // alert(val.id+ "  "+ id);
                //location.href ='/#/'+val.uid;
                //location.hash = '/#/'+val.uid;
                $("#result").html();
                getIssues_id(id);

                try {
                    history.replaceState(null, null, '?categori=' + id);
                }
                catch (e) {
                    location.hash = '#categori_' + id;
                }
            }
            //работа с категорией товаров для прорисовки
        });
    });
}

$("#search_button").click(function () {
    setLocation_all_page($("#search").val());
});

function setLocation_all_page(url) {
    //location.href ='/#/'+val.uid;
    //location.hash = '/#/'+val.uid;
    alert("href:" + location.href + "--hash:" + location.hash);
    location.hash = '#/' + url;
    $("#result").text(location.hash = '/' + url);
    // getIssues_id(val.uid);

}

function getIssues_id(id) {
    return $.ajax({
        url: 'http://aida.k99969kp.beget.tech/dev/index.php?catalog_id="' + id + '"',
        type: 'GET',
        //data:id,
        dataType: 'json',
        success: function (data) {
            Bild_Blok(data, "#result");
            $('[data-size="products_found"]').text(data.length);
            $('[data-titel="categori"]').text(data.titel);
        },
        error: function () {
            alert('Выполненно с ошибками или категория пустая getIssues_id');
        }
    });
}

function setAttr(prmName, val) {
    var res = '';
    var d = location.href.split("#")[0].split("?");
    var base = d[0];
    var query = d[1];
    if (query) {
        var params = query.split("&");
        for (var i = 0; i < params.length; i++) {
            var keyval = params[i].split("=");
            if (keyval[0] != prmName) {
                res += params[i] + '&';
            }
        }
    }
    res += prmName + '=' + val;
    window.location.href = base + '?' + res;
    return false;
}

function changeHash(id) {

    try {
        history.replaceState(null, null, '?categori=' + id);
    }
    catch (e) {
        location.hash = '#categori_' + id;
    }

}


//отрисовка шаблона получене  json
function runPage() {
    /*$.ajax({
        url: 'http://aida.k99969kp.beget.tech/dev/index_test.php',
        // url: 'https://jsonplaceholder.typicode.com/users/',
        data: url,
        dataType: 'html',
        type:"POST",
        success: function(data){
            console.log(data);
            $('#result').html(data);
        },
        error: function (data) {
            //console.log(data);
            var url = "http://aida.k99969kp.beget.tech/error/404.php";
            $(location).attr('href',url);
        } //
    });*/
    $.post("../dev/index_test.php", {
            hash: location.search,
            href: location.href,
        },
        function (data) {
            Bild_Shop(data);
        }, "html");
}

//отрисовка параметров
function Bild_Shop(data) {
    $('#result').html(data);
}

//  menu=['Акции и скидки','Магазины','Помощь','О нас'];

function CoffeeMachine(power) {
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
            items.push('<li><a href="#">' + val + '<i class="fas fa-chevron-down"></i></a></li>');
            //    alert(val);
        });
        //$(id).html(items);
        $('#nav_heder').html(items);

    }

    this.run = function () {
        setTimeout(onReady(this.waterAmount), getBoilTime());
    };

}


var coffeeMachine = new CoffeeMachine(100);
coffeeMachine.waterAmount = ['Акции и скидки', 'Магазины', 'Помощь', 'О нас'];
//onReady(coffeeMachine.waterAmount);
coffeeMachine.run();


//функция запроса параметров страницы
function Page_load() {
    //https://jsonplaceholder.typicode.com/posts/1
    return $.ajax({
        url: 'http://aida.k99969kp.beget.tech/dev/shop.json',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            //console.log(data);
            var items = [];
            $.each(data, function (key, val) {
                //   val random=random.m
                //    items.push('<li><label><input type="checkbox" name="check" ' + status(val.status) + '> <span class="label-text">' + val.name + '</span></label></li>');

                items.push( '<div class="form-check">\n' +
                    '  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >\n' +
                    '  <label class="form-check-label" for="exampleRadios1">\n' +
                    val.name+
                    '  </label>\n' +
                    '</div>');

            });
            //$(id).html(items);
            $('#filter').html(items);
        },
        error: function () {
            alert('Не строится');
        }
    });
}

function status(t) {
    if (t != true) {
        return 'checked'
    }
}
$( "input" ).on( "click", function() {
    $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
});
//контструктор блока фильтра

Page_load();