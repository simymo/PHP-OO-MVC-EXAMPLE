<?php

namespace Libraries\Controllers;

use Libraries\Models\Color;

class Home extends Controller
{
    public function response()
    {
        return $this->show();
    }

    public function show()
    {
        $c = new Color;
        $list = $c->all();
        include('Libraries/Views/list.php');
    }
}
