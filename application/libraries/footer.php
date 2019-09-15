</div>
<!-- end id="body" -->

    <!-- HEADER -->


    <footer id="footer">
    <div class="footer-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-5 footer-brand-wrapper">
                    <a href="#" class="footer-brand"><img src="<?=base_url()?>temp/logo400x400.png" style="width:100px;height:100px;" alt=""></a>
                    <address>
                        <strong style="text-align:center!important"><?=strtoupper(profile("title"))?></strong><br>
                        <?=profile("alamat")?><br>
                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;
                        <a href="#"><?=profile("email")?></a><br>
                        <i class="fa fa-phone"></i>&nbsp;&nbsp;
                        <a href="#"><?=profile("tlp")?></a><br>
                        <i class="fa fa-print"></i>&nbsp;&nbsp;
                        <a href="#"><?=profile("fax")?></a><br>
                        <i class="fa fa-globe"></i>&nbsp;&nbsp;
                        <a href="#"> <?=profile("web")?></a>
                    </address>
                </div>


                  <div class="col-md-9 col-sm-7 footer-menu-wrapper">


                    <div class="row">

                      <div class="col-md-3 col-sm-6 widget">
                          <div class="widget-header"><h3 class="widget-title">Program Studi</h3></div>
                          <div class="menu-footer">
                            <ul id="menu-footer-pages" class="menu">
                              <?php $prodi= $this->db->query("SELECT * FROM prodi ORDER BY id_prodi DESC"); ?>
                              <?php foreach ($prodi->result() as $prodis): ?>
                                <li><a href="<?=site_url('prodi/'.$prodis->slug)?>"><?=$prodis->prodi?></a></li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                      </div>


                        <div class="col-md-3 col-sm-6 widget">
                        <div class="widget-header"><h3 class="widget-title">Link Terkait</h3></div>
                        <div class="menu-footer"><ul id="menu-footer-pages" class="menu">
                          <?php $link = $this->db->query("SELECT * FROM linkterkait ORDER BY id_link DESC"); ?>
                          <?php foreach ($link->result() as $links): ?>
                            <li><a href="<?=$links->url?>"><?=$links->nama?></a></li>
                          <?php endforeach; ?>
                        </div>
                    </div>


                    <div class="col-md-2 col-sm-6 widget">
                        <div class="widget-header"><h3 class="widget-title">Informasi</h3></div>
                        <div class="menu-footer">
                          <ul id="menu-footer-pages" class="menu">
                            <li><a href="<?=site_url('pengumuman')?>">Pengumuman</a></li>
                            <li><a href="<?=site_url('agenda')?>">Agenda</a></li>
                            <li><a href="<?=site_url('berita')?>">Berita</a></li>
                          </ul>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-6 widget">
                        <div class="widget-header"><h3 class="widget-title">Aplikasi Online</h3></div>
                        <div class="menu-footer">

                          <ul id="menu-footer-pages" class="menu">
                            <?php $btn = $this->db->query("SELECT * FROM btn_app ORDER BY id_btn DESC"); ?>
                            <?php foreach ($btn->result() as $btns): ?>
                              <li><a href="<?=$btns->btn_url?>" target="_blank"><?=$btns->btn_name?></a></li>
                            <?php endforeach; ?>
                          </ul>


                        </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 footer-brand-wrapper text-center">
              <div style="margin-top:20px!important;padding-top:15px;border-top:1px solid #1a2c43">
                <a href="<?=profile("instagram")?>/" target="_blank" class="instagram">
                  <i class="facon fa fa-instagram"></i>
                </a>

                <a href="<?=profile("facebook")?>" target="_blank" class="facebook">
                  <i class="facon fa fa-facebook"></i>
                </a>

                <a href="<?=profile("twitter")?>" target="_blank" class="twitter">
                  <i class="facon fa fa-twitter"></i>
                </a>

                <a href="<?=profile("youtube")?>" target="_blank" class="youtube">
                    <i class="facon fa fa-youtube-play"></i>
                </a>
              </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                  <p class="copyright">&copy; <?=date("Y")?> <?=profile("title")?></p>
                </div>
                <div class="col-md-8 col-sm-8">
                    <?=footer_menu()?>
                    </div>
            </div>
        </div>
    </div>
</footer>


 </div> <!--//end page -->







<script>



    jQuery(function($){
        var nImages = $("#main-heading .post").length;
        var loadCounter = 0;

        $("#main-heading .post img").on("load", function() {
            loadCounter++;
            if(nImages == loadCounter) {
                $(this).parents(".post-slider").removeClass('loading');
            }
        }).each(function() {


            if(this.complete) $(this).trigger("load");
        });
    });
</script>


</body>

</html>
