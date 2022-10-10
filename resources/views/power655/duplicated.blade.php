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
    <div class="col-2">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Number</th>
                            <th>Repeat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp
                        @foreach($data as $key => $value)
                        @php $count ++; @endphp
                        <tr>
                            <td>{{$count}}</td>
                            <td><span class="number-match border-info border">{{$key}}</span></td>
                            <td><span class="number-match border-danger border">{{$value}}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3"></div>
        </div>
    </div>
</div>
@endsection