<?php

namespace App\Entity;

use \Core\Entity\Entity;

class ArticleEntity extends Entity {
    
    public function getUrl() {
        return 'index.php?p=article.show&id=' . $this->id;
    }
    
    /**
    * Permet de retourner un extrait de l'article
    * @param void 
    */
    public function getExtrait() {
        $html = '<p>' . substr($this->content_post, 0, 255) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</p></a>';
        return $html;
    }
    
}

?>