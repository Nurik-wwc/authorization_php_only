<?php
session_start(); //нужно для того чтобы работать с сессиями, он должен стоять вначале кода

function redirect(string $path)
{
  header("Location: $path");
  die();
}

function addValidationError(string $fieldName, string $message)
{
  $_SESSION['validation'][$fieldName] = $message;
}

function clearValidation () 
{
  $_SESSION['validation'] = [];
}

function hasValidationError (string $fieldName) : bool
{
  return isset($_SESSION['validation'][$fieldName]);
}

function validationErrorAttr($fieldName)
{
  echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage($blya)
{
  echo $_SESSION['validation'][$blya] ?? '';
}

// Далее снизу делаем функции позволяющие не терять заполненные данные формы при обновлении страницы (при условии что ошибок нет)

function addOldValue (string $key, $value): void  //в PHP версия 8.0 и выше не поддерживает mixed в типах аргументов, поэтому его нужно убрать перед $value
{
  $_SESSION['old'][$key] = $value;
}

function old(string $key)
{
  return $_SESSION['old'][$key] ?? '';
}

function clearOldValues(string $key)
{
  return $_SESSION['old'] = [];
}