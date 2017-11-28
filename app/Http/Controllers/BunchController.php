<?php

namespace App\Http\Controllers;

use App\Http\Requests\BunchRequest;
use App\Models\Bunch;
use App\Models\User;

class BunchController extends Controller
{
    public function index()
    {
        $data['bunches'] = Bunch::owned()->get();
        return view('bunch.index', $data);
    }

    public function create()
    {
        return view('bunch.create');
    }

    public function store(Bunch $bunch, BunchRequest $request)
    {
        $bunch->create($request->all());
        return redirect()->route('bunch.index');
    }

    public function show(Bunch $bunch, User $user)
    {
        if ($user->can('view', $bunch)) {
            return view('bunch.show', compact('bunch'));
        }
        else{   abort(404); }
    }

    public function edit(Bunch $bunch, User $user)
    {
        if ($user->can('view', $bunch)) {
            return view('bunch.edit', compact('bunch'));
        }
        else{   abort(404); }
    }

    public function update(BunchRequest $request, Bunch $bunch)
    {
        $bunch->update($request->all());
        return redirect()->route('bunch.index');
    }

    public function destroy(Bunch $bunch, User $user)
    {
        if ($user->can('delete', $bunch)) {
            $bunch->delete();
            return redirect()->route('bunch.index');
        }
        else{   abort(404); }
    }
}
