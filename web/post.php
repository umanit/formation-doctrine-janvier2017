<?php

require_once '../bootstrap.php';

use ImieBook\Entity\Post;

if (!empty($_GET['delete'])) {
    $postToDelete = $entityManager
        ->getRepository('ImieBook\Entity\Post')
        ->find($_GET['delete'])
    ;

    $entityManager->remove($postToDelete);
    $entityManager->flush($postToDelete);
}

// vérification que le formulaire de création de post a été soumis
if (isset($_POST['post'])) {
    $post = new Post();
    $post->setSubject(htmlspecialchars($_POST['title']));
    $post->setMessage(htmlspecialchars($_POST['message']));
    $post->setDate(new \DateTime());
    $post->setAuthor($_SESSION['user']);

    $entityManager->persist($post);
    $entityManager->flush($post);
}

if (isset($_GET['search-word'])) {
    $posts = $entityManager
        ->getRepository('ImieBook\Entity\Post')
        ->search($_GET['search-word'])
    ;
} else {
    // $posts = $entityManager->getRepository('ImieBook\Entity\Post')->findAll();
    $posts = $entityManager->getRepository('ImieBook\Entity\Post')->findBy([], ['date' => 'DESC']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>IMIEBook</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="box">
            <div class="row row-offcanvas row-offcanvas-left">
                <!-- main right col -->
                <div class="column col-sm-12 col-xs-12" id="main">

                    <!-- top nav -->
                    <div class="navbar navbar-blue navbar-static-top">
                        <div class="navbar-header">
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="/" class="navbar-brand logo">b</a>
                        </div>
                        <nav class="collapse navbar-collapse" role="navigation">
                            <form  class="navbar-form navbar-left" action="post.php">
                                <div class="input-group input-group-sm" style="max-width:360px;">
                                    <input type="text" class="form-control" placeholder="Search" name="search-word" id="srch-term">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" name="search" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /top nav -->

                    <div class="padding">
                        <div class="full col-sm-9">

                            <!-- content -->
                            <div class="row">

                                <!-- main col left -->
                                <div class="col-sm-5">
                                    <div class="well">
                                        <form method="POST" class="form-horizontal" role="form" action="post.php">
                                            <h4>What's New</h4>
                                            <div class="form-group" style="padding:14px;">
                                                <input type="text" class="form-control" name="title" placeholder="Titre"/>
                                                <hr/>
                                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                            </div>
                                            <button class="btn btn-primary pull-right" name="post" type="submit">Post</button><ul class="list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
                                        </form>
                                    </div>
                                </div>

                                <!-- main col right -->
                                <div class="col-sm-7">
                                    <?php foreach($posts as $post): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <a href="comment.php?post_id=<?php print $post->getId(); ?>" class="pull-right">Link</a>
                                            <a href="edit_post.php?post_id=<?php print $post->getId(); ?>" class="pull-right">Éditer</a>
                                            <a href="post.php?delete=<?php print $post->getId(); ?>">Supprimer</a>
                                            <h4><?php print $post->getSubject(); ?></h4>
                                            <?php print $post->getDate()->format('d/m/Y H:i:s'); ?>
                                        </div>
                                        <div class="panel-body">
                                            <?php print $post->getMessage(); ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div><!--/row-->
                            <hr>
                        </div><!-- /col-9 -->
                    </div><!-- /padding -->
                </div>
                <!-- /main -->

            </div>
        </div>
    </div>
    <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
