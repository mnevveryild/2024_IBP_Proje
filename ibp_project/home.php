<?php
include("duyurular.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["title"], $_POST["textt"])) {
    $title = $_POST["title"];
    $textt = $_POST["textt"];

    $insert = "INSERT INTO duyurular (title, textt) VALUES ('$title', '$textt')";

    if ($conn->query($insert) === TRUE) {
        echo "<script>
                alert('The announcement was successfully created.');
                window.location.href = 'panel.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <h3 id="h3about"style="text-align: center; color: #c8f7c3;" >Ｃｒｅａｔｅ Ａｎｎｏｕｎｃｅｍｅｎｔ</h3>
    <div class="container">
        <form action="home.php" method="post">
            <div id="contactopac">
                <div id="formgroup">
                    <div id="leftform">
                        <input type="text" name="title" placeholder="Title" required class="form-control">
                        <input type="text" name="textt" placeholder="Text" required class="form-control">
                    </div>
                    <input type="submit" value="Create" class="btn btn-primary mt-3">
                </div>
            </div>
        </form>
        <footer></footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="owl/owl.carousel.min.js"></script>
    <script src="owl/script.js"></script>
</body>
</html>

