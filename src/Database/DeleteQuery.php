<?php

namespace iit\Application\Database;

use PDO;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class DeleteQuery extends QueryBase
{
	/**
	 * @var array
	 */
	protected $where;

	/**
	 * @param PDO $connection
	 * @param string $table
	 * @param array $where
	 */
	public function __construct(PDO $connection, string $table, array $where)
	{
		parent::__construct($connection, $table);

		$this->where = $where;
	}

	/**
	 * @return string
	 */
	public function getSql()
	{
		$sql = "DELETE FROM {$this->getTable()} WHERE {$this->getWhereClause()}";
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