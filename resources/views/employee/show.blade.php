@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{$company->first_name}}
                        {{$company->last_name}}</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        {{$company->company}}
                        {{$company->email}}
                        {{$company->phone}}
                        {{$company->age}}
                        {{$company->salary}}
            <div class="controls">
                <a class="btn btn-outline-success m-2" href="{{route('ec_edit', $employee)}}">Edit</a>
                <form class="delete" action="{{route('ec_delete', $employee)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger m-2">Kill!</button>
                </form>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

@endsection