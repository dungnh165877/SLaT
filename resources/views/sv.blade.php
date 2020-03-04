@extends('layouts.index')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
    plaspdlpasldplsapdlpasdlpasldp
    <div class="alert alert-danger">
        {{ session('user') }}
    </div>

@endsection