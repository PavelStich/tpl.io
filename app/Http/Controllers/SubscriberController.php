<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Models\Bunch;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubscriberController extends Controller
{
    public function index($bunch_id, User $user, Subscriber $subscriber)
    {
        $bunches = Bunch::all()->where('id', $bunch_id);
        if(sizeof($bunches)){
            foreach ($bunches as $bunch){
                if (Auth::user()->id === $bunch->created_by) {
                    $data['subscribers'] = Subscriber::owned()->where('bunch_id', $bunch_id)->get();
                    $data['bunches'] = $bunches;
                    return view('subscriber.index', $data)->with('bunch_id', $bunch_id);
                }
                else{   abort(404);
                }
            }
        }
        else{   abort(404);    }
    }

    public function create($id)
    {
        return view('subscriber.create')->with('id', $id);
    }

    public function store($bunch_id, Subscriber $subscriber, SubscriberRequest $request)
    {
        $subscriber->create($request->all());
        return redirect()->route('subscriber.index', $bunch_id);
    }

    public function show($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('view', $subscriber)) {
            return view('subscriber.show', compact('subscriber'))->with('bunch_id', $bunch_id);
        }
        else{   abort(404);    }
    }

    public function edit($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('view', $subscriber)) {
            return view('subscriber.edit', compact('subscriber'))->with('bunch_id', $bunch_id);
        }
        else{   abort(404);     }
    }

    public function update($bunch_id, SubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->update($request->all());
        return redirect()->route('subscriber.index', $bunch_id);
    }

    public function destroy($bunch_id, Subscriber $subscriber, User $user)
    {
        if ($user->can('delete', $subscriber)) {
            $subscriber->delete();
            return redirect()->route('bunches/'. $bunch_id->id .'/subscribers', $bunch_id);
        }
        else{   abort(404);     }
    }
}
