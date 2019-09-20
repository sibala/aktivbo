<?php

namespace App\SurveyRespondent;

class SurveyRespondent
{
	/**
	 * @var array
	 */
	public const VALIDATION_SETTINGS = [
		'firstName' => ['type' => 'string', 'required' => true],
		'lastName' 	=> ['type' => 'string', 'required' => true],
		'address' 	=> ['type' => 'string', 'required' => true],
		'email' 	=> ['type' => 'string', 'required' => true, 'isEmail' => true],
	];

	/**
	 * @var ?int
	 */
	private $respondentId;

	/**
	 * @var ?string
	 */
	private $firstName;

	/**
	 * @var ?string
	 */
	private $address;

	/**
	 * @var ?string
	 */
	private $lastName;

	/**
	 * @var ?string
	 */
	private $email;

	public function setRespondentId(?int $respondentId): void
	{
		$this->respondentId = $respondentId;
	}

	public function getRespondentId(): ?int
	{
		return $this->respondentId;
	}

	public function setFirstName(string $firstName): void
	{
		$this->firstName = $firstName;
	}

	public function getFirstName(): ?string
	{
		return $this->firstName;
	}

	public function setLastName(string $lastName): void
	{
		$this->lastName = $lastName;
	}

	public function getLastName(): ?string
	{
		return $this->lastName;
	}

	public function setAddress(string $address): void
	{
		$this->address = $address;
	}

	public function getAddress(): ?string
	{
		return $this->address;
	}

	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	public function getEmail(): ?string
	{
		return $this->email;
	}
}
