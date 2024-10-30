<?php
 session_start();
 
 // Simulating user data storage
 $users = $_SESSION['users'] ?? [];
 
 if (isset($_GET['token'])) {
     $token = $_GET['token'];
 
     // Check for user with this token
     foreach ($users as $email => $user) {
         if ($user['token'] === $token) {
             // Mark as verified
             $users[$email]['verified'] = true;
             echo "<p>Your account has been verified successfully!</p>";
             break;
         }
     }
 
     // Update the session
     $_SESSION['users'] = $users;
 } else {
     echo "<p>Invalid verification token.</p>";
 }
 ?>
 
