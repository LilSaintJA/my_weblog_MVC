<?php

namespace Core\HTML;

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
     * Method qui génére les inputs
     * @param  [string] $name           [[Description]]
     * @param  [string] $label          [[Description]]
     * @param  [array] [$options = []] [[Description]]
     * @return [string] [[Description]]
     */
    public function input($name, $label, $options = []) {
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        if($type === 'textarea') {
            $input = '<textarea class="form-control type="' . $type . '" name="' . $name . '">' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">';

        }
        return $this->surround($label . $input);
    }

    public function select($name, $label, $options) {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name=' . $name . '">';
        foreach($options as $k => $v) {
            $input .= "<option value='$k'>$v</option>";
        }
        $input .= '</select>';
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