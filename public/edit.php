<?php
require __DIR__ . '/../app/config.php';

use App\SurveyRespondent\SurveyRespondentDbHandler;

$surveyRespondentDbHandler = new SurveyRespondentDbHandler($app['database']);

if (empty($surveyRespondent)) {
	$id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : die('Missing id');
	$surveyRespondent = $surveyRespondentDbHandler->fetchById($id);
}

?>
<?php require 'layouts/header.php';?>

<div class="container">
	<div class="header clearfix">
		<h2 class="float-left">Uppdatera respondent </h2>
	</div>

	<form id="updateForm" action="" method="POST">
		<input type="hidden" id="id" name="id" value="<?=$surveyRespondent->getRespondentId()?>">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="firstName">Förnamn</label>
				<input type="firstName" class="form-control" id="firstName" name="firstName" value="<?=$surveyRespondent->getFirstName()?>">
			</div>
			<div class="form-group col-md-6">
				<label for="lastName">Efternamn</label>
				<input type="lastName" class="form-control" id="lastName" name="lastName" value="<?=$surveyRespondent->getLastName()?>">
			</div>
		</div>
		<div class="form-group">
			<label for="email">E-post</label>
			<input type="email" class="form-control" id="email" name="email" value="<?=$surveyRespondent->getEmail()?>">
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input type="text" class="form-control" id="address" name="address" value="<?=$surveyRespondent->getAddress()?>">
		</div>
		<button type="submit" class="btn btn-success">Uppdatera</button>
		<a href="index.php" role="button" class="btn btn-light">Tillbaka</a>
	</form>
</div>

<?php require 'layouts/footer.php';?>