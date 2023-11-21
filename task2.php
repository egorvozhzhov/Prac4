<?php

if( isset( $_GET[ 'Submit' ] ) ) {
        // Get input
        //    CWE-89: Операция sql-инъекции
        //  Здесь возможно возникновение SQL-инъекции. Пользовательский ввод из $_GET['id']
        // напрямую используется в SQL-запросе, что открывает дыру для атак. Рекомендуется использовать подготовленные запросы или фильтрацию ввода данных для предотвращения SQL-инъекций.
        $id = $_GET[ 'id' ];


        // CWE-256: Неправильное управление ресурсами
        // Функция mysqli_query возвращает false при ошибке запроса, что может вызвать проблемы с управлением ресурсами. Рекомендуется более аккуратно обрабатывать ошибки запросов и освобождать ресурсы.
        // Check database
        $getid  = "SELECT first_name, last_name FROM users WHERE user_id = '$id';";
        $result = mysqli_query($GLOBALS["___mysqli_ston"],  $getid ); // Removed 'or die' to suppress mysql errors
          
        // Get results
        $num = @mysqli_num_rows( $result ); // The '@' character suppresses errors
        if( $num > 0 ) {
                // Feedback for end user
                $html .= '<pre>User ID exists in the database.</pre>';
        }
        else {
                // User wasn't found, so the page wasn't!
                header( $_SERVER[ 'SERVER_PROTOCOL' ] . ' 404 Not Found' );

                // Feedback for end user
                $html .= '<pre>User ID is MISSING from the database.</pre>';
        }
          

        ((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}

?>
