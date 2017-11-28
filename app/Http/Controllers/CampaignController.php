<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use App\Models\User;
use App\Mail\MailClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CampaignController extends Controller
{
    public function index()
    {
        $data['campaign'] = Campaign::owned()->available()->get();
        return view('campaign.index', $data);
    }

    public function create()
    {
        return view('campaign.create');
    }

    public function store(Campaign $campaign, CampaignRequest $request)
    {
        $campaign->create($request->all());
        return redirect()->route('campaign.index');
    }

    public function show(Campaign $campaign, User $user)
    {
        if ($user->can('view', $campaign)) {
            $user_email = Auth::user()->email;
            return view('campaign.show', compact('campaign'))->with('user_email', $user_email);
        }
        else{   abort(404); }
    }

    public function edit(Campaign $campaign, User $user)
    {
        if ($user->can('view', $campaign)) {
            return view('campaign.edit', compact('campaign'));
        }
        else{   abort(404); }
    }

    public function update(CampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());
        return redirect()->route('campaign.index');
    }

	public function destroy(Campaign $campaign, User $user)
    {
        if ($user->can('delete', $campaign)) {
            $campaign->delete();
            return redirect()->route('campaign.index');
        }
        else{   abort(404); }
    }

    public function preview(Campaign $campaign, User $user)
    {
        if ($user->can('view', $campaign)) {
            $user_email = Auth::user()->email;
            return view('campaign.preview', compact('campaign'))->with('user_email', $user_email);
        }
        else{   abort(404); }
    }

    public function send(Campaign $campaign){

        foreach ($campaign->bunch->subscribers as $key => $subscriber){
            Mail::to($subscriber->email)->send(new MailClass($campaign->name, $subscriber->f_name, $subscriber->email, $campaign->template->content));
        }
        return redirect()->route('campaign.index');
    }
}
