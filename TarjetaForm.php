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

          
        }
        .input-tarjeta{

        display: inline;
        margin: 2px;

        }

      

    </style>
    <div class="demo-container">
        <div class="card-wrapper" ></div>

        <br>

        <div class="form-container active">
                <input class="input-tarjeta" style="width: 99%;" placeholder="Numero de tarjeta" type="tel" name="number">
                <input class="input-tarjeta" style="width: 99%;" placeholder="Nombre titular" type="text" maxlength="25" name="name">
                <input class="input-tarjeta" style="width: 57%;" type="month" name="expiry"  value="">


                <!-- <input class="input-tarjeta" style="width: 57%;" placeholder="MM/YY" type="tel" name="expiry"> -->
                <input class="input-tarjeta" style="width: 40.5%;" placeholder="CVC" type="number" name="cvc">
                
        
        </div>
    </div>

    <!-- <script src="http://localhost/xampp/proyecto/proyecto/Tarjeta.js/card.js"></script> -->

    <script src="http://localhost/Proyecto/Tarjeta.js/card.js"></script>
    <script>
        var c = new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });


        var fecha = document.createElement("input");
       fecha.setAttribute("type","number");
       fecha.setAttribute("max",100);
       fecha.setAttribute("min",2);

    </script>
</body>

</html>