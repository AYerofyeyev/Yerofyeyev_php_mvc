<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 08.11.2017
 * Time: 15:28
 */

namespace Model\Repository;
use Model\Entity\Blog;

class BlogRepository
{
    private $db;
    public function setDb(\PDO $db)
    {
        $this->db = $db;
        return $this;
    }

    public function save(Blog $blog)
    {
        $db = $this->db;
        $data = [
            'name' => $blog->getTitle(),
            'email' => $blog->getImage(),
            'phone' => $blog->getVideo(),
            'message' => $blog->getDescription(),
            'options' => $blog->getDate(),
            'ip' => $blog->getText()
        ];
        $sql = 'INSERT INTO blog VALUES (null, :title, :image, :video, :description, :date, :text)';
        $sth = $db->prepare($sql);
        $sth->execute($data);
    }
    public function get($id)
    {
        $db = $this->db;
        $sth = $db->prepare('SELECT * FROM blog WHERE id = :id');
        $sth->execute(['id' => $id]);
        $data = $sth->fetch(\PDO::FETCH_ASSOC);
        return (new Blog())
            ->setId($data['id'])
            ->setTitle($data['title'])
            ->setImage($data['image'])
            ->setVideo($data['video'])
            ->setDescription($data['description'])
            ->setDate($data['date'])
            ->setText($data['text']);
    }
    public function getAll()
    {
        $db = $this->db;
        $collection = [];
        $sth = $db->query('SELECT * FROM blog');
        while($data = $sth->fetch(\PDO::FETCH_ASSOC)){
        $blog = (new Blog())
            ->setId($data['id'])
            ->setTitle($data['title'])
            ->setImage($data['image'])
            ->setVideo($data['video'])
            ->setDescription($data['description'])
            ->setDate($data['date'])
            ->setText($data['text']);
        $collection[] = $blog;
        };
        return $collection;
    }
}