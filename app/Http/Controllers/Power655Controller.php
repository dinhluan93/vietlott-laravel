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
            "data7" => $data7,
        ]);
    }

    public function suggestNumber()
    {
        //get top duplicated
        $data1 = $this->power655Service->listDuplicated(1)->toArray();
        $data2 = $this->power655Service->listDuplicated(2)->toArray();
        $data3 = $this->power655Service->listDuplicated(3)->toArray();
        $data4 = $this->power655Service->listDuplicated(4)->toArray();
        $data5 = $this->power655Service->listDuplicated(5)->toArray();
        $data6 = $this->power655Service->listDuplicated(6)->toArray();
        $data7 = $this->power655Service->listDuplicated(7)->toArray();
        $data = [];
        //dd($data1);
        for ($i = 0; $i < 15; $i++) {
            $data[$data1[$i]["number_1"]] = $data1[$i]["number_count"];
        }
        foreach ($data as $key => $value) {
            echo $key;
            // if (array_key_exists($data2[$i]["number_2"], $data)) {
            //dd($data['11']);
            //echo $data->{""};
            //dd($data2[$i]["number_2"]);
            //}
        }
        dd($data);
        //for ($i = 0; $i < 15; $i++) {
        // array_push($data, [[''.$number_1, $data1[$i]["number_count"]]]);
        //}
        //number 1
        //if ($data1[$i]["number_1"] == $data2[$i]["number_2"]) {
        //    $number_count_1 += $data1[$i]["number_count"] + $data2[$i]["number_count"];
        //}
        // $number_1 = $data1[$i]["number_1"];
        //$number_2 = $data2[$i]["number_2"];
        //$number_3 = $data3[$i]["number_3"];
        //$number_4 = $data4[$i]["number_4"];
        //$number_5 = $data5[$i]["number_5"];
        //$number_6 = $data6[$i]["number_6"];
        //$number_7 = $data7[$i]["number_7"];
        //array_push($data, [[''.$number_1, $data1[$i]["number_count"]]]);
        //array_push($data, [[''.$number_2, $data2[$i]["number_count"]]]);
        //dd($number_1);
        //if (array_key_exists($number_2, $data)) {
        //    $data[$number_1][1] = $data[$number_1][1] + $data2[$i]["number_count"];
        //dd("existed".$number_2);
        //} else {
        //    array_push($data, [[$number_2, $data2[$i]["number_count"]]]);
        //}
        /*
            array_push($data, [
                [$data1[$i]["number_1"], $data1[$i]["number_count"]],
                [$data2[$i]["number_2"], $data2[$i]["number_count"]],
                [$data3[$i]["number_3"], $data3[$i]["number_count"]],
                [$data4[$i]["number_4"], $data4[$i]["number_count"]],
                [$data5[$i]["number_5"], $data5[$i]["number_count"]],
                [$data6[$i]["number_6"], $data6[$i]["number_count"]],
                [$data7[$i]["number_7"], $data7[$i]["number_count"]]
            ]);*/
        // }
        //dd($data);
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
