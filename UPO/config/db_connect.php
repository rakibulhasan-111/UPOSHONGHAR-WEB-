<?php 

	$conn = mysqli_connect('localhost', 'rakib1707095', 'rakib1707095', 'book_review');

	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>