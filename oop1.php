<?php
/*OOP
Ricordate:

1) Nome classe sempre al singolare

2) Prima lettera sempre maiuscola

3) Bisogna sempre scrivere in inglese (tutto)

La famosa azienda Talentform ha appena acquistato 5 aziende più piccole con sedi sparse in tutte il mondo.

Vi è stato chiesto di realizzare un sistema di monitoraggio fiscale per ognuna di queste Sedi.

Essendo dati finanziari, gli eventuali errori di logica devono rasentare lo 0.

Utilizzare, quindi, un approccio orientato agli oggetti per risolvere la traccia.

Esercizio 1
Creare una classe Azienda (Company) che abbia gli attributi public:

Nome: Nome della sede;
Sede: Stato in cui è ubicata la sede;
Totale Dipendenti (default=0): Numero di dipendenti assunti in quella sede.
Definire la funzione __construct() come visto a lezione per prendere in input i 3 attributi.*/

class Company
{
    //Attributi
    public $name;
    public $location;
    public $employees = 0;
    public static $count = 0;


    public static $average_monthly_salary = 1500;
    public static $total = 0;


    //Construttore
    public function __construct(string $name, string $location, int $employees)
    {
        $this->name = $name;
        $this->location = $location;
        $this->employees = $employees;
    }

    /*Utilizzando la classe Azienda appena creata, implementare un metodo in grado di stampare via terminale:
    `L'ufficio $this->nome con sede in $this->sede ha ben $this->dipendenti dipendenti.`
    Se il $this→dipendenti è > di 0. Altrimenti se i dipendenti sono 0 (valore di default) stampare:
    `L’ufficio $this->nome con sede in $this->sede non ha dipendenti`*/
    public function getInfo()
    {
        if ($this->employees > 0) {
            echo "L'ufficio " . $this->name . " con sede in " . $this->location . " ha ben " . $this->employees . " dipendenti.\n";
        } else {
            echo "L'ufficio " . $this->name . " con sede in " . $this->location . " non ha dipendenti.\n";
        }
    }


    public function getCost()
    {
        $tot = $this->employees * (self::$average_monthly_salary * 12);
        echo "Il costo annuale dell'ufficio " . $this->name . " è di €" . number_format($tot, 2, ',', '.') . ".\n";
    }
    public function registerCost()
    {

        $totalCost = $this->employees * (self::$average_monthly_salary * 12);
        self::$total += $totalCost;

        echo "Il costo annuale dell'ufficio " . $this->name . " è di €" . number_format($totalCost, 2, ',', '.') . ".\n";
        echo "Il costo totale per l'azienda HP attualmente è di €" . number_format(self::$total, 2, ',', '.') . ".\n\n";
    }
    public static function printCount()
    {
        echo self::$count;
    }

    public static function printCountFinal()
    {
        return self::$count;
    }
    public static function printTotal()
    {
        echo "Il costo totale assoluto per tutte le sedi dell'azienda HP è di €" . number_format(self::$total, 2, ',', '.') . ".\n";
    }
}
/*Una volta definita la classe, istanziare 5 Sedi con i rispettivi dati e controllare che siano 
stati correttamente memorizzati con un var_dump();
*/
//Istanzio i 5 Oggetti
$company1 = new Company('Apple', 'USA', 3);
$company2 = new Company('Barilla', 'ITA', 3);
$company3 = new Company('Nintendo', 'JAP', 5);
$company4 = new Company('Nokia', 'FIN', 10);
$company5 = new Company('Xiaomi', 'CHI', 0);

$companies = [$company1, $company2, $company3, $company4, $company5];


var_dump($companies);


foreach ($companies as $company) {
    $company->getInfo();
}

echo "\n";


foreach ($companies as $company) {
    $company->registerCost();
}

Company::printTotal();

/*Proseguendo con la classe appena creata Company, definire 1 attributo statico relativo a:
public static $stipendio_medio_mensile = 1500; average_monthly_salary
E implementare un nuovo metodo che, per ogni oggetto Azienda Istanziato, calcoli la 
spesa annuale in euro con la formula
numero dipendenti * ($stipendio_medio_mensile * 12)
e la stampi per ogni oggetto:
$tot = $this->dipendenti * (self::$stipendio_medio_mensile * 12);
echo "Il costo annuale dell'Ufficio $nome è di $tot Euro"*/
/*e successivamente un metodo (non nel costruttore, attenzione) in grado di calcolare di volta in volta tutti 
i totali:
Il costo annuale dell'Ufficio $nome è di XXXXXX Euro
Il costo totale per l'azienda HP3 attualmente è di XXXXXX Euro (Valore che aumenta ogni volta)
Adesso vogliamo conoscere quanto gravano queste 5 sedi all’azienda HP. Creare un attributo statico:
public static $totale = 0;
E di volta in volta somma in maniera ricorsiva il totale economico speso:
self::$total += $costo_totale_azienda
Dulcis in fundo, come ultimo task da eseguire, stampare nel terminale il totale assoluto di tutte le aziende 
1 sola volta, con un metodo statico.
Utilizzare un metodo statico attraverso la classe Company (No oggetto) e richiamarlo come visto a lezione.
*/