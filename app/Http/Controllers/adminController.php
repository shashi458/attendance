<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

class adminController extends Controller
{
    // public function index()
    // {
    //     return view('index');
    // }

        public function index()
    {
        return view('includes.layout');
    }

    public function storeEmployee()
    {
        return view('');
    }
}
