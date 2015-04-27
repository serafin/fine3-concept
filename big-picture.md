podstawa aplikacji:
--- begin ---
- auto load vendor/Fine/src
- index.php utworzenie obiektu aplikacji
 - zaladowanie modulow
 - utworznie glownego kontenera
 - odpalanie eventu bootstrap
--- end ---         

App\Module->onAppBootstrap - ta metoda jest front controllerem
   tworzy router, przez module menadzera , delegejtue konfiguracje routera wszystkim modulom
   router sie uruchamia
   potem dispatcher
   response Send
   

  