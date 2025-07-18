## OOP

Ricordate:

*1) Nome classe sempre al singolare*

*2) Prima lettera sempre maiuscola*

*3) Bisogna sempre scrivere in inglese (tutto)*

---

La famosa azienda Talentform  ha appena acquistato 5 aziende più piccole con sedi sparse in tutte il mondo.

Vi è stato chiesto di realizzare un sistema di monitoraggio fiscale per ognuna di queste Sedi.

Essendo dati finanziari, gli eventuali errori di logica devono rasentare lo 0.

Utilizzare, quindi, un approccio orientato agli oggetti per risolvere la traccia.

## Esercizio 1

Creare una classe Azienda (Company) che abbia gli attributi public:

- Nome: Nome della sede;
- Sede: Stato in cui è ubicata la sede;
- Totale Dipendenti (default=0): Numero di dipendenti assunti in quella sede.

Definire la funzione __construct() come visto a lezione per prendere in input i 3 attributi.

---

## Esercizio 2

Una volta definita la classe, istanziare 5 Sedi con i rispettivi dati e controllare che siano stati correttamente memorizzati con un var_dump();

```php
//Istanzio i 5 Oggetti
$company1 = new Company('Apple', 'USA', 3);
$company2 = new Company('Barilla', 'ITA', 3);
$company3 = new Company('Nintendo', 'JAP', 5);
$company4 = new Company('Nokia', 'FIN', 10);
$company5 = new Company('Xioami', 'CHI', 3);

var_dump($company1); //ecc
```

---

## Esercizio 3

Utilizzando la classe Azienda appena creata, implementare un metodo in grado di stampare via terminale:

`L'ufficio $this->nome con sede in $this->sede ha ben $this->dipendenti dipendenti.`

Se il $this→dipendenti è > di 0. Altrimenti se i dipendenti sono 0 (valore di default) stampare:

`L’ufficio $this->nome con sede in $this->sede non ha dipendenti`

## Esercizio 4

Proseguendo con la classe appena creata Company, definire 1 attributo statico relativo a:

```php
//Attributi

public static $stipendio_medio_mensile = 1500;
```

E implementare un nuovo metodo che, per **ogni** oggetto Azienda Istanziato, calcoli la spesa annuale in euro con la formula

**numero dipendenti * ($stipendio_medio_mensile * 12)**

e la stampi per ogni oggetto:

```php
$tot = $this->dipendenti * (self::$stipendio_medio_mensile * 12);

echo "Il costo annuale dell'Ufficio $nome è di $tot Euro"

```


## Esercizio 5

e successivamente un **metodo (non nel costruttore, attenzione)** in grado di calcolare di volta in volta tutti i totali:

```php
Il costo annuale dell'Ufficio $nome è di XXXXXX Euro
Il costo totale per l'azienda HP3 attualmente è di XXXXXX Euro (Valore che aumenta ogni volta)
```

Adesso vogliamo conoscere quanto gravano queste 5 sedi all’azienda HP. Creare un attributo statico:

```php
//Attributi
public static $totale = 0;
```

E di volta in volta somma in maniera ricorsiva il totale economico speso:

```php
self::$total += $costo_totale_azienda
```

## Esercizio 6

Dulcis in fundo, come ultimo task da eseguire, stampare nel terminale il totale assoluto di tutte le aziende **1 sola volta, con un metodo statico.**

Utilizzare un metodo statico attraverso la **classe Company (No oggetto)** e richiamarlo come visto a lezione.
