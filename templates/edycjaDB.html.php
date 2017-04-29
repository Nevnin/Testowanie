 {include file="header.html.php"}
<div  class="container">
    <div class="page-header">
<h1  style="text-align: center;">Dodaj Doradce Biznesowego</h1>

<form id="addDB" action="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/update" method="post">
    <div class="form-group">
    <label for="id">Id:</label>
    <input class="form-control" type="text" id="id" name="id" readonly value="{$oneDor['id']}"/>
    </div>
    <div class="form-group">
    <label for="imie">Imię:</label>
    <input class="form-control" type="text" id="imie" name="imie" placeholder="Wprowadź imie doradcy" value="{$oneDor['imie']}" />
    </div>
    <div class="form-group">
        <label for="nazwisko">Nazwisko:</label>
    <input type="text" name="nazwisko" id="nazwisko" class="form-control" placeholder="Wprowadź nazwisko doradcy" value="{$oneDor['nazwisko']}"/>    
    </div>
     <div class="form-group">
        <label for="sid">SID:</label>
    <input type="text" name="sid" id="sid" class="form-control" placeholder="Wprowadź numer SID doradcy" value="{$kSID}"/>    
    </div>
   	<div class="form-group">
     <label for="autor">Koordynator:</label>
        <select class="form-control" name=koordynator>
    {foreach $allKorAll as $id=>$wiersz}
     {if $wiersz['id']==$oneDor['koordynator']}
    <option value="{$wiersz['id']}" selected="selected">{$wiersz['imie']} {$wiersz['nazwisko']}</option>
    {else} 
    <option value="{$wiersz['id']}" >{$wiersz['imie']} {$wiersz['nazwisko']}</option>
     {/if} 
    {/foreach}
    </select>
    </div>
    <div class="form-group">
        <label for="miasto">Miasto:</label>
    <input type="text" name="miasto" id="miasto" class="form-control" placeholder="Wprowadź miasto doradcy" value="{$oneDor['miasto']}"/>    
    </div>
    <button type="submit" class="btn btn-default" value="Dodaj">Edytuj</button>
</form>
    </div>
</div>

 {include file="footer.html.php"}