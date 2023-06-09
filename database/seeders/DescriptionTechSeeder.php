<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DescriptionTechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologyDescription = [
            'HTML' => "(HyperText Markup Language): È il linguaggio di markup standard utilizzato per creare pagine web. Viene utilizzato per strutturare e organizzare il contenuto di una pagina, definire i diversi elementi e la loro presentazione.", 
            'CSS' => "(Cascading Style Sheets): È un linguaggio utilizzato per definire lo stile e la formattazione di un documento HTML. Consente di specificare il colore, la dimensione del testo, la disposizione degli elementi, l'aspetto visivo e molti altri aspetti della presentazione di una pagina web.", 
            'JavaScript' => "È un linguaggio di programmazione adatto per lo sviluppo di applicazioni web interattive. Viene utilizzato per aggiungere comportamenti dinamici alle pagine web, manipolare elementi HTML, gestire eventi, effettuare richieste asincrone al server e molto altro ancora.", 
            'PHP' => "(Hypertext Preprocessor): È un linguaggio di scripting ampiamente utilizzato per lo sviluppo di applicazioni web. PHP viene eseguito lato server e può essere incorporato all'interno del codice HTML. È noto per la sua facilità di integrazione con database, la creazione di pagine dinamiche e la gestione di formulari.", 
            'Laravel' => "È un framework PHP elegante e potente per lo sviluppo di applicazioni web. Fornisce una vasta gamma di funzionalità pronte all'uso, come il routing, l'ORM (Object-Relational Mapping), l'autenticazione, la gestione delle sessioni e molto altro. Laravel promuove la scrittura di codice pulito, leggibile e manutenibile.", 
            'MySQL' => "È un sistema di gestione di database relazionali (RDBMS) popolare e ampiamente utilizzato. MySQL offre un'ampia gamma di funzionalità per la gestione dei dati, l'organizzazione delle tabelle, la creazione di query complesse e l'ottimizzazione delle prestazioni. È spesso utilizzato in combinazione con PHP per lo sviluppo di applicazioni web basate su database."
        ];

        foreach ($technologyDescription as $name => $description) {
            $technology = Technology::where('name', $name)->first();
            if ($technology) {
                $technology->description = $description;
                $technology->save();
            }
        }
    }
}
