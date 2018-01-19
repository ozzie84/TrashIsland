<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv="refresh" content="5;https://ozzie84.github.io/TrashIsland/index.html/">
</head>

<body>
<?php
error_reporting(0);

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$textarea = trim($_POST["message"]);

function clean($value = ""){
  $value = trim($value);
  $value = strip_tags($value);

  return $value;
}

function check_length($value = "", $min, $max) {
  $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
  return !$result;
}

$name = clean($name);
$email = clean($email);
$phone = clean($phone);
$textarea = clean($message);

if($name && $phone && $email && $textarea) {
  $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
  if(check_length($car_name, 2, 60) && check_length($name, 2, 40) && check_length($phone, 2, 50) && check_length($date, 2, 1000) && $email_validate) {
    $mail = "terehov84@gmail.com";
    $message = "<h2>Сообщение с сайта \"Car Rent\":
    ".$_POST['subj']." (Заказ ".$_POST['form'].")</h2><hr>
    <p><strong>Имя:</strong> ".$name."</p>
    <p><strong>E-mail:</strong> ".$email."</p>
    <p><strong>Телефон:</strong> ".$phone."</p>
    <p><strong>Дата:</strong> ".message."</p>";
    $subject="Сообщение с сайта \"Car Rent\"";
    mail($mail, $subject, $message, "Content-type: text/html; charset=utf-8 \r\n");
    echo "<h2>Спасибо за Ваш заказ. Скоро с Вами свяжется наш менеджер. </h2> <br>";
    echo "Вы будете автоматически перенаправлены на главную страницу.";
  }else{
    echo "Вы ввели не корректные данные, пожалуйсна повторите попытку.";
  }
} else {
  echo "Пожалуйста заполните пустые поля";
}
?>

</body>

</html>

