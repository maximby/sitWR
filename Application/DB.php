<?php


namespace Application;


class DB
{
    use TSingleton;

    protected $dbh;
    protected function __construct()
    {
        $conf = Config::instance()->data['db'];
        $dns = 'mysql:host=' . $conf['host'] . ';dbname=' . $conf['dbname'];
        $this->dbh = new \PDO($dns, $conf['userName'], $conf['password']);
    }

    function execute($sql, $params = [])
    {
        $stm = $this->dbh->prepare($sql);
        $result = $stm->execute($params);
        if(!$result)
            var_dump($stm->errorInfo()); //@todo закоментить
        return $result;
    }

    function query($sql, $params = [], $className = 'StdClass')
    {
        $stm = $this->dbh->prepare($sql);
        if (!$stm->execute($params)){
            var_dump($stm->errorInfo()); //@todo закоментить
            return false;
        }
        $result = $stm ->fetchAll(\PDO::FETCH_CLASS, $className);
        return $result;
    }
}