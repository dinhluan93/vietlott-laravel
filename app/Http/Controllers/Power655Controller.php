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
        $dataSuggest = [];
        foreach ($data as $key => $value) {
            //$dataSuggest[] = $key;
            array_push($dataSuggest, $key);
        }
        //$randomLottery = $this->power655Service->randomLottery($dataSuggest);
        return view("power655.duplicated", [
            "data" => $data,
            //"randomLottery" => $randomLottery,
        ]);
    }

    public function suggestNumber(Request $request)
    {
        $stage = $request->has("stages") ? explode(",", $request->stages) : [];
        //get top duplicated
        $data = $this->power655Service->listDuplicatedNumber(4, $stage)->all();
        //get list 6/55
        $data655 = $this->power655Service->listPower655();
        $data655->withPath(
            route("power655.suggestNumber") . $request->has("stages")
                ? "?stages=" . $request->stages
                : ""
        );
        $stages = $this->power655Service->getStagesLatest();
        return view("power655.suggest_number", [
            "data" => $data,
            "data655" => $data655,
            "stages" => $stages,
        ]);
    }

    public function randomWithMatch(Request $request)
    {
        $topDuplicateNumber = $this->power655Service->topDuplicateNumber();
        $topNumber1 = $topDuplicateNumber[0];
        $topNumber2 = $topDuplicateNumber[1];
        $topNumber3 = $topDuplicateNumber[2];
        $topNumber4 = $topDuplicateNumber[3];
        $topNumber5 = $topDuplicateNumber[4];
        $topNumber6 = $topDuplicateNumber[5];
        $topNumber7 = $topDuplicateNumber[6];
        $data = $this->power655Service->listAfterTopDuplicateNumber();
        return view("power655.random_with_match", [
            "data" => $data,
            "dataAll" => collect(array_merge(...$data))->sort(),
            "topNumber1" => $topNumber1,
            "topNumber2" => $topNumber2,
            "topNumber3" => $topNumber3,
            "topNumber4" => $topNumber4,
            "topNumber5" => $topNumber5,
            "topNumber6" => $topNumber6,
            "topNumber7" => $topNumber7,
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
