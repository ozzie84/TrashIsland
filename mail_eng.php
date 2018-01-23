<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv="refresh" content="5;https://ozzie84.github.io/TrashIsland/index.html">
</head>

<body>
<?php
error_reporting(0);

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];

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
$date = clean($date);

if($name && $phone && $email && $date) {
  $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
  if(check_length($name, 2, 25) && check_length($phone, 2, 50) && check_length($date, 2, 1000) && $email_validate) {
    $mail = "terehov84@gmail.com";
    $message = "<h2>Message from \"Round The Island\":
    ".$_POST['subj']." (Order ".$_POST['form'].")</h2><hr>
    <p><strong>Name:</strong> ".$name."</p>
    <p><strong>E-mail:</strong> ".$email."</p>
    <p><strong>Phone:</strong> ".$phone."</p>
    <p><strong>Massage:</strong> ".$date."</p>";
    $subject="Message from \"Round The Island\"";
    mail($mail, $subject, $message, "Content-type: text/html; charset=utf-8 \r\n");
    echo "<h2>Thank you for your order. Our manager will contact you soon.</h2><br>";
    echo "You will be automatically redirected to main page. ";
  }else{
    echo "You entered incorrect date, please try again.";
  }
} else {
  echo "Please fill in empty fields.";
}
?>
</body>

</html>





