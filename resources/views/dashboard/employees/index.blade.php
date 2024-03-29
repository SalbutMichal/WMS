@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="#" class="active">
            Lista pracowników
        </a>
        <a href="{{ route('dashboard.employees.create') }}">
            Dodaj nowego pracownika
        </a>
    </div>
</div>
@endsection
@section('content')
<div class="app-body-main-content">
    <section class="service-section">
        <h2>Pracownicy</h2>
    </section>
    <section class="warehouse-section">
        <div class="warehouse-section-header">
            <h2>Lista pracowników</h2>
        </div>
        <div class="warehouses">
            {{-- @foreach ($employees as $key => $employee )
                <div class="warehouse">
                    <dl class="warehouse-details">
                        <div>
                            <dt>Nazwa:</dt>
                            <dd>{{ $product->name }}</dd>
                        </div>
                        <div>
                            <dt>Cena:</dt>
                            <dd>{{ $product->price }}</dd>
                        </div>
                        <div>
                            <dt>Podatek:</dt>
                            <dd>{{ $product->tax.'%' }}</dd>
                        </div>
                        <div>
                            <dt>Kod ean:</dt>
                            <dd>{{ $product->ean }}</dd>
                        </div>
                    </dl>
                </div>
            @endforeach --}}
        </div>
    </section>
</div>
@endsection