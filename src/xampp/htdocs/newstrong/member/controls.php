<?php
include 'db.php';
session_start();

// Set secure session settings
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Enable if using HTTPS

// CSRF Token (optional but recommended)
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// 1. Handle User Registration
if (isset($_POST['register'])) {
    if (
        isset($_POST['names'], $_POST['email'], $_POST['password'], $_POST['role'])
    ) {
        $names = htmlspecialchars(trim($_POST['names']));
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $role = htmlspecialchars(trim($_POST['role']));
        $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);

        if (!$email) {
            header("Location: admin/manageuser.php?error=invalid_email");
            exit();
        }

        $stmt = $conn->prepare("INSERT INTO users (names, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $names, $email, $password, $role);

        if ($stmt->execute()) {
            header("Location: admin/manageuser.php?success=1");
        } else {
            header("Location: admin/manageuser.php?error=1");
        }
        $stmt->close();
        exit();
    } else {
        header("Location: admin/manageuser.php?error=missing_fields");
        exit();
    }
}

// 2. Handle User Login
if (isset($_POST['login'])) {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            session_regenerate_id(true);
            if($row['role'] == "Admin"){
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
        } elseif($row['role'] == "Worker"){
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                header("Location: admin/workerview.php");

            }
        } else {
            $_SESSION['message'] = "Invalid email or password";
            header("Location: login.php");
        }
    } else {
        $_SESSION['message'] = "User not found";
        header("Location: login.php");
    }
    $stmt->close();
    exit();
}

// 3. Handle Document Upload
if (isset($_POST['add_document'])) {
    $user_id = $_SESSION['id'] ?? null;

    if (!$user_id) {
        header("Location: login.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT names FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $res = $stmt->get_result();
    $rows = $res->fetch_assoc();
    $stmt->close();

    $user_name = htmlspecialchars($rows['names']);

    // Sanitize form data
    $document_names = htmlspecialchars(trim($_POST['document_names']));
    $document_address = htmlspecialchars(trim($_POST['document_address']));
    $document_activity = htmlspecialchars(trim($_POST['document_activity']));
    $document_date = htmlspecialchars(trim($_POST['date']));
    $document_status = htmlspecialchars(trim($_POST['status']));
    $document_phone = htmlspecialchars(trim($_POST['document_phone']));
    $delivery = htmlspecialchars(trim($_POST['date2']));
    $other = htmlspecialchars(trim($_POST['other']));

    // File upload
    $allowed_types = ['application/pdf', 'image/jpeg', 'image/png'];
    $file = $_FILES['document'];

    if (
        $file['error'] === 0 &&
        in_array(mime_content_type($file['tmp_name']), $allowed_types)
    ) {
        $file_name = uniqid() . "_" . basename($file['name']);
        $upload_dir = 'uploads/';
        $file_destination = $upload_dir . $file_name;

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $file_destination)) {
            $stmt = $conn->prepare("INSERT INTO documents (
                user_id, user_name, document_names, document_address,
                document_activity, document_date, document_status,
                document_phone, document, delivery, other
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param(
                "issssssssss",
                $user_id, $user_name, $document_names, $document_address,
                $document_activity, $document_date, $document_status,
                $document_phone, $file_destination, $delivery, $other
            );

            $success = $stmt->execute();
            $stmt->close();

            $redirect = $_SESSION['role'] === 'Admin' ? 'admin/documents.php' : 'admin/workerview.php';
            header("Location: $redirect?" . ($success ? "success=1" : "error=1"));
            exit();
        } else {
            header("Location: admin/documents.php?error=file_upload");
            exit();
        }
    } else {
        header("Location: admin/documents.php?error=invalid_file");
        exit();
    }
}
?>
