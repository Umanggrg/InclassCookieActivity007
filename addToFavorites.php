<?php
session_start();
include 'includes/data.inc.php';  // Include your database and data functions
include 'includes/art-functions.inc.php';  // Include your helper functions

// Check if the necessary parameters are passed in the URL
if (isset($_GET['PaintingID']) && isset($_GET['ImageFileName']) && isset($_GET['Title'])) {
    $paintingID = $_GET['PaintingID'];
    $imageFileName = $_GET['ImageFileName'];
    $title = $_GET['Title'];

    // Ensure user is logged in before adding to favorites
    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];

        // Add painting to favorites
        addPaintingToFavorites($userID, $paintingID, $imageFileName, $title);

        // Redirect user to favorites page or back to the painting
        header("Location: view-favorites.php");
        exit;
    } else {
        
        exit;
    }
} else {
    echo "Error: Missing parameters. Please try again.";
    exit;
}

function addPaintingToFavorites($userID, $paintingID, $imageFileName, $title) {
    // Assume a connection to the database is already available through $pdo
    global $pdo;

    // Insert the painting into the user's favorites table
    $sql = "INSERT INTO user_favorites (userID, PaintingID, ImageFileName, Title) VALUES (:userID, :PaintingID, :ImageFileName, :Title)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters to prevent SQL injection
    $stmt->bindParam(':userID', $userID);
    $stmt->bindParam(':PaintingID', $paintingID);
    $stmt->bindParam(':ImageFileName', $imageFileName);
    $stmt->bindParam(':Title', $title);

    // Execute the query
    if ($stmt->execute()) {
        echo "Painting added to favorites successfully.";
    } else {
        echo "Error: Could not add painting to favorites.";
    }
}
