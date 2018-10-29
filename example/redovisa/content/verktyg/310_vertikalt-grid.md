Vertikalt grid
=========================

Ett vertikalt grid kan hjälpa dig att få ordning på ditt innehåll genom att ge dig ett fast "grid" där du kan placera ut innehållet.



Visa gridet
-------------------------

Du kan klicka på länken [som visar denna sida med dess grid](verktyg/vertikalt-grid?vgrid) (stöds av temat `dbwebb-se`).

Du kan visa gridet för godtycklig sida genom att lägga till `?vgrid` i slutet av sidans länk.



Kolumner och mellanrum
-------------------------

Ett vertikalt grid delar in sidan i kolumner ("columns") och mellanrum ("gutter") mellan kolumnerna. Det är vanligt att dela in en sida i 12, 16 eller 24 kolumner.

Man väljer hur bred sida man vill ha som mest, det kan vara en fast bredd om till exempel 1200px, eller en flytande "fluid" bredd om 100%. Sedan delar man in sidan i valt antal delar och man lägger ett mellanrum mellan varje kolumn.

När man sedan placerar ut innehållet på sidan så är det alltid en multipel av de kolumner man har.



Rader
-------------------------

När man jobbar med ett grid så kan man även dela in sidan i sektioner, eller rader. Varje rad kan ha sin egen maxbredd och innehålla de kolumner man väljer.

Om kolumnerna är fler och större än sidans maxbredd så kommer kolumnerna att visas längre ned inom samma "rad".



Modulen desinax/vertical-grid
-------------------------

I uppgiften använder du en LESS modul [desinax/vertical-grid](https://github.com/desinax/vertical-grid/) som implementerar ett vertikalt grid. Studera modulens README så får du exempel på hur ett vertikalt grid kan byggas upp med html och style.

Du kan testa ett par exempel på [hur modulen fungerar på dess webbplats](https://desinax.github.io/vertical-grid/htdocs/).
