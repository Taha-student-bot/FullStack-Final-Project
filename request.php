
<?php

header('Content-Type: application/json');

$keyServerUrl = 'https://trophyexpresstransports.com/request-key.php';

$prompt = $_GET['prompt'] ?? null;

if (!$prompt) {
    http_response_code(400); 
    echo json_encode(['error' => 'Prompt is required']);
    exit;
}

$secretToken = 'aKb0eZSU5g3JGCLSzbMrO';

$requestUrl = $keyServerUrl . '?token=' . urlencode($secretToken) . '&prompt=' . urlencode($prompt);

$response = file_get_contents($requestUrl);

if ($response === false) {
    http_response_code(500); 
    echo json_encode(['error' => 'Failed to retrieve data from the secure server']);
    exit;
}

echo $response;
?>

