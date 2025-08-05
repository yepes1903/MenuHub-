<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        $data = ['titulo' => 'Index - MenuHub'];
        return view('main' ,$data);
    }
    public function instructivo(): string
    {   
        return view('Instructivo/instructivo');
    }
    public function player(): string
    {   
        return view('player');
    }

}
