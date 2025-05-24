<?php
header('Content-Type: application/json');

// Здесь должна быть реальная логика для получения данных из Instagram
// Это просто пример ответа
$response = [
    'success' => true,
    'data' => [
        'type' => 'image',
        'url' => 'https://example.com/image.jpg',
        'caption' => 'Sample Instagram post',
        'is_profile' => false
    ]
];

echo json_encode($response);