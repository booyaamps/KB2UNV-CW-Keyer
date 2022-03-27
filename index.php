
<html>
    <title>KB2UNV CW Keyer</title>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div style="margin: auto; width: 50%;">
            <form action="/cw.php" method="post" target="_blank">
                <table>
                    <thead>
                        <tr>
                            <th>Code To Send</th>
                            <th></th>
                            <th>WPM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><textarea id="string" name="string" rows="5" cols="30" value="<?php echo $_POST['string']; ?>"></textarea></td>
                            <td><button onclick="document.getElementById('string').value = '';">Clear Text</button></td>
                            <td>Faster</td>
                            <td><input type="range" min="15" max="45" value="30" class="slider" id="myRange" name="wpm"></td>
                            <td>Slower</td>
                        </tr>
                        <tr>
                            <td></td>

                            <td><input type="submit" value="Submit"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>
