

          <div class="forum-post">
            <div class="forum-body">
              <h4 class="m-b-20"><?=$judul?></h4>
              <div style="text-align:justify">
                <?php if ($keterangan!=""): ?>
                  <?=$keterangan?>
                <?php endif; ?>
              </div>
            </div>
            <div class="forum-footer">
              <div class="forum-panel">
                <?php if ($file!=""): ?>
                  <div class="forum-attachment">
                    <a href="<?=base_url("litbang/file/download/$file")?>"><?=$file?>&nbsp;&nbsp;<i class="fa fa-download float-right m-t-5"></i></a>
                    <span><?=ukuran_file($file)?></span>
                  </div>
                <?php endif; ?>
              </div>
              <div class="forum-actions">
                <div class="social-share">
                  <a class="btn btn-social btn-facebook btn-circle" target="_blank" href="http://www.facebook.com/sharer.php?u=<?=base_url($_SERVER['REQUEST_URI'])?>" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on Facebook"><i class="fa fa-facebook"></i></a>
                  <a class="btn btn-social btn-twitter btn-circle" target="_blank" href="https://twitter.com/share?url=<?=base_url($_SERVER['REQUEST_URI'])?>" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on Twitter"><i class="fa fa-twitter"></i></a>
                  <a class="btn btn-social btn-google-plus btn-circle" target="_blank" href="https://plus.google.com/share?url=<?=base_url($_SERVER['REQUEST_URI'])?>" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on Google Plus"><i class="fa fa-google-plus"></i></a>
                  <a class="btn btn-social btn-whatsapp btn-circle" target="_blank" href="https://wa.me/?text=<?=base_url($_SERVER['REQUEST_URI'])?>" data-toggle="tooltip" title="" data-placement="bottom" role="button" data-original-title="Share on Whatsapp"><i class="fa fa-whatsapp"></i></a>
                </div>
              </div>
            </div>
          </div>

          <button type="button" class="btn btn-warning btn-sm " data-dismiss="modal" aria-label="Close">tutup</button>
