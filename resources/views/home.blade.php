@extends('layouts.app')
@section('title','HOME')


@section('content')
<div class="container" style="background-color: lightcyan">

 <div class="row justify-content-center">
    <div class="col-mid-4">
        <div class="card">
            <div class="card-header" style="background-color:lightblue">Sidebar</div>
            <div class="card-body" style="background-color:powderblue">
                This is side Bar
                <div class="list-group">
                    <div class="list-group-item">
                        <a href="{{route('books.index')}}" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-tasks">AddBooks</span>
                          </a>

                    </div>
                    <div class="list-group-item">
                        <a href="{{route('orderbook')}}" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-tasks">OrderBook</span>
                          </a>

                    </div>
                    <div class="list-group-item">
                        <a href="{{route('cancelbook')}}" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-tasks">CancelBook</span>
                          </a>

                    </div>
                    <div class="list-group-item">
                        <a href="{{route('fileImportExport')}}" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-download-alt">Upload/Download</span>
                          </a>

                    </div>
                    <div class="list-group-item">
                        <a href="{{route('datepickerdone')}}" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-calendar">DatePicker</span>
                          </a>

                    </div>
                    <div class="list-group-item">
                        <a href="{{route('dropdownlist')}}" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-th">SelectCountry/State/City</span>
                          </a>

                    </div>
                    <div class="list-group-item">
                        <a href="#" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-lock">CaseHandles</span>
                          </a>

                    </div>
                </div>
            </div>
        </div>
        </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:lightblue">{{ __('Dashboard') }}</div>

                <div class="card-body" style="background-color:powderblue">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="top-right links">




                    </div>
                </div>

        </div>
    </div>
</div>
</div>

@endsection
