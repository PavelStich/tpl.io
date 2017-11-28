<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Models\Template;
use App\Models\User;

class TemplateController extends Controller
{
    public function index()
    {
        $data['template'] = Template::owned()->get();
        return view('template.index', $data);
    }

    public function create()
    {
        return view('template.create');
    }

    public function store(Template $template, TemplateRequest $request)
    {
        $template->create($request->all());
        return redirect()->route('template.index');
    }

    public function show(Template $template, User $user)
    {
        if ($user->can('view', $template)) {
            return view('template.show', compact('template'));
        }
        else{  abort(404); }
    }

    public function edit(Template $template, User $user)
    {
        if ($user->can('view', $template)) {
            return view('template.edit', compact('template'));
        }
        else{   abort(404); }
    }

    public function update(TemplateRequest $request, Template $template)
    {
        $template->update($request->all());
        return redirect()->route('template.index');
    }

    public function destroy(Template $template, User $user)
    {
        if ($user->can('delete', $template)) {
            $template->delete();
            return redirect()->route('template.index');
        }
        else{   abort(404); }
    }
}
