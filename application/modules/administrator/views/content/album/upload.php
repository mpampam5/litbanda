<link rel="stylesheet" type="text/css" href="<?=directory('admin_dir')?>plugins/dropzone/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="<?=directory('admin_dir')?>plugins/dropzone/basic.min.css">
<script type="text/javascript" src="<?=directory('admin_dir')?>plugins/dropzone/dropzone.min.js"></script>

<style media="screen">

.dropzone {
margin-top: 30px;
padding: 20px 10px 20px 10px!important;
border: 2px dashed #0087F7;
}
.dropzone .dz-preview .dz-image img{
    width: 100px;
    height: 100px;

  }

.dropzone .dz-preview .dz-image{
  width: 100px!important;
  border-radius: 2px 2px 2px 2px !important;
}

</style>

      <div class="col-md-12">
        <div id="pesan"></div>
        <div class="dropzone">
          <div class="dz-message">
           <h3> Klik atau Drop gambar disini</h3>
          </div>
        </div>

        <p style="text-align:center" class="text-red">Multiple upload<br>Max file : 1mb. <br> ext : JPG,PNG </p>
        <hr>
        <a nohref onClick="HideModal();" class='btn btn-default btn-block'>tutup</a>
    </div>


<script type="text/javascript">

function HideModal()
{
  $("#ModalGue").modal('hide');
$('#mytable').DataTable().ajax.reload();
}
Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
url: "<?=base_url(config_item("cpanel"))?>/album/get_image_upload/<?=$id_album?>",
maxFilesize: 4,
method:"post",
acceptedFiles:"image/jpeg,image/png",
paramName:"userfile",
dictInvalidFileType:"Type file ini tidak dizinkan",
addRemoveLinks:true,
init: function() {

      var thisDropzone = this;

        $.getJSON("<?=base_url(config_item("cpanel"))?>/album/get_view_galery_json/<?=$id_album?>", function(data) { // get the json response

            $.each(data, function(key,value){ //loop through it

                var mockFile = { name: value.name, size: value.size, token: value.token }; // here we get the file name and size as response

                thisDropzone.options.addedfile.call(thisDropzone, mockFile);

                thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "<?php echo base_url() ?>temp/upload/thumbs/"+value.name);//uploadsfolder is the folder where you have all those uploaded files

                $(".dz-progress").addClass('hide');
            });

        });
}
});



//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
	a.token=Math.random();
	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});


//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?=base_url(config_item("cpanel"))?>/album/get_galery_remove",
		cache:false,
		dataType: 'json',
		success: function(){
      $('.alert-success').remove();
      $('#mytable').DataTable().ajax.reload();
      $('#pesan').append('<div class="alert alert-success alert-dismissable">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                '<h4>	<i class="icon fa fa-check"></i> Berhasil menghapus foto</h4></div>');

      $('.alert-success').delay(5000).hide(10, function(){
        $('.alert-success').remove();
      });
		},
		error: function(){
			console.log("Error");

		}
	});
});


</script>
