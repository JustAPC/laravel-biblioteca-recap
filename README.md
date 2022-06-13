1. creare progetto laravel sul pc
2. creare repo vuota
3. collegare repo con progetto
4. mi sposto con il temrinale dentro la cartella di lavoro
5. Pulisco la cache di npm se ci sono errori: ```npm cache clear --force```
6. lancio il comando ```npm i```
7. creare un nuovo DB
8. Collegare il DB tramite il file .env
9. Riavviare il server con ```php artisan serve```
10. Creare 2 cartelle nella cartella views per separare frontend da backend
11. modificare il percorso delle rotte in web.php e homeController
12. Modificare il file RouteServiceProvider con il path della nuova pagina di atterraggio dopo il Login
13. Eliminare il file homeCOntroller di default
14. Ricraere l'homeController con il terminale nella cartella Admin per separare frontend da backend nei controlli:
```php artisan make:controller Admin/HomeController```
11. Riscritto la funzione index del vecchio homeController nel nuovo HomeController
12. Creato nel web.php la struttura pe ril gruppo di rotte gestite da middleware
```
Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');
});
```
13. Creiamo il controller che gestisce le crud della tabella di riferimento: ```php artisan make:controller Admin/BookController -r```
14. Creiamo anche il modello, migration e seeder: ```php artisan make:model Models/Book -ms```
15. Rimosso ```composer remove fzaninotto/faker```
16. Installato faker: ```composer require fakerphp/faker```
17. Impostato la migration con le rispettive colonne dell'entità
18. Impostato il seeder utilizzando faker
19. creato un seeder per gestire lo user di default
20. Inseriti i seeder nel file databaseSeeder, all'interno di parentesi quadre se sono più di 1
```
    public function run()
    {
        $this->call(
            [
                UserSeeder::class,
                BookSeeder::class
            ]
        );
    }
```
21. Rilanciato da zero la migration: ```php artisan migrate:refresh --seed```
22. Aggiornato il file web.php per inserire il collegamento al controller Book:
```
    Route::middleware('auth')
        ->name('admin.')
        ->prefix('admin')
        ->namespace('Admin')
        ->group(function(){
            Route::get('/', 'HomeController@index')->name('home');
            Route::resource('books', 'BookController');
    });
```
23. Aggiornare index del bookController:
```
    public function index()
    {
        //Ricordiamoci di importare il modello App\Models\Book
        $books = Book::All();
        return view('admin.books.index', compact('books'));
    }
```
23. Creare il file della view nella cartella admin nella cartella books
24. Estendiamo il layout nella view
25. Richiamiamo i dati nella view con un ciclo forElse
26. Inserito il bottone nella action per ogni record per collegarci alla funzione show
27. impostata la funzione show nelle CRUD di book:
```
    public function show(Book $book)
    {
        return view( 'admin.books.show', compact('book') );
    }
```
28. Creato il file per la show nelle view strutturandone l'aspetto
29. creato bottone per la create nella index
30. impostato la funzione di create nelle CRUD
31. Inserito nuovo file create.blade.php nella view con all'interno il form per creare il nuovo book
32. IMpostata la funzione di create e store
```
    public function create()
    {
        return view('admin.books.create');
    }


       public function store(Request $request)
    {
        $data = $request->All();

        $book = new Book();
        $book->fill($data);
        $book->save();

        return redirect()->route('admin.books.index')->with('message', "Hai creato il nuovo libbro $book->title");
    }
```
33. imposta la edit insieme al bottone nella index per ottenere la pagina con il form di modifica
34. impostato la funzione update nelle CRUD
```

        public function edit(Book $book)
    {
        return view( 'admin.books.edit', compact('book') );
    }

       public function update(Request $request, Book $book)
    {
        $data = $request->All();

        $book->update($data);

        return redirect()->route('admin.books.show', compact('book'))->with('message', "Hai modificato il libbro $book->title correttamente");
    }
```
35. Nella edit abbiamo inserito li stessi campi del form della create abbinando la funzione old() nel value per ottenere i dati pregressi del DB di ogni campo
