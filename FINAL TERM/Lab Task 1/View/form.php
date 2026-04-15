<?php
 
session_start();
$userNameErr = $_SESSION['userNameErr'] ?? '';
$fullNameErr = $_SESSION['fullNameErr'] ?? '';
$emailErr = $_SESSION['emailErr'] ?? '';
$phoneNumberErr = $_SESSION['phoneNumberErr'] ?? '';
 
unset($_SESSION['userNameErr']);
unset($_SESSION['fullNameErr']);
unset($_SESSION['emailErr']);
unset($_SESSION['phoneNumberErr']);
 
?>
 
<html>
<head>
    <title>Form Page</title>
</head>
<body>
    <form action="../controller/formValidation.php" method="POST">
       
        <label>User Name:</label>
        <input type="text" name="userName">
        <?php echo "User Name error";?>
        <br><br>
   
        <label>Full Name:</label>
        <input type="text" name="fullName">
        <?php echo "Full Name error";?>
        <br><br>
 
        <label>Email:</label>
        <input type="email" name="email">
        <?php echo "Email error";?>
        <br><br>
 
        <label>Phone Number:</label>
        <input type="text" name="phoneNumber">
        <?php echo "Phone Number error";?>
        <br><br>
 
        <button type="submit">Submit</button>
    </form>
</body>
</html>