@extends('layouts.app')
@section('title')
    Create server
@stop

@push('scripts')
<script type="text/javascript" src="{{ asset('js/form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/brand.js') }}"></script>
@endpush

@section('content')
    @if ($errors->any())
        <div>
            <strong>Error</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <strong>Fill the following form to create server</strong>
    </div>
    <form action="{{ route('servers.store') }}" method="post" id="form">
        @csrf
        <div>
            <input type="text" name="asset_id" placeholder="Asset ID">
        </div>
        <div>
            <input type="text" name="name" placeholder="Server Name">
        </div>
        <div>
            <input type="number" name="price" placeholder="Price">
        </div>
        <div>
            Select the brand
            <div>
                <select name="brand_id" id="brand-selector"></select>
            </div>
        </div>
        <div id="ram-modules">
            RAM modules
            <div>
                <div>
                    <input type="number" name="ram_modules[0][size]" placeholder="size">
                </div>
                <div>
                    <input type="text" name="ram_modules[0][type]" placeholder="type">
                </div>
                <div>
                    <input type="number" name="ram_modules[0][amount]" placeholder="amount">
                </div>
            </div>
        </div>
        <button type="button" id="add-more">Add More</button>
        <div>
            <button type="submit">Create</button>
        </div>
    </form>
@endsection
