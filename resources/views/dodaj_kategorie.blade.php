<!DOCTYPE html>
<html>
    @include('partials.head')
<body>
@include('partials.navi')
    <div id="zawartosc">
    <h2>Dodaj kategorię</h2>
    <form class="form-inline" action ="./dodaj_kategorie" method = "post" >
    @csrf
    <p>
        <label for="opia">Nazwa kategorii</label>
        <input id="opis" name="opis" size="20">
    </p>
    <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p>
    </form>
    </div>
</body>
</html>