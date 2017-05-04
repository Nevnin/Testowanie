<!DOCTYPE html>
<html>
    <head>
        <title>Przykład wykorzystania wzorca MVC</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

         <!-- Bootstrap -->
        <link rel="stylesheet" href="http://{$smarty.server.HTTP_HOST}{$subdir}vendor/twbs/bootstrap/dist/css/custom.css">
        <link href="http://{$smarty.server.HTTP_HOST}{$subdir}vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="http://{$smarty.server.HTTP_HOST}{$subdir}vendor/twbs/bootstrap/dist/css/jquery-ui.min.css">


    </head>
    <body>
        <div class="jumbotron text-center">
{if isset($typkonta)}

 {if !isset($login)}
  <h1>Witamy w systemie</h1>
 {else if $typkonta==2}
  <h1>Panel Doradcy</h1>
 {else if $typkonta==1}
 <h1>Panel Administratora</h1>

{/if}
{/if}


 {if isset($login)}
{if isset($typkonta)}
	 {if $typkonta==1}
  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Rozwi� nawigacj�</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://{$smarty.server.HTTP_HOST}{$subdir}/">"Marka - Logo strony"</a>
    </div>




    <!-- Grupowanie element�w menu w celu lepszego wy�wietlania na urz�dzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Koordynator <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Koordynator/">Lista koordynator�w</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Koordynator/dodajKS">Dodanie koordynatora</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Doradca biznesowy <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/">Lista doradc�w</a></li>
            <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/dodajDB">Dodanie doradcy</a></li>


          </ul>
        </li>
        <li> <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Raport/" class="dropdown-toggle" >Raport sprzedaży</a></li>
      </ul>
       <ul class="nav navbar-nav navbar-right">




          <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Access/logout"><span class="glyphicon glyphicon-log-in"></span>Wyloguj</a></li>
          </ul>
    </div><!-- /.navbar-collapse -->



   {else if $typkonta==2}



     <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Rozwi� nawigacj�</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/addPred">"Marka - Logo strony"</a>
    </div>




    <!-- Grupowanie element�w menu w celu lepszego wy�wietlania na urz�dzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">


        <li> <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Doradca/addPred" class="dropdown-toggle" >Dodanie predykcji sprzedaży</a></li>
      </ul>
       <ul class="nav navbar-nav navbar-right">


          <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Access/logout"><span class="glyphicon glyphicon-log-in"></span>Wyloguj</a></li>

          </ul>
    </div><!-- /.navbar-collapse -->


    {/if}
    {/if}
    {else}
         <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Rozwi� nawigacj�</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://{$smarty.server.HTTP_HOST}{$subdir}/">"Marka - Logo strony"</a>
    </div>




    <!-- Grupowanie element�w menu w celu lepszego wy�wietlania na urz�dzeniach moblinych -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">



      </ul>
       <ul class="nav navbar-nav navbar-right">


          <li><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Access/logform"><span class="glyphicon glyphicon-log-in"></span>Zaloguj</a></li>

          </ul>
    </div><!-- /.navbar-collapse -->



          {/if}

  </div><!-- /.container-fluid -->
</nav>
        </div>

<!--       <ul class="nav navbar-nav navbar-right"> -->
<!--         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
<!--         <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
<!--       </ul> -->
<!--     </div> -->
  </div>
</nav>
