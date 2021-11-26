<?php 

	include('config/db_connect.php');

	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM review WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}

	if(isset($_GET['id'])){

		$id = mysqli_real_escape_string($conn, $_GET['id']);

		$sql = "SELECT * FROM review WHERE id = $id";

		$result = mysqli_query($conn, $sql);

		$review = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<div class="container center grey-text">
		<?php if($review): ?>
			<h4><?php echo $review['name']; ?></h4>
            <h4><?php echo $review['writer']; ?></h4>
			<p>Created by <?php echo $review['email']; ?></p>
			<p><?php echo date($review['time']); ?></p>
			<h5>Review:</h5>
			<p><?php echo $review['review']; ?></p>

			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $review['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

		<?php else: ?>
			<h5>No such review exists!</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>