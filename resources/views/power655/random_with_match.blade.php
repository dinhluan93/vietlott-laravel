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
                    <li class="breadcrumb-item active">Random with Match</li>
                </ol>
            </div>
            <h4 class="page-title">Random with Match</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <div class="card-box">
            <h4 class="header-title mb-3">Database analysis</h4>
            <ul class="m-0 pl-3">
                <li>
                    <p>Number 1 : </p>
                    <div>
                        @foreach($topNumber1 as $value)
                        <div class="list-inline-item mb-2">
                            <span class="number-match border-info border mr-2">{{$value->number_1}}</span>
                            <span class="number-match border-danger border mt-1">{{$value->number_count}}</span>
                        </div>
                        @endforeach
                    </div>
                </li>
                <li>
                    <p>Number 2 : </p>
                    <div>
                        @foreach($topNumber2 as $value)
                        <div class="list-inline-item mb-2">
                            <span class="number-match border-info border mr-2">{{$value->number_2}}</span>
                            <span class="number-match border-danger border mt-1">{{$value->number_count}}</span>
                        </div>
                        @endforeach
                    </div>
                </li>
                <li>
                    <p>Number 3 : </p>
                    <div>
                        @foreach($topNumber3 as $value)
                        <div class="list-inline-item mb-2">
                            <span class="number-match border-info border mr-2">{{$value->number_3}}</span>
                            <span class="number-match border-danger border mt-1">{{$value->number_count}}</span>
                        </div>
                        @endforeach
                    </div>
                </li>
                <li>
                    <p>Number 4 : </p>
                    <div>
                        @foreach($topNumber4 as $value)
                        <div class="list-inline-item mb-2">
                            <span class="number-match border-info border mr-2">{{$value->number_4}}</span>
                            <span class="number-match border-danger border mt-1">{{$value->number_count}}</span>
                        </div>
                        @endforeach
                    </div>
                </li>
                <li>
                    <p>Number 5 : </p>
                    <div>
                        @foreach($topNumber5 as $value)
                        <div class="list-inline-item mb-2">
                            <span class="number-match border-info border mr-2">{{$value->number_5}}</span>
                            <span class="number-match border-danger border mt-1">{{$value->number_count}}</span>
                        </div>
                        @endforeach
                    </div>
                </li>
                <li>
                    <p>Number 6 : </p>
                    <div>
                        @foreach($topNumber6 as $value)
                        <div class="list-inline-item mb-2">
                            <span class="number-match border-info border mr-2">{{$value->number_6}}</span>
                            <span class="number-match border-danger border mt-1">{{$value->number_count}}</span>
                        </div>
                        @endforeach
                    </div>
                </li>
                <li>
                    <p>Number 7 : </p>
                    <div>
                        @foreach($topNumber7 as $value)
                        <div class="list-inline-item mb-2">
                            <span class="number-match border-info border mr-2">{{$value->number_7}}</span>
                            <span class="number-match border-danger border mt-1">{{$value->number_count}}</span>
                        </div>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card-box">
            <h4 class="header-title mb-3">Flows</h4>
            <ul class="m-0 pl-3">
                <li>Number 1 : 15 number</li>
                <li>Number 2 : 20 number , is different Number 1</li>
                <li>Number 3 : 25 number , is different Number 2 and number 1</li>
                <li>Number 4 : 25 number , is different Number 3 and number 2</li>
                <li>Number 5 : 10 number , is different Number 4 and number 3</li>
                <li>Number 6 : 13 number , is different Number 5 and number 4</li>
            </ul>
        </div>
        <div class="card-box">
            <h4 class="header-title mb-3">Result Flows</h4>
            @foreach($data as $key => $value)
            <div>
                <p>Number : {{$key+1}}</p>
                @foreach($value as $valueItem)
                <div class="list-inline-item mb-2">
                    <span class="number-match border-info border mr-2">{{$valueItem}}</span>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        <div class="card-box">
            <h4 class="header-title mb-3">All Result Flows</h4>
            <div>
                {{dd($dataAll)}}
                @foreach($dataAll as $key => $value)
                <div class="list-inline-item mb-2">
                    <span class="number-match border-info border mr-2">{{$value}}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts-footer')
<script>

</script>
@endpush