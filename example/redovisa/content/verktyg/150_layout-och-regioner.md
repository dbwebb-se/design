Layout och regioner
===========================

När du nu skall styla din webbplats så underlättar det att veta hur sidan är uppdelad.

Den struktur som ramverket använder för webbsidorna är en gemensam layout för alla webbsidor och där layouten är indelad i regioner.

Till varje region kan man lägga innehåll och då visas regionen med dess innehåll.



Konfiguration och gemensam bas 
---------------------------

När den resulterande webbsidan renderas så används en gemensam sidstruktur, vi kallar det webbsidans layout. I kursen använder vi en gemensam layout för att rendera alla sidor på webbplatsen.

I konfigurationsfilen `config/page.php` finns alla detaljer om den layout som används. Det är en uppsättning standardvyer som läggs till i webbsidans regioner. I konfigurationsfilen finns också information om den template-fil som används som bas för att rendera sidan.

I vårt fall renderas hela layouten med hjälp av templatefilen som är definierad i konfigurationsfilen.

```php
return [
    "layout" => [
        "template" => "anax/v2/layout/dbwebb_se",
```

Man kan studera källkoden i templatefilen då den ligger under `view/` katalogen.



Template-fil för layouten
---------------------------

Templatefilen för layouten styr den html-kod som generas. I vår templatefil delas sidan in i regioner där varje region har en grundstruktur av divar som underlättar styling av sidan.

```html
<!-- flash -->
<?php if (regionHasContent("flash")) : ?>
<div class="outer-wrap outer-wrap-flash">
    <div class="inner-wrap inner-wrap-flash">
        <div class="row">
            <div class="region-flash">
                <?php renderRegion("flash")?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
```

Alla regioner har samma grundstyle, det innebär at tman enkelt kan styla alla regioner genom att till exempel använde klasserna `.outer-wrap`, `inner-wrap` och `row` för att ge sidan en viss bredd.

Regionens innehåll wrappas av en div som börjar på klassnamnet `.region-`.

Innehållet som läggs i regionen bestäms av vilken templatefil som används. Alla templatefiler ligger under katalogen `view/`. Vill man skapa egna templatefiler så tar man enklast en kopia av de som ligger där och utgår den den

Html-koden ovan generaras endast om det finns något innehåll i regionen. Ramverket lägger till innehåll i de regioner som vi anger när vi skapar en sida. Regionen `main` innehåller sidans huvudsakliga innehåll.



Regioner som finns
---------------------------

Layouten är flexibel på det sättet att den innehåller flera regioner och renderar dem endast om de har ett innehåll. Det betyder att sidan kan ha en, två eller tre kolumner för det huvudsakliga innehållet, rent innehållsmässigt sätt.

Här är ett par länkar till testsidor som visar vilka regioner som stöds av nuvarande layout.

* Endast [main samt layoutens grundläggande vyer](./../demo/main?regions).
* Samtliga regioner och [main med vänster kolumn](./../demo/main-sidebar-left?regions).
* Samtliga regioner och [main med höger kolumn](./../demo/main-sidebar-right?regions).
* Samtliga regioner och [main med tre kolumner](./../demo/main-three-columns?regions).



Visa regioner
---------------------------

Du kan lägga till querysträngen `?regions` på godtycklig sida för att låta ramverket visa upp de regioner som finns genom att styla dem med färger.

Klicka på länken [visa denna sida med regioner](verktyg/layout-och-regioner?regions) för att visualisera vilka regioner som finns på denna sidan.

Vetskapen om regioner kan underlätta för dig när du stylar webbplatsen.
