 {include file="header.html.php"}
<div ng-app="myApp" ng-controller="myController" > 
    <h1  style="text-align: center;">Lista koordynatorw</h1>
    <table ng-init='getAll()' class="table table-striped">
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
     <th style="width: 30%">Operacje</th>
  </tr>
  </thead>
  <tbody>
  
  <tr ng-repeat="koordynatorzy in koordynator | orderBy:sortType:sortReverse">
    <td>
        [[ koordynatorzy.id ]] 
    </td>
    <td>
        <span ng-hide="koordynatorzy.editMode">[[ koordynatorzy.imie ]]</span>
        <input ng-model="koordynatorzy.imie"
               ng-show="koordynatorzy.editMode" 
               type="text" />    
    </td>
    <td>
        <span ng-hide="koordynatorzy.editMode">[[ koordynatorzy.nazwisko ]]</span>
        <input ng-model="koordynatorzy.nazwisko"
               ng-show="koordynatorzy.editMode" 
               type="text" />    
        
    </td>
       <td>
        <span ng-hide="koordynatorzy.editMode">[[ koordynatorzy.miasto ]]</span>
        <input ng-model="koordynatorzy.miasto"
               ng-show="koordynatorzy.editMode" 
               type="text" />    
    </td>
    <td>
        <button ng-click="koordynatorzy.editMode = true;" 
                ng-hide="koordynatorzy.editMode" 
                type="submit" 
                class="btn btn-xs btn-primary">edytuj</button>
        <button ng-click="koordynatorzy.editMode = false; update(koordynatorzy)"
                ng-show="koordynatorzy.editMode"  
                type="submit" 
                class="btn btn-xs btn-success">zapisz</button>
        
        <button ng-click="delete(koordynatorzy)" 
                type="submit" 
                class="btn btn-xs btn-danger">usuñ</button>
    </td>       
  </tr>
  </tbody>      
</table>
    
    </div>


<br/><br/>

 {include file="footer.html.php"}