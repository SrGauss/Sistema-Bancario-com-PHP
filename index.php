<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="Venom.png" type="image/x-icon">

        <title>Os guri</title>

    <style>
        
        .login-card {
  width: 290px;
  padding: 30px;
  border: 1px solid #ccc;
  border-radius: 10px;
  background-color: #e8e8e8;
  box-shadow: 2px 2px 10px #333;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.card-header {
  text-align: center;
  margin-bottom: 20px
}

.card-header .log {
  margin: 0;
  font-size: 24px;
  color: black;
}

.form-group {
  margin-bottom: 15px;
}

label {
  font-size: 18px;
  margin-bottom: 5px;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  transition: 0.5s;
}

input[type="submit"] {
  width: 100%;
  background-color: #333;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: greenyellow;
  color: black;
}

        
    </style>

    </head>
    <body>

<div class="login-card">
    <div class="card-header">
        <div class="log">Login</div>
    </div>
    <form action="valores.php" method="post">
            <div class="form-group">
            <label for="username">Usuário:</label>
            <input required="" name="user" id="user" type="text">
            </div>
            <div class="form-group">
            <label for="password">Senha:</label>
            <input required="" name="Password" id="Password" type="password">
            </div>
            <div class="form-group">
            <input value="Enviar" type="submit">
            </div>
    </form>
</div>

                
    </body>
</html>