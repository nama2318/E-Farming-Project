<?php
// Execute the Flask app.py file
$output = shell_exec('python ../Crops-Classification-With-Recommendation-System-Machine-Learning-main/app.py');

// Display the output
echo "<pre>$output</pre>";
?>