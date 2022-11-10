<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Nombre del curso">
    </div>

    @if($cursos->count())

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan= "2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cursos as $curso)
                        <tr > 
                            <td>{{$curso->id}}</td>
                            <td>{{$curso->name}}</td>
                            <td width="10px"> <a class= "btn btn-primary btn-sm" href = "{{route('admin.cursos.edit',$curso)}}">Editar</a></td>
                            <td width="10px"> <form action="{{route('admin.cursos.destroy', $curso)}}" method="POST">
                            @csrf    
                            @method('delete')
                            <button type= "submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>    
                        </td>
                    @endforeach 
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$cursos->links()}}
        </div>

    @else
        <div class="card-body">
            <strong>No se encontraron cursos ...</strong>
        </div>
    @endif

</div>
