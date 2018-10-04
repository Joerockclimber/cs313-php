<html>
    <head>
        <title>Maps</title>
        <link rel="stylesheet" type="text/css" href="shopping.css">
    </head>
    <body>
        <div class="navbar">
            <a href="/index.php">Home</a>
            <a href="/assignments.php">Assigments</a>
            <a href="shopping.php">Shopping</a>
            <a href="cart.php">Cart</a>
        </div>
        <div class="wrapper">
            <div id="table">
                <form action="cart.php" method="post">
                    <center><h1>Continent Maps</h1></center>
                    <br />
                    <table>
                        <tr>
                            <th></th>
                            <th>Map</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        <tr>
                            <td><img src="North America.jpg" alt="North America"></td>
                            <td>North America</td>
                            <td>$15.00</td>
                            <td>
                                <input type="number" name="places[]" id="place-na" value="North America" min="0" max="2000">
                            </td>
                        </tr>
                        <tr>
                            <td><img src="South America.jpg" alt="South America"></td>
                            <td>South America</td>
                            <td>$15.00</td>
                            <td>
                                <input type="number" name="places[]" id="place-sa" value="South America" min="0" max="2000">
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Asia.jpg" alt="Asia"></td>
                            <td>Asia</td>
                            <td>$15.00</td>
                            <td>
                                <input type="number" name="places[]" id="place-asia" value="Asia" min="0" max="2000">
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Europe.jpg" alt="Europe"></td>
                            <td>Europe</td>
                            <td>$15.00</td>
                            <td>
                                <input type="number" name="places[]" id="place-eu" value="Europe" min="0" max="2000">
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Africa.jpg" alt="Africa"></td>
                            <td>Africa</td>
                            <td>$15.00</td>
                            <td>
                                <input type="number" name="places[]" id="place-af" value="Africa" min="0" max="2000">
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Australia.jpg" alt="Australia"></td>
                            <td>Australia</td>
                            <td>$15.00</td>
                            <td>
                                <input type="number" name="places[]" id="place-aus" value="Australia" min="0" max="2000">
                            </td>
                        </tr>
                        <tr>
                            <td><img src="Antarctica.jpg" alt="North America"></td>
                            <td>Antarctica</td>
                            <td>$15.00</td>
                            <td>
                                <input type="number" name="places[]" id="place-ant" value="Antarctica" min="0" max="2000">
                            </td>
                        </tr>
                    </table>
                    <center><input type="submit" name="Submit" value="Submit">
                    </center>
                </form>
            </div>
        </div>
    </body>
</html>