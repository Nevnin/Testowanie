{include file="header.html.php"}
<div class="container">
    <div class="page-header">
<h1  style="text-align: center;">Dodaj ksiażkę</h1>
 
<form id="addksiazka" action="http://{$smarty.server.HTTP_HOST}{$subdir}Ksiazka/insert" method="post">
  <div class="form-group">
    <label for="tytul">Tytuł:</label>
    <input type="text" name="tytul" id="tytul" placeholder="Wprowadź tytuł książki" class="form-control" />
    </div>  
    <div class="form-group">
    <label for="autor">Autor:</label>
        <select class="form-control" name=autor>
    {foreach $allAu as $id=>$wiersz}
    <option value="{$wiersz['id']}">{$wiersz['imie']} {$wiersz['nazwisko']}</option>
    {/foreach}
    </select>
    </div>
    <div class="form-group">
    <label for="rokwydania">Rok wydania:</label>
        <input type="text" id="rokwydania" name="rokwydania" class="form-control" placeholder="Wprowadź rok wydania książki" />
    </div>
    <div>
    <label for="kategoria">Kategoria:</label>
        <select class="form-control" name=kategoria>
    {foreach $allCats as $id2=>$wiersz2 }
    <option value="{$wiersz2['id']}">
        {$wiersz2['nazwa']}</option>
    {/foreach}
    </select>
    </div>
    <button type="submit" class="btn btn-default" value="Dodaj" >Dodaj</button>
</form>
</div>
</div>
 {include file="footer.html.php"}
