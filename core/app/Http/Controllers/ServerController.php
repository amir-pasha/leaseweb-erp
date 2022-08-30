<?php

namespace App\Http\Controllers;

use App\Http\Requests\Server\StoreRequest;
use App\Models\Server;
use App\Repositories\ServerRepository;

class ServerController extends Controller
{
    public function __construct(private ServerRepository $repository)
    {
        //
    }

    public function index()
    {
        $servers = $this->repository->index()->paginate(self::DEFAULT_PAGINATION_LIMIT);

        return view('servers.index')->with('servers', $servers);
    }

    public function create()
    {
        return view('servers.create');
    }

    public function store(StoreRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('servers.index');
    }

    public function destroy(Server $server)
    {
        $this->repository->delete($server);

        return response()->json();
    }
}
