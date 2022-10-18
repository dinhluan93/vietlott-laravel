@extends('components.layout')
@push('style')
<link href="{{asset('site/assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('site/assets/css/power655.css?v=')}}{{time()}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item">Power 6/55</li>
                    <li class="breadcrumb-item active">Top Duplicated</li>
                </ol>
            </div>
            <h4 class="page-title">Power 6/55</h4>
        </div>
    </div>
</div>
<!--div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title mb-3">Except stages</h4>
            <form method="get">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <input type="hidden" name="stages" value="{{isset($_GET['stages'])? $_GET['stages'] : ''}}" />
                            @php
                            $stage = isset($_GET['stages'])? explode(",",$_GET['stages']) : [];
                            @endphp
                            @foreach($stages as $value)
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input stages" {{in_array($value->stages,$stage)? "checked":""}} id="stagesCheck_{{$value->stages}}" value="{{$value->stages}}">
                                    <label class="custom-control-label" for="stagesCheck_{{$value->stages}}">#{{$value->stages}}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div-->
<!--div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Top Duplicated Number</h4>
            <ul class="top-number-duplicated">
                foreach($data as $key => $value)
                <li>
                    <div class="d-flex">
                        <span class="number-match border-info border">
                            $key
                        </span>
                        <span class="number-match border-warning border ml-1">
                            $value}}
                        </span>
                    </div>
                </li>
                endforeach
            </ul>
        </div>
    </div>
