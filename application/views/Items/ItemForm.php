<div class="container">
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->


  <?php 
  
  	$proc = $this->uri->segment(3);
  	$hidden = array('proc' => $proc);
  	echo form_open_multipart('Items/ManageDataItem', array('id' => 'frm_item'), $hidden);
	//echo form_hidden("proc", $proc, array('id' => 'proc'));
	
  ?>
  
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
					
                    echo form_label( 'รหัสสินค้า', 'ItemCode' );
                    echo form_input( array(	'name' 		=> 'ItemCode',
											'id' 		=> 'ItemCode',
                    						'class' 	=> 'form-control readonly',
											'readonly' 	=> 'readonly'
									), !empty($ItemCode)?$ItemCode:'Auto'
					); 
                ?>
                
            </div>        
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'ชื่อสินค้า', 'ItemName' );
                    echo form_input( array(	'name'	=> 'ItemName',
											'id'	=> 'ItemName',
											'class'	=> 'form-control'
									), !empty($ItemName)?$ItemName:''
					); 
                ?>
                
            </div>        
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'จำนวน', 'ItemQty' );
                    echo form_input( array(	'name'	=> 'ItemQty',
                    						'id'	=> 'ItemQty',
                    						'class'	=> 'form-control text-right'
									), !empty($ItemQty)?number_format($ItemQty,2):''
					); 
                ?>
                
            </div>        
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'ราคาต่อหน่วย', 'ItemPrice' );
                    echo form_input( array( 'name'	=> 'ItemPrice',
											'id'	=> 'ItemPrice',
                    						'class' => 'form-control text-right'
									), !empty($ItemPrice)?number_format($ItemPrice,2):''
					); 
                ?>
                
            </div>        
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'รูปสินค้า', 'ItemImage' );
                    echo form_upload( array( 'name'				=> 'ItemImage',
                    						 'id' 				=> 'ItemImage',
                    						 'class' 			=> 'form-control-file',
                    						 'aria-describedby' => 'fileHelp'
									), !empty($ItemImage)?$ItemImage:''
					); 
                ?>
            </div>        
        </div>
      </div>
          		        
        <div class="row text-center">
            <div class="col-lg-12">
                <?php
                	echo form_submit( array('name'	=> 'btn_save',
				                		'id'	=> 'btn_save',
				                		'class' => 'btn btn-primary'
				                ), 'บันทึกข้อมูล'
                	);
                    echo anchor('Items/index', 'กลับหน้าหลัก', array('class' => 'btn btn-secondary'));
                ?>          	
            </div>
        </div>

  <?php echo form_close();?>
  
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
</div>  <!-- END Container -->	  

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
