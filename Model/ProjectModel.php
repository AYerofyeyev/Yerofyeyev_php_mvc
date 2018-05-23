<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 24.11.2017
 * Time: 14:11
 */

namespace Model;


class ProjectModel
{
    public $id;
    public $title;
    public $link;
    public $description;
    public $image;

    /**
     * ProjectModel constructor.
     * @param $title
     * @param $link
     * @param $description
     * @param $image
     */
    public function __construct($title, $link, $description)
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }
}