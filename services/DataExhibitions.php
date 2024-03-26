<?php
require 'model/Exhibitions.php';

class DataExhibitions
{
    private $exhibitions;
    private $lang_key;

    public function __construct($lang_key)
    {
        $this->lang_key = $lang_key;
        $this->GetDataSQL();
    }
    private function GetDataSQL()
    {
        require 'services/services.php';
        $mysqli = new mysqli($serverName, $userName, $userPass, $database);


        $mysqli->set_charset("utf8");
        $sql = 'SELECT*FROM exhibitions';

        $result_ex = $mysqli->query($sql);

        foreach ($result_ex as $row)
        {

            $id = $row ['date'];

            $sql = "SELECT path FROM gallary_exhibitions WHERE key_exhibitions = '$id';";

            $result_path =  $mysqli->query($sql);



            $path = array();
            foreach($result_path as $item) {
                $path[] =  $item['path'];
            }


            $ex = new Exhibitions($row['id'],$row['name_' . $this->lang_key],$row['name_ex'],$row['date'],$row['article_id'],$path);
            $path = null;

            $this->exhibitions[]=$ex;
        }
        $mysqli->close();
    }


    public function GetExhibitions()
    {
    return $this->exhibitions;
    }

}
