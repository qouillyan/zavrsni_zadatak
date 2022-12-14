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
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $statement->fetchAll();
    ?>

<?php include('header.php') ?>

<main role="main" class="container">
    

    <div class="row">
        
        <?php foreach ($posts as $post) { ?>

            <div class="col-sm-8 blog-main">
            
                <div class="blog-post">
                    <a href="single-post.php?id=<?php echo($post['id']) ?>"><h2 class="blog-post-title"> <?php echo($post['title']) ?></h2></a>
                    <p class="blog-post-meta"><?php echo($post['created_at']) ?> by <a href="#"> <?php echo($post['author']) ?></a></p>
                    <p><?php echo($post['body']) ?></p>
                </div>

            </div>
                    
        <?php } ?>
            
            <?php include('aside.php') ?>
        
        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>
        
    </div>
</main>

<?php include('footer.php') ?>

</body>
</html>