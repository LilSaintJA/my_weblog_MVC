<?php
namespace Core\Database;

// Permet de ne pas mettre un \ devant tout les PDO
use \PDO;

/**
* Class Database
* Permet de se connecter à la base de donner
*/
class MysqlDatabase extends Database {

    /**
    * @var {string} Permet de récupérer les données pour la connection à la BDD
    */
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $connectBDD;

    /**
    * @param string Données utlisés par PDO
    * @param string
    */
    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
    * @param void Permet de gérer PDO
    * @param void
    */
    private function getPDO() {
        // Permet d'initialisé PDO qu'une seule fois
        // Accesseur
        if($this->connectBDD === null) {
            $connectBDD = new PDO('mysql:dbname=test_blog;host=localhost', 'root', '');
            $connectBDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connectBDD = $connectBDD;
        }
        return $this->connectBDD;
    }

    /**
    * @param $tatementPDO Permet de faire les requêtes à la BDD
    * @param $tatementPDO
    */
    public function query($statement, $class_name = NULL, $one = FALSE) {
        $req = $this->getPDO()->query(($statement));
        // Si jamais on a juste query à faire
        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $req;
        }

        if($class_name === NULL) {
            $req->setFetchMode((PDO::FETCH_OBJ));
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    /**
     * [[Description]]
     * @param  [[Type]] $statement           [[Description]]
     * @param  [[Type]] $attributes          [[Description]]
     * @param  [[Type]] [$class_name = NULL] [[Description]]
     * @param  [[Type]] [$one = FALSE]       [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function prepare($statement, $attributes, $class_name = NULL, $one = FALSE) {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        // Si jamais on a juste query à faire
        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }

        if($class_name === NULL) {
            $req->setFetchMode((PDO::FETCH_OBJ));
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();

        }
        return $datas;
    }

    /**
     * Permet de récupèrer le dernier ID insérer en BDD
     * @return [[Type]] [[Description]]
     */
    public function lastInsertId() {
        return $this->getPDO()->lastInsertId();
    }

}
?>