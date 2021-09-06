<?php

namespace iit\Application\Database;

use PDO;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class InsertQuery extends QueryBase
{
	/**
	 * @var array
	 */
	protected $data;

	/**
	 * @param PDO $connection
	 * @param string $table
	 * @param array $data
	 */
	public function __construct(PDO $connection, string $table, array $data)
	{
		parent::__construct($connection, $table);

		$this->data = $data;
	}

	/**
	 * @return string
	 */
	public function getSql()
	{
		$sql = "INSERT INTO {$this->getTable()} ({$this->getFields()}) VALUES ({$this->getPlaceholders()})";
		return $sql;
	}

	/**
	 * @return array
	 */
	public function getValues()
	{
		return array_values($this->data);
	}

	/**
	 * @return string
	 */
	protected function getFields()
	{
		$fields = array_keys($this->data);
		$fields = $this->quoteIdentifierArray($fields);
		$fields = $this->implodeWithComma($fields);
		return $fields;
	}

	/**
	 * @return string
	 */
	protected function getPlaceholders()
	{
		$placeholders = $this->buildPlaceholderArray( count($this->data) );
		$placeholders = $this->implodeWithComma($placeholders);
		return $placeholders;
	}

	/**
	 * @param int $number
	 * @return array
	 */
	protected function buildPlaceholderArray($number)
	{
		$placeholders = [];

		for ($i = 0; $i < $number; $i++) {
			$placeholders[] = '?';
		}

		return $placeholders;
	}
}