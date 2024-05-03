<?php include 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="containerPolicy">
        <div id="support">
            <h2>¡Contáctanos!</h2>
            <p>Completa el siguiente formulario y nos pondremos en contacto contigo.</p>
            <form>
                <div class="form-group separate">
                    <label for="formGroupExampleInput">Nombre completo</label>
                    <input type="text" class="form-control inputSupport" id="formGroupExampleInput" placeholder="Nombre completo">
                </div>
                <div class="form-group separate">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="text" class="form-control inputSupport" id="formGroupExampleInput2" placeholder="Email">
                </div>
                <div class="form-group separate">
                    <label for="exampleFormControlTextarea1">Mensaje</label>
                    <textarea class="form-control inputSupport" id="exampleFormControlTextarea1" rows="3" placeholder="Escribe tu mensaje"></textarea>
                </div>
                <div class="text-center"> 
                    <button type="submit" class="btn btn-dark buttoSupport">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.html' ?>
</body>
</html>