<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Agregar Comuna</title>
</head>

<body>
    <div class="container">
        <h1>editar comuna</h1>

        <form method="POST" action="{{ route('comunas.update', ['comuna' => $comuna->comu_codi]) }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="codigo" class="form-label">id</label>
                <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
                    disabled="disable" value="{{ $comuna->comu_codi }}">
                <div id="codigoHelp" class="form-text">Comuna id</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Comuna</label>
                <input type="text" required class="form-control" id="name" name="name"
                    placeholder="Comuna nombre." value="{{ $comuna->comu_nomb }}">
            </div>
            <label for="municipality">Municipio</label>
            <select class="form-select" id="municipality" name="code" required>
                <option selected disable value="">CHoose one...</option>
                @foreach ($municipios as $municipio)
                    @if ($municipio->muni_codi == $comuna->muni_codi)
                        <option selected value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                    @else
                        <option value="{{ $municipio->muni_codi }}">{{ $municipio->muni_nomb }}</option>
                    @endif
                @endforeach
            </select>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('comunas.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
