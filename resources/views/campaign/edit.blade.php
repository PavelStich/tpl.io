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
                {!! Form::model($campaign, ['route' => ['campaign.update', $campaign->id], 'method' => 'PUT']) !!}
                {!! Form::label('Name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! Form::label('template_id', 'Template') !!}
                    {!! Form::select('template_id',\App\Models\Template::getSelectList(),
                    isset($campaign) ? $campaign->template_id : null,
                    ['class' => 'form-control']
                    ) !!}
                    {!! Form::label('bunch_id', 'Bunch') !!}
                    {!! Form::select('bunch_id',\App\Models\Bunch::getSelectList(),
                    isset($campaign) ? $campaign->bunch_id : null,
                    ['class' => 'form-control']
                    ) !!}
                {!! Form::label('Description', 'Description') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn-xs btn-primary btn-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection