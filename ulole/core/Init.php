<?php

/*
    Init.php
    Inititializing configs and more
*/

global $ULOLE_CONFIG, $ULOLE_CONFIG_ENV, $SQL_DATABASES;

$ULOLE_CONFIG = json_decode(file_get_contents("conf.json"));

\ulole\core\classes\Lang::setLang((isset($ULOLE_CONFIG->options->defaultlang)) ? $ULOLE_CONFIG->options->defaultlang : "en");

if ((isset($ULOLE_CONFIG->options->detectlanguage) ? $ULOLE_CONFIG->options->detectlanguage : false)) {
    if (\file_exists("resources/languages/".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2).".json"))
    \ulole\core\classes\Lang::setLang(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
}
$SQL_DATABASES = [];

$ULOLE_CONFIG_ENV = "";
if (file_exists("env.json")) {
    $ULOLE_CONFIG_ENV = json_decode(file_get_contents("env.json"));

    if (isset($ULOLE_CONFIG_ENV->databases)) {
        foreach ($ULOLE_CONFIG_ENV->databases as $db=> $values) {
            global $SQL_DATABASES;
            
            $SQL_DATABASES[$db] = new ulole\modules\ORM\SQL(
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

if (file_exists("initscripts.json")) {
    try {
        $config_plugins = json_decode(file_get_contents("initscripts.json"));
        if (isset($config_plugins->initscripts)) 
            foreach ($config_plugins->initscripts as $script)
                @include($script);
    } catch(Exception $e) {}
}