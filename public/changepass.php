<?php require_once('../includes/header.php')?>

	<div class="container mt-5">
		<h1>Edit User Password</h1>
		<form class="was-validated" action="../includes/password.php" method="POST">
			<div class="form-group">
				<label>Password:</label>
				<input type="password" class="form-control" name="password" required>
				<div class="valid-feedback">field no longer empty</div>
				<div class="invalid-feedback">please fill in the field</div>
				<input type="hidden" name="id"  value="<?=$userid?>">
			</div>
			<div class="form-group">
				<label>Confirm Password:</label>
				<input type="password" class="form-control" name="conpassword" required>
				<div class="valid-feedback">field no longer empty</div>
				<div class="invalid-feedback">please fill in the field</div>
			</div>
			<div class="form-group">
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger">
						<?= $_GET['error'] ?>
					</div>
				<?php } elseif (isset($_GET['success'])) { ?>
					<div class="alert alert-success">
						<?= $_GET['success'] ?>
					</div>
				<?php } ?>
			</div> 
			<div class="form-group">
				<button class="btn btn-success" name="submit">Submit</button>
			</div>
		</form>
		<h3>click<a class="btn btn-link" href="dashboard.php">Here</a> to go back</h3>
	</div>

	
</body>
<script type="text/javascript" src="../assets/dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/all.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.js"></script>
</html>