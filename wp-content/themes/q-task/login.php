<?php
/*
Template Name: Custom Login Template
*/

// Start the session
session_start();

// Initialize variables
$tokenKey = ''; 
$redirectURL = home_url('/movies/');
$warningMessage = '';

// Check if the user is already logged in
if (isset($_SESSION['token_key'])) {
    wp_redirect($redirectURL);// Redirect to movies if logged in
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare data for API request
    $data = array(
        "email" => $email,
        "password" => $password
    );

    // Configure API request options
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/json\r\n",
            'content' => json_encode($data)
        )
    );

    // Create a context for API request
    $context = stream_context_create($options);
    
    // Make the API request
    $response = @file_get_contents('https://symfony-skeleton.q-tests.com/api/v2/token', false, $context);

    if ($response !== false) {
        $responseData = json_decode($response, true);
        
        if (isset($responseData['user']['email'])) {

            // Check if token_key is present in the response
            if (isset($responseData['token_key'])) {
                $tokenKey = $responseData['token_key'];

                // Store token_key in session
                $_SESSION['token_key'] = $tokenKey;
            }
            
            // Store user's email in session
            $_SESSION['email'] = $email;

            // Redirect to the restricted homepage on successful login
            wp_redirect($redirectURL);
            exit();

        } else {
            $warningMessage = "Invalid email or password.";
        }
    } else {
        $warningMessage = "API request failed.";
    }
}

get_header();

?>
<div class="container">
    <div class="form">
        <?php if (function_exists('the_custom_logo')) { the_custom_logo();} ?>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="password">Password: </label>
            <input type="password" name="password" required><br>
            
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

<?php

if (!empty($warningMessage)) {
    echo "<p style='color: magenta;text-align:center;'>$warningMessage</p>";
}

get_footer();
?>

