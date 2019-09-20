<?php

namespace App\SurveyRespondent;

use Core\Database;

class SurveyRespondentDbHandler extends Database
{
	public function __construct($option)
	{
		parent::__construct($option);
	}

	public function fetchAll(): array
	{
		$sql = "SELECT * FROM `survey_respondents`;";

		$surveyRespondents = [];
		foreach ($this->executeFetchQuery($sql) as $data) {
			$surveyRespondent = new SurveyRespondent;
			$surveyRespondent->setRespondentId($data->RespondentID);
			$surveyRespondent->setFirstName(htmlentities($data->FirstName));
			$surveyRespondent->setLastName(htmlentities($data->LastName));
			$surveyRespondent->setAddress(htmlentities($data->Address));
			$surveyRespondent->setEmail(htmlentities($data->{'E-mail'}));
			$surveyRespondents[] = $surveyRespondent;
		}

		return $surveyRespondents;
	}

	public function fetchById(int $id): ?SurveyRespondent
	{
		$sql = "SELECT * FROM `survey_respondents` WHERE RespondentID = ?;";

		if (($data = $this->executeFetchQuery($sql, [$id]))) {
			$surveyRespondent = new SurveyRespondent;
			$surveyRespondent->setRespondentId($data[0]->RespondentID);
			$surveyRespondent->setFirstName(htmlentities($data[0]->FirstName));
			$surveyRespondent->setLastName(htmlentities($data[0]->LastName));
			$surveyRespondent->setAddress(htmlentities($data[0]->Address));
			$surveyRespondent->setEmail(htmlentities($data[0]->{'E-mail'}));
		}

		return $surveyRespondent ?? null;
	}

	public function save(SurveyRespondent $surveyRespondent): bool
	{
		if ($surveyRespondent->getRespondentId()) {
			return $this->update($surveyRespondent);
		} else {
			return $this->create($surveyRespondent);
		}
	}

	private function update(SurveyRespondent $surveyRespondent): bool
	{
		$sql = "
			UPDATE `survey_respondents`
			SET FirstName = ?, LastName = ?, Address = ?, `E-mail` = ?
			WHERE RespondentID = ?;
		";

		$params = [
			$surveyRespondent->getFirstName(),
			$surveyRespondent->getLastName(),
			$surveyRespondent->getAddress(),
			$surveyRespondent->getEmail(),
			$surveyRespondent->getRespondentId(),
		];

		return $this->executeModifyQuery($sql, $params);
	}

	private function create(SurveyRespondent $surveyRespondent): bool
	{
		$sql = "
			INSERT INTO `survey_respondents` (FirstName, LastName, Address, `E-mail`)
			VALUES (?, ?, ?, ?);
		";

		$params = [
			$surveyRespondent->getFirstName(),
			$surveyRespondent->getLastName(),
			$surveyRespondent->getAddress(),
			$surveyRespondent->getEmail(),
		];

		return $this->executeModifyQuery($sql, $params);
	}

	public function deleteById(int $id): bool
	{
		$sql = "DELETE FROM `survey_respondents` WHERE RespondentID = ?;";

		return $this->executeModifyQuery($sql, [$id]);
	}

	public function delete(SurveyRespondent $surveyRespondent): bool
	{
		if (!$surveyRespondent->getRespondentId()) {
			throw new \RuntimeException('Missing RespondentID');
		}

		$sql = "DELETE FROM `survey_respondents` WHERE RespondentID = ?;";

		return $this->executeModifyQuery($sql, [$surveyRespondent->getRespondentId()]);
	}
}
