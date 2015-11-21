<?php
/**
 * Created by PhpStorm.
 * User: Goran
 * Date: 11/18/2015
 * Time: 08:53 PM
 */

namespace Site\DataBundle\Entity;


class Select {

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $html;

    /**
     * @var string
     */
    private $link;

    /**
     * @var date
     */
    private $dueDate;




    /**
     * Set title
     *
     * @param string $title
     * @return Select
     */
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(){
        return $this->title;
    }

    /**
     * Set html
     *
     * @param $html
     * @return Select
     */
    public function setHtml($html){
        $this->html = $html;

        return $this;
    }

    /**
     * Get html
     *
     * @return string
     */
    public function getHtml(){
        return $this->html;
    }

    /**
     * Set title
     *
     * @param $title
     * @return Select
     */
    public function setLink($link){
        $this->link = $link;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getLink(){
        return $this->link;
    }

    /**
     * Set dueDate
     *
     * @param $dueDate
     * @return Select
     */
    public function setDueDate(\DateTime $dueDate = null){
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return date
     */
    public function getDueDate(){
        return $this->dueDate;
    }

}