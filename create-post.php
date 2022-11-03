<?php

include('db.php');

if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $body = $_POST['body'];

    
    if (empty($title) || empty($author) || empty($body)) {
        echo "<script src='alert.js'></script>";
    } else {
        
        $sql = "SELECT COUNT('id') + 1 FROM posts";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $idCount = $statement->fetch();

        $stringify = json_encode($idCount);
        $idString = substr($stringify, 21, 1);
        $id = (int)$idString;

        $currentDate = date('Y-m-d H:i:s');

            $sql = "INSERT INTO posts (id, title, body, author, created_at)
            VALUES('$id', '$title', '$body', '$author', '$currentDate')";

            $statement = $connection->prepare($sql);
            $statement->execute();

            header("Location: ./index.php");
        
        }

} 

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>New Submission</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

        <?php include('header.php') ?>
    
    <main role="main" class="container">

    <!-- <pre>
    <?php print_r($idCount) ?>
    </pre> -->
    
    <h1>New Submission</h1>
    <br>
    <div id='forma'>
        <form action="create-post.php" method="POST" id="postsForma">
                    
            <label for="title"><h3>Title</h3></label>
            <input class="input" type="text" id="title" name="title" placeholder="Enter title"><br><br>
            
            <label for="author"><h3>Author</h3></label>
            <input class="input" name="author" placeholder="Enter author" id="author"></input><br><br>
                
            <label for="body"><h3>Text</h3></label>
            <textarea class="input" name="body" placeholder="Enter body" rows="10" id="body"></textarea><br>
                
            <button class="button" type="submit" name="submit">Submit</button>

        </form>
    </div>
    
</main>
<br><br>

    <?php include('footer.php') ?>
  
</body>

</html>