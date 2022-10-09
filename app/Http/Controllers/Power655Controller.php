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
        $data1 = $this->power655Service->listDuplicated(1);
        $data2 = $this->power655Service->listDuplicated(2);
        $data3 = $this->power655Service->listDuplicated(3);
        $data4 = $this->power655Service->listDuplicated(4);
        $data5 = $this->power655Service->listDuplicated(5);
        $data6 = $this->power655Service->listDuplicated(6);
        $data7 = $this->power655Service->listDuplicated(7);
        return view("power655.duplicated", [
            "data1" => $data1,
            "data2" => $data2,
            "data3" => $data3,
            "data4" => $data4,
            "data5" => $data5,
            "data6" => $data6,
            "data7" => $data7
        ]);
    }

    public function suggestNumber()
    {
        return view("power655.suggest_number", []);
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
