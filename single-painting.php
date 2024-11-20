<?php
session_start(); // Start the session to manage favorites

include 'includes/data.inc.php'; // Include painting data
include 'includes/art-functions.inc.php';

// Check if there is an ID passed in the query string
$id = $_GET['id'] ?? 406; // Default to 406 if no ID is provided

// Find the painting with the given ID
$row = null; // Initialize as null
foreach ($paintings as $work) { // Update to use $work
    if ($work['PaintingID'] == $id) {
        $row = $work;
        break;
    }
}

// If painting is not found, display an error and exit
if (!$row) {
    die('Painting not found.');
}
?>

<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($row['Title']); ?></title>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
    <script src="js/misc.js"></script>
    <link href="css/semantic.css" rel="stylesheet">
    <link href="css/icon.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    
<?php include 'includes/art-header.inc.php'; ?>
    
<main>
    <!-- Main section about painting -->
    <section class="ui segment grey100">
        <div class="ui doubling stackable grid container">
            <div class="nine wide column">
              <img src="images/art/medium/<?php echo htmlspecialchars($row['ImageFileName']); ?>.jpg" 
                   alt="<?php echo htmlspecialchars($row['Title']); ?>" 
                   class="ui big image" id="artwork">
            </div>
            <div class="seven wide column">
                
                <!-- Main Info -->
                <div class="item">
                    <h2 class="header"><?php echo htmlspecialchars($row['Title']); ?></h2>
                    <h3><?php echo htmlspecialchars($row['FirstName'] . ' ' . $row['LastName']); ?></h3>
                    <div class="meta">
                        <p><?php echo htmlspecialchars($row['Excerpt']); ?></p>
                    </div>  
                </div>                          
                
                <!-- Tabs For Details, Museum, Genre, Subjects -->
                <?php include 'includes/painting-small-tabs.inc.php'; ?>
                
                <!-- Cart and Price -->
                <?php include 'includes/cart-box.inc.php'; ?> 
            </div>
        </div>
    </section>
    
    <!-- Tabs for Description, On the Web, Reviews -->
    <?php include 'includes/painting-large-tabs.inc.php'; ?> 
        
</main>    
    
<footer class="ui black inverted segment">
    <div class="ui container">footer</div>
</footer>
</body>
</html>
