<div id="pesan"></div>
<?php
  switch ($status) { case 'tambah': ?>
    <form  action="<?=base_url(config_item("cpanel"))?>/pmenu/tambah/<?=$str?>/aksi" id="simpan">
      <div class="form-group">
        <label for="">Menu</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Menu">
      </div>

      <div class="form-group">
        <label for="">Opsi Link</label>
        <select class="form-control" name="ops" id="ops">
          <option value="0">slug</option>
          <option value="1">url</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Slug/url</label>
        <input type="text" class="form-control" name="link" id="link" placeholder="Slug">
      </div>

      <div class="form-group">
        <label for="">Active</label>
        <select class="form-control" name="aktif" id="aktif">
          <option value="1">Aktif</option>
          <option value="0">Tidak Aktif</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Parent</label>
      <?php if ($str=="footer"): ?>
          <select class="form-control" name="parent" id="parent">
            <option value="0">YA</option>
          </select>
        <?php else: ?>
            <?=cmb_dinamis_pmenu('parent','parent','menus_public','menu','id_menu',array('posisi'=>$str,'parent'=>0),null) ?>
      <?php endif; ?>
      </div>


      <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit">simpan</button>
    </form>




<?php break; case 'edit': ?>
<form  action="<?=base_url(config_item("cpanel"))?>/pmenu/edit/<?=$row->id_menu?>/<?=$str?>/aksi" id="simpan">
  <div class="form-group">
    <label for="">Menu</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?=$row->menu?>">
  </div>

  <div class="form-group">
    <label for="">Opsi Link</label>
    <select class="form-control" name="ops" id="ops">
      <option <?=($row->ops=="0")?"selected":""?> value="0">slug</option>
      <option <?=($row->ops=="1")?"selected":""?> value="1">url</option>
    </select>
  </div>

  <div class="form-group">
    <label for="">Slug/url</label>
    <input type="text" class="form-control" name="link" id="link" placeholder="Slug" value="<?=$row->url?>">
  </div>


  <div class="form-group">
    <label for="">Active</label>
    <select class="form-control" name="aktif" id="aktif">
      <option <?=($row->active=="1")?"selected":""?> value="1">Aktif</option>
      <option <?=($row->active=="0")?"selected":""?> value="0">Tidak Aktif</option>
    </select>
  </div>



  <div class="form-group">
    <label for="">Parent</label>
  <?php if ($str=="footer"): ?>
      <select class="form-control" name="parent" id="parent">
        <option value="0">YA</option>
      </select>
    <?php else: ?>
        <?=cmb_dinamis_pmenu('parent','parent','menus_public','menu','id_menu',array('posisi'=>$str),$row->parent) ?>
  <?php endif; ?>
  </div>





  <a href="#"></a>
  <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit">simpan</button>
</form>
<?php break; }?>


<script type="text/javascript">
  $("#simpan").submit(function(e){
    e.preventDefault();
    var me = $(this);
    $("#submit").prop('disabled',true)
                .button('loading');

    $.ajax({
          url             : me.attr('action'),
          type            : 'post',
          data            :  new FormData(this),
          contentType     : false,
          cache           : false,
          dataType        : 'JSON',
          processData     :false,
          success:function(json){
            if (json.success==true) {
              $('#pesan').append('<div class="alert alert-success">'+
                                  '<span class="fa fa-envelope-o"></span> '+
                                  json.alert+
                                  '<div>');
                $('.form-group').removeClass('.has-error')
                                .removeClass('.has-success');
                $('.text-danger').remove();
                 $('#ModalGue').animate({ scrollTop: 0 }, 'slow');
                $('.alert-success').delay(500).show(10, function(){
                  $('.alert-success').delay(5000).hide(10, function(){
                    $('.alert-success').remove();
                    $("#ModalGue").modal('hide');
                    location.reload();
                  });
                })
            }else {
              $.each(json.alert, function(key, value) {
                var element = $('#' + key);
                $('#submit').button('reset');
                $(element)
                .closest('.form-group')
                .find('.text-danger').remove();
                $(element).after(value);
              });
            }
          }
    });
  });

  </script>
