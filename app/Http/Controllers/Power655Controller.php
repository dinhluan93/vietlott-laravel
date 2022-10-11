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

    public function topDuplicate()
    {
        $data = $this->power655Service->listDuplicatedNumber();
        return view("power655.duplicated", [
            "data" => $data,
        ]);
    }

    public function suggestNumber()
    {
        //get top duplicated
        $data = $this->power655Service->listDuplicatedNumber(3)->all();
        //get list 6/55
        $data655 = $this->power655Service->listPower655();
        return view("power655.suggest_number", [
            "data" => $data,
            "data655" => $data655,
        ]);
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
