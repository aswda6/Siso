<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $name = htmlspecialchars($_POST['name']);
     $email = htmlspecialchars($_POST['email']);
     $password = htmlspecialchars($_POST['password']);
 
     // Generate a unique verification token
     $token = bin2hex(random_bytes(16));
 
     // Store user data (use a database in production)
     // Here, we simulate storing user data in a session
     session_start();
     $_SESSION['users'][$email] = ['name' => $name, 'password' => $password, 'token' => $token, 'verified' => false];
 
     // Send verification email
     $verification_link = "http://https://aswda6.github.io/Siso/verify.php?token=$token"; // Change to your domain
     $subject = "Account Verification";
     $message = "Please verify your account by clicking the link: $verification_link";
     $headers = "From: wargame00101@example.com";
 
     if (mail($email, $subject, $message, $headers)) {
         echo "<p>Signup successful! Please check your email for verification.</p>";
     } else {
         echo "<p>There was an error sending the verification email.</p>";
     }
 }
 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
     <title>Signup</title>
 </head>
 <body>
     <form action="signup.php" method="POST">
         <input type="text" name="name" placeholder="Name" required>
         <input type="email" name="email" placeholder="Email" required>
         <input type="password" name="password" placeholder="Password" required>
         <button type="submit">Sign Up</button>
     </form>
 </body>
 </html>
 
