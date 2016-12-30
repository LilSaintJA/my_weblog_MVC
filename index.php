
<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Tuto PHP POO MVC</title>

    </head>

    <body>

        <?php

        require 'Form.php';

        $form = new Form($_POST);

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

