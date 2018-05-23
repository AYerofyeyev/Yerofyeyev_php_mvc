<?php
/**
 * Created by PhpStorm.
 * User: ean
 * Date: 24.11.2017
 * Time: 10:29
 */

namespace Model\Entity;


class AdminForm
{
    private $addLogin;
    private $addPassword;
    private $killAdmin;
    private $blogTitle;
    private $blogText;
    private $blogImage;
    private $blogVideo;
    private $blogVideoUrl;
    private $projectTitle;
    private $projectDescription;
    private $projectImage;

    /**
     * @param mixed $addLogin
     */
    public function setAddLogin($addLogin)
    {
        $this->addLogin = $addLogin;
    }

    /**
     * @param mixed $addPassword
     */
    public function setAddPassword($addPassword)
    {
        $this->addPassword = $addPassword;
    }

    /**
     * @param mixed $killAdmin
     */
    public function setKillAdmin($killAdmin)
    {
        $this->killAdmin = $killAdmin;
    }

    /**
     * @param mixed $blogTitle
     */
    public function setBlogTitle($blogTitle)
    {
        $this->blogTitle = $blogTitle;
    }

    /**
     * @param mixed $blogText
     */
    public function setBlogText($blogText)
    {
        $this->blogText = $blogText;
    }

    /**
     * @param mixed $blogImage
     */
    public function setBlogImage($blogImage)
    {
        $this->blogImage = $blogImage;
    }

    /**
     * @param mixed $blogVideo
     */
    public function setBlogVideo($blogVideo)
    {
        $this->blogVideo = $blogVideo;
    }

    /**
     * @param mixed $blogVideoUrl
     */
    public function setBlogVideoUrl($blogVideoUrl)
    {
        $this->blogVideoUrl = $blogVideoUrl;
    }

    /**
     * @param mixed $projectTitle
     */
    public function setProjectTitle($projectTitle)
    {
        $this->projectTitle = $projectTitle;
    }

    /**
     * @param mixed $projectDescription
     */
    public function setProjectDescription($projectDescription)
    {
        $this->projectDescription = $projectDescription;
    }

    /**
     * @param mixed $projectImage
     */
    public function setProjectImage($projectImage)
    {
        $this->projectImage = $projectImage;
    }

    /**
     * @return mixed
     */
    public function getAddLogin()
    {
        return $this->addLogin;
    }

    /**
     * @return mixed
     */
    public function getAddPassword()
    {
        return $this->addPassword;
    }

    /**
     * @return mixed
     */
    public function getKillAdmin()
    {
        return $this->killAdmin;
    }

    /**
     * @return mixed
     */
    public function getBlogTitle()
    {
        return $this->blogTitle;
    }

    /**
     * @return mixed
     */
    public function getBlogText()
    {
        return $this->blogText;
    }

    /**
     * @return mixed
     */
    public function getBlogImage()
    {
        return $this->blogImage;
    }

    /**
     * @return mixed
     */
    public function getBlogVideo()
    {
        return $this->blogVideo;
    }

    /**
     * @return mixed
     */
    public function getBlogVideoUrl()
    {
        return $this->blogVideoUrl;
    }

    /**
     * @return mixed
     */
    public function getProjectTitle()
    {
        return $this->projectTitle;
    }

    /**
     * @return mixed
     */
    public function getProjectDescription()
    {
        return $this->projectDescription;
    }

    /**
     * @return mixed
     */
    public function getProjectImage()
    {
        return $this->projectImage;
    }
    
}