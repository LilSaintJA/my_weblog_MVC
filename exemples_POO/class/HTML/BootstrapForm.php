<?php

namespace Weblog_MVC\HTML;

class BootstrapForm extends Form {

    /**
    * @param $html string Code HTML entourer
    * @param string
    */
    protected function surround($html) {
        // Les {} sont nécessaires pour que le code soit interprété par les doubles ""
        return "<div class=\"form-group\">{$html}</div>";

    }

    /**
    * @param $name string
    * @param string
    */
    public function input($name) {
        return $this->surround(
            '<label>' . $name . '</label><input type="text" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">'
        );
    }

    /**
    * @param void
    * @param void
    */
    public function submit() {
        return '<button type="submit" class="btn btn-primary">Envoyer</button>';
    }

    public function resetButton() {
        return '<button type="reset" class="btn btn-primary">Supprimer</button>';
    }
}

?>