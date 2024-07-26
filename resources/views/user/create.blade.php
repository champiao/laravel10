<x-layout title="Novo Usuário">
    <form action="/users/store", method="post">
        @csrf
        <div class="mb-3" >
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-control">
            <label for="email" class="form-label">Email:</label>
            <input type="text" id="email" name="email" class="form-control">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control">
            <label for="password_confirmation" class="form-label">Confirmar Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            <label for="role" class="form-label">Permissão:</label>
            <select id="role" name="role" class="form-select">
                <option value="user">Usuário</option>
                <option value="admin">Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>