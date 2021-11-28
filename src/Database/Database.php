<?php

namespace iit\Application\Database;

use iit\Application\Database\Exception\TooManyRowsException;
use PDO;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Database
{
	/**
	 * @var PDO
	 */
	protected $connection;

	/**
	 * @param string $hostname
	 * @param string $database
	 * @param string $username
	 * @param string $password
	 */
	public function __construct($hostname, $database, $username, $password)
	{
		$this->initConnection($hostname, $database, $username, $password);
	}

	/**
	 * @param string $hostname
	 * @param string $database
	 * @return string
	 */
	protected function buildConnectionDsn(string $hostname, string $database): string
	{
		return "mysql:host={$hostname};dbname={$database};charset=utf8";
	}

	/**
	 * @return array
	 */
	protected function buildConnectionOptions()
	{
		return [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => FALSE
		];
	}

	/**
	 * @param string $hostname
	 * @param string $database
	 * @param string $username
	 * @param string $password
	 */
	protected function initConnection($hostname, $database, $username, $password)
	{
		$options = $this->buildConnectionOptions();
		$dsn = $this->buildConnectionDsn($hostname, $database);

		$this->connection = new PDO($dsn, $username, $password, $options);
	}

	/**
	 * @param string $table
	 * @param array $fields
	 * @param array $where
	 * @return array|false
	 */
	public function select($table, $fields, $where)
	{
		$query = new SelectQuery($this->connection, $table, $fields, $where);
		$statement = $this->connection->prepare($query->getSql());
		$statement->execute($query->getValues());
		return $statement->fetchAll();
	}

	/**
	 * @param string $table
	 * @param array $data
	 * @return int
	 */
	public function insert($table, $data)
	{
		$query = new InsertQuery($this->connection, $table, $data);
		$statement = $this->connection->prepare($query->getSql());
		$statement->execute($query->getValues());
		return $this->connection->lastInsertId();
	}

	/**
	 * @param string $table
	 * @param array $data
	 * @param array $where
	 * @return bool
	 */
	public function update($table, $data, $where)
	{
		$query = new UpdateQuery($this->connection, $table, $data, $where);
		$statement = $this->connection->prepare($query->getSql());
		return $statement->execute($query->getValues());
	}

	/**
	 * @param string $table
	 * @param array $where
	 * @return bool
	 */
	public function delete($table, $where)
	{
		$query = new DeleteQuery($this->connection, $table, $where);
		$statement = $this->connection->prepare($query->getSql());
		return $statement->execute($query->getValues());
	}
	
	/**
	 * @param string $table
	 * @param array $fields
	 * @param array $where
	 * @return array|false
	 */
	public function findOne($table, $fields, $where)
	{
		$rows = $this->select($table, $fields, $where);
		
		if( count($rows) > 1 )
		{
			throw new TooManyRowsException(
				"Found more than one result rows, found number of rows: ".count($rows)
			);
		}
		
		return current($rows);
	}
	
	/**
	 * @param string $table
	 * @param array $fields
	 * @param array $where
	 * @return array|false
	 */
	public function findAll($table, $fields, $where)
	{
		return $this->select($table, $fields, $where);
	}
	
	/**
	 * gibt ein $stmt zurück für $stmt->fetchAll() um Daten zu holen
	 *
	 * @param string $sql
	 * @return false|\PDOStatement
	 */
	public function query($sql)
	{
		return $this->connection->query($sql);
	}
	
	/**
	 * gibt ein $stmt für $stmt->execute()
	 * anschließend dann mit $stmt->fetchAll() Daten holen
	 *
	 * @param string $sql
	 * @return false|\PDOStatement
	 */
	public function prepare($sql)
	{
		return $this->connection->prepare($sql);
	}
	
	/**
	 * @param string $table
	 * @return array|false
	 */
	public function describeTable($table)
	{
		$statement = $this->connection->query("DESCRIBE `".$table."`");
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}
