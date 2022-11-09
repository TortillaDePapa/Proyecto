<!DOCTYPE html>
<html>

<head>
    <title>Card &ndash; the better way to collect credit cards</title>
    <meta name="viewport" content="initial-scale=1">
    <!-- CSS is included through the card.js script -->
</head>

<body>
    <style>
        .demo-container {
            width: 100%;
            max-width: 100%;
            margin:  auto;
        }
        .card-wrapper{

            position: relative;
            /* right: 12px; */
            right: 4%;
        }
        /* form-container{

          

        } */

    </style>
    <div class="demo-container">
        <div class="card-wrapper" ></div>

        <br>

        <div class="form-container active">
                <input placeholder="Card number" type="tel" name="number">
                <input placeholder="Full name" type="text" name="name">
                <input placeholder="MM/YY" type="tel" name="expiry">
                <input placeholder="CVC" type="number" name="cvc">
        </div>
    </div>

    <script src="http://localhost/xampp/proyecto/proyecto/Tarjeta.js/card.js"></script>

    <!-- <script src="http://localhost/Proyecto/Tarjeta.js/card.js"></script> -->
    <script>
        var c = new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>
</body>

</html>