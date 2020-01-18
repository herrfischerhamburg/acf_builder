<div class="row children_topmargin_s">

    <div class="col-md-6">
        <label> <strong>Ihr Anliegen</strong> (Pflichtfeld)
        [select* anliegen "Buchung" "Anfrage" "sonstiges"] </label>
    </div>

    <div class="col-md-6">
        <label> <strong>Anrede</strong> (Pflichtfeld)
        [select* anrede "Herr" "Frau"] </label>
    </div>

    <div class="col-md-6">
        <label> <strong>Vorname</strong> (Pflichtfeld)
        [text* vorname] </label>
    </div>

    <div class="col-md-6">
        <label> <strong>Nachname</strong> (Pflichtfeld)
        [text* nachname] </label>
    </div>

    <div class="col-md-6">
        <label> <strong>Straße + Hausnummer</strong> (Pflichtfeld)
        [text strasse] </label>
    </div>

    <div class="col-md-6">
        <label> <strong>PLZ + Ort</strong> (Pflichtfeld)
        [text plz_ort] </label>
    </div>

    <div class="col-md-6">
        <label> <strong>Telefon</strong> (Pflichtfeld)
        [text telefon] </label>
    </div>

    <div class="col-md-6">
        <label> <strong>Telefax</strong> (Pflichtfeld)
        [text telefax] </label>
    </div>

    <div class="col-md-12">
        <label> <strong>E-Mail-Adresse</strong> (Pflichtfeld)
        [email* your-email] </label>
    </div>

    <div class="col-md-12">
        <label> <strong>Nachricht</strong>
        [textarea* your-message] </label>
    </div>

    <div class="col-md-12">
        <label> <strong>Buchungsanfrage stellen</strong>
        [checkbox checkbox-751 use_label_element "buchungsanfrage"] </label>
    </div>

    <div class="col-md-12">
        [acceptance acceptance-22]Ihre Eingaben und ggf. hochgeladene Dateien werden unverschlüsselt per E-Mail an uns übermittelt. Die abgesendeten Daten werden nur zum Zweck der Bearbeitung Ihres Anliegens verarbeitet. Weitere Informationen finden Sie in unserer <a href="#/">Datenschutzerklärung</a>.[/acceptance]
    </div>

    <div class="col-md-12">
        <div class="submit_wrapper">
            [submit "Absenden"]
        </div>
    </div>

</div>