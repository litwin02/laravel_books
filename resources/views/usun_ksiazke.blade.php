<!DOCTYPE html>
<html>
    @include('partials.head')
<body>
@include('partials.navi')
    <div id="zawartosc">
        <h2>Usuń książkę</h2>
    <form class="form-inline" action="./usun_ksiazke" method="post">
    @csrf
    <p>
        
        <label for="idk">Wybierz książkę do usunięcia</label>
        <select name="idk" id="idk">
        @foreach($ksiazki as $el)
            <option value="{{$el->id}}">{{$el->tytul}}</option>
        @endforeach
        </select>
        
    </p>
    <p><button type="submit" class="btn btn-primary mb-2">Usun</button></p>
    </form>
    </div>
</body>
</html>