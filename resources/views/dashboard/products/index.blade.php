@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="#" class="active">
            Lista produktów
        </a>
        <a href="{{ route('dashboard.products.create') }}">
            Dodaj nowy
        </a>
    </div>
</div>
@endsection
@section('content')
<div class="app-body-main-content">
    <section class="service-section">
        <h2>Produkty</h2>
    </section>
    <section class="warehouse-section">
        <div class="warehouse-section-header">
            <h2>Lista produktów</h2>
        </div>
        <div class="warehouses">
            @foreach ($products as $key => $product )
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
                        <div>
                            <dt>Kategoria:</dt>
                            <dd>{{ $product->category->name }}</dd>
                        </div>
                        <div>
                            <dt></dt>
                            <dd><a href="{{ route('dashboard.products.edit', [$product->id]) }}"><button>Edytuj</button></a></dd>
                        </div>
                    </dl>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection