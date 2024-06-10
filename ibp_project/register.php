<?php
include('connection2.php');
session_start();

if (isset($_POST["update"])) {

    $username = $_POST['username'];
    $old_password = $_POST["oldpass"];
    $new_password = $_POST["password"];

    // Kullanıcıyı veritabanından al
    $sql = "SELECT password FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Girilen eski şifreyi doğrula
        if (password_verify($old_password, $row["password"])) {
            // Yeni şifreyi hash'le
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            // Şifreyi güncelle
            $update_sql = "UPDATE login SET password = ? WHERE username = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $new_hashed_password, $username);
            if ($update_stmt->execute()) {
                echo "Password updated successfully";
            } else {
                echo "An error occurred while updating the password: " . $update_stmt->error;
            }
        } else {
            echo "The old password entered is incorrect!";
        }
    } else {
        echo "User not found!";
    }

    $stmt->close();
    $update_stmt->close();
    $conn->close();
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>♕Ａｄｍｉｎ Ｐａｎｅｌ♕</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<main>
    <div class="container">
        <form action="" method="post" class="row mt-4 g-3">
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="">
                <label for="exampleInputPassword1" class="form-label">Previous Password</label>
                <input type="password" class="form-control" name="oldpass" value="">
                <label for="exampleInputPassword1" class="form-label">New Password</label>
                <input type="password" class="form-control" name="password" value="">
            </div>
            <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
        </form>
    </div>
</main>
</body>
</html>