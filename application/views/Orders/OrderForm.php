<div class="container">
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  <?php 
  
  	$proc = $this->uri->segment(3);
  	$hidden = array('proc' => $proc);
  	echo form_open_multipart('Orders/ManageDataOrder', array('id' => 'frm_order'), $hidden);
	
  ?>
  
      <div class="row">
        <div class="col">
            <div class="form-group">
                <?php 
                    echo form_label( 'เลขที่ใบสั่งซื้อ', 'OrderNumber' );
                    echo form_input( array(	'name'		=> 'OrderNumber',
											'id'		=> 'OrderNumber',
											'class'		=> 'form-control readonly',
											'readonly' 	=> 'readonly'
                    				), !empty($Head["OrderNumber"])?$Head["OrderNumber"]:"Auto"
					); 
                ?>
            </div>        
        </div>
        <div class="col">
            <div class="form-group">
                <?php 
                    echo form_label( 'วันที่สั่งซื้อ', 'OrderDate' );
                    echo form_input( array(	'name'	=> 'OrderDate',
											'id'	=> 'OrderDate',
											'class'	=> 'form-control date'
									), !empty($Head["OrderDate"])?chg_date_th($Head["OrderDate"]):""
					); 
                ?>
            </div>        
        </div>
      </div>

      <div class="row">
        <div class="col">
            <div class="form-group">
            	<div class="ui-widget">
                <?php 
                    echo form_label( 'รหัสลูกค้า', 'CustomerCode' );
                    echo form_input( array(	'name'	=> 'CustomerCode',
											'id' 	=> 'CustomerCode',
											'class'	=> 'form-control'
									), !empty($Head["CustomerCode"])?$Head["CustomerCode"]:""
					);
                ?>
            	</div>
            </div>        
        </div>
        <div class="col">
            <div class="form-group">
                <?php 
                    echo form_label( 'ชื่อลูกค้า', 'CustomerName' );
                    echo form_input( array(	'name'	=> 'CustomerName',
											'id'	=> 'CustomerName',
											'class' => 'form-control'
									), !empty($Head["CustomerName"])?$Head["CustomerName"]:""
					); 
                ?>
                
            </div>        
        </div>
      </div>
      
      <div class="row">
        <div class="col">
            <div class="form-group">
                <?php 
                    echo form_label( 'ที่อยู่ลูกค้า', 'CustomerAddress' );
                    echo form_textarea( array(	'name' 	=> 'CustomerAddress',
												'id' 	=> 'CustomerAddress',
												'class' => 'form-control',
												'rows' 	=> '2'
                    					), !empty($Head["CustomerAddress"])?$Head["CustomerAddress"]:""
                    ); 
                ?>
            </div>        
        </div>
      </div>
      
      <div class="row">
        <div class="col">
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
        				<th>ราคารวม</th>
        			</tr>
        		</thead>
        		<tbody>
	        		<?php 
	        		//echo print_r($Detail);
	        			if($proc=="Edit"){
			        		$i=1;
			        		foreach ( $Detail as $rs )
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
        						
        						echo form_hidden("OrderID[]", !empty($rs['OrderID'])?$rs['OrderID']:'');
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
        												'class' => 'form-control text-right qty',
        												"onKeyup"	=> "fnc_CalcPrice()"
        										), !empty($rs['OrderQty'])?number_format($rs['OrderQty'],2):''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php
        						echo form_dropdown("OrderUnit[]", $dropdown, !empty($rs['OrderUnit'])?$rs['OrderUnit']:'', array("class"	=> "form-control"));
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'		=> 'OrderPrice[]',
        												'id'		=> 'OrderPrice'.$i,
        												'class' 	=> 'form-control text-right price',
        												"onKeyup"	=> "fnc_CalcPrice()"
        										), !empty($rs['OrderPrice'])?number_format($rs['OrderPrice'],2):''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'		=> 'TotalPrice[]',
        												'id'		=> 'TotalPrice'.$i,
        												'class' 	=> 'form-control text-right readonly total-price',
        												'readonly'	=> 'readonly'
        										), !empty($rs['TotalPrice'])?number_format($rs['TotalPrice'],2):''
        						);
        					?>        				
        				</td>
        			</tr>
        			<?php 
        						$i++;
			        		}
	        			}else{
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
        						echo form_hidden( array( 'name'		=> 'OrderID[]',
						        						 'id'		=> 'OrderID1'
        										), !empty($rs['OrderID'])?$rs['OrderID']:''
        						);
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
        						echo form_input( array(	'name'		=> 'OrderQty[]',
        												'id'		=> 'OrderQty1',
        												'class' 	=> 'form-control text-right qty',
        												"onKeyup"	=> "fnc_CalcPrice()"
        										), !empty($rs['OrderQty'])?number_format($rs['OrderQty'],2):''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
	        					echo form_dropdown("OrderUnit[]", $dropdown, !empty($rs['OrderUnit'])?$rs['OrderUnit']:'' , array("class"	=> "form-control"));
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'		=> 'OrderPrice[]',
        												'id'		=> 'OrderPrice1',
        												'class' 	=> 'form-control text-right price',
        												"onKeyup"	=> "fnc_CalcPrice()"
        										), !empty($rs['OrderPrice'])?number_format($rs['OrderPrice'],2):''
        						);
        					?>        				
        				</td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'		=> 'TotalPrice[]',
        												'id'		=> 'TotalPrice1',
        												'class' 	=> 'form-control text-right readonly total-price',
        												'readonly'	=> 'readonly'
        										), !empty($rs['TotalPrice'])?number_format($rs['TotalPrice'],2):''
        						);
        					?>        				
        				</td>
        			</tr>
    				<?php 
	        			}
    				?>
        		</tbody>
        		<tfoot>
        			<tr>
        				<td></td>
        				<td></td>
        				<td></td>
        				<td></td>
        				<td></td>
        				<td></td>
        				<td>
        					<?php 
        						echo form_input( array(	'name'		=> 'TotalOrderPrice',
        												'id'		=> 'TotalOrderPrice',
        												'class' 	=> 'form-control text-right readonly',
        												'readonly'	=> 'readonly'
        										), !empty($Head['TotalOrderPrice'])?number_format($Head['TotalOrderPrice'],2):''
        						);
        					?>
        				</td>
        			</tr>
        		</tfoot>
        	</table>
        </div>
      </div>
          		        
      <div class="row text-center">
            <div class="col">
                <?php
                    echo form_submit( array('name'	=> 'btn_save', 
                    						'id'	=> 'btn_save',
                    						'class' => 'btn btn-primary'
                    				), 'บันทึกข้อมูล'
                    );   
                    echo anchor('Orders/index', 'กลับหน้าหลัก', array('class' => 'btn btn-secondary'));
                ?>          	
            </div>
      </div>

  <?php echo form_close(); ?>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////// -->
