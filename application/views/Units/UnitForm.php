
<?php 
  
  	$proc = $this->uri->segment(3);
  	$hidden = array('proc' => $proc);
  	echo form_open_multipart('Units/ManageDataUnit', array('id' => 'frm_unit'), $hidden);
	//echo form_hidden("proc", $proc, array('id' => 'proc'));
	
?>
  
      <div class="row">
        <div class="col-6">
            <div class="form-group">
                <?php 
                	echo form_hidden("UnitID", !empty($UnitID)?$UnitID:'');
                	
                    echo form_label( 'รหัสหน่วยนับ', 'UnitCode' );
                    echo form_input( array(	'name' 		=> 'UnitCode',
											'id' 		=> 'UnitCode',
                    						'class' 	=> 'form-control',
                    						'required'	=> ''
									), !empty($UnitCode)?$UnitCode:''
					);
                ?>
            </div>        
        </div>
      </div>
      <div class="row">
	      <div class="col-6">
	            <div class="form-group">
	                <?php 
	                    echo form_label( 'หน่วยนับสินค้า', 'UnitName' );
	                    echo form_input( array(	'name'	=> 'UnitName',
												'id'	=> 'UnitName',
												'class'	=> 'form-control',
	                    						'required'	=> ''
										), !empty($UnitName)?$UnitName:''
						); 
	                ?>
	                
	            </div>        
	        </div>
      </div>
          		        
	<div class="row text-center">
		<div class="col-6">
			<?php
				echo form_submit( array('name'	=> 'btn_save',
				                		'id'	=> 'btn_save',
				                		'class' => 'btn btn-primary'
				                ), 'บันทึกข้อมูล'
                );
                echo anchor('Units/index', 'กลับหน้าหลัก', array('class' => 'btn btn-secondary'));
			?>          	
		</div>
	</div>

  <?php echo form_close();?>
  

<script>

$(function(){

	var proc = "<?php echo $proc; ?>";
	
	if(proc=="Edit"){
		$("#UnitCode").addClass("readonly").attr("readonly",true);
	}
	
	//### Submit Form ###//
	$( '#frm_unit' ).on( 'submit', function ( event ) {
		event.preventDefault();
		confirm('ยืนยันการบันทึกข้อมูล ?', function(){
			var url = "<?php echo site_url('Units/ManageDataUnit'); ?>";
			$.ajax({
				type: "POST",
				url: url,
				data: new FormData($("#frm_unit")[0]),	// $("#frm_item").serialize(),
				//enctype: 'multipart/form-data',
		        dataType:'html',
		        cache: false,
		        processData: false,
				contentType: false,
		        success: function(data){
		        	alert( "บันทึกข้อมูลเรียบร้อย", "success", "<?php echo site_url('Units/index'); ?>" );
		        },
	        	error: function(data, errorThrown){
	        		alert("บันทึกข้อมูลไม่สำเร็จ","danger");
	        		return false;
	        	}
			});	//-- Ajax.
		});	//-- Confirm
		
	});	//-- Submit Form.
	
})//end $(function()
	
</script>
