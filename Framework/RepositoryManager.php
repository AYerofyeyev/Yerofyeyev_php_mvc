<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 10.11.2017
 * Time: 17:12
 */

namespace Framework;


class RepositoryManager
{
    private $repositories = [];

    private $db;

    public function setDb(\PDO $db)
    {
        $this->db = $db;
        return $this;
    }
    public function createRepository($entityName)
    {
        if(isset($this->repositories[$entityName])){
            return $this->repositories[$entityName];
        }
        $className = "\\Model\\Repository\\{$entityName}Repository";
        $repository = new $className();
        $repository->setDB($this->db);
        $this->repositories[$entityName] = $repository;
        return $repository;
    }
}