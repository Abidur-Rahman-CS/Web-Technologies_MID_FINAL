<?php
session_start();

class UserModel {
    public $username;
    public $name;
    public $email;
    public $phone;
    private $errors = [];
    public function __construct($data) {
        $this->username = trim($data['username'] ?? '');
        $this->name = trim($data['name'] ?? '');
        $this->email = trim($data['email'] ?? '');
        $this->phone = trim($data['phone'] ?? '');
    }

    public function validate() {
        if (empty($this->username)) {
            $this->errors['username'] = "Username is required.";
        } elseif (strlen($this->username) < 4) {
            $this->errors['username'] = "Username must be at least 4 characters long.";
        }

        if (empty($this->name)) {
            $this->errors['name'] = "Full Name is required.";
        }

        if (empty($this->email)) {
            $this->errors['email'] = "Email is required.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Please enter a valid email address.";
        }

        if (empty($this->phone)) {
            $this->errors['phone'] = "Phone number is required.";
        } elseif (!preg_match('/^[0-9]{10,15}$/', $this->phone)) {
            $this->errors['phone'] = "Phone number must be between 10 and 15 digits.";
        }

        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}

class FormController {
    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new UserModel($_POST);
            if ($user->validate()) {
                $_SESSION['success'] = "Form submitted successfully! Welcome, " . htmlspecialchars($user->name) . ".";
                unset($_SESSION['errors']);
                unset($_SESSION['old_data']);
            } else {
                $_SESSION['errors'] = $user->getErrors();
                $_SESSION['old_data'] = $_POST;
                unset($_SESSION['success']);
            }
            header("Location: form.php");
            exit();
        }
    }
}
$controller = new FormController();
$controller->handleRequest();
?>