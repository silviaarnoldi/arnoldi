function cursore()
{
	document.getElementById("codice").focus();
}
function controlla_submit()
{
	var luogo,adulti,bambini,giorni;
	var avvisa="";
	luogo=document.getElementById("codice").value;
	adulti=document.getElementById("adulti").value;
	bambini=document.getElementById("bambini").value;
	giorni=document.getElementById("giorni").value;
	if(luogo=="")
		avvisa=avvisa+"- Non hai selezionato nessuna località\n";
	if(isNaN(adulti))
	{
		avvisa=avvisa+"- Hai inserito del testo anziché il numero di adulti\n";
		document.getElementById("adulti").value="0";
	}
	else
		if(parseInt(adulti,10)==0)
			avvisa=avvisa+"- Non hai inserito il numero di adulti\n";
	if(isNaN(bambini))
	{
		avvisa=avvisa+"- Hai inserito del testo anziché il numero di bambini\n";
		document.getElementById("bambini").value="0";
	}
	else
		if(parseInt(adulti,10)==0&&parseInt(bambini,10)>0)
			avvisa=avvisa+"- Ci sono bambini non accompagnati? La vedo difficile...\n";
	if(isNaN(giorni))
	{
		avvisa=avvisa+"- Hai inserito del testo anziché il numero di giorni\n";
		document.getElementById("giorni").value="0";
	}
	else	
		if(parseInt(giorni,10)==0)
			avvisa=avvisa+"- Non hai inserito il numero di giorni\n";
	if(avvisa!="")
	{
		alert("Ci sono problemi, compila correttamente tutti i campi, grazie:\n\n"+avvisa+"\n");
		cursore();
	}
	else
		document.getElementById("inse").submit();
	
}
