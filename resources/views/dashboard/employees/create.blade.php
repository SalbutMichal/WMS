@extends('layouts.dashboard')
@section('nav')
<div class="app-header-navigation">
    <div class="tabs">
        <a href="{{ route('dashboard.employees.index') }}">
            Lista pracowników
        </a>
        <a class="{{ (Route::is('dashboard.employees.create')) ? 'active' : ''}}" href="{{ route('dashboard.employees.create') }}">
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
            <h2>Dodaj pracownika</h2>
        </div>
        <div class="warehouses">
            <form action="{{ route('dashboard.employees.store') }}" method="post" class="warehouse-form">
                @csrf
                <div class="warehouse">
                    <dl class="warehouse-details">
                        <div>
                            <dt><label for="username">Nazwa użytkownika:</label></dt>
                            <dd><input type="text" id="username" name="username" value=""></dd>
                        </div>
                        <div>
                            <dt><label for="firstname">Imie:</label></dt>
                            <dd><input type="text" id="firstname" name="firstname" value=""></dd>
                        </div>
                        <div>
                            <dt><label for="surname">Nazwisko:</label></dt>
                            <dd><input type="text" id="surname" name="surname" value=""></dd>
                        </div>
                        <div>
                            <dt><label for="email">E-mail:</label></dt>
                            <dd><input type="text" id="email" name="email" value=""></dd>
                        </div>
                        <div>
                            <dt><label for="password">Hasło:</label></dt>
                            <dd><input type="text" id="password" name="password" value=""></dd>
                        </div>
                        <div>
                            <dt><label for="confirm_password">Powtórz hasło:</label></dt>
                            <dd><input type="text" id="confirm_password" name="confirm_password" value=""></dd>
                        </div>
                        <div>
                            <dt><label for="group">Grupa:</label></dt>
                            <dd><select name="user_group_id" id="group">
                                <option value="1">Główny</option>
                                <option selected value="2">Wysyłkowy</option>
                            </select>
                            </dd>
                        </div>
                        <div>
                            <dt></dt>
                            <dd><button type="submit">Dodaj</button>
                            </dd>
                        </div>
                    </dl>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection