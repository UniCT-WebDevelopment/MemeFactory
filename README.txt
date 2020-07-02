Nome del progetto MEMEGEN - Generatore di Meme 
Testato e funzionante per Google Chrome.




Obiettivo del progetto: Creare un'applicazione di tipo Client/Server per la creazione di meme(Video Divertenti). L'applicativo dovrà prendere in input un video dal dispositivo e, tramite chiamata asincrona al server, restituire un video meme con l'aggiunta in coda di uno specifico video( in questo caso il video Small_worked.mp4) e dunque poterlo scaricare.




Prerequisiti minimi dell'applicativo:

1) Modifica opportuna del file php.ini( modificare il tempo di timeout automatico e grandezza file consentita)
2) Installare la libreria FFMPEG: Libreria per la modifica di audio e video, streaming live, muxing/demuxing file.
3) Struttura Client/Server
4) Server Apache
5) Testato su Php v. 7.5.4
6) Creare due cartelle: assets e works. Nella cartella assets va inserito il file "small_worked.mp4"



SVILUPPO DELL'APPLICATIVO

L'app è composta da una cartella "works" dove vengono fatte le operazioni lanciate alla libreira FFMPEG che vedremo nel
dettaglio dispositivo e dai seguenti file:

INDEX.HTML

Il file contiene una navbar con i collegamenti ad un blocco con la spiegazione dell'app e provvisoriamente il solo form per il video "direct by Robert wiede". Entrambi i form sono gestiti da javascript per avere l'effetto a comparsa.Nel menù relativo al form di invio del video al server abbiamo un bottone per il caricamento del video ed un bottone che lancia la chiamata asincrona XMLHTTPRequest.Nel form è presente una barra di progresso che indica il caricamento del file verso il server.Il file .js gestisce i messaggi provenienti dal server. Al termine dell'elaborazione del file Catch-file.php, reindirizzo verso il file download che scansiona la directory e mostra il file da scaricare. La funzione di cancellazione dei file di output dopo il download non è stata implementata.

STYLE.CSS

File css con stili e proprietà degli elementi della pagina html. Pagina Responsive

FILE-UPLOAD-PROGRESS-BAR-JS

Il file .js contiene la gestione della progress bar per l'upload dei file nel server, la gestione dei componenti della navbar
e la chiamata XMLHTTPRequest asincrona per l'elaborazione del file. La chiamata viene gestita con l'invio dei dati tramite formData.


CATCH-FILE.PHP

Il file contiene le operazioni per le chiamate FFMPEG. Prende in input il file proveniente dal formData, controlla l'estensione e viene processato dal comando -video_track_timescale di FFMPEG per modificare il timestamp del file.Operazione necessaria per il comando concat di FFMPEG.
Dopo la chiamata exec verrà creato un file .txt contenente i nomi dei file da unire nella sequenza esatta. Il file .txt è necessario per il comando concat.
La chiamata exec contenente concat unisce il file generato da -video_track_timescale e il video di coda. L'output sarà generato nella stessa cartella /works. La pagina php al termine dell'esecuzione effettua un reindirizzamento alla pagina download.php per scaricare il video generato. Nei commenti della pagina è presente la versione readfile() per il download con gli header necessari.

DOWNLOAD.PHP

Lo script legge la cartella /works e restituisce il nome del file generato da catch-file.php. L'utente ha la possibilità di scaricare il file o cancellarlo senza scaricarlo.

DELETE.PHP
 
Script che cancella il file dalla cartella /works. Viene richiamato dall'utente.


Sviluppi: Le future espansioni dell'applicativo sono  l'ampliamento del catalogo di Meme realizzabili e l'implementazione delle funzioni per  l'image editing.



Progetto di Alberto Facchi.
