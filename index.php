<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/styles/bootstrap.css">
        <title>Tuto PHP POO MVC</title>
    </head>
    <body>
        <?php

        require 'Form.php';
        require 'BootstrapForm.php';

        $form = new BootstrapForm($_POST);

        ?>

        <div id="page-wrapper">
            <form action="#" method="post">
                <?php

                // Code générant les balises de la class Form
                echo $form->input('username');
                echo $form->input('password');
                echo $form->submit();
                echo $form->resetButton();

                ?>
            </form>
        </div>
    </body>
</html>