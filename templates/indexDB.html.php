 {include file="header.html.php"}
<div >

    <h1  style="text-align: center;">Lista Doradców Biznesowych</h1>
    <div class="container">
<form class="form-inline" action="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/szukaj" method="post">
  <div class="form-group ">
    <input type="text" class="form-control" id="miastoKS" name="miastoKS" placeholder="Wpisz miasto doradcy lub koordynatora doradcy" size="50">
  </div>
  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>

    <table class="table table-bordered">
    <thead>
        <tr>
        	<th>Id</th>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>SID</th>
            <th>Koordynator</th>
            <th>Miasto</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
        <tbody>
            {foreach $allDor as $id =>$dor}
            {if $dor['aktywnyKor'] == 1}
		<tr class="">
			<td>{$dor['idDoradca'] }</td>
			<td>{$dor['imie'] }</td>   
            <td>{$dor['nazwisko']}</td>
            <td>{$dor['SID']}</td>
            <td>{$dor['Koordynator']}</td> 
            <td>{$dor['miasto']}</td> 
			<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/edycjaDB/{$dor['idDoradca']}">edytuj</a></td> 
			<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/delete/{$dor['idDoradca']}">zwolnij</a></td></tr>
			{else}
			<tr class="danger">
			<td>{$dor['idDoradca'] }</td>
			<td>{$dor['imie'] }</td>   
            <td>{$dor['nazwisko']}</td>
            <td>{$dor['SID']}</td>
            <td>{$dor['Koordynator']}</td> 
            <td>{$dor['miasto']}</td> 
			<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/edycjaDB/{$dor['idDoradca']}">edytuj</a></td> 
			<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/delete/{$dor['idDoradca']}">zwolnij</a></td></tr>
		 
		{/if}
	{/foreach}
        </tbody>
    </table>
</div>

<ul>
	
</ul>

<br/><br/>
 {include file="footer.html.php"}