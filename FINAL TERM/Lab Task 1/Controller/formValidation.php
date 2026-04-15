<?php
 
session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $userName = trim($_POST["userName"]);
    $fullName = trim($_POST["fullName"]);
    $email = trim($_POST["email"]);
    $phoneNumber = trim($_POST["phoneNumber"]);
 
    $hasError = false;
 
    if (empty($userName))
    {
        $_SESSION["userNameErr"] = "User Name is required";
        $hasError = true;
    }
 
    if (empty($fullName))
    {
        $_SESSION["fullNameErr"] = "Full Name is required";
        $hasError = true;
    }
 
    if (empty($email))
    {
        $_SESSION["emailErr"] = "Email is required";
        $hasError = true;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $_SESSION["emailErr"] = "Invalid Email Format";
        $hasError = true;
    }
 
    if (empty($phoneNumber))
    {
        $_SESSION["phoneNumberErr"] = "Phone Number is required";
        $hasError = true;
    }
    elseif (!is_numeric($phoneNumber))
    {
        $_SESSION["phoneNumberErr"] = "Phone Number must be numeric";
        $hasError = true;
    }
    elseif (strlen($phoneNumber) != 11)
    {
        $_SESSION["phoneNumberErr"] = "Phone Number must be 11 digits";
        $hasError = true;
    }
    if ($hasError)
    {
        header("Location: form.php");
        exit();
    }
    echo "<h2>Form has been Submitted Successfully</h2>";
    echo "User Name: " . $userName . "<br>";
    echo "Full Name: " . $fullName . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Phone Number: " . $phoneNumber;
}
?>