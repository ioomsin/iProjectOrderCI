
<?php 
  
  	$proc = $this->uri->segment(3);
  	$hidden = array('proc' => $proc);
  	echo form_open_multipart('Units/ManageDataUnit', array('id' => 'frm_unit'), $hidden);
	//echo form_hidden("proc", $proc, array('id' => 'proc'));
	
?>
  
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                	echo form_hidden("UnitID", !empty($UnitID)?$UnitID:'');
                	
                    echo form_label( 'รหัสหน่วยนับ', 'UnitCode' );
                    echo form_input( array(	'name' 		=> 'UnitCode',
											'id' 		=> 'UnitCode',
                    						'class' 	=> 'form-control'
									), !empty($UnitCode)?$UnitCode:''
					);
                ?>
            </div>        
        </div>
      </div>
      <div class="row">
	      <div class="col-lg-6">
	            <div class="form-group">
	                <?php 
	                    echo form_label( 'หน่วยนับสินค้า', 'UnitName' );
	                    echo form_input( array(	'name'	=> 'UnitName',
												'id'	=> 'UnitName',
												'class'	=> 'form-control'
										), !empty($UnitName)?$UnitName:''
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
	$('#frm_unit').on('submit', function( event ){
		event.preventDefault();
		confirm('ยืนยันการบันทึกข้อมูล ?', function( result ){
			if( result ){
				var url = "<?php echo site_url("Units/ManageDataUnit"); ?>";
				$.ajax({
					type: "POST",
					url: url,
					data: $(this).serialize(),
			        dataType:'html',
			        cache: false,
			        success: function(data){
			        	alert("บันทึกข้อมูลเรียบร้อย","success");
				        window.location.href = "<?php echo site_url("Units/index"); ?>";
			        },
					error: function(data, errorThrown){
		        		alert("ไม่สามารถบันทึกข้อมูลได้","danger");
		        		return false;
		        	}
				});	//-- Ajax.
			}	//-- If result.
		});	//-- Confirm.
	});	//-- Submit Form.
	
})//end $(function()
	
</script>
