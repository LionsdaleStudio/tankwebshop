1 - Laravel new Projektneve (none, PhPUnit (1), mysql, yes (fusson az adatbázis)) 
    Vagy
        composer create-project laravel/laravel ProjektNeve
2, php artisan serve -> leteszteled hogy elindul-e a szerver
    2+1 composer require laravel/ui (ha fix bootstrap linkelést és auth kieget akarsz)
3, Layouts mappa / app.blade.php megcsinálása ( keret )
    ->ha nincs laravel/ui vagy rosszul működik, akkor BS5 linkek és valahol @yield('content')
        Contentbe jön minden aloldal.
4, Új modell létrehozása: php artisan make:model Modelneve --all
    (model, controller, store/updateModelneveRequest, Policy, Migration, Factory, Seedert hoz létre)
5, Migration fájlban (database/migration) a tábla létrehozása
6, Factory kitöltése (ha kell)
7, Seeder kitöltése fix vagy kamu adatokkal
            //Modellneve::factory(darabszám)->create();
            //Modellneve::factory()->create([
                "name" => 'Ricsi
            ]);
            //DB::table("táblaneve")->insert([
                ['name' => 'Ricsi', 'Magasság' => '197 cm'],
                ['name' => 'Balázs', 'Magasság' => '187 cm'],
            ]);

8, A seederek meghívása a databaseSeeder fájlban. A sorrend fontos.
    $this->call([
        SeederNeve::class,
        MasikSeeder::class,
    ]);
9, Adatbázis frisstése és feltöltése adatokkal: php artisan migrate:fresh --seed
    migrate -> az új migrációkat futtatja 
    fresh -> törli az összes táblát és újra létrehozza őket üresen
    --seed -> FELTÖLTI a databaseSeeder alapján, a táblákat.
10, web.php -> resource útvonalak generálása
    Route::resource('/urlNeve', ClassNeve::class); 
        -> use App\Http\Controllers\ClassNeve; legyen belinkelve
        -> php artisan optimize minden változtatás után
        -> ha van saját útvonalad ugyanebbe az osztályba, az hamarabb legyen mint a resource útvonal

--------------------------------------------------------------------------------------------------

11, Controller és a Views kitöltése párhuzamosan.
    - pl.: kitöltöd az index.php-t
    -> megcsinálod a modelneve/index.blade.php frontendet, stb.

    12, a STORE és UPDATE metódus előtt, a modellnek meg kell adni, hogy miket lehet kitölteni és miket használjon.
        -> use SoftDeletes;
        -> protected fillable = ['oszlop1neve', 'oszlop2neve', 'stb']; ->_token, fillable error lesz ha nem oldod meg.
    13, StoreModellneveRequest kitöltése
        - Authorize résznél return true; -> 403 Unauthorized error ha nem
        - rules() funkció kitöltése, validációra
        - input nevek és adatbázis nevek legyenek mindenhol ugyanazok
    14, frontend
        - @csrf minden POST metódusú formnál. (419 expired error ha nem van meg)

Repeat 11-14 as many times as you need

GIT LEKÉRÉSE
git clone https://github.com/LionsdaleStudio/AnimeFigureWebshop.git
utána composer.json -> install-ra kattints rá.
utána npm install
utánan .env fájl létrehozása, az example fájl átmásolása
utána php artisan key:generate és írd át az adatbázis adatokat jóra (mysql és adatbázisnév)


Hasznos parancsok:
php artisan optimize
php artisan route:list => útvonalak listázása
dd($valami) -> ugyanaz mint a var_dump és a console.log stb...

Tanácsok:

Minden elnevezésre figyelj
Modell neve: NAGY BETŰ egyesszám (pl.: Student)
url Modellneve többesszámban ('/students')
paraméterek neve és frontend átadások $student ha egy és $students ha több.
Tábla neve students 