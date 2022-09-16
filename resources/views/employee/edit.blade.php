@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit this employee</div>
                    <form action="{{route('ec_update', $employee)}}" method="post" class="p-3">
                        @csrf
                        @method('put')
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Employee first name</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="first_name" value="{{$employee->first_name}}" value="{{old('first_name', $employee->first_name)}}">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Employee last name</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="last_name" value="{{$employee->last_name}}" value="{{old('last_name', $employee->first_name)}}">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                             <label for="company_id" class="col-md-4 col-form-label text-md-end">Employee company</label>
                                <select id="company_id" name="company_id" class="form-select form-select-sm">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}"@if($company->id == $employee->company->id)selected @endif>{{$company->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Employee email</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="email" value="{{$employee->email}}">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Employee phone</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="website" value="{{$employee->phone}}">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Employee age</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="age" value="{{$employee->age}}">
                        </div>
                        <div class="input-group input-group-sm \ mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Employee salary</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="salary" value="{{$employee->salary}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Renew record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection