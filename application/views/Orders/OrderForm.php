

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
                    echo form_label( 'เลขที่ใบสั่งซื้อ', 'OrderNumber' );
                    echo form_input( array(	'name'		=> 'OrderNumber',
											'id'		=> 'OrderNumber',
											'class'		=> 'form-control readonly',
											'readonly' 	=> 'readonly'
                    				), !empty($OrderNumber)?$OrderNumber:'Auto'
					); 
                ?>
            </div>        
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'วันที่สั่งซื้อ', 'OrderDate' );
                    echo form_input( array(	'name'	=> 'OrderDate',
											'id'	=> 'OrderDate',
											'class'	=> 'form-control'
									), !empty($OrderDate)?$OrderDate:''
					); 
                ?>
            </div>        
        </div>
      </div>

      <div class="row">
        <!-- <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'วันที่ส่งสินค้า', 'DeliveryDate' );
                    echo form_input( array(	'name' 	=> 'DeliveryDate',											
											'id' 	=> 'DeliveryDate',
                    						'class'	=> 'form-control text-right'
									), !empty($DeliveryDate)?number_format($DeliveryDate,2):''
					); 
                ?>
                
            </div>        
        </div>  -->
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'รหัสลูกค้า', 'CustomerCode' );
                    echo form_input( array(	'name'	=> 'CustomerCode',
											'id' 	=> 'CustomerCode',
											'class'	=> 'form-control text-right'
									), !empty($CustomerCode)?$CustomerCode:''
					); 
                ?>
                
            </div>        
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'ชื่อลูกค้า', 'CustomerName' );
                    echo form_input( array(	'name'	=> 'CustomerName',
											'id'	=> 'CustomerName',
											'class' => 'form-control text-right'
									), !empty($CustomerName)?$CustomerName:''
					); 
                ?>
                
            </div>        
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <?php 
                    echo form_label( 'ที่อยู่ลูกค้า', 'CustomerAddress' );
                    echo form_textarea( array(	'name' 	=> 'CustomerAddress',
												'id' 	=> 'CustomerAddress',
												'class' => 'form-control text-right',
												'rows' 	=> '2'
                    					), !empty($CustomerAddress)?$CustomerAddress:''
                    ); 
                ?>
            </div>        
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12">
        	<table class="table">
        		<thead>
        			<tr>
        				<th>
        					<a href="<?php echo site_url('Orders/AddRow'); ?>" class="btn btn-outline-primary btn-sm">เพิ่ม</a>
        				</th>
        				<th>รหัสสินค้า</th>
        				<th>ชื่อสินค้า</th>
        				<th>จำนวน</th>
        				<th>หน่วยนับ</th>
        				<th>ราคาต่อหน่วย</th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<td>
        					<a href="<?php echo site_url('Orders/DelRow'); ?>" class="btn btn-outline-danger btn-sm">ลบ</a>
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'ItemCode',
        												'id'	=> 'ItemCode',
        												'class' => 'form-control'
        										), !empty($ItemCode)?$ItemCode:''
        						);
        					?>
        				</td>
        				<td>
         					<?php 
        						echo form_input( array(	'name'	=> 'ItemName',
        												'id'	=> 'ItemName',
        												'class' => 'form-control'
        										), !empty($ItemName)?$ItemName:''
        						);
        					?>       				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderQty',
        												'id'	=> 'OrderQty',
        												'class' => 'form-control'
        										), !empty($OrderQty)?$OrderQty:''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderUnit',
        												'id'	=> 'OrderUnit',
        												'class' => 'form-control'
        										), !empty($OrderUnit)?$OrderUnit:''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderPrice',
        												'id'	=> 'OrderPrice',
        												'class' => 'form-control'
        										), !empty($OrderPrice)?$OrderPrice:''
        						);
        					?>        				
        				</td>
        			</tr>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td></td>
        				<td></td>
        				<td></td>
        				<td></td>
        				<td></td>
        				<td></td>
        			</tr>
        		</tfoot>
        	</table>
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
