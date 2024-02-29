<!doctype html>
<html>
    <head>
        <link href='stili/stile.css?1644404517' rel='stylesheet' type='text/css'>
        <title>Vacanze!</title>
        <script type='text/javascript' src='script.js'></script>
    </head>
    <body onload='cursore();'>
        <!-- BEGIN AV_TOOLBAR -->
        <div id="av_toolbar_regdiv" style="display:none">
            <div class="av_site">
                <a target="_blank" href="https://it.altervista.org/crea-sito-gratis.php?utm_campaign=toolbar&amp;utm_source=link&amp;utm_medium=link" title="Apri un sito gratis con Wordpress">Crea sito</a>
            </div>
        </div>
        <style>
            @media screen and (min-width: 768px) {
                body.av-toolbar-ready {
                    position:relative;
                    top: 40px
                }

                :where(body.av-toolbar-ready) {
                    display: flow-root
                }
            }
        </style>
        <script>
            self.av_toolbar_off || self !== top && "XYZZY2" !== self.name && !self.av_toolbar_force || (document.body.classList.add("av-toolbar-ready"),
            document.head.appendChild(document.createElement("script")).src = "https://tb.altervista.org/js/s.js")
        </script>
        <!-- END AV_TOOLBAR -->
        <img src='immagine.jpg'/>
        <div class='titolo'>Vacanze</div>
        <hr>
        <p align='center'>
        <form name='inse' id='inse' method='post' action="arnoldi.php">
            <table style='width:100%;'>
                <tr>
                    <td width='30%' valign='middle' class='opzioni'>Localit &agrave;:</td>
                    <td width='50%' valign='middle' class='opzioni'>
                        <select name='codice' id='codice' class='le_text' title='Scegli la Localit&agrave;'>
                            <option value=''>Seleziona una delle località</option>
                            <option value='ALA5500'>Alassio (codice: ALA5500) </option>
                            <option value='COU0001'>Courmayeur (codice: COU0001) </option>
                            <option value='RI00001'>Rimini (codice: RI00001) </option>
                            <option value='SPTERME'>San Pellegrino Terme (codice: SPTERME) </option>
                            <option value='SSL0041'>Santa Maria di Leuca (codice: SSL0041) </option>
                            <option value='TE00012'>Teramo (codice: TE00012) </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width='30%' valign='middle' class='opzioni'>Tipo di soggiorno:</td>
                    <td width='50%' valign='middle' class='opzioni'>
                        <input type='radio' name='tipo' id='tipo' value='mp' title='Vorrei un soggiorno con trattamento di Mezza Pensione' checked/>
                        Mezza pensione<input type='radio' name='tipo' id='tipo' value='pc' title='Vorrei un soggiorno con trattamento di Pensione Completa'/>Pensione completa
                    </td>
                </tr>
                <tr>
                    <td width='30%' valign='middle' class='opzioni'>Numero di adulti:</td>
                    <td width='50%' valign='middle' class='opzioni'>
                        <input type='text' value='0' name='adulti' id='adulti' maxlength='2' style='width:30px;' class='le_text' title='Inserisci il numero di persone adulte'/>
                    </td>
                </tr>
                <tr>
                    <td width='30%' valign='middle' class='opzioni'>Numero di bambini:</td>
                    <td width='50%' valign='middle' class='opzioni'>
                        <input type='text' value='0' name='bambini' id='bambini' maxlength='2' style='width:30px;' class='le_text' title='Inserisci il numero di bambini'/>
                    </td>
                </tr>
                <tr>
                    <td width='30%' valign='middle' class='opzioni'>Durata del soggiorno (giorni):</td>
                    <td width='50%' valign='middle' class='opzioni'>
                        <input type='text' value='0' name='giorni' id='giorni' maxlength='2' style='width:30px;' class='le_text' title='Inserisci i giorni di permanenza'/>
                    </td>
                </tr>
                <tr>
                    <td width='30%' valign='middle' class='opzioni'>Vorrei una camera migliore (Superior), pagando il 20% in pi &ugrave;:</td>
                    <td width='50%' valign='middle' class='opzioni'>
                        <input type='checkbox' name='superior' value='1' title='Biffa questa opzione se vuoi una camera di livello superiore !' value='1'/>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <hr/>
                    </td>
                </tr>
                <tr>
                    <td width='30%' valign='middle' class='opzioni'>
                        <input type='button' value='Calcola il mio preventivo!' onclick='controlla_submit();' title='Calcola il tuo preventivo!'/>
                    </td>
                    <td width='50%' valign='middle' class='opzioni'></td>
                </tr>
            </table>
        </form>
</p><hr>
</body></html>
<?php
if ((isset($_POST['codice']) &&(isset($_POST['superior'])))||(!isset($_POST['superior']) &&(isset($_POST['codice'])))) {
    $codice = $_POST['codice'];
    $tipo = $_POST['tipo'];
    $adulti = $_POST['adulti'];
    $bambini = $_POST['bambini'];
    $giorni = $_POST['giorni'];
    $superior = $_POST['superior'];
    $prezzo = 0;
    $prezzoGiorno=0;
    $prezzoTot=0;
    $tot=$adulti+$bambini;
    $conn = mysqli_connect("localhost", "root", "", "arnoldi");
    $sql = "SELECT * FROM agenzia_viaggio WHERE codice = '$codice'";
    $ris = mysqli_query($conn, $sql);
    $riga = mysqli_fetch_array($ris);
   
    //se mp allora devi selezionare nel db il prezzo adulti_mp e bambini_mp
    if ($tipo == 'mp') {
        $sAdulti = $riga['adulti_mp'] * $adulti;
        $sBambini = $riga['bambini_mp'] * $bambini;
       
    } else {
        $sAdulti = $riga['adulti_pc'] * $adulti;
        $sBambini = $riga['bambini_pc'] * $bambini;
    }
    $prezzoGiorno = $sAdulti + $sBambini;
    $prezzo = $prezzoGiorno*$giorni;
    if ($superior == 1) {
        $prezzoTot = $prezzo + $prezzo * 0.2;
    }else{
        $prezzoTot = $prezzo;
    }
    $tt;
    if($tipo== 'mp'){
        $tt="mezza pensione";
    }else{
        $tt="pensione completa";
    }
    echo "<p align='center' class='testo'>Hai scelto la località codice $codice , corrispondente a $riga[luogo] .<br>";
    echo "Siete in $tot, in particolare: $adulti persone adulte e $bambini bambini e volete un preventivo per il soggiorno con trattamento di $tt per complessivi $giorni giorni.";
    if($superior==1){
        echo "Hai scelto di avere una camera di livello superiore, pagando il 20% in più.";
    }
    echo "<br>Bene! Ecco qui di seguito il nostro migliore preventivo: <br>";
    echo "Per ogni giorno di permanenza ciascun adulto pagherà $sAdulti Euro, mentre i bambini pagheranno $sBambini Euro a testa.<br>";
    echo "I conti son presto fatti!<br>";
    echo "Ogni giorno ti costerà $prezzoGiorno Euro che, moltiplicato per i $giorni giorni che hai indicato, porta ad un totale di: $prezzo Euro.<br>";
    if($superior==1){
        echo "Cui va aggiunto il 20% (perchè hai scelto 'Camera Superior'), quindi il totale sarà di: $prezzoTot Euro<br>";
    }



    mysqli_close($conn);
}
?>
