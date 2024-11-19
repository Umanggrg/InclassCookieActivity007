<?php
session_start(); // Start session to store favorites

// Check if the required query string parameters are set
if (isset($_GET['PaintingID']) && isset($_GET['ImageFileName']) && isset($_GET['Title'])) {
    // Retrieve parameters from the query string
    $paintingID = $_GET['PaintingID'];
    $imageFileName = $_GET['ImageFileName'];
    $title = $_GET['Title'];

    // Initialize the favorites array in the session if it doesn't exist
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    // Add or update the painting in the favorites array
    $_SESSION['favorites'][$paintingID] = [
        'ImageFileName' => $imageFileName,
        'Title' => $title
    ];
}

// Redirect to view-favorites.php after adding to favorites
header('Location: view-favorites.php');
exit;
?>
