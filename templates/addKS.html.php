 {include file="header.html.php"}
<div  class="container">
    <div class="page-header">
<h1  style="text-align: center;">Dodaj Koordynatora</h1>

<form id="addKS" action="http://{$smarty.server.HTTP_HOST}{$subdir}Koordynator/insert" method="post">
    <div class="form-group">
    <label for="imie">Imię:</label>
    <input class="form-control" type="text" id="imie" name="imie" placeholder="Wprowadź imie koordynatora" />
    </div>
    <div class="form-group">
        <label for="nazwisko">Nazwisko:</label>
    <input type="text" name="nazwisko" id="nazwisko" class="form-control" placeholder="Wprowadź nazwisko koordynatora" />    
    </div>
   
    <div class="form-group">
        <label for="miasto">Miasto:</label>
    <input type="text" name="miasto" id="miasto" class="form-control" placeholder="Wprowadź miasto koordynatora" />    
    </div>
    <button type="submit" class="btn btn-default" value="Dodaj">Dodaj</button>
</form>
    </div>
</div>

 {include file="footer.html.php"}