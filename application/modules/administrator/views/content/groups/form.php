<link rel="stylesheet" type="text/css" href="<?=directory("admin_dir")?>plugins/nestable/nestable.css">
<style media="screen">
.dd{margin-bottom:50px!important}
  .dd-handle{background: #ccc!important}
</style>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?=ucfirst($button)." ".$layout_title?></h3>
  </div>

  <div class="box-body">
      <div id="pesan"></div>
      <form action="<?=$aksi?>" id="form">

						 <div class="form-group">
                <label for="varchar">Group</label>
                <input type="text" class="form-control" name="level" id="level" placeholder="Group" value="<?php echo $level; ?>" />
            </div>

						 <div class="form-group">
                <label for="varchar">Description</label>
                <textarea class="form-control" rows="3" cols="80" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
            </div>

          <div class="form-group">
            <label for=""> Akses</label>

          <div class="dd" id="nestable">
            <?php $query = $this->db->query("SELECT * FROM menu WHERE is_parent=0 AND is_active=1 ORDER BY sort ASC");?>
            <?php foreach ($query->result() as $menu): ?>
              <?php $submenu = $this->db->query("SELECT * FROM menu WHERE is_parent=$menu->id AND is_active=1 ORDER BY sort ASC");?>
              <?php if ($submenu->num_rows() > 0): ?>
                <ol class="dd-list">
                    <li class="dd-item" id="no-drag">
                        <div class="dd-handle">
                            <?=ucwords($menu->name)?>
                            <div class="pull-right action-buttons">
                              <input type="checkbox" class="menu" <?=(groups("groups",$id_level,$menu->id)==true)?"checked":""?> class="checkbox" name="access[]" id="access[]" value="<?=$menu->id?>" />
                            </div>
                        </div>
                        <?php foreach ($submenu->result() as $submenus): ?>
                          <ol class="dd-list">
                              <li class="dd-item" id="no-drag">
                                  <div class="dd-handle">
                                      <?=$submenus->name?>
                                      <div class="pull-right action-buttons">
                                        <input type="checkbox" class="submenu" <?=(groups("groups",$id_level,$submenus->id)==true)?"checked":""?> class="checkbox" name="access[]" id="access[]" value="<?=$submenus->id?>" />
                                      </div>
                                  </div>
                              </li>
                            </ol>
                        <?php endforeach; ?>
                    </li>
                </ol>
                <?php else: ?>
              <ol class="dd-list">
                  <li class="dd-item" id="no-drag">
                      <div class="dd-handle">
                          <?=ucwords($menu->name)?>
                          <div class="pull-right action-buttons">
                            <input type="checkbox" <?=(groups("groups",$id_level,$menu->id)==true)?"checked":""?> class="checkbox" name="access[]" id="access[]" value="<?=$menu->id?>" />
                          </div>
                      </div>
                  </li>
              </ol>
              <?php endif; ?>
              <?php endforeach; ?>
          </div>
          </div>
<p></p><p></p><p></p>
<p></p>
<hr>

        <div class="row">
            <div class="col-md-6">
            <!-- MODAL ClOSE -->
            <!-- <button type="button" class="btn btn-default btn-sm btn-block" data-dismiss="modal" aria-label="Close">tutup</button> -->
              <a href="<?=site_url(config_item("cpanel").'groups')?>" class="btn btn-sm btn-default btn-block"> batal</a>
            </div>

            <div class="col-md-6">
              <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit"><?=$button?></button>
            </div>
        </div>

      </form>
    </div>
  </div>


<script type="text/javascript">
  $("#form").submit(function(e){
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
                 $('body,html').animate({ scrollTop: 0 }, 'slow');
                $('.alert-success').delay(500).show(10, function(){
                  $('.alert-success').delay(5000).hide(10, function(){
                    $('.alert-success').remove();
                    window.location.href="<?=site_url(config_item("cpanel").'groups')?>";
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

  $(document).ready(function(){
    $("#selectall").click(function(){
            //alert("just for check");
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                })
            }else{
                $('.checkbox').each(function(){
                    this.checked = false;
                })
            }
        });
    });

  </script>
