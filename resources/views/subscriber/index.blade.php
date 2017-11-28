@extends('layouts.app')

@section('content')
    <style> title li {display: inline;}</style>
    <div class="container">
        <div class="title">
            <table class="panel-body">

                <thead><tr>

                    <th width="30%">
                        <a class="btn btn-info btn-xs" href="{{route('bunch.index')}}"><i class="fa fa-backward" aria-hidden="true"></i>Back</a>

                    </th>
                    <th>@foreach($bunches as $key => $bunch)
                            <h3>Bunch  <b>"{{ $bunch->name }}"</b>(subscribers)</h3>
                        @endforeach</th>
                    <th width="40%"><form action="{{ URL('bunches/'. $bunch->id) }}" method="POST">

                            {{Form::open(['class' => 'confirm-delete', 'route' => ['bunch.destroy', $bunch->id], 'method' => 'DELETE'])}}
                            {{ link_to_route('bunch.edit', 'edit', [$bunch->id], ['class' => 'btn btn-success btn-xs']) }}
                            {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                            {{Form::close()}}
                        </form></th>
                    </tr></thead>
            </table>
        </div>

        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="btn-create">
            <a href="{{ URL("bunches/".$bunch_id."/subscribers/create") }}" class="btn btn-xs btn-success">Create</a>
        </div>

        <div class="row">

            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th width="20%">First Name</th>
                        <th width="20%">Last Name</th>
                        <th width="30%">Email</th>
                        <th width="30%">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscribers as $key => $subscriber)
                        <tr onclick="window.location='{{ route('bunches::subscribers.show', ['bunch_id' => $bunch_id, 'id' => $subscriber->id]) }}'" class="table-row">
                            <td>{{ $subscriber->f_name }}</td>
                            <td>{{ $subscriber->l_name }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td width="20%">



                                    {{Form::open(['class' => 'confirm-delete', 'route' => ['bunches::subscribers.destroy', $bunch->id, $subscriber->id], 'method' => 'DELETE'])}}
                                    <a href="{{ URL('bunches/'.$bunch_id.'/subscribers/'.$subscriber->id.'/edit') }}" class="btn btn-success btn-xs">Edit</a>  |
                                    {{ csrf_field() }}
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