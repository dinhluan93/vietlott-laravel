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
                    <li class="breadcrumb-item active">All</li>
                </ol>
            </div>
            <h4 class="page-title">Power 6/55</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Number 1</th>
                            <th>Number 2</th>
                            <th>Number 3</th>
                            <th>Number 4</th>
                            <th>Number 5</th>
                            <th>Number 6</th>
                            <th>Number 7</th>
                            <th>Price 1</th>
                            <th>Price 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                            <td>#{{$value->id}}</td>
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
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3">{{$data->links()}}</div>
        </div>
    </div>
</div>
@endsection