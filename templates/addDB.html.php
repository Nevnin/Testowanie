 {include file="header.html.php"}
<div  class="container">
    <div class="page-header">
<h1  style="text-align: center;">Dodaj Doradce Biznesowego</h1>

<form id="addKS" action="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/insert" method="post">
    <div class="form-group">
    <label for="imie">Imię:</label>
    <input class="form-control" type="text" id="imie" name="imie" placeholder="Wprowadź imie doradcy" />
    </div>
    <div class="form-group">
        <label for="nazwisko">Nazwisko:</label>
    <input type="text" name="nazwisko" id="nazwisko" class="form-control" placeholder="Wprowadź nazwisko doradcy" />    
    </div>
     <div class="form-group">
        <label for="sid">SID:</label>
    <input type="text" name="sid" id="sid" class="form-control" placeholder="Wprowadź numer SID doradcy" />    
    </div>
   	<div class="form-group">
     <label for="autor">Koordynator:</label>
        <select class="form-control" name=koordynator>
    {foreach $allKor as $id=>$wiersz}
    <option value="{$wiersz['id']}">{$wiersz['imie']} {$wiersz['nazwisko']}</option>
    {/foreach}
    </select>
    </div>
    <div class="form-group">
        <label for="miasto">Miasto:</label>
    <input type="text" name="miasto" id="miasto" class="form-control" placeholder="Wprowadź miasto doradcy" />    
    </div>
    <button type="submit" class="btn btn-default" value="Dodaj">Dodaj</button>
</form>
    </div>
</div>

 {include file="footer.html.php"}