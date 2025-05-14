<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>review page</title>
</head>

<?php
session_start();
// Include the database configuration file
include("php/config.php");

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if review is not empty
    if(!empty($_POST['review'])){
        // Get the review submitted by the user
        $review = $_POST['review'];
        
        // Get the user ID from the session
        $user_id = $_SESSION['id'];
        
        // Prepare the SQL query to insert the review into the database
        $insert_query = "INSERT INTO reviews VALUES ('$user_id', '$review')";
        
        // Execute the query
        if(mysqli_query($con, $insert_query)){
            echo "<p class='final-text'>Review submitted successfully.</p>";
        } else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
        }
    } else{
        echo "Review cannot be empty.";
    }
} else{
    echo "Error: Form not submitted.";
}

// Close the database connection
mysqli_close($con);
?>
</html>