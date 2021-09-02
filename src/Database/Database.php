<?php

namespace iit\Application\Database;

/**
 * @author      Björn Heyser <info@bjoernheyser.de>
 */
class Database
{
    /**
     * @var \PDO
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
        $options  = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE
        ];

        $dsn = "mysql:host={$hostname};dbname={$database};charset=utf8";
        
        $this->connection = new \PDO($dsn, $username, $password, $options);
    }

    public function select()
    {

    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
