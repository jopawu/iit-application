<?php

namespace iit\Application\Database;

use PDO;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class SelectQuery extends QueryBase
{
	/**
	 * @var array
	 */
	protected $fields;

	/**
	 * @param PDO $connection
	 * @param string $table
	 * @param array $fields
	 */
	public function __construct(PDO $connection, string $table, array $fields)
	{
		parent::__construct($connection, $table);

		$this->fields = $fields;
	}

	/**
	 * @return string
	 */
	public function getSql()
	{
		$sql = "SELECT {$this->getFields()} FROM {$this->getTable()} WHERE {$this->getWhereClause()}";
		return $sql;
	}

	/**
	 * @return array
	 */
	public function getValues()
	{
		return array_values($fields);
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
	protected function getWhereClause()
	{
		$whereClause = [];

		foreach(array_keys($this->where) as $field)
		{
			$whereClause[] = "{$this->quoteIdentifier($field)} = ?";
		}

		return $this->implodeWithAND($whereClause);
	}
}