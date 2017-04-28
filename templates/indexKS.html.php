 {include file="header.html.php"}
<div>
    <h1  style="text-align: center;">Lista Koordynatorów</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
        	<th>Id</th>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Miasto</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
        <tbody>
            {foreach $allKor as $id =>$dor}
            {if $dor['aktywny']==1}
		<tr class="">
			<td>{$dor['id'] }</td>
			<td>{$dor['imie'] }</td>   
            <td>{$dor['nazwisko']}</td>
            <td>{$dor['miasto']}</td> 
			<td><a type="submit" href="http://{$smarty.server.HTTP_HOST}{$subdir}Koordynator/edycjaKS/{$dor['id']}">edytuj</a></td> 
			<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Koordynator/delete/{$dor['id']}">zwolnij</a></td></tr>
			{else}
			<tr class="danger">
			<td>{$dor['id'] }</td>
			<td>{$dor['imie'] }</td>   
            <td>{$dor['nazwisko']}</td>
            <td>{$dor['miasto']}</td> 
			<td><a type="submit" href="http://{$smarty.server.HTTP_HOST}{$subdir}Koordynator/edycjaKS/{$dor['id']}">edytuj</a></td> 
			<td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Koordynator/delete/{$dor['id']}">zwolnij</a></td></tr>
			{/if}
			
	{/foreach}
        </tbody>
    </table>
</div>

<ul>
	
</ul>

<br/><br/>
 {include file="footer.html.php"}