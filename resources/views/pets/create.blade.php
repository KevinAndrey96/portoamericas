@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Crear mascota
        </div>
        <div class="card-body container-fluid">
            <form action="/pets/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="pet_name">Nombre: </label>
                    <input class="form-control" type="text" name="pet_name" id="pet_name" required>
                </div>
                <div class="form-group">
                    <label for="select_pet_species">¿Cual es la especie?</label>
                    <select class="form-control" name="select_pet_species" id="select_pet_species" onchange="petSpecies()" required>
                        <option selected disabled ></option>
                        <option value="dog">Perro</option>
                        <option value="cat">Gato</option>
                        <option value="other">Otro</option>
                    </select>
                </div>
                <div style="display: none" class="form-group" id="divSpecies">
                    <label for="pet_species">Nombre de la especie:</label>
                    <input class="form-control" type="text" name="pet_species" id="pet_species" required>
                </div>
                <div style="display: none" class="form-group" id="divRace">
                    <label for="pet_race">Raza: </label>
                    <input class="form-control" type="text" name="pet_race" id="pet_race" required>
                </div>
                <div class="form-group">
                    <label for="pet_color">Color: </label>
                    <input class="form-control" type="text" name="pet_color" id="pet_color" required>
                </div>
                <div class="form-group">
                    <label for="pet_age">Edad: </label>
                    <input class="form-control" type="number" name="pet_age" id="pet_age" min="1" required>
                </div>
                <div class="form-group">
                    <label for="pet_policy">Poliza de seguro: </label>
                    <input class="form-control" type="text" name="pet_policy" id="pet_policy">
                </div>
                <div class="form-group">
                    <p style="font-size: 15px">¿Es potencialmente peligroso?</p>
                    <div>
                        <input type="radio" name="pet_dangerous" id="dangerous" value="true">
                        <label for="dangerous">Si</label>
                    </div>
                    <div>
                        <input type="radio" name="pet_dangerous" id="dangerous" value="false" checked>
                        <label for="dangerous">No</label>
                    </div>
                </div>
                <div class="form-group">
                    <p style="font-size: 15px">¿Cuenta con el carnet de vacunas actualizado?</p>
                    <div>
                        <input type="radio" name="pet_card" id="pet_card" value="true" checked>
                        <label for="pet_card">Si</label>
                    </div>
                    <div>
                        <input type="radio" name="pet_card" id="pet_card" value="false" >
                        <label for="pet_card">No</label>
                    </div>
                </div>
                    <div class="form-group">
                        <p style="font-size: 15px">¿Tiene placa de identificación con los datos de Torre-Apto-Celular del dueño?</p>
                        <div>
                            <input type="radio" name="pet_plaque" id="pet_plaque" value="true" checked>
                            <label for="pet_plaque">Si</label>
                        </div>
                        <div>
                            <input type="radio" name="pet_plaque" id="pet_plaque" value="false" >
                            <label for="pet_plaque">No</label>
                        </div>
                    </div>
                <input type="hidden" name="user_id" value="{{$id}}">
                <input style="float:right; background-color:#B74438 !important;" type="submit" class="btn btn-danger" value="Guardar">

            </form>

        </div>
    </div>
    <script>
        var selectSpecies = document.getElementById('select_pet_species');
        var divSpecies = document.getElementById('divSpecies');
        var inputSpecies = document.getElementById('pet_species');
        var divRace = document.getElementById('divRace');
        var inputRace = document.getElementById('pet_race');

        function petSpecies()
        {
            console.log(inputRace);
            if (selectSpecies.value == 'dog' || selectSpecies.value == 'cat') {
               divSpecies.style.display = 'none';
               divRace.style.display = 'block';
               inputRace.disabled = false;

                if (selectSpecies.value == 'dog' ) {
                    inputSpecies.value = 'dog';
                }
                if (selectSpecies.value == 'cat' ) {
                    inputSpecies.value = 'cat';
                }
            }

            if (selectSpecies.value == 'other') {
                inputSpecies.value = '';
                divSpecies.style.display = 'block';
                inputRace.disabled = true;
                divRace.style.display = 'none';
            }
        }

    </script>

@endsection
