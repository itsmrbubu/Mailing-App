<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mail</title>
	<link rel="stylesheet" type="text/css" href="../assets/dist/css/bootstrap.min.css">
</head>

<body>
	<div class="container mt-5">
		<h1>USER Register</h1>
		<form class="was-validated" action="../includes/registersub.php" method="POST">
			<div class="form-group">
				<label>Full Name:</label>
				<input type="text" class="form-control" name="fullname" required>
				<div class="valid-feedback">field no longer empty</div>
				<div class="invalid-feedback">please fill in the field</div>
			</div>
			<div class="form-group">
				<label>Address:</label>
				<input type="text" class="form-control" name="address" required>
				<div class="valid-feedback">field no longer empty</div>
				<div class="invalid-feedback">please fill in the field</div>
			</div>
			<div class="form-group">
				<label>Phone:</label>
				<input type="text" class="form-control" name="phone" required>
				<div class="valid-feedback">field no longer empty</div>
				<div class="invalid-feedback">please fill in the field</div>
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" class="form-control" name="email" required>
				<div class="valid-feedback">field no longer empty</div>
				<div class="invalid-feedback">please fill in the field</div>
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" class="form-control" name="password" required>
				<div class="valid-feedback">field no longer empty</div>
				<div class="invalid-feedback">please fill in the field</div>
			</div>
			<div class="form-group">
				<label>Confirm Password:</label>
				<input type="password" class="form-control" name="conpassword" required>
				<div class="valid-feedback">field no longer empty</div>
				<div class="invalid-feedback">please fill in the field</div>
			</div>
			<div class="form-group">
				<button class="btn btn-success" name="submit">Submit</button>
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
		</form>
		<h3>Already a member, click<a class="btn btn-link" href="index.php">Here</a> to login</h3>
	</div>

</body>
<script type="text/javascript" src="../assets/dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/all.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.js"></script>

</html>