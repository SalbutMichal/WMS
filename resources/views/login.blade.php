<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
        <title>Login</title>
    </head>
    <body>
        <div class="bg" aria-hidden="true">
            <div class="bg__dot"></div>
            <div class="bg__dot"></div>
        </div>
        <form class="form" autocomplete="off" method="POST" action="{{ route('login') }}">
        @csrf
        @if ($errors->any())
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="form__icon" aria-hidden="true"></div>
            <div class="form__input-container">
                <input
                    aria-label="E-mail"
                    class="form__input"
                    type="text"
                    id="e-mail"
                    name="email"
                    placeholder=" "
                />
                <label class="form__input-label" for="e-mail">Adres E-mail</label>
            </div>
            <div class="form__input-container">
                <input
                    aria-label="Password"
                    class="form__input"
                    type="password"
                    id="password"
                    name="password"
                    placeholder=" "
                />
                <label class="form__input-label" for="password">Password</label>
            </div>
            <div class="form__spacer" aria-hidden="true"></div>
            <button class="form__button">Log in</button>
        </form>
    </body>
</html>
