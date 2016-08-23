<html>
<body>
	<h2>Web Form to Send a Message via TMS</h2>
	<h3>This uses GovDelivery's Reference PHP Client</h3>
<form method="post" action="/process">
	Email <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck" checked="check"> 
	SMS <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck"><br><br>
    <div id="ifYes" style="display:yes">
    Subject<br><input type="text" NAME="subject" ID="subject" value="" /><br><br>
    </div>
    Body of message<br><TEXTAREA NAME="message" COLS="70" ROWS="5" ID="messsage" wrap="physical"></TEXTAREA><br><br>
    Recipient(s) - you may send to multiple recipients by using a comma as a delimiter<br><input type="text" name="recipient" value="" ID="recipient"/><br><br>
    <input type="submit" name="submit" value="Send Message!" />
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
    }
    else document.getElementById('ifYes').style.display = 'none';

}
</script>
</body>
</html>