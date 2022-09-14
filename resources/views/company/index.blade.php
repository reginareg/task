@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>All companies</h1>
                        <div> Sort by:
                            <a href="{{route('cc_index', ['sort' => 'asc'])}}">A to Z</a>
                            <a href="{{route('cc_index', ['sort' => 'desc'])}}">Z to A</a>
                            <a href="{{route('cc_index')}}">Reset</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($companies as $company)
                                <li class="list-group-item">
                                    <div class="company-bin">
                                        <div class="company-box">
                                            <h2>{{$company->name}}</h2>
                                        </div>
                                        <div class="controls">
                                            <a class="btn btn-outline-primary m-2" href="{{route('cc_show', $company->id)}}">Show</a>

                                            <a class="btn btn-outline-success m-2" href="{{route('cc_edit', $company->id)}}">Edit</a>
                                            <form class="delete" action="{{route('cc_delete', $company)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger m-2">Kill</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">I am so sad, no companies no life.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection