<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old_data = $_SESSION['old_data'] ?? [];
$success = $_SESSION['success'] ?? '';
unset($_SESSION['errors'], $_SESSION['old_data'], $_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .form-container { background: #fff; max-width: 400px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .error { color: #d9534f; font-size: 0.85em; margin-top: 5px; display: block; }
        .success { background: #dff0d8; color: #3c763d; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #d6e9c6; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 1em; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Register</h2>
    <?php if ($success): ?>
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>
    <form action="formValidation.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($old_data['username'] ?? ''); ?>">
            <?php if (isset($errors['username'])): ?>
                <span class="error"><?php echo $errors['username']; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($old_data['name'] ?? ''); ?>">
            <?php if (isset($errors['name'])): ?>
                <span class="error"><?php echo $errors['name']; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($old_data['email'] ?? ''); ?>">
            <?php if (isset($errors['email'])): ?>
                <span class="error"><?php echo $errors['email']; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($old_data['phone'] ?? ''); ?>">
            <?php if (isset($errors['phone'])): ?>
                <span class="error"><?php echo $errors['phone']; ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>