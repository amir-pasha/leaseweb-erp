@extends('layouts.app')

@push('scripts')
    <script type="text/javascript" src="{{ asset('/js/server.js') }}"></script>
@endpush

@section('title')
    List of servers
@stop
@section('content')
    <table>
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Asset Id</th>
            <th>RAM Modules</th>
            <th width="180px">Action</th>
        </tr>
        @foreach ($servers as $server)
            <tr>
                <td>{{ $server->name }}</td>
                <td>{{ $server->brand->name }}</td>
                <td>{{ $server->price }}</td>
                <td>{{ $server->asset_id }}</td>
                <td>
                    @foreach($server->ramModules as $module)
                        {{ $module->amount . 'x' . $module->size . 'GB ' . $module->type }}
                    @endforeach
                </td>

                <td>
                    <button type="button" onclick="deleteServer('{{ $server->id }}')">delete</button>
                </td>
            </tr>
        @endforeach
    </table>
    <div>
        @include('layouts.pagination', ['data' => $servers])
    </div>
@endsection
