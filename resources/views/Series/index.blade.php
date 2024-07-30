<x-layout title="Séries">
    <a class="btn btn-dark mb-2" href={{ route('series.create')}}>Adicionar</a>
        @isset($messageError)
        <div class="alert alert-warning" >
            {{ $messageError }}
        </div>
        @endisset
        @isset($messageSuccess)
        <div class="alert alert-success">
            {{ $messageSuccess }}
        </div>
        @endisset
        <ul class="list-group ">
            @foreach($series as $series)
            <li class="list-group-item">
                {{ $series->name }}
                {{-- {{ $series->seasons }} --}}
            <span class="d-flex justify-content-end" >
                <a href="{{ route('series.edit', $series->id) }}" class="btn  btn-primary btn-sm float-end">Edit</a>
                <form action="{{ route('series.destroy', $series->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm btn-delete float-end">
                        X
                    </button>
                </form>
            </span>
            </li>
            @endforeach
        </ul>
</x-layout>