</div-->
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Match Number</h4>
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr class="">
                            <th>Stages</th>
                            <th>Date</th>
                            <th>NO. 1</th>
                            <th>NO. 2</th>
                            <th>NO. 3</th>
                            <th>NO. 4</th>
                            <th>NO. 5</th>
                            <th>NO. 6</th>
                            <th>NO. 7</th>
                            <th>Price 1</th>
                            <th>Price 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data655 as $key => $value)
                        <tr class="bg-secondary text-white">
                            <td>{{$value->stages}}</td>
                            <td>{{$value->date_run}}</td>
                            <td>{{$value->number_1}}</td>
                            <td>{{$value->number_2}}</td>
                            <td>{{$value->number_3}}</td>
                            <td>{{$value->number_4}}</td>
                            <td>{{$value->number_5}}</td>
                            <td>{{$value->number_6}}</td>
                            <td>{{$value->number_7}}</td>
                            <td>{{number_format($value->price->jackpot_1,0,"",".")}}</td>
                            <td>{{number_format($value->price->jackpot_2,0,"",".")}}</td>
                        </tr>
                        @foreach($dataGenerate as $valueToday)
                        @php
                        $countMath = 0;
                        //Number 1
                        if($value->number_1==$valueToday->number_1 ||
                        $value->number_2==$valueToday->number_1 ||
                        $value->number_3==$valueToday->number_1 ||
                        $value->number_4==$valueToday->number_1 ||
                        $value->number_5==$valueToday->number_1 ||
                        $value->number_6==$valueToday->number_1){
                        $countMath = $countMath+1;
                        }

                        //Number 2
                        if($value->number_1==$valueToday->number_2 ||
                        $value->number_2==$valueToday->number_2 ||
                        $value->number_3==$valueToday->number_2 ||
                        $value->number_4==$valueToday->number_2 ||
                        $value->number_5==$valueToday->number_2 ||
                        $value->number_6==$valueToday->number_2){
                        $countMath = $countMath+1;
                        }

                        //Number 3
                        if($value->number_1==$valueToday->number_3 ||
                        $value->number_2==$valueToday->number_3 ||
                        $value->number_3==$valueToday->number_3 ||
                        $value->number_4==$valueToday->number_3 ||
                        $value->number_5==$valueToday->number_3 ||
                        $value->number_6==$valueToday->number_3){
                        $countMath = $countMath+1;
                        }

                        //Number 4
                        if($value->number_1==$valueToday->number_4 ||
                        $value->number_2==$valueToday->number_4 ||
                        $value->number_3==$valueToday->number_4 ||
                        $value->number_4==$valueToday->number_4 ||
                        $value->number_5==$valueToday->number_4 ||
                        $value->number_6==$valueToday->number_4){
                        $countMath = $countMath+1;
                        }

                        //Number 5
                        if($value->number_1==$valueToday->number_5 ||
                        $value->number_2==$valueToday->number_5 ||
                        $value->number_3==$valueToday->number_5 ||
                        $value->number_4==$valueToday->number_5 ||
                        $value->number_5==$valueToday->number_5 ||
                        $value->number_6==$valueToday->number_5){
                        $countMath = $countMath+1;
                        }

                        //Number 6
                        if($value->number_1==$valueToday->number_6 ||
                        $value->number_2==$valueToday->number_6 ||
                        $value->number_3==$valueToday->number_6 ||
                        $value->number_4==$valueToday->number_6 ||
                        $value->number_5==$valueToday->number_6 ||
                        $value->number_6==$valueToday->number_6){
                        $countMath = $countMath+1;
                        }

                        @endphp
                        <tr>
                            <td colspan="2" class="text-center">
                                <p class="mb-0">Today generate : #{{$valueToday->stages}}</p>
                                <p class="mb-0">{{$valueToday->created_at}}</p>
                            </td>
                            <td>
                                <span class="number-match border-info border {{
                                    ($value->number_1==$valueToday->number_1 || 
                                    $value->number_2==$valueToday->number_1 || 
                                    $value->number_3==$valueToday->number_1 ||
                                    $value->number_4==$valueToday->number_1 ||
                                    $value->number_5==$valueToday->number_1 ||
                                    $value->number_6==$valueToday->number_1)? 'bg-success text-white' : ''
                                }}">{{$valueToday->number_1}}</span>
                            </td>
                            <td>
                                <span class="number-match border-info border {{
                                    ($value->number_1==$valueToday->number_2 || 
                                    $value->number_2==$valueToday->number_2 || 
                                    $value->number_3==$valueToday->number_2 ||
                                    $value->number_4==$valueToday->number_2 ||
                                    $value->number_5==$valueToday->number_2 ||
                                    $value->number_6==$valueToday->number_2)? 'bg-success text-white' : ''
                                }}">{{$valueToday->number_2}}</span>
                            </td>
                            <td>
                                <span class="number-match border-info border {{
                                    ($value->number_1==$valueToday->number_3 || 
                                    $value->number_2==$valueToday->number_3 || 
                                    $value->number_3==$valueToday->number_3 ||
                                    $value->number_4==$valueToday->number_3 ||
                                    $value->number_5==$valueToday->number_3 ||
                                    $value->number_6==$valueToday->number_3)? 'bg-success text-white' : ''
                                }}">{{$valueToday->number_3}}</span>
                            </td>
                            <td>
                                <span class="number-match border-info border {{
                                    ($value->number_1==$valueToday->number_4 || 
                                    $value->number_2==$valueToday->number_4 || 
                                    $value->number_3==$valueToday->number_4 ||
                                    $value->number_4==$valueToday->number_4 ||
                                    $value->number_5==$valueToday->number_4 ||
                                    $value->number_6==$valueToday->number_4)? 'bg-success text-white' : ''
                                }}">{{$valueToday->number_4}}</span>
                            </td>
                            <td>
                                <span class="number-match border-info border {{
                                    ($value->number_1==$valueToday->number_5 || 
                                    $value->number_2==$valueToday->number_5 || 
                                    $value->number_3==$valueToday->number_5 ||
                                    $value->number_4==$valueToday->number_5 ||
                                    $value->number_5==$valueToday->number_5 ||
                                    $value->number_6==$valueToday->number_5)? 'bg-success text-white' : ''
                                }}">{{$valueToday->number_5}}</span>
                            </td>
                            <td>
                                <span class="number-match border-info border {{
                                    ($value->number_1==$valueToday->number_6 || 
                                    $value->number_2==$valueToday->number_6 || 
                                    $value->number_3==$valueToday->number_6 ||
                                    $value->number_4==$valueToday->number_6 ||
                                    $value->number_5==$valueToday->number_6 ||
                                    $value->number_6==$valueToday->number_6)? 'bg-success text-white' : ''
                                }}">{{$valueToday->number_6}}</span>
                            </td>
                            <td colspan="3" class="text-center">
                                <p>Total match : {{$countMath}}</p>
                                <p>
                                    @if($countMath==6)
                                    <b class="text-danger">{{number_format($value->price->jackpot_1,0,"",".")}}</b> VND
                                    @endif
                                    @if($countMath==5 && $number_7>0)
                                    <b class="text-danger">{{number_format($value->price->jackpot_2,0,"",".")}}</b> VND
                                    @endif
                                    @if($countMath==5 && $number_7==0)
                                    <b class="text-danger">40.000.000</b> VND
                                    @endif
                                    @if($countMath==4)
                                    <b class="text-danger">500.000</b> VND
                                    @endif
                                    @if($countMath==3)
                                    <b class="text-danger">500.000</b> VND
                                    @endif
                                </p>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3">{{$data655->links()}}</div>
        </div>
    </div>
</div>
@endsection
@push('scripts-footer')
<script>
    //name="stages"
    //init
    const stages = $(".stages"),
        _stages = $('input[name="stages"]');

    stages.click(() => {
        let selectedStage = [];
        $('input[type="checkbox"]:checked').each(function() {
            if (this.value != "on") {
                selectedStage.push(this.value);
            }
        });
        _stages.attr("value", `${selectedStage.toString()}`);
    });
</script>
@endpush