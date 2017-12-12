<html>

<style type="text/css">
    
.hidden{
  display: none;
}
    
</style>  
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script>
    
$(document).ready(function(){
  
$("#mobile-num").on("blur", function(){
        var mobNum = $(this).val();
        var filter = /^\d*(?:\.\d{1,2})?$/;

          if (filter.test(mobNum)) {
            if(mobNum.length==10){
                 // alert("valid");
              $("#mobile-valid").removeClass("hidden");
              $("#folio-invalid").addClass("hidden");
             } else {
                //alert('Please put 10  digit mobile number');
               $("#folio-invalid").removeClass("hidden");
               $("#mobile-valid").addClass("hidden");
                return false;
              }
            }
            else {
             // alert('Not a valid number');
              $("#folio-invalid").removeClass("hidden");
              $("#mobile-valid").addClass("hidden");
              return false;
           }
    
  });
  
});
    
</script>

	<body>
    
    <div id="mobile">
	  <div class="input">
		<div class="label">
		  <div class="label-1">
			<span id="mobile-valid" class="hidden mob">
				<i class="fa fa-check pwd-valid"></i>Valid Mobile No
			</span>  
			<span id="folio-invalid" class="hidden mob-helpers">
				<i class="fa fa-times mobile-invalid"></i>Invalid mobile No
			</span>
		  </div>
		</div>
		<div class="row">
		  <div class="col-xs-3">
			<div class="label-2">
			  Mobile No
			</div>
		  </div>
		  <div class="col-xs-9">
			<input id="mobile-num" type="text" class="form-control form-change-element" />
		  </div>
		</div>
	  </div>
	</div>
    
</body>
    
</html>
