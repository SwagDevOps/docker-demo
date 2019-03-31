<?php

class DB extends Singleton
{
    protected const OPTIONS = [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_CASE => PDO::CASE_LOWER
    ];

    /**
     * @var PDO
     */
    protected $connection;

    protected function __construct()
    {
        $this->connection = $this->connect();
    }

    /**
     * @return PDO
     */
    public function getConnection() : PDO
    {
        return $this->connection;
    }

    /**
     * Executes a prepared statement from given ``sql``.
     *
     * @param string $sql
     * @param array $params
     *
     * @return PDOStatement
     * @throws PDOException
     */
    public function execute($sql, array $params = []) : PDOStatement
    {
        $stt = $this->getConnection()->prepare($sql);
        $stt->execute($params);

        return $stt;
    }

    /**
     * @return PDO
     */
    protected function connect() : PDO
    {
        return new PDO(vsprintf('mysql:host=%s;dbname=%s', [
            $_SERVER['DB_HOST'],
            $_SERVER['DB_NAME'],
        ]), $_SERVER['DB_USER'],
            $_SERVER['DB_PASSWORD'],
            static::OPTIONS);
    }
}
