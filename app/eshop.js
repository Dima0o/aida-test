
  //корзина
  /* $("#result").on("click",".tag",function() {
      console.log($(this).text());
    });*/

  $("#result").on("click",".add",function() {
//  $('.add').click(function() {
    var caunts=Number($('#cadr_number').html());
    caunts=caunts+1;
    var conut= $('[data-role="container"]').css("height");
    conut=Number(conut.substr( 0,conut.length - 2));
    if (conut+80 > 270 ) {
      conut=230;
    }
    else {
      conut=conut+80;
    };
    $('#cadr_number').html(caunts);
    //var blok= $(this).closest(".panel");
    //console.log();
    $('[data-role="container"]').css({'height': ''+conut+'px'});
    $('#card').append('<a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">\n' +
      '                      <div class="media">\n' +
      '                        <div class="media-left p-r-10">\n' +
      '                         <img class="card-img-top" src="'+$(this).attr('src')+'">\n' +
      '                        </div>\n' +
      '                        <div class="media-body">\n' +
      '                          <h6 class="media-heading">'+$(this).attr('data-name')+'</h6>\n' +
      '                          <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">'+$(this).attr('data-price')+'</time>\n' +
      '                        </div>\n' +
      '                      </div>\n' +
      '                    </a>');
    //console.log(conut);
  });

//каталог

//работа с получение категорий

function showMessage(e,uid) {

  //console.log($(this).attr('data-name'));
  Animation('#result');
  $.ajax({
    type: "POST",
    data: "primer=" + uid,
    url: 'lol.php',
    success: function(data) {
      $(".active").text(e);
      $('#result').html(data);
    }
  });
};
function PageCatalog1(uid) {
  PagePorfile(uid);
  // console.log($(this).attr('data-name'));
  var data= '<div class="page vertical-align text-xs-center layout-full" data-animsition-in="fade-in" data-animsition-out="fade-out">\n' +
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
  /*  $.ajax({
      //type: "POST",

      data: "uid=" + uid,

      //data: data,
      //url: 'app/json_profile.php',
      url: 'https://jsonplaceholder.typicode.com/posts',
      dataType: 'json',
      success: function(data) {
        console.log(data);
      }
    });*/

  //$.getJSON('/app/profile.json', function(data){
  $.getJSON('https://jsonplaceholder.typicode.com/posts/1', function(data){
    var items = [];
    $.each(data, function(key, val){
      items.push(
        '<div class="col-xxl-3 col-lg-6 col-xs-12" data-animate="fade">\n' +
        '    <!-- Example Heading With Desc -->\n' +
        '    <div class="panel">\n' +
        '      <div class="panel-heading">\n' +
        '        <h3 class="panel-title" data-name="Печенье шт"><a href="javascript:PageCatalog(\'6bd356d1-c64b-11de-8a41-001cc07d7dd0\')">'+val.title+'<small></small></a>\n' +
        '        </h3><div class="panel-actions panel-actions-keep">\n' +
        '          <span class="tag tag-primary"></span>\n' +
        '          <span class="tag tag-pill tag-danger"></span>\n' +
        '        </div>\n' +
        '      </div>\n' +
        '      <div class="panel-body">\n' +
        '        <!--<img class="card-img-top" src="https://cdn.retailrocket.net/api/1.0/partner/54f030e51e99470d74ea0931/item/137759/picture/?format=png&width=250&height=250&scale=both">-->\n' +
        '        <img class="card-img-top" src="http://dummyimage.com/250x250/9CC089">\n' +
        '\n' +
        '        <h6>'+val.body+'</h6>\n' +
        '      </div>\n' +
        '      <div class="panel-footer">\n' +
        '        <div class="row">\n' +
        '          <div class="col-md-6">\n' +
        '            <div class="form-group">\n' +
        '              <button data-price="3530 Рублей" data-name="Печенье шт" src="http://dummyimage.com/50x50/9CC089" data-action="6bd356d1-c64b-11de-8a41-001cc07d7dd0" class="add btn btn-outline-success btn-sm btn-block">В корзину</button>\n' +
        '            </div> <!-- form-group// -->\n' +
        '          </div>\n' +
        '          <div class="col-md-6 text-right">\n' +
        '            <button data-action="Печенье шт" class=" info btn btn-outline-info btn-sm btn-block">Подробнее</button>\n' +
        '          </div>\n' +
        '\n' +
        '        </div>\n' +
        '      </div>\n' +
        '    </div>\n' +
        '    <!-- End Example Heading With Desc -->\n' +
        '  </div>');
    });

    $('#result').html(data.userId);
    /*$('#result', {
      'class': 'my-new-list',
      html: items.join('')
    }).appendTo('div');*/

  });
};
function Animation(id) {
  var data= ' <div class="example-loading example-well h-150 vertical-align text-xs-center">\n' +
    '                  <div class="loader vertical-align-middle loader-grill"></div>\n' +
    '                </div>';


  $(id).html(data);
}
