<?php

/*
    Init.php
    Inititializing configs and more
*/

global $config, $config_env, $SQL_DATABASES;

$config = json_decode(file_get_contents("conf.json"));
if (file_exists("initscripts.json")) {
    try {
        $config_plugins = json_decode(file_get_contents("initscripts.json"));
        if (isset($config_plugins->initscripts)) 
            foreach ($config_plugins->initscripts as $script)
                @include($script);
    } catch(Exception $e) {}
}
\ulole\core\classes\Lang::setLang((isset($config->options->defaultlang)) ? $config->options->defaultlang : "en");

if ((isset($config->options->detectlanguage) ? $config->options->detectlanguage : false)) {
    if (\file_exists("resources/languages/".substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2).".json"))
    \ulole\core\classes\Lang::setLang(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
}
$SQL_DATABASES = [];

$config_env = "";
if (file_exists("env.json")) {
    $config_env = json_decode(file_get_contents("env.json"));

    if (isset($config_env->databases)) {
        foreach ($config_env->databases as $db=>$values) {
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

