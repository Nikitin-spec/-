<?php

    $fio = $_POST['fio'];
    $address = $_POST['adress'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "u1870530_test"; // Логин БД
    $db_password = "u1870530_test@"; // Пароль БД
    $db_base = 'u1870530_test'; // Имя БД
    $db_table = "client"; // Имя Таблицы БД
    
        try {
        // Подключение к базе данных
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        // Собираем данные для запроса
        $data = array( 'fio' => $fio, 'address' => $address, 'tel'=>$tel, 'mail'=>$mail ); 
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO $db_table (fio, address, telephone, mail) values (:fio, :address, :tel, :mail)");
        // Выполняем запрос с данными
        $query->execute($data);
        
        // Запишим в переменую, что запрос отрабтал
        $result = true;
         // Собираем данные для запроса
        $data_answer = array( 'fio' => $fio, 'address' => $address, 'tel'=>$tel, 'mail'=>$mail ); 
        // Подготавливаем SQL-запрос
        $query_answer = $db->prepare("SELECT *FROM $db_table WHERE fio=:fio AND address=:address AND telephone=:tel AND mail=:mail");
        $query_answer->execute($data_answer);
        echo '<table>';
        while ($row = $query_answer->fetch(PDO::FETCH_LAZY)) {
            
        echo '<tr><td>'.$row->fio.'</td><td>'.$row->address.'</td><td>'.$row->telephone.'</td><td>'.$row->mail.'</td></tr>';
}
echo '</table>';
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        echo "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    


?>