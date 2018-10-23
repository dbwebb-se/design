Styleväljare
===========================

När man jobbar med olika stylesheets för en webbplats så är det bra att ha en enkel möjlighet att skifta mellan olika stylesheets.

I ramverket finns en inbyggd styleväljare där du kan välja vilken stylesheet som används för att styla webbplatsen.

Du når styleväljaren via länken [`style`](style).



Välj bland stylesheets
--------------------------

Styleväljaren läser upp alla stylesheets som finns i katalogen `htdocs/css`. Ligger det flera med samma namn (minifierad och ominifierad) så väljer den att visa den som är minifierad.

Den valda stylen lagras i sessionen så det är bara du själv som ser vilken aktiv style du valt.



Välj style via querysträngen
--------------------------

Du kan välja att byta stylesheet genom att skicka med en del av querysträngen som `?style=dbwebb-se`. Då byter styleväljaren till den stylesheet som motsvaras av `css/dbwebb-se.min.css` eller `css/dbwebb-se.css`, beroende av vilken som finns tillgänglig.

Du kan alltså själv skapa en länk till en viss sida, lägga till `?style=kmom01`, ge länken till någon och de kommer se sidan med den stylesheeten vald.

För att nollställa stylesheetväljaren så använder du `?style=none`.

Här är en länk som leder till [denna sidan inklusive stylen satt till kmom01](verktyg/stylevaljare?style=kmom01).

Du kan återställa stylen till [default style via denna länken](verktyg/stylevaljare?style=none).



Aktivera standard stylesheet
--------------------------

Den stylesheet som är standard stylesheet bestäms i konfigurationsfilen `config/page.php`.

Filen `config/page.php` innehåller den standardlayout som används till webbplatsen tillsammans med ett antal vyer som alltid renderas tillsammans med varje sida. Det är vyer för header, footer, navbar och liknade.

Du kan redigera vilken standard stylesheet som används. Konfigurationsfilen ser ut ungefär så här där du skall ändra.

```php
return [
    "layout" => [
        "data" => [
            "stylesheets" => [
                // Change here to set another default stylesheet
                "css/dbwebb-se.min.css",
                //"css/kmom01.css",
            ],
```

Pröva till exempel att ta bort kommentaren `//"css/kmom01.css"` och sätt en kommentar framför `"css/dbwebb-se.min.css"`. Ladda sedan om sidan och du bör nu ha en ny standar style för din webbplats.
