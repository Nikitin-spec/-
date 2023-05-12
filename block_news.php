<!doctype html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Новости</title> 
      <link rel="stylesheet" href="styles/style.css" type="text/css"/>
    
    </head>
    <body>
         <div class="news">
        <?php
            // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "u1870530_test"; // Логин БД
    $db_password = "u1870530_test@"; // Пароль БД
    $db_base = 'u1870530_test'; // Имя БД
    $db_table = "news"; // Имя Таблицы БД
               // Подключение к базе данных
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        // Собираем данные для запроса
        $data_1 = array( 'name_1' => "Новость 1");
        $data_2 = array( 'name_2' => "Новость 2"); 
        $data_3 = array( 'name_3' => "Новость 3"); 
        $data_4 = array( 'name_4' => "Новость 4"); 
        $data_5 = array( 'name_5' => "Новость 8"); 
        // Подготавливаем SQL-запрос
        $query_answer_1 = $db->prepare("SELECT *FROM $db_table WHERE name=:name_1");
        $query_answer_2 = $db->prepare("SELECT *FROM $db_table WHERE name=:name_2");
        $query_answer_3 = $db->prepare("SELECT *FROM $db_table WHERE name=:name_3");
        $query_answer_4 = $db->prepare("SELECT *FROM $db_table WHERE name=:name_4");
        $query_answer_5 = $db->prepare("SELECT *FROM $db_table WHERE name=:name_5");
        // Выполняем запрос с данными
        $query_answer_1->execute($data_1);
                while ($row = $query_answer_1->fetch(PDO::FETCH_LAZY)) {
            echo '<div>'.$row->name.'</div><div>'.$row->content.'</div><div>'.$row->date.'</div>';
        
}
$query_answer_2->execute($data_2);
                while ($row = $query_answer_2->fetch(PDO::FETCH_LAZY)) {
            echo '<div>'.$row->name.'</div><div>'.$row->content.'</div><div>'.$row->date.'</div>';
        
}

            
        

$query_answer_5->execute($data_5);
                while ($row = $query_answer_5->fetch(PDO::FETCH_LAZY)) {
            echo '<div>'.$row->name.'</div><div>'.$row->content.'</div><div>'.$row->date.'</div>';
        
}
        ?>
        

     
 </div>
 <br/>
 <p><a href="news.php">Все новости</a></p>
 <p><a href="index.html">Обратная связь</a></p>
    </body>
    
</html>