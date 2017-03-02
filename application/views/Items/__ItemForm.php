
<?php 
  
  	$proc = $this->uri->segment(3);
  	$hidden = array('proc' => $proc);
  	echo form_open_multipart('Items/ManageDataItem', array('id' => 'frm_item'), $hidden);
	//echo form_hidden("proc", $proc, array('id' => 'proc'));
	
?>

      <div class="row">
      	<div class="col"></div>
      	<div class="col">
      		<?php 
		      	if( !empty($ItemImage) ){
		      		$array_img = array(
								        'src'   => 'assets/imgs/Items/'.$ItemImage,
								        'alt'   => '',
								        'width' => '150',
								        'height'=> '150',
		      							'class'	=> 'card-img-top'
								);  
	      			echo "<div class='card' style='width:10rem;'>".img($array_img)."</div>";
		      	}
		    ?>
      		
      		<!-- <div class="col"> -->
	            <div class="form-group">
	                <?php 
	                	//echo img('img/Lithop01.jpg', TRUE);
	                    echo form_label( 'รูปสินค้า', 'ItemImage' );
	                    echo form_upload( array( 'name'				=> 'ItemImage',
	                    						 'id' 				=> 'ItemImage',
	                    						 'class' 			=> 'form-control-file',
	                    						 'aria-describedby' => 'fileHelp'
										), !empty($ItemImage)?$ItemImage:''
						); 
	                ?>
	            </div>        
        	<!-- </div> -->
      	</div>
      </div>
      
      <div class="row">
        <div class="col-6">
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
        <div class="col-6">
            <div class="form-group">
                <?php 
					
                    echo form_label( 'วันที่', 'ItemDate' );
                    echo form_input( array(	'name' 		=> 'ItemDate',
											'id' 		=> 'ItemDate',
                    						'class' 	=> 'form-control date',
                    						'required'	=> ''
									), !empty($ItemDate)?chg_date_en($ItemDate):''
					); 
                ?>
                
            </div>        
        </div>
      </div>
      
      <div class="row">
      	<div class="col">
            <div class="form-group">
                <?php 
                    echo form_label( 'ชื่อสินค้า', 'ItemName' );
                    echo form_input( array(	'name'		=> 'ItemName',
											'id'		=> 'ItemName',
											'class'		=> 'form-control',
                    						'required'	=> ''
									), !empty($ItemName)?$ItemName:''
					); 
                ?>
                
            </div>        
        </div>
      </div>

      <div class="row">
        <div class="col">
            <div class="form-group">
                <?php 
                    echo form_label( 'จำนวน', 'ItemQty' );
                    echo form_input( array(	'name'		=> 'ItemQty',
                    						'id'		=> 'ItemQty',
                    						'class'		=> 'form-control text-right',
                    						'required'	=> ''
									), !empty($ItemQty)?number_format($ItemQty,2):''
					); 
                ?>
                
            </div>        
        </div>
        <div class="col">
            <div class="form-group">
                <?php 
	                echo form_input( array(	'name'		=> 'ItemUnit',
					                		'id'		=> 'ItemUnit',
					                		'class'		=> 'form-control',
	                						'type'		=> 'hidden'
					                ), !empty($ItemUnit)?$ItemUnit:''
                	);
                	echo form_label( 'หน่วยนับ', 'UnitName' );
                    echo form_input( array(	'name'		=> 'UnitName',
                    						'id'		=> 'UnitName',
                    						'class'		=> 'form-control',
                    						'required'	=> ''
									), !empty($UnitName)?$UnitName:''
					); 
                ?>
                
            </div>        
        </div>
      </div>
           
      <div class="row">
        <div class="col">
            <div class="form-group">
                <?php 
                    echo form_label( 'ราคาต่อหน่วย', 'ItemPrice' );
                    echo form_input( array( 'name'		=> 'ItemPrice',
											'id'		=> 'ItemPrice',
                    						'class' 	=> 'form-control text-right',
                    						'required'	=> ''
									), !empty($ItemPrice)?number_format($ItemPrice,2):''
					); 
                ?>
                
            </div>        
        </div>
        
      </div>
      
      <div class="row">
      	<div class="col">
            <div class="form-group">
                <?php 
                    echo form_label( 'รายละเอียดสินค้า', 'ItemDescription' );
                    echo form_textarea( array(	'name'	=> 'ItemDescription',
												'id'	=> 'ItemDescription',
												'class'	=> 'form-control',
                    							'rows' 	=> '3'
									), !empty($ItemDescription)?$ItemDescription:''
					); 
                ?>
                
            </div>        
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
                    echo anchor('Items/index', 'กลับหน้าหลัก', array('class' => 'btn btn-secondary'));
                ?>          	
            </div>
        </div>

<?php echo form_close();?>
  

<script>

$(function(){

	//### Datepicker ###//
	$( ".date" ).datepicker({ dateFormat: 'dd/mm/yy' });

	//### Autocomplete Return 2 Value ###//
	AutocompleteReturn2Values("<?php echo site_url('Items/GetAutocomplete_Unit'); ?>", "UnitName", "ItemUnit", "UnitName", "UnitCode", false);

	//### Submit Form ###//
	$('#frm_item').on('submit', function ( event ) {
		event.preventDefault();
		swal({
			  title: "ยืนยัน",
			  text: "ยืนยันการบันทึกข้อมูล ?",
			  type: "warning", 
			  confirmButtonText: 'ยืนยัน',	//'Yes, save it!',
			  cancelButtonText: 'ยกเลิก',	// 'No, keep it',
			  showCancelButton: true,
			  showLoaderOnConfirm: true
		}).then( function (isConfirm) {
			if (!isConfirm) return;
			
			var url = "<?php echo site_url('Items/ManageDataItem'); ?>";
			$.ajax({
				type: "POST",
				url: url,
				data: new FormData($("#frm_item")[0]),	// $("#frm_item").serialize(),
				enctype: 'multipart/form-data',
		        //dataType:'html',
		        cache: false,
		        processData: false,
    			contentType: false,
		        success: function(data){
		        	//alert("บันทึกข้อมูลเรียบร้อย","success");
		        	swal({
		  			  title: 'แจ้งเตือน',
		  			  text: 'บันทึกข้อมูลเรียบร้อย',
		  			  type: 'success',
		  			  timer: 2000,
		  			  showCloseButton: false
		        	}).then(function () {
			        	//##### กลับหน้าหลัก #####//
			        	window.location.href = "<?php echo site_url('Items/index'); ?>";
		        	},function (dismiss) {
		        	    if (dismiss === 'timer') {
		        	        console.log('I was closed by the timer')
		        	      }
		        	})
			       
		        },
	        	error: function(data, errorThrown){
	        		//alert("บันทึกข้อมูลไม่สำเร็จ","danger");
	        		swal(
		        			  'แจ้งเตือน',
		        			  'บันทึกข้อมูลไม่สำเร็จ',
		        			  'danger'
			        )
	        		return false;
	        	}
			});	//-- Ajax.
		},function ( dismiss ) {
			if ( dismiss === 'cancel' ) {
			    swal(
		    		'แจ้งเตือน',
        		    'ยกเลิกการบันทึกข้อมูล',
        		    'error'
			    )
			}
		});		 
		
	});	//-- Submit Form.
	
		
	
});	// end $(function()
	
</script>
