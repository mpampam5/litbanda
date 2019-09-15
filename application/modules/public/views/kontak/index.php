<section class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="<?=site_url()?>">Home</a></li>
        <li class="active">Kontak</li>
      </ol>
    </div>
  </section>

<section class="p-b-0">
    <div class="container">
      <div class="heading">
        <i class="fa fa-envelope-open-o"></i>
        <h2>Hubungi Kami</h2>
        <p>Masukkan Kritik Dan Saran</p>
      </div>
    </div>
  </section>

  <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto m-b-50">
          <div id="alert"></div>
          <form action="<?=site_url('kontak/action')?>" id="kontak">

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
            </div>
            <div class="row">

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="subject">Telepon</label>
                    <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukkan Telepon">
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="message">Keterangan</label>
              <textarea class="form-control" rows="6" placeholder="Masukkan Keterangan" name="desc" id="desc"></textarea>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="">&nbsp;</label>
                    <?=$captcha?>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label >Captcha</label>
                    <input type="text" class="form-control" name="captcha_key" id="captcha_key" >
                </div>
              </div>



            </div>



            <button type="submit" id="submit" class="btn btn-primary btn-lg  btn-effect btn-shadow float-right" data-loading-text="<i class='fa fa-spinner fa-pulse'></i> Sedang Memproses ...">Kirim</button>
          </form>
        </div>
      </div>
    </div>


    <script type="text/javascript">
$("#kontak").submit(function(e){
  e.preventDefault();
  var me = $(this);
  $("#submit").prop('disabled',true);

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
              if (json.alert_capt==1) {
                $.ajax({
                  type : 'post',
                  url  : '<?=base_url()?>kontak/captcha',
                  success : function(res){
                    if (res) {
                      $('.alert-success').remove();
                      $('.alert-danger').remove();
                      $("#submit").prop('disabled',false);
                      $('#captcha_key').val('');
                      $(".image").html(res);
                      $('#alert').append('<div class="alert alert-success alert-dismissible" role="alert">'
                                            +'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                                            +  '<span aria-hidden="true">×</span>'
                                            +'</button>'
                                                  +json.alert
                                          +'</div> ');
                        $('.form-group').removeClass('.has-error')
                                        .removeClass('.has-success');
                        $('.text-danger').remove();
                         $('body,html').animate({ scrollTop: 0 }, 'slow');
                        $('.alert-success').delay(500).show(10, function(){
                          $('.alert-success').delay(5000).hide(10, function(){
                            $('.alert-danger').remove();
                          });
                        })
                    }
                  }
                });

              }else {
                $('.alert-danger').remove();
                $('#alert').append('<div class="alert alert-success">'+
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
                      location.reload();
                    });
                  })
              }
          }else {
            $.each(json.alert, function(key, value) {
              var element = $('#' + key);
               $("#submit").prop('disabled',false);
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
