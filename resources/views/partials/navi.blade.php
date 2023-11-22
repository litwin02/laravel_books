<nav>
<div class="navbar">
    <div>
        <a href="./">Strona domowa</a>
        <a href="./ksiazki">Książki</a>
        <a href="./kategorie">Kategorie</a>
        <a href="./wydawnictwa">Wydawnictwa</a>
        <div class="dropdown">
            <button class="dropbtn">Dodaj</button>
            <div class="dropdown-content">
                <a href="./dodaj_ksiazke">Dodaj książkę</a>
                <a href="./dodaj_kategorie">Dodaj kategorię</a>
                <a href="./dodaj_wydawnictwo">Dodaj wydawnictwo</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Usuń</button>
            <div class="dropdown-content">
                <a href="./usun_ksiazke">Usun książkę</a>
                <a href="./usun_kategorie">Usun kategorię</a>
                <a href="./usun_wydawnictwo">Usun wydawnictwo</a>
            </div>
        </div>
        
        @if(Auth::check())
            <a href="./wyloguj">Wyloguj</a>
        @else
            <a href="./loguj">Zaloguj</a>
        @endif
    </div>
</div>
</nav>