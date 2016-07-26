<html>
<body>
	<h2>Web Form to Send a Message via TMS</h2>
<form method="post" action="/process">
   Subject<br><input type="text" name="subject" value="" /><br><br>
   Body<br><TEXTAREA NAME="message" COLS="70" ROWS="5" ID="messsage" wrap="physical"></TEXTAREA><br><br>
   Recipient<br><input type="text" name="recipient" value="" /><br><br>
    <input type="submit" name="submit" value="Send Message!" />
</form>
</body>
</html>