<?php

namespace iit\Application\Database;

use PDO;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class UpdateQuery extends QueryBase
{
	/**
	 * @var array
	 */
	protected $data;

	/**
	 * @var array
	 */
	protected $where;

	/**
	 * @param PDO $connection
	 * @param string $table
	 * @param array $data
	 * @param array $where
	 */
	public function __construct(PDO $connection, string $table, array $data, array $where)
	{
		parent::__construct($connection, $table);

		$this->data = $data;
		$this->where = $where;
	}

	/**
	 * @return string
	 */
	public function getSql()
	{
		$sql = "UPDATE {$this->getTable()} SET {$this->getAssignments()} WHERE {$this->getWhereClause()}";
		return $sql;
	}

	/**
	 * @return array
	 */
	public function getValues()
	{
		$values = array_merge(
			array_values($this->data), array_values($this->where)
		);

		return $values;
	}

	/**
	 * @return string
	 */
	protected function getAssignments()
	{
		$assignments = [];

		foreach(array_keys($this->data) as $field)
		{
			$assignments[] = "{$this->quoteIdentifier($field)} = ?";
		}

		return $this->implodeWithComma($assignments);
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