<x-layout title="Usuários">
    <a class="btn btn-dark mb-2" href="/users/create">Adicionar</a>
        <ul class="list-group">
            @foreach($users as $user)
                @isset($messageError)
                    <div class="alert alert-danger">
                        {{ $messageError }}
                     </div>
                @endisset
                @isset($messageSuccess)
                    <div class="alert alert-success">
                        {{ $messageSuccess }}
                    </div>
                @endisset
            <li class="list-group-item">
                {{ $user->name }}
            <span class="d-flex justify-content-end" >
                <form action="{{route('user.destroy', $user->id)}}" method="post">
                    @csrf
                    @if($user)
                    @method('delete')
                    @endif
                    <button class="btn btn-danger btn-sm btn-delete float-end">X</button>
                </form>
            </span>
            </li>
            @endforeach
        </ul>
    </div>
</x-layout>