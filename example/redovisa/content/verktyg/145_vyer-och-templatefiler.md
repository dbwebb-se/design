Vyer och Templatefiler
=========================

Webbsidornas innehåll renderas med hjälp av templatefiler. Man kan påverka webbsidans html-struktur genom att redigera och/eller välja vilka templatefiler som används i renderingen.

En vy är en enhet som kan renderas, ofta med en template-fil och en data-array `$data` som anpassar vyn med specifikt innehåll.



Vy
-------------------------

En vy kallar vi den enhet av en template-fil och tillhörande data.

Vi kan se webbsidans innehåll som en samling av vyer. Varje vy renderas (normalt) med en templatefil. När templatefilen anropas så bifogas en samling variabler via en array `$data`. Denna data använder templatefilen för att rendera den specifika vyn.



Templatefiler
-------------------------

De templatefiler som används i kursen ligger främst under katalogen `view`. Du kan studera hur de ser ut. Ibland kan det vara bra att veta mer i detalj vilka möjligheter en template-fil erbjuder. En template-fil kan vara skriven för att hantera olika parametrar som skickas till din via `$data`.



Egna templatefiler
-------------------------

Du kan skapa egna templatefiler genom att förslagsvis ta en kopia av någon som finns och sedan redigera den som du vill.

Kanske vill man att templatefilen skall hantera ett visst värde som skickas i arrayen `$data`, eller så vill man kanske generera en aningen annorlunda struktur i html-koden.



Regioner
-------------------------

Alla vyer har en position, en plats, på webbsidan där dess innehåll placeras. Dessa platser kallar vi regioner. En vy renderas i en region.

En region kan innehålla många vyer och dessa vyer kan ha en inneboende ordning. De kan sorteras i en viss ordning när de renderas ut i regionen. Enkelt sagt, om en vy måste komma först, eller sist, så kan man sätta sätta ett attribut för vyn som bestämmer dess sortering vid renderingsfasen.
