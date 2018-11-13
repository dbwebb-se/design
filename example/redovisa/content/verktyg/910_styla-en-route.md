Styla en route
=========================

Ibland vill man ge en viss sida, eller en grupp av sidor, en speciell style. Om detta sidor kan identifieras av en route så finns det en body-klass som är användbar för detta syfte.



Route som body klass
-------------------------

Den layout vi jobbar med har valt att alltid lägga till en css-klass på body-elementet som motsvarar den route sidan har. Klassen börjar med "route-" och följs av routen där `/` är ersatt mer `-`.

Denna sidans route är `verktyg/styla-en-route` vilket motsvarar en body-klass av `route-verktyg-styla-en-route`.

För att dubbelkolla så kan du kan öppna devtools och inspektera vilka klasser som ligger på bodyelementet.



Styla en sida, en route
-------------------------

Då du har en css-klass på body-elementet så är det bara att lägga style på den klassen för att addera specifik style till den sidan.

```css
.route-verktyg-styla-en-route article {
    background-color: pink;
}
```



Styla flera underliggande sidor
-------------------------

Du vet att alla routes under `.route-verktyg*` hör till denna guiden. Då kan du använda den kunskapen för att styla samtliga undersidor med hjälp av [css attribute selector](https://developer.mozilla.org/en-US/docs/Web/CSS/Attribute_selectors).

Du kan styla alla sidor som har ett body element med en css-klass som börjar på en sträng, så här.

```css
body[class^=".route-verktyg"] {
    background-color: pink;
}
```

Attribute-selectorn `[class^="string"]` matchar alltså alla klasser som börjar på en "string".
