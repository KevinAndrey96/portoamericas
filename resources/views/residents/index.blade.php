@extends('layouts.dashboard')
@section('content')

        @if(Session::has('usedApt'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('usedApt') }}
            </div>
        @endif
        @if (Session::has('formNotFilled'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('formNotFilled') }}
            </div>
        @endif
        @if(Session::has('updaresisuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('updaresisuccess') }}
            </div>
        @endif
        @if(Session::has('residentSuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('residentSuccess') }}
            </div>
        @endif
        @if(Session::has('residentFail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('residentFail') }}
            </div>
        @endif

    <div class="card">
        <div class="card-header">
            Residentes
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                <div class="col-auto mt-5">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th style="text-align: center; padding:10px;">Id</th>
                            <th style="text-align: center; padding:10px;">Nombre</th>
                            <th style="text-align: center; padding:10px;">Telefono</th>
                            <th style="text-align: center; padding:10px;">Email</th>
                            <th style="text-align: center; padding:10px;">Torre</th>
                            <th style="text-align: center; padding:10px;">Apartamento</th>
                            <th style="text-align: center; padding:10px;">Acci??n</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if($user->role == 'Resident')
                                    <tr>
                                        <td style="text-align: center; padding:10px;">{{ $user->id }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->name }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->phone }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->email }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->resident->tower }}</td>
                                        <td style="text-align: center; padding:10px;">{{ $user->resident->apt }}</td>
                                        <td style="text-align: center;">

                                            <div id="endis" style="display: block; margin:3px;" >
                                                @if($user->resident->status == 'Habilitado')
                                                    <input type="checkbox" data-onstyle="success"
                                                           checked
                                                           data-on="Habilitado"
                                                           data-size="xs"
                                                           data-toggle="toggle"
                                                           name="togglestatus{{$user->id}}" id="togglestatus{{$user->id}}"
                                                           onchange="getStatus({{$user->id}})">
                                                @elseif($user->resident->status == 'Deshabilitado')
                                                    <input type="checkbox" data-onstyle="success"
                                                           data-off="Deshabilitado"
                                                           data-size="xs"
                                                           data-toggle="toggle"
                                                           name="togglestatus{{$user->id}}" id="togglestatus{{$user->id}}"
                                                           onchange="getStatus({{$user->id}})">
                                                @endif
                                            </div>


                                            <div class="row justify-content-center">
                                                <a href="/extrainfo/index/{{$user->id}}" style="margin:3px; width:13px !important;" alt="Informaci??n extra" class="btn btn-primary  form-control"><i class="fas fa-book-reader"></i></a>
                                                <a href="/residents/edit/{{$user->id}}" style="margin:3px; width:13px !important;" alt="Editar" class="btn btn-warning form-control"><i class="far fa-edit"></i></a>
                                                    <form method="POST" action="/residents/delete">
                                                        @csrf
                                                        <input type="hidden" name="id" value={{ $user->id }}>
                                                        <button style="margin:3px; width:13px !important;" class="btn btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('Si borra el residente el apartamento de este se reseteara y no tendr?? due??o, esta seguro?');"><i class="fas fa-exclamation-triangle"></i></button>

                                                    </form>
                                                </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                        <form id="form-status" name="form-status" method="post" action="/changeStatusResident">
                        @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="status" id="status">
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getStatus(id)
        {
            var toggle = document.getElementById("togglestatus"+id);
            var status = document.getElementById("status");
            var form = document.getElementById("form-status");
            var user_id = document.getElementById("id");

            if(toggle.checked == true){
                status.value = 'Habilitado';
            } else {
                status.value = 'Deshabilitado';
            }
            user_id.value = id;
            form.submit();
        }
    </script>
@endsection
