# Bandi Aggregator

Bandi Aggregator è una web application che raccoglie e centralizza i bandi di ricerca pubblicati da università, enti di ricerca e istituzioni italiane come CNR, INFN, ENEA e altri atenei.

## Obiettivo

Il progetto nasce per semplificare l’accesso ai bandi di ricerca, evitando la necessità di consultare manualmente i singoli siti istituzionali.

## Funzionalità attuali (MVP)

- Raccolta automatica di bandi da fonti selezionate tramite scraper
- Salvataggio in database dei dati essenziali:
  - titolo del bando
  - link alla pagina ufficiale
  - ente pubblicante
  - data di pubblicazione
- Interfaccia web per visualizzare l’elenco dei bandi
- Filtri base per ente
- Ordinamento per data di pubblicazione
- Aggiornamento periodico tramite comando Artisan

## Architettura

- Backend: Laravel
- Database: MySQL
- Scraping: Guzzle + Symfony DomCrawler
- Frontend: Blade + Bootstrap

## Struttura logica

- Scraper dedicati per ciascuna fonte
- Servizio centrale per il salvataggio e la deduplicazione dei dati
- Scheduler per l’esecuzione automatica dello scraping

## Stato del progetto

Versione MVP funzionante. Il sistema attualmente supporta scraping base e visualizzazione dei bandi. Sono previste evoluzioni per migliorare il parsing, l’affidabilità degli scraper e le funzionalità di ricerca e notifica.

## Sviluppi futuri

- Miglioramento dei parser per ogni fonte
- Sistema di notifiche (email/Telegram)
- Tag automatici per area scientifica
- Ricerca avanzata e filtri evoluti
- Dashboard amministrativa