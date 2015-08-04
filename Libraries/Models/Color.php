<?php

namespace Libraries\Models;

class Color extends Model
{
    protected $table = 'color';

    public function getVotes($id)
    {
        return $this->db->query('
            SELECT SUM(votes)
            FROM color, vote
            WHERE color.id = '. $id .' AND color.name = vote.color'
            );
    }

}
