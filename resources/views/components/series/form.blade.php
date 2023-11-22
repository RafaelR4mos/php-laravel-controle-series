<form method="POST" action={{ $action }} class="form">
        @csrf
        @if($update)
            @method('PUT')
       @endif

        <label class="form-label" for="name">Nome da série</label>
        <input id="name"
           name="name"
           class="form-control"
           placeholder="Nome da série"
           @isset($name)value="{{ $name }}"@endisset
        >
        <button type="submit" class="btn btn-primary mt-2">{{$btnTitle}}</button>
 </form>
