Shortcode
===========================

Shortcode är ett koncept som adderar ett lager till Markdown. Man skriver en shortcode som i sin tur genererar en sekvens av HTML.

Shortcode är inte Markdown utan ett koncept som förenklar att lägga till en bild med bildtext, en youtube video, en codepen, en asciinema eller en annand godtycklig webbresurs som kan inkluderas i ett dokument via en sekvens av html-element.



Shortcode som stöds av ramverket
---------------------------

De shortcodes som stöds av ramverket är följande.

| Shortcode  | Beskrivning  |
|------------|--------------|
| ASCIINEMA  | Inkludera en Asciinema i dokumentet, inklusive en figcaption. |
| CODEPEN    | Inkludera en Codepen i dokumentet, inklusive en figcaption. |
| FIGURE     | Visa bilder tillsammans med en bildtext och med möjligheten att lägga till CSS-klasser till bilden för att till exempel justera bilden till höger eller vänster. |
| INFO       | Visa en informationsruta med text. |
| YOUTUBE    | Lägg till Youtube videor inom en figure/figcaption. |
| WARNING    | Visa en varningsruta med text. |

Här följer ett par exempel på hur man använder dessa shortcodes.



Bilder med shortcode
---------------------------

[FIGURE src=image/eld.jpg?width=1100&height=100&crop-to-fit class="right" caption="En eld som tar upp hela sidan."]

[FIGURE src=image/eld.jpg?width=300 class="right" caption="En liten eld som flyter till höger."]

Fördelen med en shortcode för bilder är att vi kan omsluta bilden med en figure och figcaption samt tillföra en CSS-klass.

Detta ger oss möjligheten att justera bilder till vänster eller höger eller låta dem var ai mitten. Genom att bygga CSS-klasser så kan vi få full frihet över hur bilderna visas tillsammans med texten.

Vi kan också vara säkra på att vi får en enhetlig struktur på HTML-koden för alla bilder.



Informations- och varningsrutor
---------------------------

Ibland vill man uppmärksamma läsaren på något extra i texten.

[INFO]
**Detta är ren information upplysningsvis.**

Här kan man skriva information och rama in det i en info-ruta.
[/INFO]

Vill man varna användaren så passar en varningsruta bättre.

[WARNING]
**Detta är en VARNING!**

Här skriver vi information om varför vi väljer att varna användaren.
[/WARNING]



Video
---------------------------

Så här kan man länka till en video och inkludera den i artikeln, med eller utan referens till den spellistan som videon kan ingå i.

[YOUTUBE width=700 src=eUBMCd7Tj6Q list=PLKtP9l5q3ce_TF99y6BbUFC0Xzt6Pd9Ts caption="Mikael visar hur man felsöker med en gummianka."]



Codepen
---------------------------

Med en Codepen kan man inkludera exempel på HTML, CSS och JavaScript i sitt dokument.

[CODEPEN src=LpOqgN caption="En Codepen med färger, bara som ett exempel."]



Asciinema
---------------------------

Här är en Asciinema som säger hej och välkommen.

[ASCIINEMA src=207899 caption="Kossan i cowsay hälsar välkommen till design-kursen."]
