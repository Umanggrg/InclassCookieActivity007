<?php
session_start();
$favorites = $_SESSION['favorites'] ?? []; // Get favorites from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favorites</title>
    <link href="css/semantic.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/art-header.inc.php'; ?>
<main class="ui container">
    <h1>Favorites</h1>
    <table class="ui basic table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($favorites)): ?>
                <?php foreach ($favorites as $id => $details): ?>
                    <tr>
                        <td>
                            <img src="images/art/square-medium/<?php echo htmlspecialchars($details['ImageFileName']); ?>.jpg" 
                                 alt="<?php echo htmlspecialchars($details['Title']); ?>" 
                                 style="max-height: 100px;">
                        </td>
                        <td>
                            <a href="single-painting.php?id=<?php echo $id; ?>">
                                <?php echo htmlspecialchars($details['Title']); ?>
                            </a>
                        </td>
                        <td>
                            <a class="ui small button" href="remove-favorites.php?PaintingID=<?php echo $id; ?>">
                                Remove
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No favorites added yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a class="ui button" href="remove-favorites.php">Remove All Favorites</a>
</main>
</body>
</html>

</body>
</html>