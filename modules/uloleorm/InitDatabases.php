<?php
namespace modules\uloleorm;

class InitDatabases {
    public static function init() {
        if (file_exists("env.json")) {
            $ULOLE_CONFIG_ENV = json_decode(file_get_contents("env.json"));

            if (isset($ULOLE_CONFIG_ENV->databases)) {
                foreach ($ULOLE_CONFIG_ENV->databases as $db=> $values) {
                    SQL::$databases[$db] = new SQL(
                        $values->username,
                        $values->password,
                        $values->database,
                        $values->server,
                        $values->port,
                        $values->driver
                    );

                }
            }
        }
    }
}
?>