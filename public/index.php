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
		<h1>USER LOGIN</h1>
		<form class="was-validated" action="../includes/loginsub.php" method="POST">
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
			<center>
				<a href="#" data-toggle="modal" data-target="#mymodal" class="btn btn-link">forgot password?</a>
			</center>

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
		<h3>Not yet a member, click<a class="btn btn-link" href="register.php">Here</a> to register</h3>
	</div>


	<div class="modal fade" id="mymodal">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<!-- the header -->
				<div class="modal-header">
					<h4 class="modal-title">Forgot Password</h4>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- modal body -->
				<div class="modal-body">
					<form>
						<div class="form-group">
							<input type="email" name="email2" class="form-control" placeholder="enter email registered with">
						</div>
					</form>
				</div>

				<!-- modal footer -->
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal">close</button>
				</div>
			</div>
		</div>
	</div>
</body>

</body>
<script type="text/javascript" src="../assets/dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/all.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/dist/js/bootstrap.js"></script>

</html>