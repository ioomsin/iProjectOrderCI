

  <?php 
  
  	$proc = $this->uri->segment(3);
  	$hidden = array('proc' => $proc);
  	echo form_open_multipart('Orders/ManageDataOrder', array('id' => 'frm_order'), $hidden);
	
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
											'class'	=> 'form-control date'
									), !empty($OrderDate)?$OrderDate:''
					); 
                ?>
            </div>        
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php 
                    echo form_label( 'รหัสลูกค้า', 'CustomerCode' );
                    echo form_input( array(	'name'	=> 'CustomerCode',
											'id' 	=> 'CustomerCode',
											'class'	=> 'form-control'
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
											'class' => 'form-control'
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
												'class' => 'form-control',
												'rows' 	=> '2'
                    					), !empty($CustomerAddress)?$CustomerAddress:''
                    ); 
                ?>
            </div>        
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12">
        	<table class="table" id="tbl_order">
        		<thead>
        			<tr>
        				<th>
        					<?php echo form_button(array('id' => 'btn_add', 'content' => 'เพิ่ม', 'class' => 'btn btn-outline-primary btn-sm')); ?>
        				</th>
        				<th>รหัสสินค้า</th>
        				<th>ชื่อสินค้า</th>
        				<th>จำนวน</th>
        				<th>หน่วยนับ</th>
        				<th>ราคาต่อหน่วย</th>
        			</tr>
        		</thead>
        		<tbody>
	        		<?php 
	        			if($proc=="Edit"){
			        		$i=1;
			        		foreach ( $result as $rs )
			        		{
	        		?>
        			<tr id="row_<?php echo $i; ?>">
        				<td>
							<?php 
								echo form_button(array(	"id" 		=> "btn_del".$i,
														"data-row" 	=> $i,
														"content" 	=> "ลบ",
														"class" 	=> "btn btn-outline-danger btn-sm btn_del",
														"onClick" 	=> "fnc_DelRow('#tbl_order', $(this).attr('data-row'))"
								));
        					?>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'ItemCode[]',
        												'id'	=> 'ItemCode'.$i,
        												'class' => 'form-control'
        										), !empty($rs['ItemCode'])?$rs['ItemCode']:''
        						);
        					?>
        				</td>
        				<td>
         					<?php 
        						echo form_input( array(	'name'	=> 'ItemName[]',
        												'id'	=> 'ItemName'.$i,
        												'class' => 'form-control'
        										), !empty($rs['ItemName'])?$rs['ItemName']:''
        						);
        					?>       				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderQty[]',
        												'id'	=> 'OrderQty'.$i,
        												'class' => 'form-control'
        										), !empty($rs['OrderQty'])?$rs['OrderQty']:''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderUnit[]',
        												'id'	=> 'OrderUnit'.$i,
        												'class' => 'form-control'
        										), !empty($rs['OrderUnit'])?$rs['OrderUnit']:''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderPrice[]',
        												'id'	=> 'OrderPrice'.$i,
        												'class' => 'form-control'
        										), !empty($rs['OrderPrice'])?$rs['OrderPrice']:''
        						);
        					?>        				
        				</td>
        			</tr>
        			<?php 
        						$i++;
			        		}
	        			}
        			?>
        			<tr id="row_1">
        				<td>
        					<?php 
        						echo form_button(array(	"id" 		=> "btn_del1", 
        												"data-row" 	=> "1", 
        												"content" 	=> "ลบ", 
        												"class" 	=> "btn btn-outline-danger btn-sm btn_del",
        												"onClick" 	=> "fnc_DelRow('#tbl_order', $(this).attr('data-row'))"
                    							)); 
        					?>
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'ItemCode[]',
        												'id'	=> 'ItemCode1',
        												'class' => 'form-control'
        										), !empty($rs['ItemCode'])?$rs['ItemCode']:''
        						);
        					?>
        				</td>
        				<td>
         					<?php 
        						echo form_input( array(	'name'	=> 'ItemName[]',
        												'id'	=> 'ItemName1',
        												'class' => 'form-control'
        										), !empty($rs['ItemName'])?$rs['ItemName']:''
        						);
        					?>       				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderQty[]',
        												'id'	=> 'OrderQty1',
        												'class' => 'form-control'
        										), !empty($rs['OrderQty'])?$rs['OrderQty']:''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderUnit[]',
        												'id'	=> 'OrderUnit1',
        												'class' => 'form-control'
        										), !empty($rs['OrderUnit'])?$rs['OrderUnit']:''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'	=> 'OrderPrice[]',
        												'id'	=> 'OrderPrice1',
        												'class' => 'form-control'
        										), !empty($rs['OrderPrice'])?$rs['OrderPrice']:''
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

  <?php echo form_close(); ?>
  

<script>

$(function(){

	$( ".date" ).datepicker();

	fnc_ModifyRow();

	$("#btn_add").click(function(){
		fnc_AddRow("#tbl_order")
	});

	/*$(".btn_del").click(function(){		
		//fnc_DelRow("#tbl_order")
	});*/
	/*$(".btn_del").each(function(){
		
	});*/
	
}); //end $(function()

function fnc_AddRow(tbl){
	
	var tableBody = $(tbl).find("tbody");
		trLast = tableBody.find("tr:last");
		trNew = trLast.clone();
	
		trLast.after(trNew);
		
		fnc_ModifyRow();
}

function fnc_DelRow(tbl, row){
	
	var tableBody = $(tbl).find("tbody");
	var countRow = tableBody.find("tr").length;
	
	if( countRow <= 1 ){
		
		alert("ต้องมีอย่างน้อย 1 แถว");
		return false;
		
	}else{

		$(tbl+" tbody #row_"+row).remove();
		
	}
	
	fnc_ModifyRow();
}

function fnc_ModifyRow(){
	var tableBody = $('#tbl_order').find("tbody");
	var i=0;
	//console.log(tableBody.find("tr").length);
	tableBody.find("tr").each(function(){
		i++;
		$(this).attr("id","row_"+i);
		$(this).find("button.btn_del").attr("id","btn_del"+i).attr("data-row",i);
		$(this).find("input").each(function() 
		{
			name = $(this).attr("name");					
			if (name != undefined)
			{
				id = name.split("[]").join(i);
				$(this).attr("id",id);
				$(this).attr("data-id",i);
			}
		});
	});
	
}
	
</script>
