<div class="form-group">
    {!!Form::label('name', 'Name') !!}
    {!!Form::text('name', null, ['class' => 'form-control']) !!}
    {!!Form::label('description', 'Description') !!}
    {!!Form::text('description', null, ['class' => 'form-control']) !!}
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
</div>
