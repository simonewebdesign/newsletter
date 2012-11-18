NEWSLETTER
==========

Applicazione indipendente per l'invio di newsletter.
----------------------------------------------------

![newsletter database schema](https://raw.github.com/simonewebdesign/newsletter/master/db/schema.png)

File                             Descrizione
- `index.php`                  file principale. effettua un redirect alla root del sito. 
- `config.php`                 file di configurazione.
- `db_conn.php`                connessione al database tramite driver PDO.
- `template.html`              template della newsletter.
- `send.php`                   processa l'invio di una singola newsletter.
- `subscribe.php`              form per l'iscrizione alla newsletter.
- `unsubscribe.php`            form per cancellare l'iscrizione alla newsletter.
- `statistics.php`             statistiche generali sulle newsletter inviate.

- `Newsletter.php`             classe Newsletter.
    - `newsletters.php`           mostra le newsletter.
    - `newsletter_create.php`     crea una nuova newsletter.
    - `newsletter_read.php`       mostra il contenuto in anteprima di una singola newsletter.
    - `newsletter_update.php`     aggiorna il contenuto di una singola newsletter.
    - `newsletter_delete.php`     elimina una singola newsletter.
    - `_newsletter_form.php`      contiene il form di inserimento/modifica di una newsletter.
    
- `User.php`                   classe User.
    - `users.php`                 mostra la mailing list.
    - `user_create.php`           crea un nuovo user.
    - `user_read.php`             mostra i dati di un singolo user.
    - `user_update.php`           aggiorna i dati di un singolo user.
    - `user_delete.php`           elimina un singolo user.
    - `_user_form.php`            contiene il form di inserimento/modifica di un utente.


Una Newsletter è composta dai seguenti attributi:

Attributo             Descrizione
- `id`                id univoco progressivo.
- `title`             titolo della newsletter, che poi sarà l'oggetto della mail.
- `description`       descrizione.
- `is_sent`           indica se la newsletter è già stata spedita.
- `is_deleted`        indica se la newsletter è stata cancellata.
- `params`            elementi della newsletter.
- `created_at`        data di creazione.
- `updated_at`        data ultima modifica.
- `sent_at`           data di invio.


Una Resource è composta dai seguenti attributi:

Attributo             Descrizione
- `id`                id univoco progressivo.
- `mime_type`         indica la tipologia di media.
- `path`              indica la posizione sul file system.
- `created_at`        data di creazione.
- `updated_at`        data ultima modifica.
- `newsletter_id`     id della newsletter a cui è associata l'immagine.


Newsletter e Resource sono legati dalla seguente relazione:
`resource belongs_to newsletter`


Un User è composto dai seguenti attributi:

Attributo             Descrizione
- `id`                id univoco progressivo.
- `name`              nome (o pseudonimo), che poi sarà il destinatario della newsletter.
- `email`             email del destinatario.
- `is_active`         indica se l'utente è attivo o se è stato cancellato.
- `is_subscribed`     indica se l'utente è iscritto alla newsletter.
- `has_received_mail` indica se l'utente ha già ricevuto la newsletter.
- `created_at`        data di creazione.
- `updated_at`        data ultima modifica.
- `last_seen_at`      data dell'ultima volta che l'utente ha letto la newsletter.
- `list_id`           id della lista a cui appartiene.


Una List è composta dai seguenti attributi:

- `id`                id univoco progressivo.
- `name`              nome descrittivo della lista.


User e List sono legati dalla seguente relazione:

`list has_many users`
`user belongs_to list`


Una Entry è composta dai seguenti attributi:

Attributo           Descrizione
- `id`              id univoco progressivo
- `user_id`         l'utente che ha richiesto la risorsa
- `resource_id`     la risorsa richiesta dall'utente
- `requested_at`    data e ora in cui è stata richiesta la risorsa.
- `ip_address`      indirizzo IP dell'utente
- `user_agent`      browser e sistema operativo dell'utente




Descrizione funzionamento
-------------------------

Chiunque conosca il link di accesso all'applicazione, può effettuare un'azione di tipo **CRUD**+**S** ( **C**reate, **R**ead, **U**pdate, **D**elete + **S**end).
Per effettuare un'azione basta entrare nella `index.php` e cliccare su una delle azioni relative ad una singola newsletter, disponibili a destra.
La newsletter verrà costruita scegliendo titolo, descrizione e parametri.
La mailing list sarà composta fondamentalmente da nome ed email. Esempio: "Pinco Pallino" <pinco@pallino.net>.
I parametri - almeno per il momento - possono essere solo semplici immagini.
Il programma consente di inviare una sola newsletter alla volta. Assicurarsi quindi di aver inviato correttamente tutta la newsletter a tutti i destinatari, prima di iniziare un nuovo invio.
Il template si può modificare dal file `template.html`, ed è lo stesso per ogni newsletter. C'è tuttavia la possibilità di creare un template personalizzato per la newsletter dando in input direttamente il codice HTML.
Dalla versione 0.6 è possibile aggiungere un'immagine personalizzata, e il caricamento avviene dinamicamente (non più tramite FTP) e l'immagine viene salvata come Resource nel database, mentre il file binario viene salvato nella cartella `uploads`.


Integrazioni future
-------------------

Successivamente sarà possibile salvare più tipi di template, ed ad ogni newsletter sarà possibile associare un template preesistente.
Relazione di tipo 1 a N

`template has_many newsletters`
`newsletter belongs_to template`



### INVIO VELOCE (quick.php)

##### CONSIDERAZIONI

Una newsletter deve prima essere creata per poter essere spedita: servono quindi oggetto e immagine.
Deve esserci la possibilità di creare un template on-the-fly.
Anche una lista deve esistere prima di poter spedire la newsletter.
Deve esserci la possibilità di crearne una on-the-fly.

##### 3 PASSAGGI

1. Scegli la mailing list: []
1,5. oppure creane una nuova (scegli nome e aggiungi indirizzi) -> ti manda a `list_create.php`, e torna indietro.

2. Scegli la newsletter: []
2,5. oppure creane una nuova (scegli oggetto, carica immagine e facoltativamente incolla codice HTML) --> ti manda a `newsletter_create.php`, e torna indietro.

3. Invia.



### STATISTICHE

È possibile leggere statistiche sull'utilizzo della newsletter da parte degli utenti della mailing list, dalla pagina `statistics.php`.

Esempio:

(per ogni newsletter)
Newsletter N° #{id}                             #{subject}
Utenti che hanno ricevuto la newsletter:        #{}
Utenti che hanno letto la newsletter:           #{}
Utenti che non hanno letto la newsletter:       #{}


Lista             Attivi   Non attivi  Totale
Prova             2
Test              2239
Esempio           680
Totale            2845


Browser usage
Rank Browser         Count
1.   firefox         230
2.   chrome          194
3.   explorer        95


Top 10 most active users
Rank User            Count
1.   foo@bar.com     12
2.   john@doe.net    9
3.   info@example.it 7


