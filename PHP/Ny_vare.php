<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Ny vare</title>
    <link rel="stylesheet" href="/css/main.css">
  </head>

  <body>
      <form action="Ny_vare_kode.php" method="POST">
        <fieldset>
            <input type="text" placeholder="Varens navn" name="name">
            <input type="text" placeholder="Varens pris" name="price">
        </fieldset>
        <fieldset>
          <input type="submit" value="Opret vare">
        </fieldset>
      </form>
  </body>
</html>