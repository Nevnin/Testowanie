 {include file="header.html.php"}
 <div ng-app="myApp" ng-controller="myController" > 
    <h1  style="text-align: center;">Lista doradcow</h1>
    <table ng-init='getAllDor()' class="table table-striped">
  <thead>
  <tr>
     <th ng-click="sortType = 'id'; sortReverse = !sortReverse;" 
         style="width: 10%">Id
     
     <span ng-show="sortType === 'id' && !sortReverse" 
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'id' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>     
     </th>
     <th ng-click="sortType = 'imie'; sortReverse = !sortReverse;" 
         style="width: 20%">Imie
     <span ng-show="sortType === 'imie' && !sortReverse" 
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'imie' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>        
     </th>
      <th ng-click="sortType = 'nazwisko'; sortReverse = !sortReverse;" 
         style="width: 20%">Nazwisko
     <span ng-show="sortType === 'nazwisko' && !sortReverse" 
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'nazwisko' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>        
     </th>
      <th ng-click="sortType = 'miasto'; sortReverse = !sortReverse;" 
         style="width: 20%">Miasto
     <span ng-show="sortType === 'miasto' && !sortReverse" 
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'miasto' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>        
     </th>
     <th ng-click="sortType = 'SID'; sortReverse = !sortReverse;" 
         style="width: 20%">SID
     <span ng-show="sortType === 'SID' && !sortReverse" 
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'SID' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>        
     </th>
     <th ng-click="sortType = 'koordynator'; sortReverse = !sortReverse;" 
         style="width: 20%">Koordynator
     <span ng-show="sortType === 'koordynator' && !sortReverse" 
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'koordynator' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>        
     </th>
     
     
     <th style="width: 30%">Operacje</th>
  </tr>
  </thead>
  <tbody>
  
  <tr ng-repeat="doradcy in doradca | orderBy:sortType:sortReverse">
    <td>
        [[ doradcy.id ]] 
    </td>
    <td>
        <span ng-hide="doradcy.editMode">[[ doradcy.imie ]]</span>
        <input ng-model="doradcy.imie"
               ng-show="doradcy.editMode" 
               type="text" />    
    </td>
    <td>
        <span ng-hide="doradcy.editMode">[[ doradcy.nazwisko ]]</span>
        <input ng-model="doradcy.nazwisko"
               ng-show="doradcy.editMode" 
               type="text" />    
        
    </td>
       <td>
        <span ng-hide="doradcy.editMode">[[ doradcy.miasto ]]</span>
        <input ng-model="doradcy.miasto"
               ng-show="doradcy.editMode" 
               type="text" />    
    </td>
    </td>
       <td>
        <span ng-hide="doradcy.editMode">[[ doradcy.SID ]]</span>
        <input ng-model="doradcy.SID"
               ng-show="doradcy.editMode" 
               type="text" />    
    </td>
     <td ng-init='getAllKor()'>
        <span ng-hide="doradcy.editMode">[[ doradcy.Koordynator ]]</span>
           
        <select ng-show="doradcy.editMode" ng-model="doradcy.koordynator" >
           <option   ng-repeat="koordynatorzy in koordynator" 
                value=[[koordynatorzy.id]]>[[koordynatorzy.Imie]] [[koordynatorzy.nazwisko]]</option>
           </select>     
    </td>
     <td>
        <button ng-click="doradcy.editMode = true;" 
                ng-hide="doradcy.editMode" 
                type="submit" 
                class="btn btn-xs btn-primary">edytuj</button>
        <button ng-click="doradcy.editMode = false; update(doradcy)"
                ng-show="doradcy.editMode"  
                type="submit" 
                class="btn btn-xs btn-success">zapisz</button>
        
        <button ng-click="delete(doradcy)" 
                type="submit" 
                class="btn btn-xs btn-danger">usuñ</button>
    </td>       
  </tr>
  </tbody>      
</table>
    
    </div>
 
<br/><br/>
 {include file="footer.html.php"}