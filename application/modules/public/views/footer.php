<!-- footer -->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-2" style="padding:18px;">
        <div class="row">
          <div class="col">
            <img src="<?=base_url()?>temp/kendari.png" style="width:100%" alt="logo">
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-3">
        <h4 class="footer-title">Kontak</h4>
        <div class="row">
          <div class="col">
            <ul>
              <li><a href="<?=site_url()?>"><i class="fa fa-globe"></i> <?=profile('web')?></a></li>
              <li><a href="#"><i class="fa fa-envelope-o"></i> <?=profile('email')?></a></li>
              <li><a href="#"><i class="fa fa-phone"></i> <?=profile('tlp')?></a></li>
              <li><a href="#"><i class="fa fa-fax"></i> <?=profile('fax')?></a></li>
              <li><a href="#"><i class="fa fa-map-marker"></i> <?=profile('alamat')?></a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-2">
        <h4 class="footer-title">Link Terkait</h4>
        <div class="row">
          <div class="col">
            <ul>
              <?=ft_link()?>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-2">
        <h4 class="footer-title">Halaman</h4>
        <div class="row">
          <div class="col">
            <ul>
              <?=ft_halaman()?>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-3">
        <h4 class="footer-title">Berita Terbaru</h4>
        <div class="row">
          <div class="col">
            <ul>
              <?=ft_berita()?>
            </ul>
          </div>
        </div>
      </div>

    </div>
    <div class="footer-bottom">
      <div class="footer-social">
        <a href="<?=profile('facebook')?>" target="_blank" data-toggle="tooltip" title="facebook"><i class="fa fa-facebook"></i></a>
        <a href="<?=profile('twitter')?>" target="_blank" data-toggle="tooltip" title="twitter"><i class="fa fa-twitter"></i></a>
        <a href="<?=profile('youtube')?>" target="_blank" data-toggle="tooltip" title="youtube"><i class="fa fa-youtube"></i></a>
        <a href="<?=profile('instagram')?>" target="_blank" data-toggle="tooltip" title="instagram"><i class="fa fa-instagram"></i></a>
      </div>
      <p>Copyright &copy; <?=date('Y')?><a href="<?=site_url()?>" target="_blank"> Balitbang Provinsi Sulawesi Tenggara</a>. All rights reserved.</p>
    </div>
  </div>
</footer>
<!-- /footer -->


<div class="modal" id="ModalGue" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body" id="ModalContent"></div>
      </div>
    </div>
  </div>

<!-- theme js -->
<script src="<?=base_url()?>temp/public/js/theme.min.js"></script>
<script>

$('#ModalGue').on('hide.bs.modal', function () {
   setTimeout(function(){
      $('#ModalHeader, #ModalContent, #ModalFooter').html('');
       }, 500);
    });

    $(document).ready(function(){
      $(".preloader").delay(1500).fadeOut();
    });
</script>

</body>
</html>
