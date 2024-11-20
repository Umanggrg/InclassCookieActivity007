<?php
session_start();

if (isset($_GET['PaintingID'])) {
    // Remove a specific painting from the favorites
    $paintingID = $_GET['PaintingID'];
    if (isset($_SESSION['favorites'][$paintingID])) {
        unset($_SESSION['favorites'][$paintingID]);
    }
} else {
    // Remove all favorites if no specific PaintingID is provided
    unset($_SESSION['favorites']);
}

// Redirect to view-favorites.php
header('Location: view-favorites.php');
exit;
?>
