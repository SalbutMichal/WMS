@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="#" class="active">
            Lista przyjęć
        </a>
        <a href="{{ route('dashboard.receipts.create') }}">
            Dodaj nowe
        </a>
    </div>
</div>
@endsection
@section('content')

@endsection