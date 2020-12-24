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

    /**
     * @var array
     */
    private $connections;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getConnection(string $connectionName = 'default'): Connection
    {
        if(array_key_exists($connectionName, $this->connections)) {
            return $this->connections[$connectionName];
        }
        if (!array_key_exists($connectionName, $this->config['connections'])) {
            throw new NotFoundConnectionException(sprintf("Connection '%s' doesn't exist", $connectionName));
        }
        $connectionConfig = $this->config['connections'][$connectionName];
        if ($connectionConfig['driver'] === self::DRIVER_PDO_PGSQL) {
            $dsn = sprintf(
                'pgsql:host=%s;port=%s;dbname=%s;user=%s;password=%s',
                $connectionConfig['host'],
                $connectionConfig['port'],
                $connectionConfig['dbname'],
                $connectionConfig['username'],
                $connectionConfig['password']
            );
        }
        if (empty($dsn)) {
            throw new NotFoundConnectionException(sprintf("Connection '%s' doesn't exist", $connectionName));
        }
        $this->connections[$connectionName] = new Connection($dsn);
        return $this->connections[$connectionName];
    }
}