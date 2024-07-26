<form action={{$action}} method="post">
    @csrf
    @if($update)
    @method('put')
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul> 
        </div>
    @endif
    <div class="mb-3" >
        <label for="name" class="form-label">Nome:</label>
        <input type="text" 
                id="name" 
                name="name" 
                class="form-control" 
                @isset($name)value="{{$name}}"
                @endisset>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>