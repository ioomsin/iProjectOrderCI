

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
	                    echo form_input( array(	'name'	=> 'CustomerName',
												'id'	=> 'CustomerName',
												'class'	=> 'form-control'
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
  

<script>

$(function(){
	
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
