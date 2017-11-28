@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title">
            <h1>Campaigns</h1>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="btn-create">
            <a href="{{ route('campaign.create') }}" class="btn btn-xs btn-success">Create</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Template</th>
                        <th>Bunch</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($campaign as $key => $campaign)
                        <tr onclick="window.location='{{ URL('campaign/'. $campaign->id . '/preview') }}'" class="table-row">
                            <td>{{ $campaign->name }}</td>
                            <td>{{ $campaign->description }}</td>
                            <td>{{ $campaign->template->name }}</td>
                            <td>{{ $campaign->bunch->name }}</td>
                            <td width="27%">
                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy', $campaign->id], 'method' => 'DELETE'])}}
                                    <a href="{{ URL('campaign/'. $campaign->id . '/preview') }}" class="btn btn-warning btn-xs">Preview</a> |
                                    <a href="{{ URL('campaign/'. $campaign->id) }}" class="btn btn-info btn-xs">Info</a> |
                                    {{link_to_route('campaign.edit', 'Edit', [$campaign->id], ['class' => 'btn btn-primary btn-xs']) }} |
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