<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery Show Hide Elements Using Radio Buttons</title>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(function() {
    $('input[name="type"]').on('click', function() {
        if ($(this).val() == 'Experienced') {
            $('#textboxes').show();
        }
        else {
            $('#textboxes').hide();
        }
    });
});
</script>
    
</head>
<body>
    
<input type="radio" name="type" value="Fresher"> Fresher
<input type="radio" name="type" value="Experienced"> Experienced

<div id="textboxes" style="display: none">
    Company Name: <input type="text" hidden="true"/> 
    Designation: <input type="text" hidden="true"/> 
    Year_of_Experience: <input type="text" hidden="true"/> 
    
</div>
</body>
</html>
