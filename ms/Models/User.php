<?php
namespace MS\Models;

use oangia\MongoDB\Model;

class User extends Model {
    public static $fields = ['email', 'password', 'host'];
    public static $collection = 'users';
}