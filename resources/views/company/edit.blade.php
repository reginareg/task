@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit this company</div>
                    <form action="{{route('cc_update', $company)}}" method="post" class="p-3">
                        @csrf
                        @method('put')
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Company name</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="name" value="{{$company->name}}" value="{{old('name', $company->name)}}">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Company email</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="email" value="{{$company->email}}">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Company website</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="website" value="{{$company->website}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Renew record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection