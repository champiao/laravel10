<x-layout title="Usuários">
    <a class="btn btn-dark mb-2" href="/users/create">Adicionar</a>
        <ul class="list-group">
            @foreach($users as $user)
            <li class="list-group-item">{{ $user->name }}<button class="btn btn-danger btn-sm btn-delete float-end">X</button></li>
            @endforeach
        </ul>
    </div>
</x-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn-delete").click(function(event) {
            event.preventDefault();
            try{
                var userId = {{ $user->id }};
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/users/delete/" + userId,
                    data: {_token: "{{ csrf_token() }}", method:'POST'},
                    success: function() {
                        return redirect('/users/all');
                    },
                    error: function() {
                        console.error('Erro ao excluir seção');
                    }});
                }catch(error){
                    console.error(error);
                }
            });
        });
</script>