---
views:
    flash:
        region: flash
        template: anax/v2/image/default
        data:
            src: "image/kabbe.jpg?w=1100&h=360&cf&f=pixelate,8,2&a=0,0,5,0"
---
Bildhantering med Cimage
=========================

Cimage är ett bildbehandlingsverktyg som är skrivet i PHP och använder PHPs inbyggda grafikbibliotek PHP GD.

Cimage följer med din installation av `me/redovisa` och du kan använda det i din webbplats för att behandla, beskära och modifiera bilder som du visar i webbplatsen.



Använd Cimage
-------------------------

Cimage handlar om att använda bildlänken och sedan modifiera den för att behandla bilden på önskad sätt.

Låt oss ta ett exempel.

Vi har en bild som vi placerar i `img/kabbe.jpg`.

Vi visar upp bilden i denna text och lägger en css-style på bilden som säger `max-width: 600px`.

```html
<img src="img/kabbe.jpg" style="max-width: 600px">
```

<img src="img/kabbe.jpg" style="max-width: 600px">

Vi tar nu samma bild och beskär den med Cimage till en maxbredd om 600px, så att vi laddar en exakt bild och undviker att ladda en större bild som sedan förminskas med css. Det räcker att vi ändrar basen för bilden, istället för `img/` använder vi nu `image/` vilket gör att Cimage används. Det är en regel i `htdocs/.htaccess` som gör att bildlänken hateras av Cimage, istället för som en vanlig bildlänk.

```html
<img src="image/kabbe.jpg?width=600">
```

<img src="image/kabbe.jpg?width=600">

Den riktigt stoa fördelen är att bilden nu har en filstorlek av mindre än 100KB, jämfört mer orginalbilden som var större än 1MB. Titta gärna i devtools under Network, så ser du hur mycket bilderna väger.

Jag kan nu använda Cimage för att beskära bilden, kanske vill jag försöka göra bilden mer intressant genom att kapa bort yttre delar av bilden, så här.

```html
<img src="image/kabbe.jpg?width=600&height=200&crop-to-fit&area=0,20,30,20">
```

<img src="image/kabbe.jpg?width=600&height=200&crop-to-fit&area=0,20,30,20">

Cimage har flera olika sätt att modifiera bilden, kanske vill jag göra den svartvit eller bara pixelfiera den?

```html
<img src="image/kabbe.jpg?width=600&height=200&crop-to-fit&f=grayscale">
<img src="image/kabbe.jpg?width=600&height=200&crop-to-fit&f=pixelate,8,2">
```

<img src="image/kabbe.jpg?width=600&height=200&crop-to-fit&f=grayscale">
<img src="image/kabbe.jpg?width=600&height=200&crop-to-fit&f=pixelate,8,2">

Detta är grunderna i hur du kan jobba med bilder med hjälp av Cimage.



Lär dig mer om Cimage
-------------------------

Du kan se [manualen till Cimage](https://cimage.se/doc) som resursen där du kan lära dig mer om hur du använder Cimage.

Du kan också använda Cimage manualen som en resurs för att lära dig mer generellt om bildhantering för webben. Manualen hanterar beskärning av bilder, bildformat, optimering och andra intressanta områden ur aspekten bildhantering för webben.
