<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

<?php include('db.php') ?>

<?php
    $sql = "SELECT * FROM comments";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
?>

<h3>COMMENTS</h3><hr>

<?php foreach ($comments as $comment) { ?>

<ul id="komentar">
    <br>
    <li><?php echo $comment['author'] . ': ' . $comment['text']?></li>
    <br>
    <!-- Napravio sam svoj custom CSS jer to što se traži u zadatku izgleda ružno (zadatak 12.) -->
</ul>

<?php } ?>

</body>
</html>