<html>
<head>
<style>
body {
       font-family: Verdana, sans-serif;
       font-size: 10px;
       font-style: normal;
       padding:10px;
   }
p    {
       color: pink;
   }
</style>

<body>
	<h2>Web Form to Send a Message via TMS</h2>
	<h3>This uses GovDelivery's Reference PHP Client</h3>
<form method="post" name="theForm" action="/process">
	Email <input type="radio" onclick="javascript:emailSmsCheck();" name="emailSms" id="emailCheck" checked="check" value="emailSend"> 
	SMS   <input type="radio" onclick="javascript:emailSmsCheck();" name="emailSms" id="smsCheck" value="smsSend"><br><br>
    <div id="ifEmail" style="display:yes">
    Subject<br><input type="text" NAME="subject" ID="subject" value="" /><br><br>
    </div>
    Body of message<br><TEXTAREA NAME="message" COLS="70" ROWS="5" ID="messsage" wrap="physical"></TEXTAREA><br><br>
    Recipient(s) - you may send to multiple recipients by using a comma as a delimiter<br><input type="text" name="recipient" value="" ID="recipient"/><br><br>
    <input type="submit" name="submit" value="Send Message!"/>&nbsp;&nbsp;
    <button type="reset" value="Reset">Reset</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
function emailSmsCheck() {

    if (document.getElementById('emailCheck').checked) {
        document.getElementById('ifEmail').style.display = 'block';
    }
    else document.getElementById('ifEmail').style.display = 'none';

}
    
</script>
<p><span style="font-size: 6px;">Using Lumen - A PHP Micro-Framework By Laravel</span></p>
</body>
</head>
</html>