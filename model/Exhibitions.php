<?php
class Exhibitions
{
    private $id;
    private $nameEx;
    private $article_id;
    private $date;
    private $city;
    private $path;

    public  function __construct($id,$city,$nameEx,$date,$article_id,$path)
    {
        $this->id = $id;
        $this->city = $city;
        $this->nameEx = $nameEx;
        $this->date = $date;
        $this->article_id= $article_id;
        $this->path = $path;
    }
    public  function GetID()
    {
        return $this->id;
    }
    public function GetArticle()
    {
        return $this->article_id;
    }
    public function GetName()
    {
        return $this->nameEx;
    }
    public function GetDate()
    {
        return $this->date;
    }
    public function GetCity()
    {
        return $this->city;
    }
    public  function  GetPath()
    {
        return $this->path;
    }
}