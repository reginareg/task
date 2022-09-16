@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            {{-- <div class="card" mb-4>
              <div class="form-group">
                <label for="color_id">What employee?</label>
                <select class="form-select" name="company_id">
                  @foreach($companies as $company)
                  <option value="{{$company->id}}">{{$company->name}}</option>
                  @endforeach
                </select>
                <button class="btn btn-outline-primary mt-3" type="submit">Filter</button>
              </div>
            </div>
          </div>  
                    <div class="card-header"><h4>Filter</h4></div>
                    <div class="card-body">
            </div>
            </div> --}}
                <div class="card">
                    <div class="card-header">
                    <div class="card-header">
                        <h1>All employees</h1>
                        <div> Sort by:
                            <a href="{{route('cc_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('cc_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('cc_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($employees as $employee)
                                <li class="list-group-item">
                                    <div class="employee-bin">
                                        <div class="employee-box">
                                            <h2>{{$employee->first_name}}
                                                {{$employee->last_name}} </h2>
                                        </div>
                                        <div class="controls">
                                            <a class="btn btn-outline-primary m-2" href="{{route('ec_show', $employee->id)}}">Show</a>

                                            <a class="btn btn-outline-success m-2" href="{{route('ec_edit', $employee)}}">Edit</a>
                                            <form class="delete" action="{{route('ec_delete', $employee)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">Kill</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">I am so sad, no employees no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection