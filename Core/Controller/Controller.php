<?php

namespace Core\Controller;

// Class parente des controllers dans App\Controller
class Controller {
    
    protected $viewPath;
    protected $template;
    
    /**
     * Charge les views 
     * @param [string] $view      [la vue à charger]
     * @param [array] $variables [Tableaux contenant les variables définient dans le Controller]
     */
    public function render($view, $variables = []) {
        ob_start();
        // Extrait les variables passé en paramètres, et permet de les récupérer aux niveaux de la vue
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }
    
}

?>