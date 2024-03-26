<?php

class DataLang
{
    private  $data;
    private  $lang_key;
    private $lang_id;
    public $list_lang;

    public  function __construct()
    {

        //Язык браузера
        if (!isset($_COOKIE['language'])) {
            $this->lang_key = $this->GetDefaultLang();
            setcookie('language', $this->lang_key, time() + (86400 * 30), "/"); // 86400 секунд = 1 день
        }
        else
        {
           $this->lang_key = $_COOKIE['language'];
        }

        //Читать из базы данных
        $this->GetDataLang();

        // Читать из файла
        /*$this->data = $this->GetDataText();*/
    }
    public  function GetListLang()
    {
        return $this->list_lang;
    }
    public  function GetText($name)
    {
        return $this->data[$name];
    }
    public  function GetLangKey()
    {
        return $this->lang_key;
    }
    function GetDataLang()
    {
        require 'services.php';
        $mysqli = new mysqli($serverName, $userName, $userPass, $database);


        $mysqli->set_charset("utf8");
        $sql = 'SELECT*FROM lang_code';
        $result_set = $mysqli->query($sql);

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
        $db = $mysqli->query($sql);

        foreach ($db as $row)
        {
            $this->data[$row['title_key']] = $row['text'];
        }



        $sql = "SELECT name,name_lang FROM list_language WHERE key_id = $this->lang_id;";
        $list =  $mysqli->query($sql);

        foreach ($list as $item) {
            $this->list_lang[$item['name']] = $item['name_lang'];

        }






        $mysqli->close();
    }
    function GetDefaultLang()
    {

        preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]), $matches); // Получаем массив $matches с соответствиями
        $langs = array_combine($matches[1], $matches[2]); // Создаём массив с ключами $matches[1] и значениями $matches[2]
        foreach ($langs as $n => $v)
            $langs[$n] = $v ? $v : 1; // Если нет q, то ставим значение 1
        arsort($langs); // Сортируем по убыванию q
        $default_lang = key($langs); // Берём 1-й ключ первого (текущего) элемента (он же максимальный по q)
        return $default_lang; // Выводим язык по умолчанию
    }

    function GetDataText()
    {

        return parse_ini_file("system_$this->lang_key.ini");
    }
}
?>