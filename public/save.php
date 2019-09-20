<?php
require __DIR__ . '/../app/config.php';

use App\SurveyRespondent\SurveyRespondent;
use App\SurveyRespondent\SurveyRespondentDbHandler;
use Core\Validator;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	die('Only POST method is allowed');
}

$validator = new Validator;
$errorMessage = $validator->validate(SurveyRespondent::VALIDATION_SETTINGS, $_POST);

if (!$errorMessage) {
	$surveyRespondentDbHandler = new SurveyRespondentDbHandler($app['database']);

	$surveyRespondent = new SurveyRespondent();
	$surveyRespondent->setRespondentId($_POST['id'] ?? null);
	$surveyRespondent->setFirstName($_POST['firstName'] ?? '');
	$surveyRespondent->setLastName($_POST['lastName'] ?? '');
	$surveyRespondent->setAddress($_POST['address'] ?? '');
	$surveyRespondent->setEmail($_POST['email'] ?? '');
	$surveyRespondentDbHandler->save($surveyRespondent);

	echo json_encode(['success' => true, 'errorMessage' => []]);
} else {
	echo json_encode(['success' => false, 'errorMessage' => $errorMessage]);
}
