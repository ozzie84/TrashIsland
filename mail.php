<?php

  $recepient = "terehov84@gmail.com";
  $sitename = "https://ozzie84.github.io/TrashIsland/index.html";

  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n"

  $name = trim($_POST["name"]);
  $phone = trim($_POST["phone"]);
  $email = trim($_POST["email"]);
  $textarea = trim($_POST["message"]);

  $message = "Name: $name \nPhone Number: $phone \nEmail: $email \nMessage: $textarea";

  $pagetitle = "New application from the site \"sitename\"";

  mail($reception, $pagetitle, $message, $headers);

?>

