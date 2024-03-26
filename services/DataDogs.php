<?php
require 'model/Dog.php';
class DataDogs
{

    private $dogs;
    private $lang;
    private $gallary_path;

    public  function __construct($lang)
    {
        $this->lang = $lang;
        $this->GetDogsData();
    }
    private function GetDogsData()
    {

        require 'services/services.php';
        $mysqli = new mysqli($serverName, $userName, $userPass, $database);


        $mysqli->set_charset("utf8");
        $sql = 'SELECT*FROM dogs';

        $result_dog = $mysqli->query($sql);


        foreach ($result_dog as $row)
        {

            $id = $row ['id'];
            $sql = "SELECT path FROM gallary WHERE key_dog = '$id';";

            $result_path =  $mysqli->query($sql);

            foreach($result_path as $item) {
                $path[] =  $item['path'];

            }



            $dog_ = new Dog($row['id'],$row['full_name'],$row['name'],$row['article_id'],$row['gender'],$path);
            $path = null;
            $this->dogs[] = $dog_;


        }
        $mysqli->close();
    }
    public  function GetDogs()
    {

        return $this->dogs;
    }
}
?>