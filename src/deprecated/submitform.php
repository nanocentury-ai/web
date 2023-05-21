<?php

// Get the Google API client
require_once 'vendor/autoload.php';

// Create a new Google API client
$client = new Google\Client();

// Set the OAuth 2.0 credentials
$client->setCredentials(file_get_contents('credentials.json'));

// Create a new Google Sheets service
$service = new Google\Service\Sheets($client);

// Get the spreadsheet ID
$spreadsheetId = '11IhaW37qJNQS_1b1LQda97dCE6Bgo7kF4m-uUBGLxtw';

// Get the range of cells to update
$range = 'Sheet1!A1';

// Get the new value
$value = $_POST['email'];

// Update the cells
$service->spreadsheets_values->update($spreadsheetId, $range, [[$value]]);

?>