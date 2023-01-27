<div id="top"></div>


<!-- PROJECT SHIELDS -->
[![Contributors][contributors-shield]][contributors-url]
[![Stelle][stelle-shield]][stelle-url]
[![Visitatori][watchers-shield]][watchers-url]
[![Problemi][issues-shield]][issues-url]
[![LinkedIn][linkedin-shield]][linkedin-url]


<!-- LOGO DEL PROGETTO -->
<br />
<div align="center">
  <a href="https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL">
    <img src="public/img/logo.png" alt="Logo" width="80" height="80">
  </a>

<h2 align="center">API JSON RESTful</h2>

  <p align="center">
    Progettazione delle API per una startup nata per rendere più accessibili e comprensibili i servizi e i bonus statali ai cittadini.
    <br />
    <a href="https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL"><strong>Esplora i documenti »</strong></a>
    <br />
    <br />
    <a href="https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/">Visualizza demo</a>
    ·
    <a href="https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL/issues">Segnala un bug</a>
    ·
    <a href="https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL/issues">Richiedi funzionalità</a>
  </p>
</div>



<!-- INDICE -->
<details>
  <summary>Sommario</summary>
  <ol>
    <li>
      <a href="#informazioni-sul-progetto">Informazioni sul progetto</a>
      <ul>
        <li><a href="#sviluppato-con">Sviluppato con</a></li>
      </ul>
    </li>
    <li>
      <a href="#come-usare-le-api">Come usare le API</a>
      <ul>
        <li><a href="#api-prestazioni-offerte">API Prestazioni Offerte</a></li>
        <li><a href="#api-prestazioni-erogate">API Prestazioni Erogate</a></li>
        <li><a href="#altre-api">Altre API</a></li>
      </ul>
    </li>
    <li><a href="#extra-frontend">EXTRA: Frontend</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contatti">Contatti</a></li>
    <li><a href="#ringraziamenti">Ringraziamenti</a></li>
  </ol>
</details>



<!-- SUL PROGETTO -->
## Informazioni sul progetto

<p>Questo progetto consiste nella creazione di API JSON RESTful per l’implementazione di una dashboard che visualizzi il tempo risparmiato dai cittadini nella fruizione dei servizi di una startup. La startup Bonny è nata per rendere più accessibili e comprensibili i servizi e i bonus statali ai cittadini.</p>

