<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация пользователя</title>
</head>
<body>
<?php
$LOGIN = $_POST["login"];
$PASSWORD = $_POST["password"];
$SUBMIT = $_POST["submit"];

class user {
    public $name;
    public $surname;
    public $role;
    public $login;
    public $password;
    function __construct($name,$surname,$role,$login,$password)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->login = $login;
        $this->password = $password;
    }
};
class admin extends user {
    
    public function introduce (){
        echo "Здравствуйте, ".$this->role. "  " . $this->name. "  " . $this->surname. "  ". ", вам разрешено все на данном сайте";
    }
};
class manager extends user {

    public function introduce() {
        echo "Здравствуйте, ".$this->role. "  " . $this->name. "  " . $this->surname. "  ". ", вам разрешено взаимодействовать с аккаунтами клиентов";
    }
};
class client extends user {

    public function introduce (){
        echo "Здравствуйте ,".$this->role. "  " . $this->name. "  " . $this->surname. "  ". ", добро пожаловать на сайт!";;
    }
};

$arr = [
    ["name" => "Stiven" ,
        "surname" => "Hocking",
        "role" => "Admin",
        "login" => "Cool_Scientist",
        "password" => "black_hole69"],
    ["name" => "Margo" ,
        "surname" => "Robby",
        "role" => "Manager",
        "login" => "heartbreaker",
        "password" => "HotGirl>18"],
    ["name" => "Adolf" ,
        "surname" => "Nothitler",
        "role" => "Client",
        "login" => "artist",
        "password" => "viennaArtSchool"],

];

$counter = 0;

if(!empty($LOGIN)){
    for($i = 0; $i<count($arr); $i++){ 

        if($LOGIN == $arr[$i]["login"] and $PASSWORD == $arr[$i]["password"]) {
    
            switch($arr[$i]["role"]) {
                case "Admin":
                     $admin = new admin($arr[$i]["name"], $arr[$i]["surname"], $arr[$i]["role"],$arr[$i]["login"],$arr[$i]["password"]);
                     $admin->introduce();
                     $counter++;
                break;
             
                case "Manager":
                     $manager = new manager($arr[$i]["name"], $arr[$i]["surname"], $arr[$i]["role"],$arr[$i]["login"],$arr[$i]["password"]);
                     $manager->introduce();
                     $counter++;
                break;
    
                case "Client":
                     $client = new client($arr[$i]["name"], $arr[$i]["surname"], $arr[$i]["role"],$arr[$i]["login"],$arr[$i]["password"]);
                     $client->introduce();
                     $counter++;    
                break;
            }
        }
        
    }
    if($counter == 0){
       echo "Вы ввели неверные данные!";
    }
}

?>
<form method="post">
    <p><input type="text" name="login" > Логин</p>
    <p><input type="text" name="password" > Пароль</p>
    <input type="submit" name="submit" value="Ввести">
</form>
</body>
</html>