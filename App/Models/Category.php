<?php

namespace App\Models;

Class Category{
    private $id;
    public $name;


    public function __construct($i,$n){
        $this->id = $i;
        $this->name = $n;

    }

    public function getAll() {
        return [
            "id" => $this->id,
            "name" => $this->name,
        ];
    }



}

?>