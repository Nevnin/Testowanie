{include file="header.html.php"}
<div  class="container">
   <div class="page-header">
    <h1  style="text-align: center;">Dodaj predykcję sprzedaży na dany tydzień</h1>
    <form class="form-inline" id="addKS" action="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/insertPred" method="post">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th id="data" name="data">{$dataS['dzien']}/{$dataS['miesiacNum']}/{$dataS['rok']}</th>
              <th>Ile sprzedam</th>
              <th>Ile sprzedalem</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="">Tydzien 1</td>
              <td class="">6</td>
              <td class="">6</td>
            </tr>
            <tr>
              <td class="">Tydzien 2</td>
              <td class="">5</td>
              <td class=""></td>
            </tr>
            <tr>
              <td class="">Tydzien 3</td>
              <td class="">4</td>
              <td class=""></td>
            </tr>
            <tr>
              <td class="">Tydzien 4</td>
              <td class="">3</td>
              <td class=""></td>
            </tr>
          </tbody>
        </table>
      </div>
       <div class="form-group">
         <label for="tydzien">Tydzien: </label>
         <select class="" type="text" id="tydzien" name="tydzien">
           <option>1</option>
           <option>2</option>
           <option>3</option>
           <option>4</option>
         <select/>
       </div>
       <div class="form-group">
         <input type="text" class="form-control" name="pred" id="pred" placeholder="Podaj predykcje">
       </div>
       <div class="form-group">
         <input type="text" class="form-control" name="sprzed" id="sprzed" placeholder="Podaj sprzedaz">
       </div>
       <button type="submit" class="btn btn-default" value="Dodaj">Dodaj</button>
    </form>
   </div>
</div>

{include file="footer.html.php"}
