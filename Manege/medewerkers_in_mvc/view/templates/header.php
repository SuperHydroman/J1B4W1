<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Medewerker</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 	
	<link rel="stylesheet" href="<?= URL ?>/css/style.css">
</head>
<body>
<div id="container">
<nav>
	<ul>
        <li><a href="<?=URL?>manege/index"><i style="-webkit-transform: scaleX(-1);transform: scaleX(-1);" class="fas fa-horse-head"></i></a></li>
        <li><a href="<?=URL?>manege/create"><i class="far fa-plus-square"></i></a></li>
        &emsp;
        <li><a href="<?=URL?>manege/user_index"><i class="fas fa-users"></i></a></li>
        <li><a href="<?=URL?>manege/user_create"><i class="fas fa-user-plus"></i></a></li>

        <li class="indexBreedsBTN"><a href="<?=URL?>manege/index_breed"><i class="fas fa-horse"></i> Rassen bekijken</a></li>
        <br>
        <li class="addBreedsBTN"><a href="<?=URL?>manege/create_breed"><i class="fas fa-horse"><i style="font-size: 12px;" class="fas fa-plus"></i></i> Ras toevoegen</a></li>
	</ul>
    <h4><a href="<?=URL?>manege/reservations_index"><i class="fas fa-calendar-alt"></i>&ensp;Reserveringen bekijken</a></h4>
    <h4><a href="<?=URL?>manege/reservations_create"><i class="far fa-calendar-check"></i>&ensp;Reserveren</a></h4>
</nav>