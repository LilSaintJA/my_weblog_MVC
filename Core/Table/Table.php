<?php
namespace Core\Table;
use \Core\Database\Database;

class Table {

    protected $table;
    protected $db;

    /**
     * Constructeur de la class Parente Table
     * Si le nom de la table n'est pas définit dans l'enfant, l'initialise
     * Sinon récupére le nom de la class définti dans l'enfant
     * @private
     * @param [object] Database $db [Prend en paramétre la BDD]
     */
    public function __construct(Database $db) {
        $this->db = $db;
        if (is_null($this->table)) {
            // Explose la chaine contenant la class et le namespace
            $table_name = explode('\\', get_class($this));
            // Récupére le dernier index du tableau
            $class_name = end($table_name);
            // Remplace le mot Table par du vide pour n'avoir que le nom de la class
            $this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
        }
    }

    /**
     * Récupére tout les articles
     * @return {object PDO} Retourne le result de la requête
     */
    public function all() {
        $req = 'SELECT * FROM ' . $this->table;
        //        var_dump($req);
        return $this->query($req);
    }

    /**
     * [[Description]]
     * @param  [[Type]] $id [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function find($id) {
        $req = "SELECT * 
        FROM {$this->table} 
        WHERE $id = ?";
        return $this->query($req, [$id], TRUE);
    }

    /**
     * Permet de faire une requête SQL
     * @param  [requête] $statement           Représente la requête préparée et executée
     * @param  [bool]   [$attributes = NULL] [Représente l'attribut]
     * @param  [bool]   [$one = FALSE]       [Si on veut récupèrer un seul attribut]
     * @return [method] [Retourne la méthode approprié à la condition]
     */
    public function query($statement, $attributes = NULL, $one = FALSE) {
        if($attributes) {
            return $this->db->prepare(
                $statement, 
                $attributes, 
                str_replace('Table', 'Entity', get_class($this)), 
                $one
            );
        } else {
            return $this->db->query(
                $statement, 
                str_replace('Table', 'Entity', get_class($this)), 
                $one
            );
        }
    }
}

?>