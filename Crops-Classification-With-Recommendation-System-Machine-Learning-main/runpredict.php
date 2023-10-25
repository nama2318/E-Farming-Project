<?php
// Execute the Flask app.py file
// $command = 'python app.py';
// exec($command, $output, $return_var);

// // Display the output
// if ($return_var === 0) {
//     // Success
//     // Redirect to the Flask UI
//     header("Location: http://localhost:5000");
//     exit; // Make sure to exit after the redirect
// } else {
//     // Error
//     echo "Failed to start Flask application.";
// }


// $_ENV['FLASK_APP'] = 'app.py';

// // Start the Flask development server
// exec('flask run');

// // Wait for the Flask development server to start
// while (!file_exists('.flaskenv')) {
//   sleep(1);
// }

// Redirect the PHP script to the Flask application's UI
header('Location: http://localhost:5000');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Redirect Page</title>
</head>
<body>
    <p>Redirecting to <a href="http://localhost:5000" target="_blank">http://localhost:5000</a></p>
</body>
</html>