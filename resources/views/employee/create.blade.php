@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new employee</div>
                        <form action="{{route('ec_store')}}" method="post" class="p-3">
                            @csrf
                            @method('post')
                            <div class="input-group input-group-sm \ mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">First name</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="first_name" value="{{old('first_name')}}">*
                            </div>
                            <div class="input-group input-group-sm \ mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Last name</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="last_name" value="{{old('last_name')}}">*
                            </div>
                            <div class="input-group input-group-sm \ mb-3">
                                <label>Choose company</label>
                                <select id="company_id" name="company_id" class="form-select form-select-sm">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-sm \ mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="email">
                            </div>
                            <div class="input-group input-group-sm \ mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Phone</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="phone">
                            </div>
                            <div class="input-group input-group-sm \ mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Age</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="age">
                            </div>
                            <div class="input-group input-group-sm \ mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Salary</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="salary">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection