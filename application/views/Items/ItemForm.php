

  <?php echo form_open("Items/AddItem");?>
  
      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( "รหัสสินค้า", "ItemCode" );
                    echo form_input( "รหัสสินค้า", "", 
										array(
											'class' => 'form-control',
											'name' => 'ItemCode',
											'id' => 'ItemCode'
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
                    echo form_input( "ชื่อสินค้า", "", 
										array(
											'class' => 'form-control',
											'name' => 'ItemName',
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
                    echo form_input( "จำนวน", "", 
										array(
											'class' => 'form-control',
											'name' => 'ItemQty',
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
                    echo form_input( "ราคาต่อหน่วย", "", 
										array(
											'class' => 'form-control',
											'name' => 'ItemPrice',
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
                    echo form_upload( "รูปสินค้า", "", 
										array(
											'class' => 'form-control-file',
											'name' => 'ItemImage',
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
                    echo form_button("btn_save","บันทึกข้อมูล", array('class' => 'btn btn-info') );
                    //echo form_button("btn_back","กลับหน้าหลัก", array('class' => 'btn btn-secondary') );
            
                ?>
            	<a href="<?php echo site_url('Items/index'); ?>" class="btn btn-secondary">กลับหน้าหลัก</a>
            </div>
        </div>

  <?php echo form_close();?>
