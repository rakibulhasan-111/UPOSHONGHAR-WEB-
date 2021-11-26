<?php 

	$conn = mysqli_connect('localhost', 'ninja', 'netninja', 'book_review');

	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>