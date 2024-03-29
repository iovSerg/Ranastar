<?php

class Dog{
    private $id;
    private $full_name;
    private $name;

    //Изначально переменная было только для пола собаки
    private $gender;
    private $about;
    private $avatar;
    private $path;
    private $country;
    private $city;
    public  function __construct($id,$full_name,$name,$about,$gender,$path)
    {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->name = $name;
        $this->about = $about;
        $this->gender = $gender;
        $this->path = $path;
    }
    public  function GetCity()
    {
        return $this->city;
    }
    public  function  GetCountry()
    {
        return    empty($this->country) ? " " :  $this->country;

    }
    //Не работает
   // public function GetID() => $this->id;
    public  function SetCountry($country) {$this->country = $country;}
    public  function SetCity($city) {$this->city = $city;}
    public  function GetID()
    {
        return $this->id;
    }
    public  function GetFullName()
    {
      return  $this->full_name;
    }
    public  function  GetName()
    {

        return $this->name;
    }

    //
    public  function GetGender()
    {
        return $this->gender;
    }
    public  function  GetAbout()
    {
        return $this->about;
    }
    public  function GetAvatar()
    {

        return $this->path[0];
    }
    public  function  GetPaths()
    {
        return $this->path;
    }
}
?>