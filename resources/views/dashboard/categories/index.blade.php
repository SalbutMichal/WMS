@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="#" class="active">
            Lista kategorii
        </a>
        <a href="{{ route('dashboard.categories.create') }}">
            Dodaj nową
        </a>
    </div>
</div>
@endsection
@section('content')
<div class="app-body-main-content">
    <section class="service-section">
        <h2>Kategorie</h2>
    </section>
    <section class="warehouse-section">
        <div class="warehouse-section-header">
            <h2>Lista kategorii</h2>
        </div>
        <div class="warehouses">
            @foreach ($categories as $key => $category )
                <div class="warehouse">
                    <dl class="warehouse-details">
                        <div>
                            <dt>Nazwa:</dt>
                            <dd>{{ $category->name }}</dd>
                        </div>
                        <div>
                            <dt>Cena:</dt>
                            <dd>{{ $category->price }}</dd>
                        </div>
                        <div>
                            <dt>Podatek:</dt>
                            <dd>{{ $category->tax.'%' }}</dd>
                        </div>
                        <div>
                            <dt>Kod ean:</dt>
                            <dd>{{ $category->ean }}</dd>
                        </div>
                        <div>
                            <dt></dt>
                            <dd><a href="{{ route('dashboard.categories.edit', [$category->id]) }}"><button>Edytuj</button></a></dd>
                        </div>
                    </dl>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection