<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebResourceRequest;
use App\Models\WebResource;
use App\Models\WebResourceLog;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;

class WebResourceController extends Controller
{
    public function index()
    {
        return view('index', [
            'resources' => WebResource::all(),
        ]);
    }

    public function store(WebResourceRequest $request)
    {
        WebResource::create([
            'name' => $request->get('name'),
            'url'  => $request->get('url'),
        ]);

        return redirect()->route('web-resources.index');
    }

    public function logs()
    {
        return view('logs', [
            'logs' => WebResourceLog::with('webResource')->get(),
        ]);
    }

    public function check(Client $httpClient)
    {
        $promises = [];

        foreach (WebResource::all() as $resource) {
            $promises[] = $httpClient->getAsync($resource->url)
                ->then(
                    null,
                    fn() => WebResourceLog::create([
                        'web_resource_id' => $resource->id,
                        'requested_at' => Carbon::now(),
                    ])
                );
        }

        Utils::settle($promises)->wait();

        return redirect()->route('web-resources.index');
    }
}
