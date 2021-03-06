<style>
   .border{
   height: 700px;   
   }
</style>

<div class="border">
   <div class="content-wrapper">
      <?php $this->load->view('resource/signpost'); ?>
      <div class="col-lg-12">
	  <?php if ($this->session->userdata['errormsg'] != ''){ ?>
	  <center><div class="alert alert-danger" role="alert"><?php echo $this->session->userdata['errormsg']; ?></div></center>
	  <?php } ?>
         <div class="panel panel-default">
            <div class="panel-heading"><?php echo $heading ?></div>
            <div class="panel-body">
               <form action="<?php echo $action; ?>" method="post">
                  <input type="hidden" name="id_inbound" value="<?php echo $id_inbound; ?>" />
                  <input type="hidden" name="creator" value="<?php echo $this->session->userdata['username']; ?>" />
                  <div class="form-group">
                     <label>Tanggal:</label>
                     <div class="input-group date">
                        <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_inbound" class="form-control pull-right" id="datepicker" value="<?php echo $tgl_inbound; ?>">
                     </div>
                     <!-- /.input group -->
                  </div>
                  <div class="form-group">
                     <label for="sel1">List Barang:</label>
                     <select class="form-control" required id="id_barang" name="id_barang">
                     <option value="" disabled selected>-- Pilih Barang --</option>
                     <?php                                
                        foreach ($listbarang as $row) {
							if ($row->id_barang == $id_barang){
							  echo "<option selected ".$show." value='".$row->id_barang."'>".$row->nama_barang."</option>";
							}else{
							  echo "<option value='".$row->id_barang."'>".$row->nama_barang."</option>";
							}
                        }
                          echo"
                        </select>"
                        ?>
                  </div>
                  <div class="form-group">
                     <label for="Label">Qty</label>
                     <input type="text" onkeypress='validate(event)' class="form-control" name="qty_barang" id="qty_barang" placeholder="Qty" value="<?php echo $qty_barang; ?>">
                  </div>
                  <script>
                     function validate(evt) {
                       var theEvent = evt || window.event;
                     
                       // Handle paste
                       if (theEvent.type === 'paste') {
                     	  key = event.clipboardData.getData('text/plain');
                       } else {
                       // Handle key press
                     	  var key = theEvent.keyCode || theEvent.which;
                     	  key = String.fromCharCode(key);
                       }
                       var regex = /[0-9]|\./;
                       if( !regex.test(key) ) {
                     	theEvent.returnValue = false;
                     	if(theEvent.preventDefault) theEvent.preventDefault();
                       }
                     }
                  </script>
                  <button type="submit" class="btn btn-default">
                  Simpan
                  </button>
                  <a href="<?php echo base_url() ?>inbound/">
                  <button type="button" class="btn btn-default">
                  Kembali
                  </button>
                  </a>
               </form>
               <?php if ($error != ''){ ?>
               <br/>
               <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span>
                  <?php echo $error; ?>
               </div>
               <?php }?>
            </div>
			
         </div>
      </div>
   </div>
</div>

