1. Участок кода, содержащий инъекцию SQL кода в задании Blind Sql Injection, найден с помощью статического анализатора кода Sonacloud
   
   Change this code to not construct SQL queries directly from user-controlled data.
   "SELECT first_name, last_name FROM users WHERE user_id = '$id';";

   Так как переменная '$id' никак не обрабатывается и просто передаётся в SQL запрос, возможно использование SQL инъекции. Стоит обработать переменную '$id'
   ![исходный_код](https://github.com/egorvozhzhov/Prac4/assets/71019753/d1e542ce-4a71-45f3-bcc9-a93a1490bfe0)
   ![исходный_код2](https://github.com/egorvozhzhov/Prac4/assets/71019753/8000c0bf-4edc-4eaf-bbf8-14ac7d148e64)
3. Второе задание представлено в task2.php
4. Уберем из строки специальные символы, тем самым обработав переменную id

      $id = real_escape_string($_GET[ 'id' ])
   
   Теперь анализатор не выявил уязвимости
   ![исправленный_код](https://github.com/egorvozhzhov/Prac4/assets/71019753/43d1f9cb-aaac-4c4c-95ed-aac3a41a740c)

6. С помощью sqlmap обнаружим ту же уязвимость
   ![sqlmap](https://github.com/egorvozhzhov/Prac4/assets/71019753/a59a563f-e442-4c14-a41d-656998e6308f)

7. Настроим прокси в браузере и Burp, затем перехватим запрос, поменяем парамеатр и отправим запрос с измененным параметром, что бы получить имена всех пользователей
    ![burp](https://github.com/egorvozhzhov/Prac4/assets/71019753/149f6700-a291-4001-96e8-da9cba8b66f4)


