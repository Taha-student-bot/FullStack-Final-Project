
<?php
// $prompt = $_GET['prompt'];
// $apiKey = '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';
// $apiUrl = 'https://api.openai.com/v1/chat/completions';

// $data = [
//     'model' => 'gpt-3.5-turbo',
//     'messages' => [
//         ['role' => 'system', 'content' => 'You are a helpful assistant.'],
//         ['role' => 'user', 'content' => $prompt],
//     ],
//     'temperature' => 0.7,
//     'top_p' => 1,
//     'frequency_penalty' => 0,
//     'presence_penalty' => 0,
// ];

// $ch = curl_init($apiUrl);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Content-Type: application/json',
//     'Authorization: Bearer ' . $apiKey,
// ]);

// $response = curl_exec($ch);
// curl_close($ch);

// var_dump(json_decode($response, true));


$prompt = $_GET['prompt'];
$apiKey = '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';
$apiUrl = 'https://api.openai.com/v1/chat/completions';

$data = [
    'model' => 'gpt-3.5-turbo',
    'messages' => [
        ['role' => 'system', 'content' => 'You are a helpful assistant.'],
        ['role' => 'user', 'content' => $prompt],
    ],
    'temperature' => 0.7,
    'top_p' => 1,
    'frequency_penalty' => 0,
    'presence_penalty' => 0,
];

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo $response;
file_put_contents('response.log', $response);


if ($httpCode == 200) {
    // Output the response as valid JSON
    header('Content-Type: application/json');
    echo $response;
} else {
    // Return an error response as JSON
    header('Content-Type: application/json');
    http_response_code($httpCode);
    echo json_encode(['error' => 'An error occurred during the API request.']);
}
?>


