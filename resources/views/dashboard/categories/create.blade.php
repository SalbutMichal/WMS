@extends('layouts.dashboard')
@section('content')
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
<div class="app-body-main-content">
    <section class="service-section">
        <h2>Kategorie</h2>
    </section>
    <section class="warehouse-section">
        <div class="warehouse-section-header">
            <h2>Lista kategorii</h2>
        </div>
        <div class="warehouse">
                    <form action="{{ route('dashboard.categories.store') }}" method="post" class="warehouse-form">
                        @csrf
                        <div class="warehouse">
                            <dl class="warehouse-details">
                                <div>
                                    <dt><label for="name">Nazwa kategorii:</label></dt>
                                    <dd><input type="text" id="name" name="name" value=""></dd>
                                </div>
                                <div>
                                    <dt></dt>
                                    <dd><button type="submit">Dodaj</button>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </form>
                    {{-- @foreach ($warehouses as $key => $warehouse )
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
                            </dl>
                        </div>
                    @endforeach --}}
				</div>
    </section>
</div>
@endsection