<?php
namespace App\Tables;

class Table {

    protected $table;

    /**
     * Constructeur de la class Parente Table
     * Si le nom de la table n'est pas définit dans l'enfant, l'initialise
     * Sinon récupére le nom de la class définti dans l'enfant
     * @private
     */
    public function __construct() {
        if (is_null($this->table)) {
            // Explose la chaine contenant la class et le namespace
            $table_name = explode('\\', get_class($this));
            // Récupére le dernier index du tableau
            $class_name = end($table_name);
            // Remplace le mot Table par du vide pour n'avoir que le nom de la class
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }

}

?>