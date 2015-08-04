<?php

namespace Libraries\Models;

use Libraries\Databases\MySQL;

/**
* Base DB Model
*/
abstract class Model
{

    protected $table = null;
    protected $primaryKey = 'id';

    function __construct()
    {
        $this->db = MySQL::connect();
    }

    public function all()
    {
        return $this->db->query('SELECT * FROM '. $this->table);
    }

    public function find($id)
    {
        return $this->db->query('SELECT * FROM '. $this->table . ' WHERE `'. $this->primaryKey. '` = '. $id );
    }

}
