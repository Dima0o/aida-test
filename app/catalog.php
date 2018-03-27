<div class="documents-wrap article" id>
  <div class="col-xxl-2 col-lg-6 col-xs-12">
    <!-- Example Heading With Desc -->
    <div class="panel">

      <div class="panel-body">
        <ul class="list-group nav list-group-dividered list-group-full" id="category">
          <?php
          foreach ($load_categori as $value){


            if ($i == 155) {
              break;
            }
            $i++;
            ?>
            <li class="list-group-item  catalog">
              <?=$value->name?>
            </li>
          <?}?>
        </ul>
      </div>
    </div>
    <!-- End Example Heading With Desc -->
  </div>



  <div class="col-lg-10">
    <div class="projects-wrap">
      <div class="row" id="result">
        <?
        $i=15;
        foreach ($load_prod as $value){


          if ($i == 155) {
            break;
          }
          $i++;
          ?>
          <div class="col-xxl-3 col-lg-6 col-xs-12">
            <!-- Example Heading With Desc -->
            <div class="panel">
              <div class="panel-heading">
                <h3 class="panel-title" data-name="<?= substr($value->name, 0, 22);
                if (strlen($value->title) > 22) {
                    echo "...";
                } ?>"><a href="http://node.automated-workflow.ru/catalog.php?id=<?=$value->uid?>"><?= substr($value->name, 0, 22);
                    if (strlen($value->title) > 22) {
                      echo "...";
                    } ?>
                    <small></small></a>
                </h3><div class="panel-actions panel-actions-keep">
                  <span class="tag tag-primary">Tag</span>
                  <span class="tag tag-pill tag-danger">Tag-pill</span>
                </div>
              </div>
              <div class="panel-body">
                <img class="card-img-top" src="<?//=$value->image?>https://cdn.retailrocket.net/api/1.0/partner/54f030e51e99470d74ea0931/item/137759/picture/?format=png&width=250&height=250&scale=both">

                <h6><?= substr($value->about, 0, 52);
                  if (strlen($value->body) > 52) {
                    echo "...";
                  } ?></h6>
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <button data-price="<?=rand(12,3552).' Рублей';?>" data-name="<?= substr($value->name, 0, 22);
                      if (strlen($value->title) > 22) {
                          echo "...";
                      } ?>"   src="<?//=$value->image?>https://cdn.retailrocket.net/api/1.0/partner/54f030e51e99470d74ea0931/item/137759/picture/?format=png&width=50&height=50&scale=both" data-action="<?=$value->uid?>" class="add btn btn-outline-success btn-sm btn-block">В корзину</button>
                    </div> <!-- form-group// -->
                  </div>
                  <div class="col-md-6 text-right">
                    <button  data-action="<?=$value->name?>" class=" info btn btn-outline-info btn-sm btn-block">Подробнее</button>
                  </div>

                </div>
              </div>
            </div>
            <!-- End Example Heading With Desc -->
          </div>






        <?} ?>


      </div>
    </div>
  </div>
</div>
