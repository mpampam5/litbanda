


        </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version <?=me('version');?></b>
  </div>
  <strong>Copyright &copy;<?=date('Y')?><a href="<?=strtoupper(profile("web"))?>"> <?=strtoupper(profile("title"))?></a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->






<div class="modal" id="ModalGue" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class='fa fa-times-circle'></i></button></p>
            <h4 class="modal-title" id="ModalHeader"></h4>
					</div>
					<div class="modal-body" id="ModalContent"></div>
					<div class="modal-footer" id="ModalFooter"></div>
				</div>
			</div>
		</div>

    <script type="text/javascript">

    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
    function testAnim(x) {
          $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
      };

        $('#ModalGue').on('hide.bs.modal', function () {
         setTimeout(function(){
            $('#ModalHeader, #ModalContent, #ModalFooter').html('');
             }, 500);
          });


            $(document).on('click', '#reset', function(e){
                e.preventDefault();
                $('.modal-dialog').removeClass('modal-lg');
                $('.modal-dialog').removeClass('modal-sm');
                $('.modal-dialog').addClass('modal-md');
                $('#ModalHeader').html('Reset Password');
                $('#ModalContent').load($(this).attr('href'));
                $('#ModalGue').modal('show');

              });

              $(document).on('click', '#detail-kontak', function(e){
                  e.preventDefault();
                  testAnim("zoomIn");
                  $('.modal-dialog').removeClass('modal-lg');
                  $('.modal-dialog').removeClass('modal-sm');
                  $('.modal-dialog').addClass('modal-md');
                  $('#ModalHeader').html('Detail Kontak');
                  $('#ModalContent').load($(this).attr('href'));
                  $('#ModalGue').modal('show');
                });

    </script>


</body>
</html>
