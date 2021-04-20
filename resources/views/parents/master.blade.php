<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Application school</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  {{-- test--}}
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


</head>
<body>
	
<div class="m-2">
	<div class="container">
    
    <div class="row">  

      {{-- <div class="col-lg-3 list-group mt-5">
        <h4 class="list-group-item list-group-item-action active">
          Menu
        </h4>
        <a href="{{ route('universites.index') }}" type="button" class="list-group-item list-group-item-action">Liste des universités</a>
        <a href="{{ route('classes.index') }}" type="button" class="list-group-item list-group-item-action">Liste des classe</a>
        <a href="{{ route('etudiants.index') }}" type="button" class="list-group-item list-group-item-action">Liste des étudiants</button>
        <a href="{{ route('universites.create') }}" type="button" class="list-group-item list-group-item-action">Ajoutez un université</a>
        <a href="{{ route('classes.create') }}" type="button" class="list-group-item list-group-item-action">Ajoutez une classe</a>
        <a href="{{ route('etudiants.create') }}" type="button" class="list-group-item list-group-item-action">Ajoutez un étudiant</a>
        
      </div> --}}
      <div class="col-lg-3 nav-side-menu mt-5">
        <div class="brand">Menu</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      
            <div class="menu-list">
      
                <ul id="menu-content" class="menu-content collapse out">
                    
                    <li data-toggle="collapse" data-target="#service" class="collapsed">
                      <a ><i class="fa fa-users fa-lg"></i> Etudiants <span class="arrow"></span></a>
                    </li>  
                    <ul class="sub-menu collapse" id="service">
                      <li><a href="{{ route('etudiants.index') }}" type="button" >List des étudiants</a></li>
                      <li><a href="{{ route('etudiants.create') }}" type="button" >Ajouter une étudiant</a></li>
                    </ul>
    
                    <li data-toggle="collapse" data-target="#new" class="collapsed">
                      <a ><i class="fa fa-briefcase fa-lg"  aria-hidden="true"></i> Classes <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                      <li><a href="{{ route('classes.index') }}" type="button" >Liste des classes</a></li>
                      <li><a href="{{ route('classes.create') }}" type="button" >Ajouter une classe</a></li>
                    </ul>
    
                    <li data-toggle="collapse" data-target="#new2" class="collapsed">
                      <a ><i class="fa fa-university fa-lg" aria-hidden="true"></i> Universités <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="new2">
                      <li><a href="{{ route('universites.index') }}" type="button" >Liste des universités</a></li>
                      <li><a href="{{ route('universites.create') }}" type="button" >Ajouter une université</a></li>
                    </ul>
    
                    {{-- <li>
                      <a href="#">
                        <i class="fa fa-user fa-lg"></i> Profile
                      </a>
                    </li> --}}
    
                </ul>
         </div>
    </div>

			<div class="col-lg-8">
				
				@yield('contenu')

			</div>
		</div>
  </div>
</div>
</body>
</html>