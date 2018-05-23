<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 14.11.2017
 * Time: 17:23
 */

namespace Model\Repository;
use Model\Entity\User;

class UserRepository
{
    private $db;
    public function setDb(\PDO $db)
    {
        $this->db = $db;
        return $this;
    }

//    public function registerUserAction(User $user)
//    {
//        $db = $this->db;
//        $data = [
//           'login' => $user->getLogin(),
//           'password' => $user->getPassword(),
//            'email' => $user->getEmail(),
//            'role' => $user->getRole(),
//            'active' => false,
//            'activationHash' => $user->getActivationHash()
//        ];
//        $sql = 'INSERT INTO users VALUES (null, :login, :password, :email, :role, :active, :activationHash)';
//        $sth = $db->prepare($sql);
//        $sth->execute($data);
//    }

    public function check($login)
    {
        $db = $this->db;
        $sth = $db->prepare('SELECT * FROM users WHERE login = :login');
        $sth->execute(['login' => $login]);
        $data = $sth->fetch(\PDO::FETCH_ASSOC);
        if (!$data){
            return null;
        }
        return (new User($data['login'], $data['password'], (bool) $data['active']));
    }
    public function getAll()
    {
        $db = $this->db;
        $collection = [];
        $sth = $db->query('SELECT * FROM users');
        while($data = $sth->fetch(\PDO::FETCH_ASSOC)){
            $user = (new User($data['login'], $data['password'], $data['active']));
            $collection[] = $user;
        };
        return $collection;
    }
}