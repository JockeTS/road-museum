<?php
    $title = 'documentation';
    include('../view/header.php');
?>

<div class="container">
    <div class="info-page">
        <h1>Dokumentation</h1>

        <h2>Kodstruktur</h2>

        <p>Sidan är uppdelad i sidkontrollers samt vyer i form av header, navbar och footer som inkluderas i dessa. Inget material är hårdkodat och varje sidkontroller gör generellt en egen query till databasen för att kunna generera sitt innehåll dynamiskt. Jag skapade en del funktioner för databashantering just för att varje sidkontroller inte ska behöva innehålla så mycket mer än sin query och HTML-struktur.</p>

        <p>Om en bild är representativ för ett objekt i databasen så visas den generellt i ett figure-element med tillhörande text. Detta gäller främst Home, About och Contact-sidorna som ju egentligen bara är vanliga artiklar i databasen men som jag ville ge en lite egen stil.</p>

        <p>Objekt- och artikel-sidorna hämtar allt innehåll från respektive tabell i databasen och visar därefter upp det i en samling (grid/list). Klickar man därefter på en enskild artikel/objekt så hämtas all info om det föremålet till en mall-sida för uppvisning.</p>

        <h2>Responsivitet</h2>

        <p>Jag har försökt ge sidan en grundläggande grad av responsivitet. Bland annat genom att varje element i navbaren tar upp 100% av skärmens bredd för mindre skärmstorlekar. Det är egentligen den enda media query jag använder men jag har försökt ha i åtanke under designprocessen att helst använda den typen av 'byggstenar' som automatiskt skalar om sin storlek efter skärmstorleken.</p>

        <p>Tex så består listan över utställningsobjekt av en flex-box layout som visar fler föremål per rad ju bredare skärmen är och på motsvarande sätt minskar antalet till slutligen bara ett föremål per rad för de allra minsta skärmarna. Tyvärr leder det till lite horisontellt skrollande i detta sista stadie som jag inte riktigt lyckades få bukt med.</p>

        <h2>Framtida Förbättringar</h2>

        <p>Det finns givetvis utrymme för mängder av potentiella förbättringar som skulle kunna göras på sidan. Funktionalitetsmässigt så hade jag gärna implementerat det administrativa gränssnittet om tid hade funnits. Jag hade även gärna rensat och snyggat till de SQL-strängar som kommunicerar med databasen. Detsamma gäller CSS:en och de komponenter och div:ar som utgör HTML-strukturen.</p>

        <p>Hade även gärna förbättrat felhanteringen då den är väldigt grundläggande i nuläget och sårbar för så enkla saker som att skicka en sträng istället för heltal i en GET-parameter. Sedan är ju sidans utseende inte direkt världens hetaste även om jag tycker att den med nöd och näppe gör sitt jobb. Det är dock inte min starkaste sida men kanske får tillfälle att återkomma efter designkursen!</p>
    </div>
</div>

<?php include('../view/footer.php') ?>
