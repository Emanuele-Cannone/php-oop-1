<!-- 
- Creazione di una classe ‘Movie’
- Dichiarazione delle proprietà della classe
- Dichiarazione del costruttore
- Dichiarazione di almeno un metodo.
- Fare poi degli esempi di utilizzo della classe istanziando almeno due oggetti e stampando a schermo il valore delle proprietà. -->


<?php

// IMPOSTA LA STRUTTURA DELLA CLASSE

class Movie {
    
    public $titolo;
    public $genere;
    public $durata;
    public $lingua;
    public $anno;


    // IN QUESTO CASO DECIDO QUALI PROPRIETA' DIVENTANO OBBLIGATORIE AL FINE DI CREARE L'OGGETTO
    public function __construct($_titolo, $_genere){
        $this->titolo = $_titolo;
        $this->genere = $_genere;
    }


}

// CREA L'OGGETTO MADAGASCAR CON TUTTE LE PROPRIETA' DELLA CLASSE MOVIE

// IN QUESTO MODO CREO QUALSIASI OGGETTO CON DELLE PROPRIETA' OBBLIGATORIE


$madagascar = new Movie ('Madagascar', 'Cartone Animato');
$madagascar -> durata = 100 ;
$madagascar -> lingua = 'Italiano';
$madagascar -> anno = 2010 ;


$reLeone = new Movie ('Il Re Leone', 'Cartone Animato');
$reLeone -> durata = 120 ;
$reLeone -> lingua = 'Italiano';
$reLeone -> anno = 2010 ;


$aristogatti = new Movie ('Gli Aristogatti', 'Cartone Animato');
$aristogatti -> durata = 100 ;
$aristogatti -> lingua = 'Italiano,' ;
$aristogatti -> anno = 2010 ;


$up = new Movie ('Up', 'Cartone Animato');
$up -> durata = 120 ;
$up -> lingua = 'Italiano,' ;
$up -> anno = 2010 ;

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    
        
    <h3><?php echo $madagascar->titolo .' - ' .$madagascar->genere ;?></h3>
    <h3><?php echo $reLeone->titolo .' - ' .$reLeone->genere ;?></h3>
    <h3><?php echo $aristogatti->titolo .' - ' .$aristogatti->genere ;?></h3>
    <h3><?php echo $up->titolo .' - ' .$up->genere ;?></h3>




    
    
</body>
</html>