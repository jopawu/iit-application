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
	 * @var array
	 */
	protected $where;

	/**
	 * @param PDO $connection
	 * @param string $table
	 * @param array $fields
	 */
	public function __construct(PDO $connection, string $table, array $fields, array $where)
	{
		parent::__construct($connection, $table);

		$this->fields = $fields;
		$this->where = $where;
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
		return array_values($this->where);
	}

	/**
	 * @return string
	 */
	protected function getFields()
	{
		$fields = array_values($this->fields);
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