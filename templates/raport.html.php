 {include file="header.html.php"}
<div >
<h1  style="text-align: center;">Miesieczny raport sprzedazy</h1>
<div class="row">
  <div class="col-md-4"></div>
<!--   <form class="form-inline .col-md-4" action="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/szukaj" method="post"> -->
<!--   <div class="form-group "> -->
<!--     <input type="text" class="form-control" id="miastoKS" name="miastoKS" placeholder="Wpisz miasto doradcy lub koordynatora doradcy" size="50" > -->
<!--   </div> -->
<!--   <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button> -->
<!-- </form> -->
  <div class="col-md-4"></div>
</div>





    <table class="table table-bordered">
    <thead>
        <tr>
        	<th>SID</th>
            <th>Doradca</th>
            <th>DBPL</th>
            <th>Dealer</th>
            <th>Tydzien 1</th>
            <th>Tydzien 1 Predykcja</th>
            <th>Tydzien 2</th>
            <th>Tydzien 2 Predykcja</th>
            <th>Tydzien 3</th>
            <th>Tydzien 3 Predykcja</th>
            <th>Tydzien 4</th>
            <th>Tydzien 4 Predykcja</th>
            <th>Miesiac</th>
        </tr>
    </thead>
        <tbody>

            {foreach $allDorR as $id =>$dor}
		<tr class="">
		
			<td>{$dor['0']['SID']}</td>
			<td>{$dor['0']['Doradca']}</td>
            <td>{$dor['0']['DBPL']}</td>
            <td>PWSZ</td>
          {for $foo=0 to 3}
           {if isset($dor[$foo]['t1'])}
            <td>{$dor[$foo]['t1']}</td>
            <td>{$dor[$foo]['t1p']}</td>
           {else}    
            <td></td>
            <td></td>  
            {/if}      
			{/for}
			<td>{$dor['0']['dataWp']}</td>
			{/foreach}
        </tbody>
    </table>


</div>

<ul>

</ul>

<br/><br/>
 {include file="footer.html.php"}
