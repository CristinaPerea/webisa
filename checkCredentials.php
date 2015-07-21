<?php
	if(strcmp($_POST['password'], "isa-data")!=0)
		header("Location:error.php");
?>
<p>Click para crear la caché</p>
<form action="fetching.php">
	<button type="submit">Fetch!</button>
</form>