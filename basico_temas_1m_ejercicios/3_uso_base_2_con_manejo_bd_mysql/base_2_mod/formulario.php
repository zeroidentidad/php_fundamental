<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Formulario</title>
</head>

<body>
<table align="center">
    <tr>
        <td><h1>Bingo </h1></td>
    </tr>
     <tr>
         <td width="450">
            <form action="resultado.php" method="post">
                <fieldset align="center">
                    <legend>Ingresa diferentes valores del 1 al 20: </legend>
                    <?php for($i=0; $i<6; $i++ ){ 
                        print "<input type='text' name='numero_".$i."' maxlength='2' /><br><hr/>";
                    } 
                    ?><br>    
                    <input type="submit" name="submit" value="Enviar" />
                </fieldset>
            </form>
        </td>
    </tr>
</table>
</body>
</html>