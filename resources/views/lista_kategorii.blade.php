<!DOCTYPE html>
<html lang="pl">
    @include('partials.head')
<body>
    @include('partials.navi')
<div id="zawartosc">
    <h2>Lista kategorii</h2>

<table>
    <thead>
        <tr> <th>ID</th> <th>Opis</th> </tr>
    </thead>
    <tbody>
        @foreach($kategorie as $el)
        <tr> <td>{{$el->id}}</td> <td>{{$el->opis}}</td> </tr>
        @endforeach
    </tbody>
</table>

</div>
</body>
</html>