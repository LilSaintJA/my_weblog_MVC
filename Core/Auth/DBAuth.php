<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUserId() {
        if($this->logged()) {
            // Retourne l'id de l'utilisateur
            return $_SESSION['auth'];
        }
        
        return FALSE;
    }

    /**
     * Fonction permettant à un utilisateur avec un login et un password d'accéder à différentes parties du site
     * @param [string] $username [Nom d'utilisateur]
     * @param [string] $password [Mot de passe de l'utilisateur]
     * @return [bool] [[Description]]
     */
    public function login($username, $password) {
        $req = "SELECT * FROM users WHERE username = ?";
        $user = $this->db->prepare($req, [$username], NULL, TRUE);
        if($user) {
            if ($user->password === sha1($password)) {
                // Pk $_SESSION['auth'];
                $_SESSION['auth'] = $user->id_user;
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * [[Description]]
     * @return [[Type]] [[Description]]
     */
    public function logged() {
        if (isset($_SESSION['auth'])) {
            return TRUE;
        }
    }

}


?>