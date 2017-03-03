
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
		      		$img_path = "assets/imgs/Items/".$ItemImage;
		      	}else{
		      		$img_path = "assets/imgs/IMG_150x150.jpg";
		      	}
		      		$array_img = array(
								        'src'   => $img_path,
								        'alt'   => '',
								        'width' => '150',
								        'height'=> '150',
		      							'align'	=> 'middle'
		      							//'class'	=> 'card-img-top'
								);
		      	
		    ?>      		
			<div class='text-center'>
				<?php echo img($array_img); ?>
			</div>
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
                    						//'type'		=> 'date',
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
                    						'type'		=> 'number',
                    						'class'		=> 'form-control number',
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
                    						'type'		=> 'number',
                    						'class' 	=> 'form-control number',
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
		confirm('ยืนยันการบันทึกข้อมูล ?', function(){
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
		        	alert("บันทึกข้อมูลเรียบร้อย","success", "<?php echo site_url('Items/index'); ?>");			       
		        },
	        	error: function(data, errorThrown){
	        		alert("บันทึกข้อมูลไม่สำเร็จ","error");
	        		return false;
	        	}
			});	//-- Ajax.
		});	//-- Confirm	
		 
	});	//-- Submit Form.
	
		
	
});	// end $(function()
	
</script>
