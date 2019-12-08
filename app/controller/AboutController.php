<?php
namespace app\controller;

use ulole\core\classes\Response;
use ulole\core\classes\Request;

class AboutController {

    public static function about() {
        return "ABOUT";
    }

    public static function api() {
        // Gives a JSON back
        return [
            "done" => true,
            "param"=> Request::POST("test")
        ]; // You can also use Response::json([...]);
    }

}