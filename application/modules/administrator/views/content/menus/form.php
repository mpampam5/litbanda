<div id="pesan"></div>
<?php
  switch ($status) { case 'tambah': ?>
    <form  action="<?=base_url(config_item("cpanel"))?>/menus/tambah/aksi" id="simpan">
      <div class="form-group">
        <label for="">Menu</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Menu">
      </div>

      <div class="form-group">
        <label for="">Link (controller name)</label>
        <input type="text" class="form-control" name="link" id="link" placeholder="Link">
      </div>

      <div class="form-group">
        <label for="">Icon</label>
        <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon">
      </div>

      <div class="form-group">
        <label for="">Is Active</label>
        <select class="form-control" name="aktif" id="aktif">
          <option value="1">Aktif</option>
          <option value="0">Tidak Aktif</option>
        </select>
      </div>

      <div class="form-group">
        <label for="">Is Parent</label>
        <?=cmb_menu('parent','parent','menu','name','id',null) ?>
      </div>

      <div class="form-group">
        <label for="">Deskripsi</label>
        <textarea class="form-control" name="description" id="description" rows="3" cols="80" placeholder="Deskripsi"></textarea>
      </div>


      <a href="#"></a>
      <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit">simpan</button>
    </form>




<?php break; case 'edit': ?>
<form  action="<?=base_url(config_item("cpanel"))?>/menus/edit/<?=$row->id?>/aksi" id="simpan">
  <div class="form-group">
    <label for="">Menu</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?=$row->name?>">
  </div>

  <div class="form-group">
    <label for="">Link (HMVC : cpanel/controller, MVC : controller)</label>
    <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?=$row->link?>">
  </div>

  <div class="form-group">
    <label for="">Icon</label>
    <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?=$row->icon?>">
  </div>

  <div class="form-group">
    <label for="">Is Active</label>
    <select class="form-control" name="aktif" id="aktif">
      <option <?=($row->is_active=="1")?"selected":""?> value="1">Aktif</option>
      <option <?=($row->is_active=="0")?"selected":""?> value="0">Tidak Aktif</option>
    </select>
  </div>

  <div class="form-group">
    <label for="">Is Parent</label>
    <?=cmb_menu('parent','parent','menu','name','id',$row->is_parent) ?>
  </div>

  <div class="form-group">
    <label for="">Deskripsi</label>
    <textarea class="form-control" name="description" id="description" rows="3" cols="80" placeholder="Deskripsi"><?=$row->description?></textarea>
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
