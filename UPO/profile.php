<?php 

	include('config/db_connect.php');

	

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); 

	$ck = $_SESSION["username"];
	
	$sql = "SELECT * FROM review WHERE email='$ck'";

	$result = mysqli_query($conn, $sql);

	$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
	?>

    <h2>! MY REVIEWS !</h2>

	<div class="container">

			<?php foreach($reviews as $review): ?>

				
    			<div id="formContent">

						<div>
							<h3><?php echo htmlspecialchars($review['name']); ?></h3>
                            <h3><?php echo htmlspecialchars($review['writer']); ?></h3>
							<ul>
								<?php foreach(explode(',', $review['review']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $review['id'] ?>">more info</a>
						</div>

				</div>


			<?php endforeach; ?>
			
	</div>
    
    <?php include('templates/footer.php'); ?>
</html>