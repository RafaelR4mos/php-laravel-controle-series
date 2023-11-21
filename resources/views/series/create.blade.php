<x-layout title="Criar série">
    <form method="POST" action="./create" class="form">
        @csrf
        <label class="form-label" for="name">Nome da série</label>
        <input required id="name" name="name" class="form-control" placeholder="Nome da série">
        <button type="submit" class="btn btn-primary mt-2">Adicionar série</button>
    </form>
</x-layout>
