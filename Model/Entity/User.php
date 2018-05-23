<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 14.11.2017
 * Time: 17:14
 */

namespace Model\Entity;


class User
{
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    private $id;
    private $login;
    private $password;
    private $email;
    private $role;
    private $active;
    private $activationHash;

    /**
     * User constructor.
     * @param $login
     * @param $password
     * @param $active
     */
    public function __construct($login, $password, bool $active = false)
    {
        $this->login = $login;
        $this->password = $password;
        $this->active = $active;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = hash('sha256', $password);
        return $this;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @param mixed $activationHash
     */
    public function setActivationHash()
    {
        $activationHash = hash('sha256', rand(100000, 1000000));
        $this->activationHash = $activationHash;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return mixed
     */
    public function getActivationHash()
    {
        return $this->activationHash;
    }
}
