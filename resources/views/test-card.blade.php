<!DOCTYPE html>
<html>
<head>
    <script src="{{ asset('/') }}creditCardValidator.js" type="text/javascript"></script>
    <link href="{{ asset('/') }}styles.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>

<div id='title'>JS Credit Card Validator!!</div>


    <div class="card-bounding">

        <form action="{{ route('test-card-save') }}" method="post">
            @csrf
            <aside>Card Number:</aside>
            <div class="card-container">
                <!--- ".card-type" is a sprite used as a background image with associated classes for the major card types, providing x-y coordinates for the sprite --->
                <div class="card-type"></div>
                <input name="card_number" placeholder="0000 0000 0000 0000" onkeyup="$cc.validate(event)" />
                <!-- The checkmark ".card-valid" used is a custom font from icomoon.io --->
                <div class="card-valid">&#xea10;</div>
            </div>

            <div class="card-details clearfix">

                <div class="expiration">
                    <aside>Expiration Date</aside>
                    <input name="expire_date" onkeyup="$cc.expiry.call(this,event)" maxlength="7" placeholder="mm/yyyy" />
                </div>

                <div class="cvv">
                    <aside>CVV</aside>
                    <input name="cvc" placeholder="XXX"/>
                </div>

            </div>

           <button type="submit">Pay Now</button>

        </form>
    </div>



</body>
</html>
