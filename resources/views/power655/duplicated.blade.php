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
    <!--div class="col-md-10">
        <div class="card-box">
            <h4 class="header-title mb-3">Random Number</h4>
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr class="">
                            <th>NO. 1</th>
                            <th>NO. 2</th>
                            <th>NO. 3</th>
                            <th>NO. 4</th>
                            <th>NO. 5</th>
                            <th>NO. 6</th>
                        </tr>
                    </thead>
                    <tbody>
                        foreach($randomLottery as $key => $value)
                        <tr>
                            foreach($value as $numberValue)
                            <td>$numberValue</td>
                            endforeach
                        </tr>
                        endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div-->
</div>
<script>
    // setTimeout(()=>{
    //     window.location.reload();
    // },1000);
</script>
@endsection