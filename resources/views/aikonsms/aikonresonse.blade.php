<html>
<head>
<title>client</title>
</head>
<!-- This page is called in post method and it automatically submits the page due to body onload funtion -->

<body onload="document.my_form.submit()">
	<form method="post" name="my_form" action ="{{$responseUrl}}" >
		<input type="hidden" name="date" value="{{$response['date']}}" >
        <input type="hidden" name="bankId" value="{{$response['bankId']}}" >
        <input type="hidden" name="amount" value="{{$response['amount']}}" >
        <input type="hidden" name="clientId" value="{{$response['clientId']}}" >
        <input type="hidden" name="orderId" value="{{$response['orderId']}}" >
        <input type="hidden" name="signature" value="{{$response['signature']}}" >
        <input type="hidden" name="mobileNumber" value="{{$response['mobileNumber']}}" >
        <input type="hidden" name="description" value="{{$response['description']}}" >
        <input type="hidden" name="emailId" value="{{$response['emailId']}}" >
        <input type="hidden" name="transactionId" value="{{$response['transactionId']}}" >
        <input type="hidden" name="status" value="{{$response['status']}}" >
		<input type="submit" style="display:none">
	</form>
</body>
</html>