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
                {!! Form::model($subscriber, ['route' => ['bunches::subscribers.update', $bunch_id, $subscriber->id], 'method' => 'PUT']) !!}
                    @include('subscriber._form')
                {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn-xs btn-primary btn-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection