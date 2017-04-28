 {include file="header.html.php"}
<div  class="container">
    <div class="page-header">
<h1  style="text-align: center;">Edytuj Koordynatora</h1>

<form id="addKS" action="http://{$smarty.server.HTTP_HOST}{$subdir}Koordynator/update" method="post">
    <div class="form-group">
    <label for="id">Id:</label>
    <input class="form-control" type="text" id="id" name="id"  value="{$oneKor['id']}" readonly/>
    </div>
    <div class="form-group">
    <label for="imie">Imię:</label>
    <input class="form-control" type="text" id="imie" name="imie" placeholder="Wprowadź imie koordynatora" value="{$oneKor['imie']}" />
    </div>
    <div class="form-group">
        <label for="nazwisko">Nazwisko:</label>
    <input type="text" name="nazwisko" id="nazwisko" class="form-control" placeholder="Wprowadź nazwisko koordynatora" value="{$oneKor['nazwisko']}" />    
    </div>
   
    <div class="form-group">
        <label for="miasto">Miasto:</label>
    <input type="text" name="miasto" id="miasto" class="form-control" placeholder="Wprowadź miasto koordynatora"value="{$oneKor['miasto']}" />    
    </div>
    	<div class="form-group">
     <label for="aktywny">Aktywny:</label>
        <select class="form-control" name=aktywny>
        {if $oneKor['aktywny']==1}
    <option value="1" selected="selected">tak</option>
    <option value="0" >nie</option>
    {else}
     <option value="0" selected="selected">nie</option>
    <option value="1" >tak</option>
     {/if} 
    </select>
    </div>
    <button type="submit" class="btn btn-default" value="Dodaj">Edytuj</button>
</form>
    </div>
</div>

 {include file="footer.html.php"}