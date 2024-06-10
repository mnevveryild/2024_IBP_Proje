<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<header>
</header>
<main>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include("duyurular.php");

                    $select2 = "SELECT * FROM duyurular";
                    $result2 = $conn->query($select2);

                    if ($result2->num_rows > 0) {
                        while($pull = $result2->fetch_assoc()) { ?>
                            <tr>
                                
                                <td><?= $pull['title'] ?></td>
                                <td><?= $pull['textt'] ?></td>
                                <td><?= $pull['date_time'] ?></td>
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='4'>Not Announcements.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</body>
</html>
