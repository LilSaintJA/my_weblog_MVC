<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Starter Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="../public/styles/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Accueil</a>
                    <a class="navbar-brand" href="index.php">Critiques</a>
                    <a class="navbar-brand" href="index.php">Bilans</a>
                    <a class="navbar-brand" href="index.php">Séries Cultes</a>
                    <a class="navbar-brand" href="index.php">Mini-Séries</a>
                </div>
            </div><!-- /.container -->
        </nav>

        <div class="container">
            <div class="starter-template" style="padding-top: 100px;">
                <?= $content;?>
            </div>
        </div><!-- /.container -->
        <div class="container">
            <footer id="main-footer" class="main-footer panel-footer">
                <span>&copy; LilSaint - Web@cademie</span>
            </footer>
        </div><!-- /.container -->
    </body>
</html>
