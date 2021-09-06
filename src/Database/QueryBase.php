<?php

namespace iit\Application\Database;

use PDO;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
abstract class QueryBase
{
	/**
	 * @var PDO
	 */
	protected $connection;

	/**
	 * @var string
	 */
	protected $table;

	/**
	 * @param PDO $connection
	 */
	public function __construct(PDO $connection, string $table)
	{
		$this->connection = $connection;
		$this->table = $table;
	}

	/**
	 * @return string
	 */
	protected function getTable()
	{
		return $this->quoteIdentifier($this->table);
	}

	/**
	 * @param string $identifier
	 * @return string
	 */
	protected function quoteIdentifier($identifier)
	{
		return $this->connection->quote($identifier);
	}

	/**
	 * @param array $identifierArray
	 * @return array
	 */
	protected function quoteIdentifierArray($identifierArray)
	{
		$quotedIdentifiers = [];

		foreach ($identifierArray as $identifier) {
			$quotedIdentifiers[] = $this->quoteIdentifier($identifier);
		}

		return $quotedIdentifiers;
	}

	/**
	 * @param array $elements
	 * @return string
	 */
	protected function implodeWithComma($elements)
	{
		return implode(', ', $elements);
	}

	/**
	 * @param array $elements
	 * @return string
	 */
	protected function implodeWithAND($elements)
	{
		return implode(' AND ', $elements);
	}
}