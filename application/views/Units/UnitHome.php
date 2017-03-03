
	<h4 class="card-title"># รายการหน่วยนับสินค้า</h4>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="5%">
					<a href="<?php echo site_url('Units/UnitForm/Add'); ?>" class="btn btn-outline-primary btn-sm">เพิ่ม</a>
				</th>
				<th width="20%">รหัสหน่วยนับ</th>
				<th>หน่วยนับสินค้า</th>
				<th width="7%"></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=0;
				//print_r($results);
				if(count($result) > 0 ){
					foreach ( $result as $rs )
					{
						$i++;
			?>
				<tr>
					<td class="text-center"><?php echo $i;?></td>
					<td><?php echo $rs["UnitCode"];?></td>
					<td><?php echo $rs["UnitName"];?></td>
					<td>
						<!-- Example single danger button -->
						<div class="btn-group">
						  <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action
						  </button>
						  <div class="dropdown-menu">
							<a class="dropdown-item item-edit" href="<?php echo site_url('Units/UnitForm/Edit/'.$rs["UnitID"]); ?>">แก้ไข</a>
							<a class="dropdown-item item-delete" href="<?php echo site_url('Units/DeleteUnit/Delete/'.$rs["UnitID"]); ?>">ลบ</a>
						  </div>
						</div>
					</td>
				</tr>
			<?php
					}
				}else{
			?>
				<tr>
					<td class="text-center" colspan="4">
						<h6>-- ไม่มีข้อมูล --</h6>
					</td>
				</tr>
			<?php 
				}
			?>
		</tbody>
	</table>

<script>

$(function(){

	$('.item-delete').on('click', function( event ){
		var url = $(this).attr('href');
		event.preventDefault();
			confirm('ยืนยันการบันทึกข้อมูล ?', function(){
				$.ajax({
					type: "GET",
					url: url,
					//data: new FormData($("#frm_order")[0]),	// $("#frm_item").serialize(),
					//enctype: 'multipart/form-data',
			        dataType:'html',
			        cache: false,
			        processData: false,
					contentType: false,
			        success: function(data){
			        	alert( "บันทึกข้อมูลเรียบร้อย", "success", "<?php echo site_url('Units/index'); ?>" );
			        },
		        	error: function(data, errorThrown){
		        		alert("บันทึกข้อมูลไม่สำเร็จ","danger");
		        		return false;
		        	}
				});	//-- Ajax.

			});	//-- Confirm.
		
	});	//-- item-delete

}) //end $(function()

</script>   
