

  <?php 
  
  	$proc = $this->uri->segment(3);
  	$hidden = array('proc' => $proc);
  	echo form_open_multipart('Orders/ManageDataOrder', array('id' => 'frm_order'), $hidden);
	//echo form_hidden("proc", $proc, array('id' => 'proc'));
	
  ?>
  
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
					
                    echo form_label( 'รหัสสินค้า', 'ItemCode' );
                    echo form_input( 'ItemCode', !empty($ItemCode)?$ItemCode:
                    	'Auto', 
										array(
											'class' => 'form-control readonly',
											'id' => 'ItemCode',
											'readonly' => 'readonly'
										)
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
                    echo form_input( 'ItemName', !empty($ItemName)?$ItemName:'', 
										array(
											'class' => 'form-control',
											'id' => 'ItemName'
										)
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
                    echo form_input( 'ItemQty', !empty($ItemQty)?number_format($ItemQty,2):'', 
										array(
											'class' => 'form-control text-right',
											'id' => 'ItemQty'
										)
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
                    echo form_input( 'ItemPrice', !empty($ItemPrice)?number_format($ItemPrice,2):'', 
										array(
											'class' => 'form-control text-right',
											'id' => 'ItemPrice'
										)
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
                    echo form_upload( 'ItemImage', '', 
										array(
											'class' => 'form-control-file',
											'id' => 'ItemImage',
											'aria-describedby' => 'fileHelp',
											'value' => !empty($ItemImage)?$ItemImage:''
										)
									); 
                ?>
            </div>        
        </div>
      </div>
          		        
        <div class="row text-center">
            <div class="col-lg-12">
                <?php
                    echo form_submit('btn_save','บันทึกข้อมูล', array('class' => 'btn btn-primary'));   
                    echo anchor('Items/index', 'กลับหน้าหลัก', array('class' => 'btn btn-secondary'));
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
