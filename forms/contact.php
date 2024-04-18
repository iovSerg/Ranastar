<?php



if (count($_POST) == 5) {
    $name = '';
    if (isset($_POST['name'])) {
        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    }
    $email = '';
    if (isset($_POST['email'])) {
        $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    }
    $subject = '';
    if (isset($_POST['subject'])) {
        $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
    }
    $mes = '';
    if (isset($_POST['message'])) {
        $mes = htmlspecialchars(strip_tags(trim($_POST['message'])));
    }
    if(isset($_POST['send'])){
        $send = htmlspecialchars((strip_tags(trim($_POST['send']))));
    }

    $err=array();//Массив для ошибок
    if(empty($name) || mb_strlen($name,'UTF-8')>40){$err[]='Некорректное ИФО (более 40 символов)';}
    if(!preg_match("/^[a-z0-9][a-z0-9\.-_]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i",$email)){$err[]='Некорректный E-mail';}
    if(empty($subject) || mb_strlen($subject,'UTF-8')>30){$err[]='Некорректная тема (более 30 символов)';}
    if(empty($mes) || mb_strlen($mes,'UTF-8')>350){$err[]='Некорректное сообщение (более 350 символов)';}

   

    if(count($err)>0){//Количество ел. в массиве больше 0 (есть ошибки)
        echo '<p class="mes_err"><b> Исправьте следующие ошибки:</b></p>';
        $i=0;$c=count($err);while($i<$c){
            echo '<p class="mes_err">- '.$err[$i].'</p>';
            $i++;}

    }else{//если нет ошибок - отправляем сообщением админу

        $from="=?utf-8?B?".base64_encode($email)."?="." ";
        $headers="From: ". $from."\r\nReply-To: ".$from."\r\nContent-type: text/html; charset=utf-8\r\n";
        $subject="=?utf-8?B?".base64_encode($subject)."?=";
        if(mail('admin@ranastar.com', $subject,$mes, $headers)){echo $send;}




    }
}
