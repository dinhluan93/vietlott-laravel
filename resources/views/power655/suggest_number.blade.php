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
            <ul class="top-number-duplicated">
                @foreach($data as $key => $value)
                <li>
                    <div class="d-flex">
                        <span class="number-match border-info border">
                            {{$key}}
                        </span>
                        <span class="number-match border-warning border ml-1">
                            {{$value}}
                        </span>
                    </div>
                </li>
                @endforeach
            </ul>
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
                    <tr>
                        <td colspan="2" class="text-center"></td>
                        @php $count = 0; $numberMatch=[]; $listNumber=[]; @endphp
                        <td colspan="7">
                            <ul class="top-number-duplicated">
                                @foreach($data as $keyDup => $valueDuplicate)
                                @php $count ++; $listNumber[]=$keyDup; @endphp
                                <li class="d-flex">
                                    @switch($keyDup)
                                    @case($value->number_1)
                                    <span class="number-match border-info border bg-success text-white">{{$keyDup}}</span>
                                    @php $numberMatch[]=$value->number_1; @endphp
                                    @break
                                    @case($value->number_2)
                                    <span class="number-match border-info border bg-success text-white">{{$keyDup}}</span>
                                    @php $numberMatch[]=$value->number_2; @endphp
                                    @break
                                    @case($value->number_3)
                                    <span class="number-match border-info border bg-success text-white">{{$keyDup}}</span>
                                    @php $numberMatch[]=$value->number_3; @endphp
                                    @break
                                    @case($value->number_4)
                                    <span class="number-match border-info border bg-success text-white">{{$keyDup}}</span>
                                    @php $numberMatch[]=$value->number_4; @endphp
                                    @break
                                    @case($value->number_5)
                                    <span class="number-match border-info border bg-success text-white">{{$keyDup}}</span>
                                    @php $numberMatch[]=$value->number_5; @endphp
                                    @break
                                    @case($value->number_6)
                                    <span class="number-match border-info border bg-success text-white">{{$keyDup}}</span>
                                    @php $numberMatch[]=$value->number_6; @endphp
                                    @break
                                    @case($value->number_7)
                                    <span class="number-match border-info border bg-success text-white">{{$keyDup}}</span>
                                    @php $numberMatch[]=$value->number_7; @endphp
                                    @break
                                    @default
                                    <span class="number-match border-info border">{{$keyDup}}</span>
                                    @endswitch
                                    <span class="number-match border ml-1 border-warning">{{$valueDuplicate}}</span>
                                </li>
                                @endforeach
                            </ul>
                            [{{implode(',',collect($listNumber)->sort()->all())}}]
                        </td>
                        <td colspan="2" class="text-center"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"></td>
                        <td colspan="7">
                            <div class="d-flex align-items-center">
                                <div class="d-flex">
                                    @php
                                    $numberMatch = collect($numberMatch)->sort()->all();
                                    $number_7=0;
                                    $totalMatch = 0;
                                    @endphp

                                    @if(count($numberMatch)>0)
                                    @foreach($numberMatch as $valueMatch)

                                    @if($valueMatch!=$value->number_7)
                                    <span class="number-match border-info border bg-success text-white mr-3">{{$valueMatch}}</span>
                                    @php $totalMatch += +1; @endphp
                                    @else
                                    @php $number_7 = $valueMatch; @endphp
                                    @endif

                                    @endforeach
                                    @if(count($numberMatch)==1)
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    @endif
                                    @if(count($numberMatch)==2)
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    @if($number_7>0)
                                    <span class="number-match border-info border mr-3"></span>
                                    @endif
                                    @endif
                                    @if(count($numberMatch)==3)
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    @if($number_7>0)
                                    <span class="number-match border-info border mr-3"></span>
                                    @endif
                                    @endif
                                    @if(count($numberMatch)==4)
                                    <span class="number-match border-info border mr-3"></span>
                                    <span class="number-match border-info border mr-3"></span>
                                    @if($number_7>0)
                                    <span class="number-match border-info border mr-3"></span>
                                    @endif
                                    @endif
                                    @if(count($numberMatch)==5)
                                    <span class="number-match border-info border mr-3"></span>
                                    @if($number_7>0)
                                    <span class="number-match border-info border mr-3"></span>
                                    @endif
                                    @endif
                                    @if(count($numberMatch)==6)
                                    @if($number_7>0)
                                    <span class="number-match border-info border mr-3"></span>
                                    @endif
                                    @endif
                                    <span class="number-match border-info border bg-warning text-white mr-3">{{$number_7}}</span>
                                    @endif
                                </div>
                                <div {{$totalMatch}}>
                                    = match {{count($numberMatch)}} number
                                    @if($totalMatch==6)
                                    = <b class="text-danger">{{number_format($value->price->jackpot_1,0,"",".")}}</b> VND
                                    @endif
                                    @if($totalMatch==5 && $number_7>0)
                                    = <b class="text-danger">{{number_format($value->price->jackpot_2,0,"",".")}}</b> VND
                                    @endif
                                    @if($totalMatch==5 && $number_7==0)
                                    = <b class="text-danger">40.000.000</b> VND
                                    @endif
                                    @if($totalMatch==4)
                                    = <b class="text-danger">500.000</b> VND
                                    @endif
                                    @if($totalMatch==3)
                                    = <b class="text-danger">500.000</b> VND
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td colspan="2" class="text-center"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagin m-3">{{$data655->links()}}</div>
    </div>
</div>
@endsection