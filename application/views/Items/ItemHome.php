
        	<h4 class="card-title"># รายการสินค้า</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="5%">
                            <a href="<?php echo site_url('Items/ItemForm/Add'); ?>" class="btn btn-outline-primary btn-sm">เพิ่ม</a>
                        </th>
                        <th width="20%">รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th width="7%"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i=0;
                    //print_r($results);
                    foreach ( $result as $rs )
                    {
                        $i++;
                ?>
                    <tr>
                        <td class="text-center"><?php echo $i;?></td>
                        <td><?php echo $rs["ItemCode"];?></td>
                        <td><?php echo $rs["ItemName"];?></td>
                        <td>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                              <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item item-edit" href="<?php echo site_url('Items/ItemForm/Edit/'.$rs["ItemCode"]); ?>">แก้ไข</a>
                                <a class="dropdown-item item-delete" href="<?php echo site_url('Items/DeleteItem/Delete/'.$rs["ItemCode"]); ?>">ลบ</a>
                              </div>
                            </div>
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
		event.preventDefault();
		// var href = $(this).attr('href');
		confirm('ยืนยันการบันทึกข้อมูล ?', function( result ){
			if( result ){
				var url = $(this).attr('href');	// "<?php echo site_url("Items/DeleteItem"); ?>";
				$.ajax({
					type: "POST",
					url: url,
					//data: $(this).serialize(),
			        dataType:'html',
			        cache: false,
			        success: function(data){
			        	alert("บันทึกข้อมูลเรียบร้อย","success");
				        window.location.href = "<?php echo site_url("Items/index"); ?>";
			        },
		        	error: function(data, errorThrown){
		        		alert("บันทึกข้อมูลไม่สำเร็จ","danger");
		        		return false;
		        	}
				});	//-- Ajax.
			}	//-- If result.
		});	//-- Confirm.
		
	});
	
}) //end $(function()

</script>   
