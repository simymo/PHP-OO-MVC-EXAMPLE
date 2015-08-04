<?php

namespace Libraries\Controllers;

use Libraries\Models\Color;
use Libraries\Models\Vote;

class Detail extends Controller
{
    public function response()
    {
        if(empty($_GET['color']) || !$this->validator($_GET['color'])){
            return redirect(route('home'));
        }
        return $this->getColorDetail(trim($_GET['color']));
    }

    public function validator($input)
    {
         return is_numeric($input);
    }

    public function getColorDetail($id)
    {
        $c = new Color;
        $result = $c->getVotes($id)->fetch();

        $votes = ($result[0] === null)? 0: $result[0];

        header('Content-Type: application/json');
        echo json_encode(['votes' => $votes]);
    }
}
