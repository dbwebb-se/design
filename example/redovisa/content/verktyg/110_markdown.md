Markdown
===========================

Denna filen är tänkt som en exempelfil för att visa olika konstruktioner med Markdown som stöds i ramverket.



Allmänt
---------------------------

Markdown är ett filformat som krediteras John Gruber som har skrivit [en introduktion till Markdown](https://daringfireball.net/projects/markdown/basics).

I ramverket används en PHP-parser för Markdown som heter [PHP Markdown](https://packagist.org/packages/michelf/php-markdown) Av Michel Fortin.

Som ett extra tillägg till Markdown Har Michel utvecklat stöd för [PHP Markdown Extra](https://michelf.ca/projects/php-markdown/extra/).



Länkar
---------------------------

Man lägger till länkar i Markdown med konstruktionen `[text som visas](länken)`.

> En absolut länk till [design-kursens hemsida](https://dbwebb.se/kurser/design), länken är komplett inklusive starten med `http://`.

När man länkar inom ramverket så anger man länken som relativ htdocs-katalogen.

* Här är en länk som leder till [bild-katalogen img/](img) som ligger i `htdocs/img`.
* Här är en liknande länk som leder till [style-katalogen css/](css) som ligger i `htdocs/css`.
* Här är en länk som leder till [redovisningssidan för kmom01](redovisning/kmom01) som matchas av Markdown-filen `content/redovisning/01_kmom01.md`.



Bilder med Markdown
---------------------------

Du kan länka till en bild med Markdown genom att lägga till ett utropstecken framför länken, så här `![Bildtext om vilken inte visas](bildlänk)`.

Du kan länka till bilder med en absolut sökväg såsom `http://` som leder till godtycklig resurs på nätet, eller med `/` som leder till roten av webbserverns installation (vilket _inte är samma_ som katalogen `htdocs`).

Här är en bild som hämtas från webbplatsen dbwebb.se.

![Bild på gammal dbwebb-server](https://dbwebb.se/image/fsync-giving-up-on-dirty.jpg?width=700)



Skriv HTML i Markdown
---------------------------

Du kan skriva ren HTML i Markdown, det kan vara bra när man vill göra något extra utan att känna sig hämmad av de begränsningar som Markdown har.

Här är ett par divar med bakgrundsfärg.

<div style="overflow: auto;">
    <div style=" background-color: #f00; width: 100px; height: 100px; float: left; margin: 8px; border: 1px solid #ccc;"></div>
    <div style=" background-color: #0f0; width: 100px; height: 100px; float: left; margin: 8px; border: 1px solid #ccc;"></div>
    <div style=" background-color: #00f; width: 100px; height: 100px; float: left; margin: 8px; border: 1px solid #ccc;"></div>
    <div style=" background-color: #333; width: 100px; height: 100px; float: left; margin: 8px; border: 1px solid #ccc;"></div>
    <div style=" background-color: #999; width: 100px; height: 100px; float: left; margin: 8px; border: 1px solid #ccc;"></div>
    <div style=" background-color: #fff; width: 100px; height: 100px; float: left; margin: 8px; border: 1px solid #ccc;"></div>
</div>
