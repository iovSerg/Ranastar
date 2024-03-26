<?php
class Language
{
    private  $data;
    private  $lang;
    private $lang_id;
    public $list_lang;

    public  function __construct()
    {
        //Язык браузера
        $this->lang = $this->GetDefaultLang();
        //Читать из базы данных
        $this->GetDataLang();

        // Читать из файла
        /*$this->data = $this->GetDataText();*/
    }

    public  function GetText($name)
    {
        return $this->data[$name];
    }

    function GetDataLang()
    {
        require 'services.php';
        $mysqli = new mysqli($serverName, $userName, $userPass, $database);


        $mysqli->set_charset("utf8");
        $sql = 'SELECT*FROM language';
        $result_set = $mysqli->query($sql);

        $defaultlang = $this->lang;

        $lang_id = null;
        foreach ($result_set as $row)
        {
            if (strpos($defaultlang, $row['name']) !== false) {
                {
                    $this->lang = $row['name'];
                    $lang_id = $row['id'];
                    break;
                }
            } else {

                $this->lang = 'en';
            }

        }

        $sql = "SELECT * FROM `lang_$this->lang`;";
        $db = $mysqli->query($sql);


        $sql = "SELECT * FROM list_lang WHERE id = $lang_id;";
        $list =  $mysqli->query($sql);

        foreach ($list as $item) {
            $this->list_lang[] = $item['name'];

        }





        foreach ($db as $row)
        {
            $this->data[$row['title_key']] = $row['text'];
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

        return parse_ini_file("system_$this->lang.ini");
    }
}
?>