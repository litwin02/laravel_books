<!DOCTYPE html>
<html>
    @include('partials.head')
<body>
@include('partials.navi')
    <div id="zawartosc">
        <h2>Usuń wydawnictwo</h2>
    <form class="form-inline" action="./usun_wydawnictwo" method="post">
    @csrf
    <p>
        <label for="idw">Wybierz wydawnictwo do usunięcia</label>
        <select name="idw" id="idw">
        @foreach($wydawnictwa as $el)
            <option value="{{$el->id}}">{{$el->nazwa}}</option>
        @endforeach
        </select>
    </p>
    <p><button type="submit" class="btn btn-primary mb-2">Usun</button></p>
    </form>
    </div>
</body>
</html>