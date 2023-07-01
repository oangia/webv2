<?php
namespace oangia\MySQL;

class Model {
    public static $timestamps = true;

    function __construct($data = []) {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public static function create($data) {
        $class = get_called_class();
        if ($class::$timestamps) {
            $data = array_merge($data, ['created_at' => date('Y-m-d H:i:s', time()),'updated_at' => date('Y-m-d H:i:s', time())]);
        }
        $result = DB::create($class::$table, $data);
        $result = DB::findById($class::$table, $result['last_id']);
        return new $class($result);
    }

    public static function findOrCreate($filter, $data) {
        $class = get_called_class();
        $result = DB::find($class::$table, $filter);
        if (empty($result)) {
            $newData = array_merge($filter, $data);
            if ($class::$timestamps) {
                $newData = array_merge($newData, ['created_at' => date('Y-m-d H:i:s', time()),'updated_at' => date('Y-m-d H:i:s', time())]);
            }
            $result = DB::create($class::$table, $newData);
            $result = DB::findById($class::$table, $result['last_id']);
        }
        return new $class($result);
    }

    public static function findById($id) {
        $class = get_called_class();
        $result = DB::findById($class::$table, $id);
        if (empty($result)) {
            return null;
        }
        return new $class($result);
    }
}