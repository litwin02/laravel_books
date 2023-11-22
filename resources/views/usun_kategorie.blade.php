<!DOCTYPE html>
<html>
    @include('partials.head')
<body>
@include('partials.navi')
    <div id="zawartosc">
        <h2>Usuń kategorie</h2>
    <form class="form-inline" action="./usun_kategorie" method="post">
    @csrf
    <p>
        <label for="idkat">Wybierz kategorię do usunięcia</label>
        <select name="idkat" id="idkat">
        @foreach($kategorie as $el)
            <option value="{{$el->id}}">{{$el->opis}}</option>
        @endforeach
        </select>
    </p>
    <p><button type="submit" class="btn btn-primary mb-2">Usun</button></p>
    </form>
    </div>
</body>
</html>