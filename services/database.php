<?php
require_once 'model/Dog.php';


class DataBase
{
    private $mysqli;
    private $userName = "ranastar";
    private $userPass = "Db123456!";
    private $serverName = "localhost";
    private $database = "ranastar";
    private $defaultLang =  ['2'=>'en'];

    //Локализация
    private $lang_key; //ru en de ua
    private $lang_id; //id языка в базе
    private $lang_list;//Список отображаемых языков
    private $lang_data;
    //Галлерея собак
    private $dogs;

    public function __construct(){
        if (!isset($_COOKIE['language'])) {
            $this->lang_key = $this->GetDefaultLang();
            setcookie('language', $this->lang_key, time() + (86400 * 30), "/"); // 86400 секунд = 1 день
        }
        else
        {
           $this->lang_key = $_COOKIE['language'];
        }             


        $this->mysqli = new mysqli($this->serverName, $this->userName,$this->userPass,$this->database);
        $this->mysqli->set_charset("utf8");
        $this->GetDataLang(); //Читать из базы данных
        $this->GetDataDogs();
        $this->mysqli->close();
    }
    public function  GetLangKey()
    {
        return $this->lang_key;
    }
    public function GetListLang()
    {
        return $this->lang_list;
    }
    public function GetText($key)
    {
        return $this->lang_data[$key];
    }
    public  function GetDogs()
    {
        return $this->dogs;
    }

    //Получаем массив перевода по ключам
    private function GetDataLang()
    {
       

        $sql = 'SELECT*FROM lang_code';
        $result_set = $this->mysqli->query($sql);

        $defaultlang = $this->lang_key;

        $lang_id = null;
        foreach ($result_set as $row)
        {
            if (strpos($defaultlang, $row['name']) !== false) {
                {
                    $this->lang_key = $row['name'];
                    $this->lang_id = $row['id'];
                    break;
                }
            } else {

                $this->lang_key = 'en';
            }

        }

        $sql = "SELECT * FROM `lang_$this->lang_key`;";
        $db = $this->mysqli->query($sql);

        foreach ($db as $row)
        {
            $this->lang_data[$row['title_key']] = $row['text'];
        }



        $sql = "SELECT name,name_lang FROM list_language WHERE key_id = $this->lang_id;";
        $list =  $this->mysqli->query($sql);

        foreach ($list as $item) {
            $this->lang_list[$item['name']] = $item['name_lang'];
        }
        
    }
    private function GetDefaultLang(){
        preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]), $matches); // Получаем массив $matches с соответствиями
        $langs = array_combine($matches[1], $matches[2]); // Создаём массив с ключами $matches[1] и значениями $matches[2]
        foreach ($langs as $n => $v)
            $langs[$n] = $v ? $v : 1; // Если нет q, то ставим значение 1
        arsort($langs); // Сортируем по убыванию q
        $default_lang = key($langs); // Берём 1-й ключ первого (текущего) элемента (он же максимальный по q)
        return $default_lang; // Выводим язык по умолчанию
    }
    //Перевод из файла 
    private function GetDataText(){
        return parse_ini_file("system_$this->lang_key.ini");
    }
    //Коллекция собак
    private function GetDataDogs()
    {
        $sql = 'SELECT*FROM dogs';

        $result_dog = $this->mysqli->query($sql);


        foreach ($result_dog as $row)
        {

            $id = $row ['id'];
            $sql = "SELECT path FROM gallary WHERE key_dog = '$id';";

            $result_path =  $this->mysqli->query($sql);

            foreach($result_path as $item) {
                $path[] =  $item['path'];
            }

            $dog_ = new Dog($row['id'],$row['full_name'],$row['name'],$row['article_id'],$row['gender'],$path);
            $path = null;
            $this->dogs[] = $dog_;


        }
    }


}