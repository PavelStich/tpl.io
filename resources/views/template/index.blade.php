@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title">
            <h1>Templates</h1>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="btn-create">
            <a href="{{ route('template.create') }}" class="btn btn-xs btn-success">Create</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($template as $key => $template)
                            <tr onclick="window.location='{{ route('template.show', ['id' => $template->id]) }}'" class="table-row">
                                <td>{{ $template->name }}</td>
                                <td>{!! $template->content !!}</td>
                                <td width="25%">
                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['template.destroy', $template->id], 'method' => 'DELETE'])}}
                                    <a href="{{ URL('template/'. $template->id) }}" class="btn btn-xs btn-info">Info</a> |
                                    <a href="{{ URL('template/'. $template->id .'/edit') }}" class="btn btn-xs btn-success">Edit</a> |
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