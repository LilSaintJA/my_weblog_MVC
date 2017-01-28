<?php
namespace App\Tables;

use App\Appli;

/**
* Class Categories
* Permet de lister toutes les catégories des articles
*/
class Categories extends Table {

    protected static $table = 'categories';
    
    /**
    * Permet de retourner l'url de la categories
    * @param void 
    */
    public function getUrl() {
        return 'index.php?p=categorie&id_cat=' . $this->id_cat;
    }

}

?>