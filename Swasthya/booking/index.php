<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paypal Integration Test</title>
</head>
<body>

    <form class="paypal" action="payments.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="UK" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <lable>First Name</lable><input type="text" name="first_name"  />
        <br>
        <br>
        <label>Last Name</label>
        <input type="text" name="last_name"  />
        <br>
        <br>
        <label>email address</label>
        <input type="text" name="payer_email" />
        <br>
        <br>
        <input type="hidden" name="item_number" value="123456" / >
        <input type="submit" name="submit" value="Submit Payment"/>
    </form>

</body>
</html>