</div>  <!-- END Container -->

<script>

	$(function(){

		//### Datepicker ###//
		$( ".date" ).datepicker();
	
		//### Modify Row ###//
		fnc_ModifyRow();
		
		//### Calc Price ###//
		fnc_CalcPrice();
	
		$("#btn_add").click(function(){
			fnc_AddRow("#tbl_order")
		});
		
		///// Autocomplete /////
		// AutocompleteReturn2Values("<?php echo site_url('Orders/GetAutocomplete_Customer'); ?>", "CustomerCode", "CustomerName", "CustomerCode", "CustomerName", false);
		// AutocompleteReturn2Values("<?php echo site_url('Orders/GetAutocomplete_Customer'); ?>", "CustomerName", "CustomerCode", "CustomerName", "CustomerCode", false);
	
		///// Autocomplete Multi /////
		var objAutoComplete = {
				
				elementKeyUp : 	{"elementId" : "CustomerCode","fieldName" : "CustomerCode"},

				elementOther :	[
											{"showDetail":false,"elementId":"CustomerCode","fieldName":"CustomerCode"},
											{"showDetail":true,"elementId":"CustomerName","fieldName":"CustomerName"},
											{"showDetail":false,"elementId":"CustomerAddress","fieldName":"CustomerAddress"},
								] 
		};
		
		AutoCompleteAjax("<?php echo site_url('Orders/GetAutocompleteObj_Customer');?>", objAutoComplete);
	    
		
	}); //end $(function()
	
	//////////-------------------------------------------------------------------------------------------//////////
	function fnc_AddRow(tbl){
		
		var tableBody = $(tbl).find("tbody");
		
			trLast = tableBody.find("tr:last");
			trNew = trLast.clone();
			
			trNew.find("input").val('');
			trLast.after(trNew);
			
			fnc_ModifyRow();
	}
	
	//////////-------------------------------------------------------------------------------------------//////////
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

	//////////-------------------------------------------------------------------------------------------//////////
	function fnc_ModifyRow(){
		
		var tableBody = $('#tbl_order').find("tbody");
		var i=0;
		//console.log(tableBody.find("tr").length);
		tableBody.find("tr").each(function(){
			i++;
			$(this).attr("id","row_"+i);
			$(this).find("button.btn_del").attr("id","btn_del"+i).attr("data-row",i);
			$(this).find("input,select").each(function() 
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

	//////////-------------------------------------------------------------------------------------------//////////
	function fnc_CalcPrice(){
		var tableBody = $('#tbl_order').find("tbody");
		var i=0;
		var totalQty = 0;
		var totalPriceAll = 0.00;
	
		tableBody.find("tr").each(function(){
	
			//Use parseFloat() or parseInt()
			Qty = $(this).find("input.qty").val();
			Price = $(this).find("input.price").val();
			
			totalPrice = Qty*Price;
			totalPriceAll += totalPrice;
	
			$(this).find("input.total-price").val(totalPrice);
			//console.log(totalPrice);
			
		});
	
		$("#TotalOrderPrice").val(totalPriceAll);
	}


</script>
