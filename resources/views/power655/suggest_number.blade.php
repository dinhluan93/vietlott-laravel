@extends('components.layout')
@push('style')
<link href="{{asset('site/assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('site/assets/css/power655.css?v=')}}{{time()}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<!-- start page title -->
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
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Top Duplicated Number</h4>
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>NO. 1</th>
                            <th>NO. 2</th>
                            <th>NO. 3</th>
                            <th>NO. 4</th>
                            <th>NO. 5</th>
                            <th>NO. 6</th>
                            <th>NO. 7</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                        <tr>
                            <td>#{{$key+1}}</td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border">
                                        {{$value[0][0]}}
                                    </span>
                                    <span class="number-match border-warning border ml-1">
                                        {{$value[0][1]}}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border">
                                        {{$value[1][0]}}
                                    </span>
                                    <span class="number-match border-warning border ml-1">
                                        {{$value[1][1]}}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border">
                                        {{$value[2][0]}}
                                    </span>
                                    <span class="number-match border-warning border ml-1">
                                        {{$value[2][1]}}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border">
                                        {{$value[3][0]}}
                                    </span>
                                    <span class="number-match border-warning border ml-1">
                                        {{$value[3][1]}}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border">
                                        {{$value[4][0]}}
                                    </span>
                                    <span class="number-match border-warning border ml-1">
                                        {{$value[4][1]}}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border">
                                        {{$value[5][0]}}
                                    </span>
                                    <span class="number-match border-warning border ml-1">
                                        {{$value[5][1]}}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border">
                                        {{$value[6][0]}}
                                    </span>
                                    <span class="number-match border-warning border ml-1">
                                        {{$value[6][1]}}
                                    </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                        @foreach($data as $keyDup => $valueDuplicate)
                        <tr>
                            <td colspan="2" class="text-center">#{{$keyDup+1}}</td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border {{$value->number_1==$valueDuplicate[0][0]? 'bg-success text-white' : ''}}">{{$valueDuplicate[0][0]}}</span>
                                    <span class="number-match border ml-1 border-warning">{{$valueDuplicate[0][1]}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border {{$value->number_2==$valueDuplicate[1][0]? 'bg-success text-white' : ''}}">{{$valueDuplicate[1][0]}}</span>
                                    <span class="number-match border ml-1 border-warning">{{$valueDuplicate[1][1]}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border {{$value->number_2==$valueDuplicate[2][0]? 'bg-success text-white' : ''}}">{{$valueDuplicate[2][0]}}</span>
                                    <span class="number-match border ml-1 border-warning">{{$valueDuplicate[2][1]}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border {{$value->number_3==$valueDuplicate[3][0]? 'bg-success text-white' : ''}}">{{$valueDuplicate[3][0]}}</span>
                                    <span class="number-match border ml-1 border-warning">{{$valueDuplicate[3][1]}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border {{$value->number_4==$valueDuplicate[4][0]? 'bg-success text-white' : ''}}">{{$valueDuplicate[4][0]}}</span>
                                    <span class="number-match border ml-1 border-warning">{{$valueDuplicate[4][1]}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border {{$value->number_5==$valueDuplicate[5][0]? 'bg-success text-white' : ''}}">{{$valueDuplicate[5][0]}}</span>
                                    <span class="number-match border ml-1 border-warning">{{$valueDuplicate[5][1]}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <span class="number-match border-info border {{$value->number_6==$valueDuplicate[6][0]? 'bg-success text-white' : ''}}">{{$valueDuplicate[6][0]}}</span>
                                    <span class="number-match border ml-1 border-warning">{{$valueDuplicate[6][1]}}</span>
                                </div>
                            </td>
                            <td colspan="3" class="text-center">
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