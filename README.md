# fine3-concept

Koncept architektury i wzorcow w fine3

# elastyczny serwis

To sposb budowania klas. 
Klasa sklada sie z parametrow/wlasciwosci, ktore mozna ustawic i pobrac. 
Z metod(y), ktore wykonuja zadanie, korzystajac z wczesniej przekazanych parametrow/wlasciwosci.
Takie metody nie posiadaja argumentow.
Z metod(y), ktore pobieraja wynik lub informuja czy zadanie zostalo wykonane. 

# 2 koncepcje
1. like zf2
  + wystarcyz folder przekopiowac i wlacz w glownym configu wlaczyc modul
  - wydajnosc
  - skomplikowana konfiguracja kolejnosci
2. like etc apache gitweb config link/connection/interweaving
  - instrukcja instalacji, krok po kroku
  + wydajnosc
  + prostota 
  + przjerzstosc
  + jasna konfiguracja kolejnosci

# moduly i rozszerzalne serwisy

data
css
js
repo
model

# zaleznosci i linkowania moduly
- routy kontrollery
- warstwa admin per module
- baza danych
- cssi jsi
- pluginy do importera
- importy, inputy
- dvc to bundle?

# to think
- subcontent
- nowa struktura folderow, w httpdocs tylko konieczne pliki
- `f_database_mysql_table`
- f_m deprecated
- nowy front controller, controller, dispatch
- nowy v helper head
- 


TODO lvl 5
==========

- jak router bedzie append prepend routy
- jak repozytoria ...
- 













===========

autoload
bootstrap
on{ModuleName}{Thing}{EventName}

./Module/{ModuleName}/Module.php(container)

$app->module->CloudMsg->module->Admin->
$app->module->each()->module->admin->on
$app->module->each()->module









