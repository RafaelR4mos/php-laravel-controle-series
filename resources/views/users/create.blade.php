<x-layout title="Novo usuário">
    <form method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Seu nome</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Seu E-mail</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmação de senha</label>
            <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" id="password_confirmation" class="form-control">
        </div>

        <button class="btn btn-primary mt-3" type="submit">Entrar</button>
    </form>
</x-layout>
