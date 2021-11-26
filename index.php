<?php 

	include('config/db_connect.php');

	$sql = 'SELECT name, writer, review, id FROM review ORDER BY time';

	$result = mysqli_query($conn, $sql);

	$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Reviews!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($reviews as $review): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($review['name']); ?></h6>
                            <h6><?php echo htmlspecialchars($review['writer']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $review['review']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $review['id'] ?>">more info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
    
    <?php include('templates/footer.php'); ?>
</html>