<?php

namespace Core\Entity;

class Entity {
    
    /**
     * Fonction magique permettant de transformer une propriété en méthode
     * @private
     * @param  [string] $key [La propriété à transformer]
     * @return [object] [Retourne une instance de la propriété sur l'objet $this]
     */
    public function __get($key) {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
    
}
?>