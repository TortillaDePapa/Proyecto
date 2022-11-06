<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
    <link href="https://bootstraptema.ru/snippets/form/2017/styles.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://bootstraptema.ru/snippets/form/2017/jquery.payform.min.js"></script>
    <script src="https://bootstraptema.ru/snippets/form/2017/script.js"></script>


</head>

<body>


    <div class="row">
        <div class="payment">
                <div class="col">
                <div class="form-group" id="card-number-field">
                    <label for="cardNumber">Numero de tarjeta</label>
                    <input type="text" class="form-control w-15s0" id="cardNumber" placeholder="9999 - 9999 - 9999 - 9999">
                </div>

            </div>

                <div class="col">

                <div class="form-group owner">
                    <label for="owner">Nombre del titular</label>
                    <input type="text" class="form-control" id="owner">
                </div>


<div class="row">
                <div class="col">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control w-25 " id="cvv">
                  
                    
                </div>
            </div>         

            </div>
            <div class="row">

            <div class="col">
        
                    <label>Fecha de expiración</label>
                    <select>
                        <option value="01">Enero</option>
                        <option value="02">Febrero </option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    <select>
                        <option value="22"> 2022</option>
                        <option value="23"> 2023</option>
                        <option value="24"> 2024</option>
                        <option value="25"> 2025</option>
                        <option value="26"> 2026</option>
                        <option value="27"> 2027</option>
                    </select>
                    <img src="https://bootstraptema.ru/snippets/form/2017/visa.jpg" id="visa">
                    <img src="https://bootstraptema.ru/snippets/form/2017/mastercard.jpg" id="mastercard">
                </div>
                </div>
           
        </div>
    </div>

</body>

</html>