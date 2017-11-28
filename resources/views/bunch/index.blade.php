@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title">
            <h1>Bunches</h1>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="btn-create">
            <a href="{{ route('bunch.create') }}" class="btn btn-xs btn-success">Create</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Emails</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bunches as $key => $bunch)
                        <tr onclick="window.location='{{ URL('bunches/'. $bunch->id .'/subscribers') }}'" class="table-row">
                            <td>{{ $bunch->name }}</td>
                            <td>{{ $bunch->description }}</td>
                            <td>{{ count($bunch->subscribers) }}</td>
                            <td width="25%">
                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['bunch.destroy', $bunch->id], 'method' => 'DELETE'])}}
                                    <a href="{{ URL('bunches/'. $bunch->id .'/subscribers') }}" class="btn btn-info btn-xs">Subscribers</a> |
                                    {{ link_to_route('bunch.edit', 'Edit', [$bunch->id], ['class' => 'btn btn-success btn-xs']) }}  |
                                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                    {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection