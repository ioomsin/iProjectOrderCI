
<div class="container"> 

	<label for="CustomerCode">Customer : </label>
	<div class="row">
		<div class="col">
	  		<input id="CustomerCode" class="form-control" value="">
	  	</div>
	  	<div class="col">
	  		<input id="CustomerName" class="form-control" value="">
	  	</div>
	</div>
	  
	<br>
	  
	<label for="Code">Customer Multi : </label>
	<div class="row">
	  	<div class="col">
	  		<input id="Code" class="form-control" value="">
	  	</div>
	  	<div class="col">
	  		<input id="Name" class="form-control" value="">
	  	</div>
	</div>
	<div class="row">
	  	<div class="col">
	  		<textarea id="Address" rows="2" class="form-control"></textarea>
	  	</div>
	</div>

</div>


<script>
  
	  $( function() {
	
		///// Autocomplete /////
		AutocompleteReturn2Values("<?php echo site_url('Tests/get_autocomplete'); ?>", "CustomerCode", "CustomerName", "CustomerCode", "CustomerName", false);
		AutocompleteReturn2Values("<?php echo site_url('Tests/get_autocomplete'); ?>", "CustomerName", "CustomerCode", "CustomerName", "CustomerCode", false);

		///// Autocomplete Multi /////
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
  	 