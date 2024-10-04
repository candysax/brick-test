<?php

$en = include_once __DIR__ . '/../en/auth.php';

$ru = [
    'failed' => 'Неверный email или пароль',
    'password' => 'Неверный пароль',
    'throttle' => 'Слишком много попыток. Попробуйте ещё раз через :seconds секунд(-ы).',
];

return array_replace_recursive($en, $ru);
