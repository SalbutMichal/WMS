@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="{{ route('dashboard.roles.index') }}" class="{{ (Route::is('dashboard.roles.index')) ? 'active' : '' }}">
            Lista ról
        </a>
        <a href="{{ route('dashboard.groups.index') }}" class="{{ (Route::is('dashboard.group.index')) ? 'active' : '' }}">
            Lista grup
        </a>
        <a href="{{ route('dashboard.roles.store') }}" {{ (Route::is('dashboard.roles.store')) ? 'active' : '' }}>
            Dodaj nową rolę
        </a>
        <a href="{{ route('dashboard.groups.store') }}" {{ (Route::is('dashboard.group.store')) ? 'active' : '' }}>
            Dodaj nową grupę
        </a>
    </div>
</div>
@endsection
@section('content')

@endsection