<p align="right">(<a href="#top">torna all'inizio</a>)</p>


### Sviluppato con

* [PHP](https://www.php.net/)
* [MySQL](https://www.mysql.com/)
* [HTML](https://html.spec.whatwg.org/)
* [CSS](https://www.w3.org/TR/CSS/)

<p align="right">(<a href="#top">torna all'inizio</a>)</p>



<!-- ESEMPI DI UTILIZZO -->
## Come usare le API

<p>Le API create consentono l’inserimento, la modifica e la cancellazione di una tipologia di prestazione offerta e di una prestazione erogata. Inoltre permettono la visualizzazione del tempo risparmiato e di filtrare per data e per tipologia di prestazione erogata.</p>

<p align="right">(<a href="#top">torna all'inizio</a>)</p>


### API Prestazioni Offerte

<p>Per l’INSERIMENTO di una nuova prestazione offerta deve essere utilizzato il seguente URL: http://localhost:8888/create_po</p>
<p>Con il seguente Body in JSON:</p>
<code>{
    "Nome": "Bonus22",
    "Tempo": 30
}
</code>

[![Schermata Postman][screenshot-createpo]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)


<p>Per la MODIFICA di una nuova prestazione offerta deve essere utilizzato il seguente URL: http://localhost:8888/update_po</p>
<p>Con il seguente Body in JSON:</p>
<code>{
    "Nome": "Bonus cultura",
    "Tempo": 40
}
</code>

[![Schermata Postman][screenshot-updatepo]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p>Per la CANCELLAZIONE di una nuova prestazione offerta deve essere utilizzato il seguente URL: http://localhost:8888/delete_po</p>
<p>Con il seguente Body in JSON:</p>
<code>{
    "Nome": "Bonus22 «
}
</code>

[![Schermata Postman][screenshot-deletepo]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p align="right">(<a href="#top">torna all'inizio</a>)</p>


### API Prestazioni Erogate

<p>Per l’INSERIMENTO di una nuova prestazione erogata deve essere utilizzato il seguente URL: http://localhost:8888/create_pe</p>
<p>Con il seguente Body in JSON:</p>
<code>{
    "Data": "2023-01-21",
    "Tipologia": "Bonus20",
    "Quantita": 2
}
</code>

[![Schermata Postman][screenshot-createpe]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p>Per la MODIFICA di una nuova prestazione erogata deve essere utilizzato il seguente URL: http://localhost:8888/update_pe</p>
<p>Con il seguente Body in JSON:</p>
<code>{
    "Data": "2023-01-21",
    "Tipologia": "Bonus20",
    "Quantita": 2
}
</code>

[![Schermata Postman][screenshot-updatepe]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p>Per la CANCELLAZIONE di una nuova prestazione erogata deve essere utilizzato il seguente URL: http://localhost:8888/delete_pe</p>
<p>Con il seguente Body in JSON:</p>
<code>{
    "Data": "2023-01-09",
    "Tipologia": "Bonus cultura"
}
</code>

[![Schermata Postman][screenshot-deletepe]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p align="right">(<a href="#top">torna all'inizio</a>)</p>


### Altre API

<p>Per FILTRARE in base alla DATA delle prestazioni erogate deve essere utilizzato il seguente URL: http://localhost:8888/filter_date</p>
<p>Con il seguente Body in JSON:</p>
<code>{
    "Data_Iniziale": "2023-01-10",
    "Data_Finale": "2023-01-21"
}
</code>
<p>Come risposta avremo l’elenco delle prestazioni erogate con data tra Data_Iniziale e Data_Finale e il tempo risparmiato con quelle prestazioni erogate.</p>

[![Schermata Postman][screenshot-filterdate]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p>Per FILTRARE in base alla TIPOLOGIA delle prestazioni erogate deve essere utilizzato il seguente URL: http://localhost:8888/filter_type</p>
<p>Con il seguente Body in JSON:</p>
<code>{
    "Tipologia": "Bonus10"
}
</code>
<p>Come risposta avremo l’elenco delle prestazioni erogate di quella tipologia e il tempo risparmiato con quelle prestazioni erogate.</p>

[![Schermata Postman][screenshot-filtertype]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p>Per visualizzare il TEMPO RISPARMIATO TOTALE delle prestazioni erogate deve essere utilizzato il seguente URL: http://localhost:8888/time_saved</p>
<p>Con il Body vuoto</p>
<p>Come risposta avremo direttamente il tempo risparmiato con tutte le prestazioni erogate.</p>

[![Schermata Postman][screenshot-timesaved]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p align="right">(<a href="#top">torna all'inizio</a>)</p>



<!-- ESEMPI DI UTILIZZO -->
## EXTRA: Frontend

<p> In aggiunta, anche se il progetto non lo richiedeva, è stato creato un frontend costituito da tre pagine.

<p>Una principale «Dashboard» con riportato il tempo risparmiato totale di tutte le prestazioni erogate e la possibilità di filtrare per data e per tipologia.</p>

[![Schermata applicazione][screenshot-progetto1]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)
[![Schermata applicazione][screenshot-progetto2]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)
[![Schermata applicazione][screenshot-progetto3]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p>Una secondaria «Tabelle» dove sono riportate le tabelle con le prestazioni offerte, erogate e una con l’unione tra le due tabelle.</p>

[![Schermata applicazione][screenshot-progetto4]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p>Infine un’altra pagina secondaria «Configurazione» dove è possibile inserire e cancellare le prestazioni offerte ed erogate.</p>

[![Schermata applicazione][screenshot-progetto5]](https://jacopovaccarini.github.io/Start2Impact_PHP_MySQL/)

<p align="right">(<a href="#top">torna all'inizio</a>)</p>


<!-- ROADMAP -->
## Roadmap

- [x] Implementare il frontend dell'applicazione
- [ ] Implementare nel frontend la possibilità di filtrare per data e tipologia contemporaneamente
- [ ] Implementare nel frontend la possibilità di modificare le prestazioni offerte ed erogate

Andare sulla pagina [issues](https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL/issues) per un elenco completo delle funzionalità proposte (e dei problemi noti).

<p align="right">(<a href="#top">torna all'inizio</a>)</p>



<!-- CONTATTO -->
## Contatti

Jacopo Vaccarini - [info@jacopovaccarini.it](mailto:info@jacopovaccarini.it)

Collegamento al progetto: [https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL](https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL)

<p align="right">(<a href="#top">torna all'inizio</a>)</p>



<!-- RINGRAZIAMENTI -->
## Ringraziamenti

* [MySQL](https://www.mysql.com/)

<p align="right">(<a href="#top">torna all'inizio</a>)</p>

<!-- LINK E IMMAGINI MARKDOWN -->
[contributors-shield]: https://img.shields.io/github/contributors/jacopovaccarini/Start2Impact_PHP_MySQL.svg?style=for-the-badge
[contributors-url]: https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL/graphs/contributors
[stelle-shield]: https://img.shields.io/github/stars/jacopovaccarini/Start2Impact_PHP_MySQL.svg?style=for-the-badge
[stelle-URL]: https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL/stargazers
[watchers-shield]: https://img.shields.io/github/watchers/jacopovaccarini/Start2Impact_PHP_MySQL.svg?style=for-the-badge
[watchers-url]: https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL/watchers
[issues-shield]: https://img.shields.io/github/issues/jacopovaccarini/Start2Impact_PHP_MySQL.svg?style=for-the-badge
[issues-URL]: https://github.com/jacopovaccarini/Start2Impact_PHP_MySQL/issues
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/jacopo-vaccarini
[screenshot-createpo]: public/img/CrearePrestazioneOfferta.png
[screenshot-updatepo]: public/img/AggiornarePrestazioneOfferta.png
[screenshot-deletepo]: public/img/CancellarePrestazioneOfferta.png
[screenshot-createpe]: public/img/CrearePrestazioneErogata.png
[screenshot-updatepe]: public/img/AggiornarePrestazioneErogata.png
[screenshot-deletepe]: public/img/CancellarePrestazioneErogata.png
[screenshot-filterdate]: public/img/FiltrareData.png
[screenshot-filtertype]: public/img/FiltrareData.png
[screenshot-timesaved]: public/img/TempoRisparmiato.png
[screenshot-progetto1]: public/img/screenshot1.png
[screenshot-progetto2]: public/img/screenshot2.png
[screenshot-progetto3]: public/img/screenshot3.png
[screenshot-progetto4]: public/img/screenshot4.png
[screenshot-progetto5]: public/img/screenshot5.png
