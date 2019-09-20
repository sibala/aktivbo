<?php

namespace Core;

class Database 
{
	/**
	* @var PDO
	*/
	private $db = null;

	/**
	* @var PDOStatement
	*/
	private $stmt = null;

	public function __construct(array $options = []) 
	{
		$default = [
			'dsn' 			 => null,
			'username' 		 => null,
			'password' 		 => null,
			'driver_options' => null,
			'fetch_style' 	 => \PDO::FETCH_OBJ,
		];
		$options = array_merge($default, $options);
		
		try {
			$this->db = new \PDO($options['dsn'], $options['username'], $options['password'], $options['driver_options']);
		}
		catch(\Exception $e) {
			throw new \PDOException('Could not connect to database, hiding connection details.');
		}

		$this->db->SetAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, $options['fetch_style']); 
	}

	public function executeFetchQuery(string $query, array $params = [], int $fetchStyle = null):  ?array
	{
		$this->stmt = $this->db->prepare($query);
		$this->stmt->execute($params);
		$result = $this->stmt->fetchAll($fetchStyle);

		return $result;
	}

	public function executeModifyQuery(string $query, array $params = []): bool
	{
		$this->stmt = $this->db->prepare($query);
		$result = $this->stmt->execute($params);

		return $result;
	}

	public function rowCount(): int
	{
		return $this->stmt === null ? 0 : $this->stmt->rowCount();
	}
}
