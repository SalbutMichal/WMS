@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="{{ route('dashboard.products.index') }}">
            Lista produktów
        </a>
        <a class="{{ (Route::is('dashboard.products.create')) ? 'active' : '' }}" href="{{ route('dashboard.products.create') }}">
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
					<h2>Dodawanie nowego magazynu</h2>
				</div>
				<div class="warehouse">
                    <form action="{{ route('dashboard.products.update', [$product->id]) }}" method="post" class="warehouse-form">
                        @csrf
                        <div class="warehouse">
                            <dl class="warehouse-details">
                                <div>
                                    <dt><label for="name">Nazwa produktu:</label></dt>
                                    <dd><input type="text" id="name" name="name" value="{{ $product->name }}"></dd>
                                </div>
                                <div>
                                    <dt><label for="price">Cena:</label></dt>
                                    <dd><input type="text" id="price" name="price" value="{{ $product->price }}"></dd>
                                </div>
                                <div>
                                    <dt><label for="tax">Podatek:</label></dt>
                                    <dd><input type="text" id="tax" name="tax" value="{{ $product->tax }}"></dd>
                                </div>
                                <div>
                                    <dt><label for="ean">Kod ean:</label></dt>
                                    <dd><input type="text" id="ean" name="ean" value="{{ $product->ean }}"></dd>
                                </div>
                                <div>
                                    <dt><label for="category">Kategoria:</label></dt>
                                    <dd><select name="category_id" id="category">
                                        @foreach ($categories as $category)
                                            <option {{ ($category->id == $product->category_id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    </dd>
                                </div>
                                <div>
                                    <dt></dt>
                                    <dd><button type="submit">Edytuj</button>
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