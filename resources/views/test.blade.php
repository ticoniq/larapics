<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    @php
        $icon = "logo.svg";
    @endphp
    {{-- <x-icon :src="$icon"/> --}}
    {{-- <x-ui.button /> --}}
    <x-alert type="danger" dismissable="true" class="mt-4" role="flash">
        {{ $component->icon() }}
        {{-- <x-slot:title>
            Successful
        </x-slot:title> --}}
        <p class="mb-0">Data has been sent {{ $component->link('undo') }} </p>
    </x-alert>

    <x-form action="/image" method="PUT">
        <input type="text">
        <button>Save</button>
    </x-form>
</body>
</html>