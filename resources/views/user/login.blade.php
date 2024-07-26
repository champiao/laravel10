<x-layout title="Login">
    <form action="/users/auth", method="post">
        @csrf
        <div class="mb-3" >
            <label for="email" class="form-label">Email:</label>
            <input type="text" id="email" name="email" class="form-control">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>