<?php

$en = include_once __DIR__ . '/../en/passwords.php';

$ru = [
    'reset' => 'Ваш пароль сброшен.',
    'sent' => 'Мы отправили вам ссылку для сброса пароля.',
    'throttled' => 'Пожалуйста, повторите попытку через некоторое время.',
    'token' => 'Неверный токен для сброса пароля.',
    'user' => "Пользователь с таким email не найден.",
];

return array_replace_recursive($en, $ru);
