<html>
<head>
</head>
<body>

	<form action="addNews.php" method="post">
		Podaj tytul: <input type="text" name="tytul"><br>
		Podaj ile dni ma sie wyswietlac news:<br>
			<input type="number" name="licznik"><br>
		Wczytaj plik z obrazem: <input type="file" name="plik"><br>
		Podaj kolor tla dla newsa: <input type="color" name="tlo"><br>
		Czy news jest newsem dnia: 
			TAK: <input type="radio" name="newsDnia" value="1">
			NIE: <input type="radio" name="newsDnia" value="0" checked><br>
		Wlaczyc komentowanie? <input type="checkbox" name="komenty"><br>
		Wlaczyc ocenianie? <input type="checkbox" name="oceny"><br>
		Wlaczyc dla gosci? <input type="checkbox" name="goscie"><br>
		
		Podaj tresc newsa: <textarea name="tresc"></textarea><br>
		Podaj kategorie newsa: 
			<select name="kategoria">
				<option value="0">Sport</option>
				<option value="1">Motoryzacja</option>
				<option value="2">Kultura</option>
			</select><br>
		<input type="reset" value="Wyczysc">
		<input type="submit" value="Zapisz newsa">
	</form>
	
	
	<?php
		//sprawdzam czy wybrane dane przyszly
		//uwaga: moga byc puste wiec i na to zabezpieczenie
		//			trzeba dodac, mozna uzyc funkcji
//					empty($_POST["tytul"])
		//			zwraca true jesli pole jest puste
		if (	isset($_POST["tytul"])  &&
				isset($_POST["kategoria"]) &&
				isset($_POST["tresc"])
			){
				//odbieram 
				$tytul=$_POST["tytul"]; 
				$kategoria=$_POST["kategoria"];
				$tresc=$_POST["tresc"];
				$link=mysqli_connect("localhost", "root", "", "portal");
				mysqli_query($link, 
					"INSERT INTO newsy VALUES('', '$tytul',$kategoria, '$tresc')");
			}
		
	
	?>
</body>
</html>