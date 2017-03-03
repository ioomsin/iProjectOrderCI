<div class="container">
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <?php 
  
  	$proc = $this->uri->segment(3);
  	$hidden = array('proc' => $proc);
  	echo form_open_multipart('Customers/ManageDataCustomer', array('id' => 'frm_customer'), $hidden);
	//echo form_hidden("proc", $proc, array('id' => 'proc'));
	
  ?>
  
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                	//echo form_hidden("UnitID", !empty($UnitID)?$UnitID:'');
                	
                    echo form_label( 'รหัสลูกค้า', 'CustomerCode' );
                    echo form_input( array(	'name' 		=> 'CustomerCode',
											'id' 		=> 'CustomerCode',
                    						'class' 	=> 'form-control readonly',
                    						'readonly'	=> 'readonly'
									), !empty($CustomerCode)?$CustomerCode:'Auto'
					);
                ?>
            </div>        
        </div>
      </div>
      <div class="row">
	      <div class="col-lg-6">
	            <div class="form-group">
	                <?php 
	                    echo form_label( 'ชื่อลูกค้า', 'CustomerName' );
	                    echo form_input( array(	'name'		=> 'CustomerName',
												'id'		=> 'CustomerName',
												'class'		=> 'form-control',
	                    						'required'	=> ''
										), !empty($CustomerName)?$CustomerName:''
						); 
	                ?>
	                
	            </div>        
	        </div>
      </div>
      <div class="row">
	      <div class="col-lg-6">
	            <div class="form-group">
	                <?php 
	                    echo form_label( 'ที่อยู่ลูกค้า', 'CustomerAddress' );
	                    echo form_textarea( array(	'name'	=> 'CustomerAddress',
												'id'	=> 'CustomerAddress',
												'class'	=> 'form-control',
	                    						'rows'	=> '3'
										), !empty($CustomerAddress)?$CustomerAddress:''
						); 
	                ?>
	                
	            </div>        
	        </div>
      </div>
          		        
	<div class="row">
		<div class="col-lg-12">
			<?php
				echo form_submit( array('name'	=> 'btn_save',
				                		'id'	=> 'btn_save',
				                		'class' => 'btn btn-primary'
				                ), 'บันทึกข้อมูล'
                );
                echo anchor('Customers/index', 'กลับหน้าหลัก', array('class' => 'btn btn-secondary'));
			?>          	
		</div>
	</div>

  <?php echo form_close();?>
  
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
</div>  <!-- END Container -->

<script>

$(function(){
	
	//### Submit Form ###//
	$('#frm_customer').on('submit', function( event ){
		event.preventDefault();
			confirm('ยืนยันการบันทึกข้อมูล ?', function(){
				var url = "<?php echo site_url('Customers/ManageDataCustomer'); ?>";
				$.ajax({
					type: "POST",
					url: url,
					data: new FormData($("#frm_customer")[0]),	// $("#frm_item").serialize(),
					//enctype: 'multipart/form-data',
			        dataType:'html',
			        cache: false,
			        processData: false,
					contentType: false,
			        success: function(data){
			        	alert( "บันทึกข้อมูลเรียบร้อย", "success", "<?php echo site_url('Customers/index'); ?>" );
			        },
		        	error: function(data, errorThrown){
		        		alert("บันทึกข้อมูลไม่สำเร็จ","danger");
		        		return false;
		        	}
				});	//-- Ajax.
			});	//-- Confirm.
		
	});	//-- Submit Form.
	
});	//end $(function()
	
</script>
