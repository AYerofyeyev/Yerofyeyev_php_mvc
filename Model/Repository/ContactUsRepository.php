<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 06.11.2017
 * Time: 13:44
 */

namespace Model\Repository;
use Model\Entity\ContactUs;

class ContactUsRepository
{
    private $db;
    public function setDb(\PDO $db)
    {
        $this->db = $db;
        return $this;
    }

    public function save(ContactUs $contactUs)
    {
        $db = $this->db;
        $data = [
            'name' => $contactUs->getName(),
            'email' => $contactUs->getEmail(),
            'phone' => $contactUs->getPhone(),
            'message' => $contactUs->getMessage(),
            'options' => $contactUs->getOptions(),
            'ip' => $contactUs->getIp()
        ];
        $sql = 'INSERT INTO contact_us VALUES (null, :name, :email, :phone, :message, :options, null, :ip)';
        $sth = $db->prepare($sql);
        $sth->execute($data);
    }

    public function getAll()
    {
        $db = $this->db;
        $collection = [];
        $sth = $db->query('SELECT * FROM contact_us');
        while($data = $sth->fetch(\PDO::FETCH_ASSOC)){
            $feedback = (new ContactUs(
                $data['name'],
                $data['email'],
                $data['phone'],
                $data['message'],
                $data['options'],
                $data['ip']));
            $collection[] = $feedback;
        };
        return $collection;
    }
}