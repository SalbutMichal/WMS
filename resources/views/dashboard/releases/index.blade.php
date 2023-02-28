@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="#" class="active">
            Lista wydań
        </a>
        <a href="{{ route('dashboard.releases.create') }}">
            Dodaj nowe
        </a>
    </div>
</div>
@endsection
@section('content')

@endsection