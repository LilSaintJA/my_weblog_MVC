<?php

namespace App\Table;
use Core\Table\Table;

class CategoryTable extends Table {

    protected $table = 'categories';

    public function findCat($id) {
        $req = "SELECT id, titre_cat FROM categories WHERE id = ?";
        return $this->query($req, [$id], TRUE);
    }
}

?>