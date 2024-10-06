<?php

$en = include_once __DIR__ . '/../en/pagination.php';

$ru = [
    'previous' => '&laquo; Назад',
    'next' => 'Вперёд &raquo;',
];

return array_replace_recursive($en, $ru);
