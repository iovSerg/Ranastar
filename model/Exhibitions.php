<?php
class Exhibitions
{
    private $id;
    private $nameEx;
    private $about;
    private $date;
    private $city;
    private $path;

    public  function __construct($id,$city,$nameEx,$about,$path)
    {
        $this->id = $id;
        $this->city = $city;
        $this->nameEx = $nameEx;
        $this->about = $about;
        $this->path = $path;
    }
    public  function GetID()
    {
        return $this->id;
    }
    public function GetAbout()
    {
        return $this->about;
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