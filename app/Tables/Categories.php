<?php
namespace App\Tables;

use App\Appli;

/**
* Class Categories
* Permet de lister toutes les catégories des articles
*/
class Categories extends Table {

    private static $table = 'categories';
    
    /**
    * Permet de retourner l'url
    * @param void 
    */
    public function getUrl() {
        return 'index.php?p=categories&id_post=' . $this->id_cat;
    }

}

?>