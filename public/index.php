<?php
require __DIR__ . '/../app/config.php';

use App\SurveyRespondent\SurveyRespondentDbHandler;

$surveyRespondentDbHandler = new SurveyRespondentDbHandler($app['database']);

if (isset($_POST['id'])) {
	$surveyRespondentDbHandler->deleteById($_POST['id']);
}
$surveyRespondantList = $surveyRespondentDbHandler->fetchAll();
?>
<?php include 'layouts/header.php';?>

<div class="container">
	<div class="header clearfix">
		<h2 class="float-left">Hantera enkät respondenter</h2>
		<a href="create.php" role="button" class="btn btn-light float-right">Skapa ny</a>
	</div>

	<div><b>Antal rader:</b> <?=$surveyRespondentDbHandler->rowCount();?></div>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Förnamn</th>
				<th>E-post</th>
				<th>Adress</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($surveyRespondantList as $surveyRespondant): ?>
				<tr>
					<td><?=$surveyRespondant->getRespondentId()?></td>
					<td><?=$surveyRespondant->getFirstName()?> <?=$surveyRespondant->getLastName()?></td>
					<td><?=$surveyRespondant->getEmail()?></td>
					<td><?=$surveyRespondant->getAddress()?></td>
					<td>
						<div class="float-right">
								<a href="edit.php?id=<?=$surveyRespondant->getRespondentId()?>" role="button" class="btn btn-light">Uppdatera</a>
								
								<input type="hidden" name="id" value="<?=$surveyRespondant->getRespondentId()?>">
								<button type="button" class="btn btn-danger" data-respondant-id="<?=$surveyRespondant->getRespondentId()?>" data-toggle="modal" data-target="#confirm-delete">Radera</button>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="modal" id="confirm-delete" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Radera respondent</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Är du säker på att du vill radera respondent?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-delete">Radera</button>
				<button type="button" class="btn btn-light" data-dismiss="modal">Avbryt</button>
			</div>
		</div>
	</div>
</div>

<?php include 'layouts/footer.php';?>