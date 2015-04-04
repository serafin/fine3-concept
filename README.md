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

# to think
- subcontent
- nowa struktura folderow, w httpdocs tylko konieczne pliki
- `f_db_mysql_table`
- f_m deprecated
- 
