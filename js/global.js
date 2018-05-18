//<li class="has-megamenu"><a href="index.html"><span>Home</span></a></li>
function Menu() {
    // работа с новым меню

    $.getJSON("../dev/menu.json", function (data) {
        var items = [];
        $.each(data, function (key, val) {
            items.push('<li class="has-megamenu"><a href="' + val.url + '"><span>' + val.name + '</span></a></li>');
        });
        //console.log(data);
        //  $('.cat_menu').html(items);
        $('#header-main').html(items);
  //      console.log(items);
    });
};