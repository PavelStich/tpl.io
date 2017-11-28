@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="form-group">
            <div>
                <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('campaign.index')}}"><i class="fa fa-backward" aria-hidden="true"></i>Back</a>
            </div>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">
                <h1>Campaign: <b>{{$campaign->name}}</b></h1>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy', $campaign->id], 'method' => 'DELETE'])}}
                    {{link_to_route('campaign.edit', 'Edit', [$campaign->id], ['class' => 'btn btn-primary btn-xs']) }}
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
        <table class="table table-bordered table-responsive">
            <tr>
                <th width="25%">Attribute</th>
                <th width="75%">Value</th>
            </tr>
            <tr>
                <td>Subject</td>
                <td>{{ $campaign->name }}</td>
            </tr>
            <tr>
                <td>To</td>
                <td>
                    @if($campaign->bunch->subscribers->count() < 200)
                        @foreach ($campaign->bunch->subscribers as $key => $subscriber)
                            @if($campaign->bunch->subscribers->last()->id === $subscriber->id)
                                {{ $subscriber->email}}
                            @else
                                {{ $subscriber->email. ', ' }}
                            @endif
                        @endforeach
                    @else
                        @foreach ($campaign->bunch->subscribers->slice(0, 200) as $key => $subscriber)
                            @if($campaign->bunch->subscribers->slice(0, 200)->last()->id === $subscriber->id)
                                {{ $subscriber->email. '...' }}
                            @else
                                {{ $subscriber->email. ', '}}
                            @endif
                        @endforeach
                    @endif

                </td>
            </tr>
            <tr>
                <td>From</td>
                <td>{{ $user_email }}</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>{!! view('emails.demonstration', compact('campaign')) !!}</td>
            </tr>
        </table>

        <a href="{{ URL('campaign/'. $campaign->id . '/send') }}" class="btn btn-xs btn-success btn-send">SEND THIS CAMPAIGN</a>
    </div>
@endsection