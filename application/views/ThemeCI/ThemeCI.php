
	<!-- //### AutoComplete ############################################################################// -->
	<h5>&equiv; AutoComplete</h5>
	<div class="row">
		<div class="col">
	  		<div class="form-group">
                <?php 
                    echo form_label( 'รหัสลูกค้า', 'CustomerCode' );
                    echo form_input( array(	'name'		=> 'CustomerCode',
											'id' 		=> 'CustomerCode',
											'class'		=> 'form-control',
                    						'required'	=> ''
									), !empty($Head["CustomerCode"])?$Head["CustomerCode"]:""
					);
                ?>
            </div> 
	  	</div>
	  	<div class="col">
	  		<div class="form-group">
                <?php 
                    echo form_label( 'ชื่อลูกค้า', 'CustomerName' );
                    echo form_input( array(	'name'		=> 'CustomerName',
											'id'		=> 'CustomerName',
											'class' 	=> 'form-control',
                    						'required'	=> ''
									), !empty($Head["CustomerName"])?$Head["CustomerName"]:""
					); 
                ?>
                
            </div>
	  	</div>
	</div>
	  
	<br>
	  
	<h5>&equiv; AutoComplete Multi </h5>
	<div class="row">
	  	<div class="col">
	  		<div class="form-group">
                <?php 
                    echo form_label( 'รหัสลูกค้า', 'Code' );
                    echo form_input( array(	'name'		=> 'Code',
											'id' 		=> 'Code',
											'class'		=> 'form-control',
                    						'required'	=> ''
									), !empty($Head["CustomerCode"])?$Head["CustomerCode"]:""
					);
                ?>
            </div>
	  	</div>
	  	<div class="col">
	  		<div class="form-group">
                <?php 
                    echo form_label( 'ชื่อลูกค้า', 'Name' );
                    echo form_input( array(	'name'		=> 'Name',
											'id'		=> 'Name',
											'class' 	=> 'form-control',
                    						'required'	=> ''
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
                    echo form_label( 'ที่อยู่ลูกค้า', 'Address' );
                    echo form_textarea( array(	'name' 	=> 'Address',
												'id' 	=> 'Address',
												'class' => 'form-control',
												'rows' 	=> '2'
                    					), !empty($Head["CustomerAddress"])?$Head["CustomerAddress"]:""
                    ); 
                ?>
            </div>
	  	</div>
	</div>

<script>
  
$( function() {

	//### Autocomplete ###//
	AutocompleteReturn2Values("<?php echo site_url('Tests/get_autocomplete'); ?>", "CustomerCode", "CustomerName", "CustomerCode", "CustomerName", false);
	AutocompleteReturn2Values("<?php echo site_url('Tests/get_autocomplete'); ?>", "CustomerName", "CustomerCode", "CustomerName", "CustomerCode", false);

	//### Autocomplete Multi ##//
	var objAutoComplete = {
		
		elementKeyUp : 	{"elementId" : "Code","fieldName" : "CustomerCode"},

		elementOther :	[
									{"showDetail":false,"elementId":"Code","fieldName":"CustomerCode"},
									{"showDetail":true,"elementId":"Name","fieldName":"CustomerName"},
									{"showDetail":false,"elementId":"Address","fieldName":"CustomerAddress"},
						] 
	};

	AutoCompleteAjax("<?php echo site_url('Tests/get_autocomplete_obj');?>", objAutoComplete);
    
});
  
</script>
 