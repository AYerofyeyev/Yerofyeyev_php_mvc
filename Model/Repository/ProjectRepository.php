<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 24.11.2017
 * Time: 14:13
 */

namespace Model\Repository;

use Model\Entity\Project;

class ProjectRepository
{
    private $db;
    public function setDb(\PDO $db)
    {
        $this->db = $db;
        return $this;
    }

    public function save(Project $project)
    {
        $db = $this->db;
        $data = [
            'title' => $project->getTitle(),
            'link' => $project->getLink(),
            'description' => $project->getDescription(),
            'image' => $project->getImage()
        ];
        $sql = 'INSERT INTO latest_works VALUES (null, :title, :link,  :description, :image)';
        $sth = $db->prepare($sql);
        $sth->execute($data);
    }
//    public function get($id)
//    {
//        $db = $this->db;
//        $sth = $db->prepare('SELECT * FROM blog WHERE id = :id');
//        $sth->execute(['id' => $id]);
//        $data = $sth->fetch(\PDO::FETCH_ASSOC);
//        return (new Blog())
//            ->setId($data['id'])
//            ->setTitle($data['title'])
//            ->setImage($data['image'])
//            ->setVideo($data['video'])
//            ->setDescription($data['description'])
//            ->setDate($data['date'])
//            ->setText($data['text']);
//    }
    public function getAll()
    {
        $db = $this->db;
        $collection = [];
        $sth = $db->query('SELECT * FROM latest_works');
        while($data = $sth->fetch(\PDO::FETCH_ASSOC)){
            $project = (new Project($data['title'], $data['link'], $data['description']));
            $collection[] = $project;
        };
        return $collection;
    }
}