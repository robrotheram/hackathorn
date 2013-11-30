<?php
$doc = new DOMDocument;
$doc->loadHTMLFile( 'http://www.w3schools.com/dom/');
var_dump($doc);
?>





<?php
	$result = <script>
		$.post("aggregate_search.php",
		{
		  keyword:key,
		  location:loc
		},
		function(data,status){
			//alert(data);
		  var obj = jQuery.parseJSON(data);
		  
		  if(obj.success == "1"){
			window.location = "index1.html";
		  }else{
			alert("No data has been retrieved!");
		  }
		});
		
		return obj;
	</script>
	
	
?>