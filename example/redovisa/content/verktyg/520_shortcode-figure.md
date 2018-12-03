---
views:
    flash:
        region: flash
        template: anax/v2/image/default
        data:
            src: "image/kabbe.jpg?w=1100&h=360&cf&f=pixelate,8,2&a=0,0,5,0"
---
Shortcode FIGURE
=========================

Vi har tidigare pratat om schortcoden FIGURE. Låt oss nu se lite mer i detalj hur man kan använda konstruktionen för att jobba med bilder i text.



Bild med eller utan bildtext
-------------------------

Du kan skapa en ny bild som läggs i ett html-element `<figure>`, genom att ange följande konstruktion i ditt markdown-dokument.

&#x5b;FIGURE src="image/kabbe.jpg?w=600&h=200&crop-to-fit"]

[FIGURE src="image/kabbe.jpg?w=600&h=200&crop-to-fit"]

Du kan skapa samma bild och lägga till en bildtext, med följande konstruktion.

&#x5b;FIGURE src="image/kabbe.jpg?w=600&h=200&crop-to-fit" caption="Kabbe är ute och går en höstdag."]

[FIGURE src="image/kabbe.jpg?w=600&h=200&crop-to-fit" caption="Kabbe är ute och går en höstdag."]



Justera höger, vänster eller centrera
-------------------------

Du kan justera bilder till höger, vänster eller centrera dem.

Vi börjar med att centrera en bild.

&#x5b;FIGURE src="image/kabbe.jpg?w=600&h=200&crop-to-fit&f=grayscale" caption="Kabbe är ute och går en höstdag." class="center"]

[FIGURE src="image/kabbe.jpg?w=600&h=200&crop-to-fit&f=grayscale" caption="Kabbe är ute och går, till höger, en höstdag." class="center"]

Vi kan också få texten att flyta kring bilden genom att justera bilden till höger eller vänster. För att visa hur det ser ut i texten så lägger jag till en del dummy-text.

[FIGURE src="image/kabbe.jpg?w=300&h=200&crop-to-fit&f=grayscale&area=0,30,20,30" caption="Kabbe är ute och går, till höger, en höstdag." class="right"]

Först flyter vi bilden till höger med följande konstruktion.

&#x5b;FIGURE src="image/kabbe.jpg?w=300&h=200&crop-to-fit&f=grayscale&area=0,30,20,30" caption="Kabbe är ute och går en höstdag." class="right"]

<p style="color: #999;">Skräptext och mer skräptext för att visualisera hur bilden med Kabbe flyter till vänster/höger.</p>

<p style="color: #999;">Skräptext och mer skräptext för att visualisera hur bilden med Kabbe flyter till vänster/höger.</p>

<p style="color: #999;">Skräptext och mer skräptext för att visualisera hur bilden med Kabbe flyter till vänster/höger.</p>

[FIGURE src="image/kabbe.jpg?w=300&h=200&crop-to-fit&f=grayscale&f1=pixelate,8,2&area=0,30,20,30" caption="Kabbe är ute och går, till vänster, en höstdag." class="left"]

Sedan ändrar i `right` till `left` i konstruktionen och resultatet blir att bilden flyter till vänster.

&#x5b;FIGURE src="image/kabbe.jpg?w=300&h=200&crop-to-fit&f=grayscale&f1=pixelate,8,2&area=0,30,20,30" caption="Kabbe är ute och går, till vänster, en höstdag." class="left"]

<p style="color: #999;">Skräptext och mer skräptext för att visualisera hur bilden med Kabbe flyter till vänster/höger.</p>

<p style="color: #999;">Skräptext och mer skräptext för att visualisera hur bilden med Kabbe flyter till vänster/höger.</p>

Shortcoden FIGURE innehåller i sig inte någon css-style, det är något som måste appliceras separat av din stylesheet.
