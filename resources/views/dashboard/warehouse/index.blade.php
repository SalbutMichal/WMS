@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="{{ route('dashboard.warehouse.index') }}" class="active">
            Lista magazynów
        </a>
        <a href="{{ route('dashboard.warehouse.create') }}">
            Utwórz nowy
        </a>
    </div>
</div>
@endsection
@section('content')
<div class="app-body-main-content">
    <section class="service-section">
        <h2>Magazyny</h2>
    </section>
    <section class="warehouse-section">
        <div class="warehouse-section-header">
            <h2>Lista magazynów</h2>
        </div>
        <div class="warehouses">
            @foreach ($warehouses as $key => $warehouse )
                <div class="warehouse">
                    <dl class="warehouse-details">
                        <div>
                            <dt>Nazwa:</dt>
                            <dd>{{ $warehouse->name }}</dd>
                        </div>
                        <div>
                            <dt>Miejscowość:</dt>
                            <dd>{{ $warehouse->city.' '.$warehouse->street.' '.$warehouse->zip_code }}</dd>
                        </div>
                        <div>
                            <dt>Typ:</dt>
                            <dd>{{ $warehouse->type }}</dd>
                        </div>
                        <div>
                            <dt></dt>
                            <dd><a href="{{ route('dashboard.warehouse.edit', [$warehouse->id]) }}"><button>Edytuj</button></a></dd>
                        </div>
                    </dl>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection