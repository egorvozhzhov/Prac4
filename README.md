1. Участок кода, содержащий инъекцию SQL кода в задании Blind Sql Injection, найден с помощью статического анализатора кода Sonacloud
   Change this code to not construct SQL queries directly from user-controlled data.
   "SELECT first_name, last_name FROM users WHERE user_id = '$id';";
   Так как переменная '$id' никак не обрабатывается и просто передаётся в SQL запрос, возможно использование SQL инъекции. Стоит обработать переменную '$id'
   ![исходный_код](https://github.com/egorvozhzhov/Prac4/assets/71019753/d1e542ce-4a71-45f3-bcc9-a93a1490bfe0)
   ![исходный_код2](https://github.com/egorvozhzhov/Prac4/assets/71019753/8000c0bf-4edc-4eaf-bbf8-14ac7d148e64)
3. Второе задание представлено в task2.php
4. Уберем из строки специальные символы, тем самым обработав переменную id
      $id = real_escape_string($_GET[ 'id' ])
   ![исправленный_код](https://github.com/egorvozhzhov/Prac4/assets/71019753/43d1f9cb-aaac-4c4c-95ed-aac3a41a740c)
