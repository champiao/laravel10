<x-layout title="Nova série">
    {{-- <x-series.form :action="route('series.store')" :name="old('name')" :update="false"/> --}}
    <form action="{{route('series.store')}}" method="post">
        @csrf  
        <div class="row mb-3">
            <div class="col-8">
                <label for="name" 
                    class="form-label"
                    >Nome:
                </label>
                <input type="text" 
                    id="name" name="name" 
                    class="form-control" 
                    value="{{old('name')}}"
                />
            </div>   
            <div class="col-8">
                <label for="name" 
                    class="form-label"
                    >Número de Temporadas:
                </label>
                <input type="text" 
                    id="numT" name="numT" 
                    class="form-control" 
                    value="{{old('numT')}}"
                />
            </div>   
            <div class="col-8">
                <label for="name" 
                    class="form-label"
                    >Número de Capitulos por temporada:
                </label>
                <input type="text" 
                    id="numC" name="numC" 
                    class="form-control" 
                    value="{{old('numC')}}"
                />
            </div>   
        </div>   
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>     
</x-layout>