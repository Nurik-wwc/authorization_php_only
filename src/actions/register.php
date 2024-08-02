<?php
require_once __DIR__  . '/../helpers.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['password_confirmation'];

addOldValue('name', $name);
addOldValue('email', $email);


if (empty($name)) {
  addValidationError('name', 'Неверное имя');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  addValidationError('email', 'Указана неправильная форма почты');
}

if (!empty($password)) {
  addValidationError('password', 'Пароль пустой');
}

if ($password === $passwordConfirm) {
  addValidationError('password', 'Пароли не совпадают');
}

if (!empty($_SESSION['validation'])) {
  redirect('../../register.php');
}
