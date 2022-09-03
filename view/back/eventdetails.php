<?php
include '../controller/crudevenement.php';
$evenementcontroller = new evenementController();
$listevenement = $evenementcontroller->afficherevenement();
?>
<?php
require_once '../model/categorie.php';
include_once '../controller/crudevenement.php';
require_once '../model/evenement.php';



$error = "";

// create blog
//$comment = null;

// create an instance of the controller
$categoriecontroller = new categoriecontroller();
if (
    isset($_POST["submit"])
) {
    if (
        !empty($_POST["contenuC"]) &&
        !empty($_POST['id_blog'])
    ) {
        $comment = new commentaire(
            $_POST['contenuC'],
            $_POST['id_blog']

        );
        $CommentC->ajouterComment($comment);
        // header('Location:blogDetails.php');
    } else
        $error = "Missing information";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spark - Responsive Hosting, Domain, Technology HTML Template</title>

    <link rel="stylesheet" href="assets/css/custom/style.css">
    <link rel="stylesheet" href="assets/css/responsive/responsive.css">
    
    <!-- favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <style>
        span{
            color:blue;
        }
        p{
            color:blue;
        }
    </style>

</head>

<body class="comingSoon">

    <div class="preloader">
        <div class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>

    <!-- ======= 1.01 Header Area ====== -->
    <?php 
     //include_once('header.php');
    ?>
    <!-- ======= /1.01 Header Area ====== -->
    <!-- ======= 2.01 Page Title Area ====== -->
    <div class="pageTitleArea animated">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pageTitle">
                        <div class="h2">Coming soon</div>
                        <ul class="pageIndicate">
                            <li><a href="http://localhost:7882/demo/front1/hol/home.php">home</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= /2.01 Page Title Area ====== -->

    <?php
    $id = $_GET["id_blog"];

    $blog = $blogC->recupererblog($id);

    $db = config::getConnexion();
    $likes = $db->prepare('SELECT id FROM likes WHERE id_blog = ?');
    $likes->execute(array($id));
    $likes = $likes->rowCount();

    $dislikes = $db->prepare('SELECT id FROM dislikes WHERE id_blog = ?');
    $dislikes->execute(array($id));
    $dislikes = $dislikes->rowCount();

    $views = $db->prepare('SELECT id FROM views WHERE id_blog = ?');
    $views->execute(array($id));
    $views = $views->rowCount();


    ?>



    <div class="comingSoonArea secPdng">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 ipad-landscape animated">
                <div onload="counter_fn()">
           <p> <i class="fa fa-eye"> <span id="cntr"><?php echo $views ?></span> </i></p>
        </div>
    
                    <div class="comingContent">
                        <span></span>
                        <div class="h1"><?php echo $blog['objet']; ?></div>
                        <span><?php echo $blog['date']; ?></span>
                        <br>
                        <span><?php echo $blog['description']; ?></span>
                        <br>
                        <div class="wrapper" >
                                        <a class="likes-counter" >
                                            <a class="fa fa-thumbs-up" href="action.php?t=1&id=<?php echo $blog['id_blog']; ?>"></a>
                                            <a id="l-counter"><?php echo $likes ?></a>
                                        </a>
                                        <a class="dislikes-counter">
                                            <a class="fa fa-thumbs-down" href="action.php?t=2&id=<?php echo $blog['id_blog']; ?>"></a>
                                            <a id="d-counter"><?php echo $dislikes ?></a>
                                        </a>
                                    </div>

                        <?php
                        foreach ($listcomment as $comments) {
                            if ($blog['id_blog'] == $comments['id_blog']) {


                        ?>
                                <div class="card">
                                    <div class="card-body">
                                        <?php echo $comments['contenuC']; ?>
                                        <a class="fa fa-trash" href="supprimerblog.php?idCommentaire=<?php echo $comments['idCommentaire']; ?>&id_blog=<?php echo $comments['id_blog']; ?>">  </a>
                                    </div>

                                </div>




                            <?php }

                            ?>


                        <?php
                        }
                        ?>
                        <form action="ajoutCommentaire.php?id_blog=<?php echo $blog['id_blog']; ?>" method="POST" name="f">
                            <input class="form-control" type="textarea" name="contenuC" id="contenuC">
                            <input type="hidden" value="<?PHP echo $blog['id_blog']; ?>" name="id_blog" id="id_blog">
                            <br>
                            <input class="btn btn-primary" type="submit" value="Envoyer" name="submit" >
                        </form>

                    </div>

                </div>
                <div class="col-lg-6 offset-lg-0 animated">

                    <div class="sicleImg">
                    
                      <img src="../hol/assets/images/<?php echo $blog['image']; ?>" alt=""></div>
                </div>
            </div>
        </div>
        
    </div>


    <?php


    ?>


    <div class="sectionBar"></div>
    <!-- ======= 1.09 footer Area ====== -->
    <?php 
     //include_once('footer.php');
    ?>
    <!-- ======= /1.09 footer Area ====== -->


    <script src="assets/js/jquery.1.11.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/chatScript.js" type="text/javascript"></script>
    <script src="assets/js/active.js"></script>
    <script src="assets/js/darkmode.js"></script>

    <script src="assets/js/comment.js"></script>

</body>

</html>