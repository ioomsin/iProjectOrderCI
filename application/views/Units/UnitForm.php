<div class="container">
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->

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
  
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
</div>  <!-- END Container -->	

<script>

$(function(){

	var proc = "<?php echo $proc; ?>";
	
	if(proc=="Edit"){
		$("#UnitCode").addClass("readonly").attr("readonly",true);
	}
	
	/*
	$("#frm_item).ajaxForm({
			type:'POST',
			dataType:'html',
			cache:false,
			beforeSend:function(){
			blockUI();
		},
			success:function(data){
				if(data){
					alert(data,'error');
					return false;
				}
				alert('บันทึกเรียบร้อย','success');
				//unblockUI();
				loadview('<?php echo site_url('Items/index');?>');
			}//end success
	})//end submit ajaxForm
	*/

	/*
	$( '#frm_item' ).submit( function(){
        if( confirm('ยืนยันการบันทึกข้อมูล') ){
            return TRUE;
        } else {
            return FALSE;
        }
    });
    */
	
})//end $(function()
	
</script>
