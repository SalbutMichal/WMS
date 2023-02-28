@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="{{ route('dashboard.warehouse.index') }}">
            Lista magazynów
        </a>
        <a class="{{ (Route::is('dashboard.warehouse.create') ? 'active' : '') }}" href="{{ route('dashboard.warehouse.create') }}">
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
					<h2>Edycja magazynu</h2>
				</div>
				<div class="warehouse">
                    <form action="{{ route('dashboard.warehouse.update', [$warehouse->id]) }}" method="post" class="warehouse-form">
                        @csrf
                        <div class="warehouse">
                            <dl class="warehouse-details">
                                <div>
                                    <dt><label for="name">Nazwa magazynu:</label></dt>
                                    <dd><input type="text" id="name" name="name" value="{{ $warehouse->name }}"></dd>
                                </div>
                                <div>
                                    <dt><label for="city">Miasto:</label></dt>
                                    <dd><input type="text" id="city" name="city" value="{{ $warehouse->city }}"></dd>
                                </div>
                                <div>
                                    <dt><label for="street">Ulica:</label></dt>
                                    <dd><input type="text" id="street" name="street" value="{{ $warehouse->street }}"></dd>
                                </div>
                                <div>
                                    <dt><label for="zip_code">Kod pocztowy:</label></dt>
                                    <dd><input type="text" id="zip_code" name="zip_code" value="{{ $warehouse->zip_code }}"></dd>
                                </div>
                                <div>
                                    <dt><label for="type">Typ magazynu:</label></dt>
                                    <dd><select name="type" id="type">
                                        <option {{ ($warehouse->type == 'Główny' ? 'selected' : '')}} value="Główny">Główny</option>
                                        <option {{ ($warehouse->type == 'Wysyłkowy' ? 'selected' : '')}} value="Wysyłkowy">Wysyłkowy</option>
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
	</div>
@endsection