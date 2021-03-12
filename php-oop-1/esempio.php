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


// var_dump($consultaDb);


// object(mysqli)[1]
//   public 'affected_rows' => int 0
//   public 'client_info' => string 'mysqlnd 7.4.12' (length=14)
//   public 'client_version' => int 70412
//   public 'connect_errno' => int 0
//   public 'connect_error' => null
//   public 'errno' => int 0
//   public 'error' => string '' (length=0)
//   public 'error_list' => 
//     array (size=0)
//       empty
//   public 'field_count' => int 0
//   public 'host_info' => string 'localhost:8889 via TCP/IP' (length=25)
//   public 'info' => null
//   public 'insert_id' => int 0
//   public 'server_info' => string '5.7.32' (length=6)
//   public 'server_version' => int 50732
//   public 'sqlstate' => string '00000' (length=5)
//   public 'protocol_version' => int 10
//   public 'thread_id' => int 4717
//   public 'warning_count' => int 0




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

            // var_dump($riga);

            // array (size=2)
                // 'room_number' => string '100' (length=3)
                // 'floor' => string '1' (length=1)

            // Stanza N. 100 piano: 1



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
