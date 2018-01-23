<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv="refresh" content="5;https://ozzie84.github.io/TrashIsland/">
</head>

<body>
<?php
error_reporting(0);

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$text = $_POST['text'];

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
$phone = clean($phone);
$email = clean($email);
$text = clean($text);

if($name && $phone) {
  if(check_length($name, 2, 25) && check_length($phone, 2, 50) && check_length($email, 2, 50) && check_length($text, 2, 500)) {
    $mail = "terehov84@gmail.com";
    $message = "<h2>Заказ звонка с \"Car Rent\":
    ".$_POST['subj']." (Перезвон ".$_POST['form'].")</h2><hr>
    <p><strong>Name:</strong> ".$_POST['name']."</p>
    <p><strong>Phone:</strong> ".$_POST['phone']."</p>";
    $subject="Заказ звонка с \"Car Rent\"";
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
