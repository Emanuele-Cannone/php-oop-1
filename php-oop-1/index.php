<?php
// QUESTA GRIGLIA E' IMPOSTATA E SARA' USATA SEMPRE COSI, POSSIAMO CAMBIARE I NOMI DELLE VARIABILI MA 
// L'IMPOSTAZIONE RIMANE SEMPRE LA STESSA


$nomeServer = "localhost:8889"; // VEDI LA PAGINA INIZIALE DI MAMP PER COMPILARE I DATI
$nomeUtente = "root";
$pwUtente = "root";
$nomeDb = "dbhotel"; // QUI VA INSERITO IL DB CHE VUOI CONSULTARE

// Connect
// IN QUESTO CREIAMO UN ISTANZA IN GRADO DI EFFETTUARE L'ESTRAZIONE DEI DATI CON I PARAMETRI CHE ABBIAMO PASSATO SOPRA
$consultaDb = new mysqli($nomeServer, $nomeUtente, $pwUtente, $nomeDb);

// Check connection
// ADESSO ANDIAMO A FARE DELLE VERIFICHE 


// FACCIAMO UN CONTROLLO: 
if ($consultaDb && $consultaDb->connect_error) { // SE $consultaDb ESISTE && $consultaDb HA DEGLI ERRORI DI CONNESSIONE

    // STAMPAMI 'CONNESSIONE FALLITA' .SPECIFICA DELL' ERRORE DI CONNESSIONE
    echo "Connection failed: " . $consultaDb->connect_error;
                                    // LA SINGOLA FRECCIA PERMETTE IL PASSAGGIO DELLA PROPRIETA'


} else { // ALTRIMENTI SE NON VENGONO RISCONTRATI ERRORI
    

    // SALVA NELLA VARIABILE SQL I DATI CHE VUOI PRENDERE - (VEDI ESEMPI MY-SQL)
    $roomFloor = "SELECT room_number, floor FROM stanze";

    //!!!!!!!!!!!!!!!!!! IL RISULTATO VA SEMPRE SALVATO IN VARIABILI!!!!!!!!!!!!!!!!!!!!!!

    // IL RISULTATO E' LA CONSULTAZIONE DELL'ARRAY 
    $risultato = $consultaDb->query($roomFloor);
                    // QUERY E' IL METODO CHE CI PERMETTE DI CREARE UNA VARIABILE CHE ABBIA QUEL CONTENUTO TRA LE PARENTESI


    // FACCIAMO UN ALTRO CONTROLLO:

    
    if ($risultato && $risultato->num_rows > 0) { // SE IL RISULTATO ESISTE && IL RISULTATO HA UN NUMERO DI RIGHE MAGGIORI DI 0

        // ASSEGNAMO IL RISULTATO AD OGNI RIGA

        // FINO A QUANDO:
        // ESISTONO RIGHE DA ASSEGNARE ALLA VARIABILE $riga\
        while($riga = $risultato->fetch_assoc()) {
                            // FETCH_ASSOC E' IL METODO CHE MI PERMETTE DI ASSOCIARE OGNI RISULTATO ESISTENTE

            // STAMPA TUTTO QUELLO CHE VUOI DALLA VARIABILE RIGA
            echo "Stanza N. ". $riga['room_number']. " piano: ".$riga['floor'];

        }

        
    } elseif ($result) { // ALTRIMENTI SE SOLAMENTE ($RISULTATO) ESISTE VUOL DIRE CHE NON CI SONO RIGHE IN QUELLA TABELLA

        echo "0 results";

        
    } else { // ALTRIMENTI VUOL DIRE CHE ABBIAMO SBAGLIATO QUALCOSA

        echo "query error";

    }

    // QUESTO SERVE PER CHIUDERE LA CHIAMATA AL DATABASE
    $consultaDb->close();
}
