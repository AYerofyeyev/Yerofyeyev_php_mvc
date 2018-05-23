<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 08.11.2017
 * Time: 15:26
 */

namespace Model;


class BlogModel
{
    public $title;
    public $image;
    public $video;
    public $description;
    public $date;
    public $text;

    /**
     * BlogModel constructor.
     * @param $title
     * @param $image
     * @param $video
     * @param $description
     * @param $date
     * @param $text
     */
    public function __construct($title, $image, $video, $description, $date, $text)
    {
        $this->title = $title;
        $this->image = $image;
        $this->video = $video;
        $this->description = $description;
        $this->date = $date;
        $this->text = $text;
    }
    public function isValid()
    {
        return !empty($this->title) && !empty($this->text);
    }
}