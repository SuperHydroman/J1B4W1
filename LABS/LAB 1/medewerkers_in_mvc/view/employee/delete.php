<h1>WEET U ZEKER DAT U <?=strtoupper($name)?> WILT VERWIJDEREN? DEZE ACTIE KAN NIET WORDEN TERUGGEKEERT!!</h1>
<form name="delete" method="post" action="<?=htmlspecialchars("../destroy/".$id)?>">
    <input type="hidden" name="id" value="<?=$id?>">

    <label for="name">Naam:</label>
    <input disabled type="text" id="name" name="name" placeholder="Naam" value="<?=$name?>">

    <br>

    <label for="age">Leeftijd:</label>
    <input disabled type="text" id="age" name="age" placeholder="Leeftijd" value="<?=$age?>">

    <br>

    <input type="submit" value="Verwijderen">
</form>

