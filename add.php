<?php

	include('config/db_connect.php');

	$email = $name = $writer = $review = '';
	$errors = array('email' => '', 'name' => '', 'writer' => '', 'review' => '');

	if(isset($_POST['submit'])){
		

		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
		}


		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} else{
			$name = $_POST['name'];
		}


		if(empty($_POST['writer'])){
			$errors['writer'] = 'required';
		} else{
			$writer = $_POST['writer'];
		}

        if(empty($_POST['review'])){
			$errors['review'] = 'At least one word is required';
		} else{
			$ingredients = $_POST['review'];
		}

		if(array_filter($errors)){

		} else {

			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
            $writer = mysqli_real_escape_string($conn, $_POST['writer']);
			$review = mysqli_real_escape_string($conn, $_POST['review']);

			$sql = "INSERT INTO review(name,writer,email,review) VALUES('$name', '$writer', '$email','$review')";

			if(mysqli_query($conn, $sql)){
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

		}

	} 

?>


<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
		<h4 class="center">Add Your Review</h4>
		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Book Title</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
            <label>Writer</label>
			<input type="text" name="writer" value="<?php echo htmlspecialchars($writer) ?>">
			<div class="red-text"><?php echo $errors['writer']; ?></div>
			<label>Review</label>
			<input type="text" name="review" value="<?php echo htmlspecialchars($review) ?>">
			<div class="red-text"><?php echo $errors['review']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

    <?php include('templates/footer.php'); ?>
</html>