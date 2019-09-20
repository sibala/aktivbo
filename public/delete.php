<?php

require __DIR__ . '/../app/config.php';

use App\SurveyRespondent\SurveyRespondent;
use App\SurveyRespondent\SurveyRespondentDbHandler;
use Core\Validator;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	die('Only POST method is allowed');
}

if (isset($_POST['id']) && is_numeric($_POST['id'])) {
	$surveyRespondentDbHandler = new SurveyRespondentDbHandler($app['database']);
	$surveyRespondentDbHandler->deleteById($_POST['id']);
}
