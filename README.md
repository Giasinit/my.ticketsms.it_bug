# Vulnerabilità del sistema di login di my.ticketsms.it

👋 Ciao a tutti, volevo condividere con voi questa mia scoperta: ho riscontrato una vulnerabilità nel sistema di login di my.ticketsms.it che vorrei portare alla vostra attenzione.

## Descrizione del problema

La piattaforma utilizza un codice numerico di 4/5 cifre come password per accedere al sistema di login, il che la rende molto vulnerabile agli attacchi di hacker. In pratica, ci sono solo 100.000 possibili combinazioni, il che significa che un hacker potrebbe facilmente indovinare la password corretta.

Inoltre, ho notato che il sistema di autenticazione non richiede un sistema bypass per il login, rendendo facile la penetrazione. Anche se viene utilizzato il sistema ReCaptcha, non funziona in questo caso specifico.

## Impatto della vulnerabilità

Quando si inserisce una password sbagliata, viene generato un cookie chiamato PHPSESSID, mentre quando si indovina la password, esce un nuovo cookie chiamato ts_JWT_PROMOTER_AUTH, che contiene un valore valido per un mese. In altre parole, un hacker può provare tutte le possibili combinazioni di password fino a quando non trova questo cookie. A quel punto, l'hacker avrebbe accesso all'account e potrebbe raccogliere informazioni personali e riservate, mettendo a rischio la sicurezza dei dati degli utenti.

Ho dimostrato la vulnerabilità attraverso un test su un account di un amico che si occupa di vendita di biglietti per eventi. In meno di un'ora sono stato in grado di accedere al suo account e ottenere informazioni personali di tutti i suoi clienti.

## Soluzione proposta

Per risolvere questa vulnerabilità, suggerisco di utilizzare password più complesse e di aggiungere un sistema di autenticazione più robusto che richieda l'utilizzo di un reCAPTCHA per il login.

Inoltre, sarebbe utile implementare un sistema di notifica per gli utenti in caso di accesso non autorizzato al proprio account.


## 👨‍💻 **Codice di esempio**

In quanto sviluppatore PHP, ho usato `php` per poter fare questo esempio, ho aggiunto vari commenti che permettono di capire come agire per provare. 😎

📢 Invito lo staff di ticketsms.it a farci caso. 💬

## 🤖 Come Usare il Programma?

Non preoccuparti, sono qui per aiutarti! Ecco i passi da seguire:

1. 💻 Assicurati di avere PHP installato sul tuo computer. Se stai utilizzando Windows, devi aggiungere il percorso di PHP alle variabili d'ambiente per poterlo usare da CMD.

2. 📁 Clona la repository e, naturalmente, lascia un fork/star. Poi, nella cartella clonata, modifica il file "hack.php" modificando i parametri della funzione "hack(123, '3999999999', 5)" per provare nuove combinazioni.

3. 🚀 Se sei un programmatore esperto, puoi creare un ciclo che proverà tutte le possibili combinazioni fino alla fine.

4. 📂 Nota: se il programma non funziona, ti consiglio di creare una cartella con il nome dell'account che stai cercando di violare. Per esempio, se stai cercando di violare l'account "3999999999", crea una cartella con lo stesso nome in cui inserire il file "hack.php". 

👨‍💻 Spero che queste istruzioni ti abbiano aiutato ad utilizzare il programma.

🔒 **Nota importante:** Questo programma è stato creato a scopo puramente informativo e non dovrebbe essere utilizzato per violare la privacy di altri utenti. 

📩 Ho segnalato il programma a TicketSMS tramite email, ma fino ad ora (9 maggio 2023, 22:00) non ho ricevuto alcuna risposta da loro. 

🚫 Non mi assumo alcuna responsabilità per l'utilizzo improprio di questo programma o per eventuali conseguenze legali derivanti dall'utilizzo del programma per scopi illeciti. Usalo a tuo rischio e pericolo!
