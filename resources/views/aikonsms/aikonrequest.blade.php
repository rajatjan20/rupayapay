<html>
<head>
<title>client</title>
</head>
<!-- This page is called in post method and it automatically submits the page due to body onload funtion -->

<body onload="document.my_form.submit()">
	<form method="post" name="my_form" action ="{{$baseurl}}" >
		<input type="hidden" name="clientId" value="{{$clientId}}" >
		<input type="hidden" name="encrypt" value="{{$encryptJsonObj}}" >
		<input type="submit" style="display:none">
	</form>
</body>
</html>