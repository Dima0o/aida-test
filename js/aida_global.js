

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
    $.getJSON("../dev/category.php", function (data) {
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