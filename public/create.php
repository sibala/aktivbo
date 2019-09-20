<?php require 'layouts/header.php';?>

<div class="container">
	<div class="header clearfix">
		<h2 class="float-left">Skapa ny respondent</h2>
	</div>

	<form id="createForm" action="" method="POST">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="firstName">Förnamn</label>
				<input type="firstName" class="form-control" id="firstName" name="firstName" placeholder="Förnamn">
			</div>
			<div class="form-group col-md-6">
				<label for="lastName">Efternamn</label>
				<input type="lastName" class="form-control" id="lastName" name="lastName" placeholder="Efternamn">
			</div>
		</div>
		<div class="form-group">
			<label for="email">E-post</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="E-post">
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input type="text" class="form-control" id="address" name="address" placeholder="Adress">
		</div>
		<button type="submit" class="btn btn-success">Skapa ny</button>
		<a href="index.php" role="button" class="btn btn-light">Tillbaka</a>
	</form>
</div>

<?php require 'layouts/footer.php';?>