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
        $req = "SELECT * FROM {$this->table}";
        return $this->query($req);
    }

    /**
     * [[Description]]
     * @param  [[Type]] $id [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function find($id) {
        // Problème à résoudre avec id_cat
        $req = "SELECT * 
        FROM {$this->table} 
        WHERE id = ?";
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

    /**
     * Fonction qui permet de faire un update en BDD
     * @param  [int] $id     [Identifiant de l'attribut à update]
     * @param  [string] $fields [Champ à update]
     * @return [object] [Retourne le query de la requête]
     */
    public function update($id, $fields) {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            // J'incrémente l'attribut de la valeur trouvé
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);
        $req = "UPDATE {$this->table} SET $sql_part WHERE id = ?";
        return $this->query($req, $attributes, TRUE);
    }

    /**
     * Fonction qui permet de faire un create en BDD
     * @param  [int] $id     [Identifiant de l'attribut à update]
     * @param  [string] $fields [Champ à créer]
     * @return [object] [Retourne le query de la requête]
     */
    public function create($fields) {
        $sql_parts = [];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            // J'incrémente l'attribut de la valeur trouvé
            $attributes[] = $v;
        }
        $sql_part = implode(', ', $sql_parts);
        $req = "INSERT INTO {$this->table} SET $sql_part";
        return $this->query($req, $attributes, TRUE);
    }

    /**
     * Fonction qui permet de faire un update en BDD
     * @param  [int] $id     [Identifiant de l'attribut à update]
     * @param  [string] $fields [Champ à update]
     * @return [object] [Retourne le query de la requête]
     */
    public function delete($id) {
        $req = "DELETE FROM {$this->table} WHERE id = ?";
        return $this->query($req, [$id], TRUE);
    }

    /**
     * Fonction qui permet de lister les enregistrement
     * @param  [[Type]] $key   [[Description]]
     * @param  [[Type]] $value [[Description]]
     * @return [array] [[Description]]
     */
    public function liste($key, $value) {
        $records = $this->all();
        foreach($records as $v) {
            $return[$v->$key] = $v->$value;
        }

        return $return;
    }
}

?>