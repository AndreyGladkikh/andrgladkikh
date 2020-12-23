<?php


namespace AndrGladkikh\Database;


use AndrGladkikh\Exception\Database\NotFoundConnectionException;

class Database
{
    const DRIVER_PDO_PGSQL = 'pdo_pgsql';

    /**
     * @var array
     */
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getConnection(string $connectionName = 'default'): Connection
    {
        if (!array_key_exists($connectionName, $this->config)) {
            throw new NotFoundConnectionException(sprintf("Connection '%s' doesn't exist", $connectionName));
        }
        $config = $this->config[$connectionName];
//        $port = 5432; todo
        if ($config['driver'] === self::DRIVER_PDO_PGSQL) {
            $dsn = sprintf(
                'pgsql:host=%s;port=%s;dbname=%s;user=%s;password=%s',
                $config['host'], $config['port'], $config['dbname'], $config['username'], $config['password']
            );
        }
        if (empty($dsn)) {
            throw new NotFoundConnectionException(sprintf("Connection '%s' doesn't exist", $connectionName));
        }
        return new Connection($dsn);
    }
}