@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['method'=>'POST', 'route' => ['bunches::subscribers.store', $id]]) !!}
                {!! Form::label('f_name', 'First Name') !!}
                {!! Form::text('f_name', null, ['class' => 'form-control']) !!}
                {!! Form::label('l_name', 'Last Name') !!}
                {!! Form::text('l_name', null, ['class' => 'form-control']) !!}
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    {!! Form::label('bunch_id', 'bunch'), Form::text('bunch_id', $id) !!}
                {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn-xs btn-primary btn-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection