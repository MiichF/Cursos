<div>
    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de usuario">
        </div>

        @if($users->count())

            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th colspan= "2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr > 
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px"> <a class= "btn btn-primary btn-sm" href = "{{route('admin.users.edit',$user)}}">Editar</a></td>
                            </td>
                        @endforeach 
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>

        @else
            <div class="card-body">
                <strong>No se encontraron usuarios...</strong>
            </div>
        @endif
    </div>
</div>
