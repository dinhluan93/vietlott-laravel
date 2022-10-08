<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Power655Service;

class Power655Controller extends Controller
{
    private Power655Service $power655Service;

    public function __construct(Power655Service $power655Service)
    {
        $this->power655Service = $power655Service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->power655Service->listPower655();
        return view("power655.index", ["data" => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
}
