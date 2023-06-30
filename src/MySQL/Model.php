<?php
namespace oangia\MySQL;

class Model {
    function __construct($data = []) {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public static function findById($id) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id=' . $id;
        $result = DB::selectOne($sql);
    }
}