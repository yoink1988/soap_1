<!--<!DOCTYPE html>-->
<html>
  <head>
    <meta charset="utf-8">

  </head>

<body>
    <div class="main" style="width:600px; margin:auto">
        <div class="menu">
        <div class="soap" style="width: 500px;background:lightgrey;">
            <label>Soap</label>
            <p>Show all goalkeepers or sorted by country</p>

                <form action="" method="post">
                    Country: <input name="country" type="text"/><button name="soapFoot" type="submit">Show</button>
                </form>
        </div>
        <div class="curl" style="width: 500px;margin-top: 20px;background:lightgrey;">
            <label>cURL</label>
            <p>Show all goalkeepers or sorted by country</p>

                <form action="" method="post">
                    Country: <input name="country" type="text"/><button name="curl" type="submit">Show</button>
                </form>
        </div>
        <div class="currency-soap" style="width: 500px;margin-top: 20px;background:lightgrey;">
            <label>Show countries and their currency code soap</label>

            <div class="form">
                <form action="" method="post">
                <button name="soapCurr" type="submit">Show</button>
                </form>
            </div>
        </div>
        <div class="currency-curl" style="width: 500px;margin-top: 20px;background:lightgrey;">
            <label>Show countries and their currency code curl</label>

                <form action="" method="post">
                <button name="curlCurr" type="submit">Show</button>
                </form>
        </div>
        </div>

        <div class="content" style="margin-top: 20px;">
            %output%
            %outCurr%
        </div>
    </div>
</body>





  </body>
</html>
