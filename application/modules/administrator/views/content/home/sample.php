<script type="text/javascript">
(function ($) {
    $(function () {

        var addFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
            var $formGroupClone = $formGroup.clone();

            $(this)
                .toggleClass('btn-default btn-add btn-danger btn-remove')
                .html('–');

            $formGroupClone.find('input').val('');
            $formGroupClone.insertAfter($formGroup);

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', true);
            }
        };

        var removeFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', false);
            }

            $formGroup.remove();
        };

        var countFormGroup = function ($form) {
            return $form.find('.form-group').length;
        };

        $(document).on('click', '.btn-add', addFormGroup);
        $(document).on('click', '.btn-remove', removeFormGroup);

    });
})(jQuery);



</script>
<div id="alert"></div>
<form id="form" action="<?=base_url()?>cpanel/home/aksi" method="post">
  <div class="form-group multiple-form-group" > <!--data-max=3-->
     <label> Gambar <b class="text-danger">*</b></label>
     <div class="input-group">
       <div class="form-group">
         <input type="text" class="form-control" id="judul" name="judul[]" placeholder="">
       </div>
       <br>
       <div class="form-group">
           <input type="text" class="form-control" name="video[]" id="video" placeholder="Gambar" value="">
       </div>

       <span class="input-group-btn"><button type="button" class="btn btn-success btn-sm btn-add">+
       </button></span>
     </div>
     </div>


    <button type="submit" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ..." class="btn btn-info btn-sm btn-block" name="submit" id="submit">simpan</button>
</form>


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
                  window.location.href="<?=site_url('cpanel/video')?>";
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
