function controllo()//controllo i dati inseriti
{
	var cerca = document.getElementById('txt_cerca').value;
	
	if(cerca != '')
	{
		document.forms.fsearch.action = "cerca.php";
		document.forms.fsearch.submit();
	}
}