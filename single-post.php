<?php session_start() ?>
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

<?php 
    include('db.php');
?>

    <?php
        $idposta =  $_GET['id'];
        $sql = "SELECT * FROM posts WHERE id = $idposta";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $posts = $statement->fetch();
        // $_SESSION['post_id'] = $post_id;
    ?>
        
        
<?php include('header.php') ?>
    
<main role="main" class="container">
    
    <div class="row">
            
            <div class="col-sm-8 blog-main">
            
                <div class="blog-singlePost">
                    <a href="<?php echo $target ?>"><h2 class="blog-post-title"> <?php echo($posts['title']) ?></h2></a>
                    <p class="blog-post-meta"><?php echo($posts['created_at']) ?> by <a href="#"> <?php echo($posts['author']) ?></a></p>
                    <p><?php echo($posts['body']) ?></p>
                </div>

            </div>
            
            <?php include('aside.php') ?>
            
    </div>
        
    <?php include('comments.php') ?>
    
</main>

<?php include('footer.php') ?>

</body>
</html>