<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- se puede enviar un form por post o get -->
    <form action="recibe.php" method="post">
        <input  type="text"
                placeholder="Nombre:"
                name="nombre">
        <br>

        <!-- como tienen el mismo name quedan relacionados -->
        <label for="hombre">Hombre</label>
        <input type="radio" name="sexo" value="hombre" id="hombre">
        <label for="mujer">Mujer</label>
        <input type="radio" name="sexo" value="mujer" id="mujer">
        <br>

        <!-- combo boxes -->
        <select name="year" id="">
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
        </select>
        <br>

        <label for="terminos">Aceptas los terminos?</label>
        <input type="checkbox" name="terminos" id="terminos" value="ok">

        <input type="submit" value="Enviar">
    </form>

</body>
</html>