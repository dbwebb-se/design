Horisontellt (typografiskt) grid
=========================

Ett horisontellt grid kan hjälpa dig att få ordning på din typografi och ge en enhetlighet som leder till vertical rytm i texten. Ett horisontellt grid kallas även typografiskt grid eller baseline grid.



Visa gridet
-------------------------

Du kan klicka på länken [som visar denna sida med dess grid](verktyg/horisontellt-grid?hgrid) (stöds av temat `dbwebb-se`).

Du kan visa gridet för godtycklig sida genom att lägga till `?hgrid` i slutet av sidans länk.

När du gör det kommer layouten att lägga till en html-klass för `hgrid` och den används för att visa den bakgrundsbild som används för att visa gridet.



Ett magiskt nummer
-------------------------

En grundläggande del i det typografiska gridet är det magiska numret som sätter höjden på varje del av rutnätet. Det magiska numret används för att styra typografin så att den matchar gridet.



### Magiskt nummer för typografin

När det gäller typografin så skall fontens storlek och dess radhöjd tillsammans alltid matcha en multipel av det magiska numret.

Låt oss säga att vårt magiska nummer är 24 pixlar.

För att ta ett exempel med elementet `<p>` så säger vi att dess fonstorlek är 16 pixlar, dess radhöjd behöver då vara 1.5 vilket totalt ger 24, det magiska numret (16 * 1.5 = 24).

På samma sätt så behöver en rubrik `<h1>` matcha en multipel av det magiska numret. Om fontstorleken är 2.375 em (38 pixlar om basfonten är 16 pixlar) så behöver dess radhöjd vara inom en multipel av det magiska numret. I detta fallet är 48 pixlar det tom skall matchas (2 * 24). Vi kan räkna ut dess radhöjd via 48/38 vilket ger en radhöjd av 1.2632. 

Sedan lägger vi på en `margin-bottom` på varje typografiskt element så att nästa typografiska element i sidans flöde hamnar på rätt position i gridet.



### Magiskt nummer för övriga element

Sidans övriga element, såsom bilder, block och regioner, kan också göras så att de matchar höjden av det horisontella gridet. Det sker enklast med en `margin-bottom` som matchar en multipel av det magiska numret.

I vissa sammanhang kan man även tänka sig att sätta en fast höjd på en region eller element, även om det kanske är specialfall eftersom en fast höjd inte justeras efter dess innehåll.



### Bara margin-bottom

Den enklaste är att enbart använda margin-bottom när man stylar enligt det magiska numret. Att kombinera margin-bottom med margin-top innebär att begreppet _collapsing margins_ måste hanteras och det kan vara svårt att inse alla de fall där det kan aktualiseras.

Rekommendationen är alltså att i det längsta enbart styla med margin-bottom när man vill matcha det horisontella gridet.



Modulen desinax/typographic-grid
-------------------------

I uppgiften använder du en LESS modul [desinax/typographic-grid](https://github.com/desinax/typographic-grid/) som implementerar ett typografiskt grid. Studera modulens README så får du exempel på hur ett typografiskt grid kan byggas upp med html och style.

Du kan testa ett par exempel på [hur modulen fungerar på dess webbplats](https://desinax.github.io/typographic-grid/htdocs/).
