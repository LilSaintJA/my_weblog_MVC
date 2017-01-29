<?php

namespace App\Entity;

use \Core\Entity\Entity;

class CategoryEntity extends Entity {
    
    public function getUrl() {
        return 'index.php?p=article.categorie&id_cat=' . $this->id_cat;
    }
    
}

?>