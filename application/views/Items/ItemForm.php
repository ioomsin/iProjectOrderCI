

  <?php 
  
  	$proc = $this->uri->segment(3);
	
  	echo form_open_multipart("Items/AddItem");
	echo form_hidden("proc", $proc);
	
  ?>
  
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
					
                    echo form_label( "รหัสสินค้า", "ItemCode" );
                    echo form_input( "ItemCode", !empty($ItemCode)?$ItemCode:"Auto", 
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
                    echo form_label( "ชื่อสินค้า", "ItemName" );
                    echo form_input( "ItemName", !empty($ItemName)?$ItemName:"", 
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
                    echo form_label( "จำนวน", "ItemQty" );
                    echo form_input( "ItemQty", !empty($ItemQty)?$ItemQty:"", 
										array(
											'class' => 'form-control',
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
                    echo form_label( "ราคาต่อหน่วย", "ItemPrice" );
                    echo form_input( "ItemPrice", !empty($ItemPrice)?$ItemPrice:"", 
										array(
											'class' => 'form-control',
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
                    echo form_label( "รูปสินค้า", "ItemImage" );
                    echo form_upload( "ItemImage", "", 
										array(
											'class' => 'form-control-file',
											'id' => 'ItemImage',
											'aria-describedby' => 'fileHelp'
										)
									); 
                ?>
            	<!--<small id="fileHelp" class="form-text text-muted">&nbsp;</small>-->
            </div>        
        </div>
      </div>
          		        
        <div class="row text-center">
            <div class="col-lg-12">
                <?php
                    echo form_submit("btn_save","บันทึกข้อมูล", array('class' => 'btn btn-info') );            
                ?>
            	<a href="<?php echo site_url('Items/index'); ?>" class="btn btn-secondary">กลับหน้าหลัก</a>
            </div>
        </div>

  <?php echo form_close();?>
