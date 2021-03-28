<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebResourceRequest;
use App\Models\WebResource;
use App\Models\WebResourceLog;

class WebResourceController extends Controller
{
    public function index()
    {
        return view('index', [
            'resources' => WebResource::all()
        ]);
    }

    public function store(WebResourceRequest $request)
    {
        WebResource::create([
            'name' => $request->get('name'),
            'url' => $request->get('url'),
        ]);

        return redirect()->route('web-resources.index');
    }

    public function logs()
    {
        return view('logs', [
            'logs' => WebResourceLog::with('webResource')->get()
        ]);
    }
}
