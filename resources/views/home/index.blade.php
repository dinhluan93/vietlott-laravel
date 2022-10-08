@extends('components.layout')
@push('style')
<link href="{{asset('site/assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('site/assets/css/dashboard.css?v=')}}{{time()}}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-6">
        <div class="card-box">
            <h4 class="header-title mb-2">Top </h4>
            <div class="table-responsive">
                <table class="table table-hover table-centered mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Number 1</th>
                            <th>Number 2</th>
                            <th>Number 3</th>
                            <th>Number 4</th>
                            <th>Number 5</th>
                            <th>Number 6</th>
                            <th>Number 7</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ASOS Ridley High Waist</td>
                            <td>$79.49</td>
                            <td>82</td>
                            <td>$6,518.18</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts-footer')
<!-- Plugins js-->
<script src="{{asset('site/assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('site/assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('site/assets/libs/jquery-vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- Dashboard 2 init -->
<script src="{{asset('site/assets/js/pages/dashboard-2.init.js')}}"></script>
@endpush