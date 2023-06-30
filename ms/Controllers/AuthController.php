<?php
namespace MS\Controllers;

use MS\Models\Auth;

class AuthController {
    public function register() {
        $user = Auth::findByEmail(__post('email'), __server('HTTP_HOST'));
        if ($user) die('this email already taken');
        $result = Auth::register([
            'email' => __post('email'),
            'password' => md5('oangia_' . __post('password')),
            'host' => __server('HTTP_HOST')
        ]);
        header('Location: /myadmin');
        die();
    }

    public function login() {
        $user = Auth::findByEmail(__post('email'), __server('HTTP_HOST'));
        if (! $user || $user->password != md5('oangia_' . __post('password'))) {
            die('User or password wrong <a href="/myadmin/login">Login</a>');
        }
        if ($user->getKey('role') != 'admin') {
            die('not allow <a href="/myadmin/login">Login</a>');
        }
        setcookie('user', $user->_id, time() + (86400 * 30), "/");
        header('Location: /myadmin');
        die();
    }
}