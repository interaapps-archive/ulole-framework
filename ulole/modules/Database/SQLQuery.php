<?php

namespace ulole\modules\Database;

class SQL {
    public $query, $con;
    function __construct($qu, $con) {
        $this->con = $con;
        $query = ($this->con)->query($qu);
        return $this;
    }

    function query($str) {
        ($this->con)->query($str);
        return $this;
    }

    function getObject() {
        return $this->query;
    }
}