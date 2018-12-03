---
views:
    flash:
        region: flash
        template: anax/v2/image/default
        data:
            src: "image/kabbe.jpg?w=1100&h=360&cf&f=pixelate,8,2&a=0,0,5,0"
---
Bilder i text
=========================

Här följer ett utdrag ut texten kring kmom05 som visar hur du kan kombinera bilder i text genom att använda shortcoden FIGURE tillsammans med Cimage.

Studera källkoden till artikeln under `content/verktyg` och ser hur bilderna, via shortcoden FIGURE, tillsammans med markdown-texten, bildar en enhet.



Kmom05: Bild
-------------------------

[FIGURE src="image/kabbe.jpg" caption="Kabbe på vandring en sen höstdag i Blekinges skärgård på Yttre Stekön. Fundera på om bilden innehåller något som gör den mer eller mindre intressant."]

Låt oss ägna ett kursmoment åt att testa runt med bilder, bildverktyg och bildformat samt hur vi publicerar bilderna på en webbplats, inklusive responsivitet.

[FIGURE src="image/kabbe.jpg?w=800&crop=400,300,600,160&h=400&cf&sharpen" caption="Att beskära en bild och fokusera på olika delar i bilden kan ge bilden olika fokus och skapa intresse."]

Vi skall se hur vi kan använda bilder för att skapa "bildtunga" teman, här är bilderna en viktig ingrediens i webbplatsens tema.

Vi skall också träna på att exemplifiera texter med bilder och välja hur dessa bilder skall representeras i textens flöde. Här kan man tänka på att bilder beskärs till liknade storlek och form för att skapa enhetlighet.

<!--more-->

[FIGURE src="image/kabbe.jpg?w=600&crop=400,300,600,160&h=300&cf&f=grayscale&sharpen" class="center" caption="Skall bilderna vara i färg, svartvitt eller ha en annan nyans, olika effekter kan skapa enhetlighet med resten av webbplatsens design."]

Vi behöver vara medvetna om att bilder kan vara tunga att ladda och det vill vi hitta sätt att hantera. Hur tunga (stora) behöver bilder vara när de skall visas på en webbplats? Man vill ju både ha liten filstorlek på bilderna och en hög kvalitet på bilden som visas.

[FIGURE src="image/kabbe.jpg?w=300&cf&sharpen&a=10,40,10,30" class="right w33" caption="Bilder kan behöva beskäras för att passa in i flödet av en text."]

När man pratar om bilders kvalitet så kan man beakta olika format på bilder och hur dessa format kan optimeras. Två av de vanligaste formaten är JPEG och PNG. JPEG passar bra för foton där man kan justera kvaliteten genom att ta bort delar av bildens exakthet. PNG lämpar sig för datoranimerade bilder, linjegrafik och skärmdumpar och i de fall där man inte vill att bildens exakthet ändras. Man bör välja rätt bildformat, den underlättar att behålla kvaliteten på en bild. Andra bildformat som används i webbsammanhang är GIF och ett nyare format WEBP.

Bilder kan optimeras, det finns _lossless_ och _lossy_ optimering där skillnaden är om bildens exakthet påverkas eller ej. När man pratar om _lossless_ så är det optimering som inte påverkar bildens exakthet, alla delar av bilden är fortfarande kvar och det som optimeras är till exempel hur bilden lagras på fil. Optimering med tekniker som är _lossy_ innebär att man tar bort delar av bildens exakthet och ändå försöker nå så att användaren uppfattar bilden som tydlig.

För att hantera bildera, för att förändra dess kvalitet - lossless eller lossy - krävs verktyg. Vill man beskära en bild, eller lägga till ett filter som gör bilden skarpare, så behövs verktyg. Vilka verktyg kan en webbprogrammerare ha nytta av?

När man placerar ut bilder i text så har man alternativen att låta bilden spänna över hela sidan. Bilden kan också vara vänsterjusterad alternativt centrerad och ta upp en del av artikelns fulla bredd. Eller så väljer man att flyta texten runt bilden som då placeras till vänster eller höger.

[FIGURE src="image/kabbe.jpg?w=300&cf&sharpen&crop=150,100,730,255&f=grayscale&f1=contrast,-05&sharpen" class="left w33" caption="Bilder kan flyta med texten, till vänster eller höger."]

Men, hur bör detta förändras när man gör responsiva webbplatser och både text och bild förändras på mindre enheter? Här handlar det inte enbart om att leverera rätt bild till rätt enhet, det gäller också att placera ut bilden på rätt sätt i förhållande till texten på olika enheter.

Att göra det för hand fungerar på mindre webbplatser, men om man har en webbplats som dbwebb så kan man behöva andra tekniker för att finna ett någorlunda standardiserat flöde för responsiva bilder i text.

Behöver bilderna vara likadana på en desktop och en mobil? Ibland vill man skicka mindre bilder till en mindre enhet, speciellt om det är dålig koppling på nätverket mellan enheten och webbplatsen. Men, sedan finns det små enheter som har riktigt hög upplösning på skärmen och det kan kräva en större bild. Här ser vi krav som eventuellt inte går att förena.

Vi har många frågeställningar om bilder, men låt se om vi kan bringa klarhet i några av dem.

[FIGURE src="image/kabbe.jpg?w=200&cf&sharpen&crop=150,100,730,255&f=grayscale&f1=contrast,-15&sharpen&convolve=draw:emboss" class="center" caption="Som sagt, bilder."]

Innan du påbörjar kursmomentet så kan du ta en sväng ut i skogen, eller staden, ta med din kamera och fota loss lite. Så får du lite material att lägga upp på din redovisa-sida.
