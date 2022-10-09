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
                            <th>Number 1</th>
                            <th>Repeat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data1 as $key => $value)
                        <tr>
                            <td class="{{$key<=4?'text-danger':''}}{{$key>=5 && $key<=9?'text-warning':''}}{{$key>=10 && $key<=14?'text-success':''}}">#{{$key+1}}</td>
                            <td><span class="btn btn-sm btn-danger btn-rounded">{{$value->number_1}}</span></td>
                            <td><span class="btn btn-sm btn-success btn-rounded">{{$value->number_count}}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3"></div>
        </div>
    </div>
    <div class="col-2">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Number 2</th>
                            <th>Repeat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data2 as $key => $value)
                        <tr>
                            <td class="{{$key<=4?'text-danger':''}}{{$key>=5 && $key<=9?'text-warning':''}}{{$key>=10 && $key<=14?'text-success':''}}">#{{$key+1}}</td>
                            <td><span class="btn btn-sm btn-danger btn-rounded">{{$value->number_2}}</span></td>
                            <td><span class="btn btn-sm btn-success btn-rounded">{{$value->number_count}}</span></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3"></div>
        </div>
    </div>
    <div class="col-2">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Number 3</th>
                            <th>Repeat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data3 as $key => $value)
                        <tr>
                            <td class="{{$key<=4?'text-danger':''}}{{$key>=5 && $key<=9?'text-warning':''}}{{$key>=10 && $key<=14?'text-success':''}}">#{{$key+1}}</td>
                            <td><span class="btn btn-sm btn-danger btn-rounded">{{$value->number_3}}</span></td>
                            <td><span class="btn btn-sm btn-success btn-rounded">{{$value->number_count}}</span></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3"></div>
        </div>
    </div>
    <div class="col-2">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Number 4</th>
                            <th>Repeat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data4 as $key => $value)
                        <tr>
                            <td class="{{$key<=4?'text-danger':''}}{{$key>=5 && $key<=9?'text-warning':''}}{{$key>=10 && $key<=14?'text-success':''}}">#{{$key+1}}</td>
                            <td><span class="btn btn-sm btn-danger btn-rounded">{{$value->number_4}}</span></td>
                            <td><span class="btn btn-sm btn-success btn-rounded">{{$value->number_count}}</span></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3"></div>
        </div>
    </div>
    <div class="col-2">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Number 5</th>
                            <th>Repeat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data5 as $key => $value)
                        <tr>
                            <td class="{{$key<=4?'text-danger':''}}{{$key>=5 && $key<=9?'text-warning':''}}{{$key>=10 && $key<=14?'text-success':''}}">#{{$key+1}}</td>
                            <td><span class="btn btn-sm btn-danger btn-rounded">{{$value->number_5}}</span></td>
                            <td><span class="btn btn-sm btn-success btn-rounded">{{$value->number_count}}</span></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3"></div>
        </div>
    </div>
    <div class="col-2">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Number 6</th>
                            <th>Repeat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data6 as $key => $value)
                        <tr>
                            <td class="{{$key<=4?'text-danger':''}}{{$key>=5 && $key<=9?'text-warning':''}}{{$key>=10 && $key<=14?'text-success':''}}">#{{$key+1}}</td>
                            <td><span class="btn btn-sm btn-danger btn-rounded">{{$value->number_6}}</span></td>
                            <td><span class="btn btn-sm btn-success btn-rounded">{{$value->number_count}}</span></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagin m-3"></div>
        </div>
    </div>
    <div class="col-2">
        <div class="card body">
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Number 7</th>
                            <th>Repeat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data7 as $key => $value)
                        <tr>
                            <td class="{{$key<=4?'text-danger':''}}{{$key>=5 && $key<=9?'text-warning':''}}{{$key>=10 && $key<=14?'text-success':''}}">#{{$key+1}}</td>
                            <td><span class="btn btn-sm btn-danger btn-rounded">{{$value->number_7}}</span></td>
                            <td><span class="btn btn-sm btn-success btn-rounded">{{$value->number_count}}</span></td>
                            <td></td>
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