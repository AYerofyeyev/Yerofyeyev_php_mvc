<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 08.11.2017
 * Time: 15:13
 */

namespace Model\Entity;


class Blog
{
    private $id;
    private $title;
    private $image;
    private $video;
    private $description;
    private $date;
    private $text;

    /**
     * @param mixed $title
     */

    /**
     * Blog constructor.
     * @param $title
     * @param $image
     * @param $video
     * @param $description
     * @param $date
     * @param $text
     */
//    public function __construct($title, $image, $video, $description, $date, $text)
//    {
//        $this->title = $title;
//        $this->image = $image;
//        $this->video = $video;
//        $this->description = $description;
//        $this->date = $date;
//        $this->text = $text;
//    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @param mixed $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }
}