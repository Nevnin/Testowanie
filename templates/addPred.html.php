{include file="header.html.php"}
<div  class="container">
   <div class="page-header">
    <h1  style="text-align: center;">Dodaj predykcję sprzedaży na dany tydzień</h1>
    <form class="form-inline" id="addKS" action="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/insertPred" method="post">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <!--<th id="data" name="data">{$dataS['dzien']}/{$dataS['miesiacNum']}/{$dataS['rok']}-->
              <th>DataWprowadzenia</th>
              <th>PlanowanaSprzedaz</th>
              <th>Sprzedane</th>
              <th>Tydzien</th>
            </tr>
          </thead>
          <tbody>
            {foreach $predDor as $id=>$wiersz}
            <tr>
              <td>{$wiersz['DataWprowadzenia']}</td>
              <td>{$wiersz['PlanowanaSprzedaz']}</td>
              <td>{$wiersz['Sprzedane']}</td>
              <td>{$wiersz['Tydzien']}</td>
            </tr>
            {/foreach}
            <tr>
              <td></td>
              <td>Sprzedaz na koniec : </td>
              <td>{$sumaSp}</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
       <div class="form-group">
         <label for="tydzien">Tydzien: </label>
         <select class="" type="text" id="tydzien" name="tydzien">
          {foreach $tyg as $item=>$wiersz}
            <option>{$wiersz}</option>
          {/foreach}
         <select/>
       </div>
       <div class="form-group">
         <input type="text" class="form-control" name="pred" id="pred" placeholder="Podaj predykcje">
       </div>
       <div class="form-group">
         <input type="text" class="form-control" name="sprzed" id="sprzed" placeholder="Podaj sprzedane">
       </div>
       <button type="submit" class="btn btn-default" value="Dodaj">Dodaj</button>
    </form>
   </div>
</div>

{include file="footer.html.php"}
