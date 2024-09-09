import { useState } from 'react' 
import './App.css'

function App() { 

  return ( 
    <> 
  <meta charSet="UTF-8" />
  <meta name="viewport" content="width=device-width , initial-scale=1.0" />
  <title>Keiry Pdf Optimizer</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="icon" href="../vistas/img/pdf.gif" />
  <div className="formulario">
    <h1 className="ins">KEIRY PDF - LOGIN</h1>
    <form action="../conex/login.php" method="post">
      <div className="username">
        <input type="text" name="Usuario" placeholder="Usuario" />
        <label>INGRESA USUARIO</label>
      </div>
      <div className="username">
        <input
          className="ipass"
          type="password"
          name="contrasena"
          placeholder="Contraseña"
        />
        <label>INGRESA CONTRASEÑA</label>
      </div>
      <input href="inicio.html" type="submit" defaultValue="Ingresar" />{" "}
      {/*Boton iniciar*/}
      <br />
      <br />
      <div className="recordar">¿Olvido su contraseña?</div>
      <div className="Registrar">
        <h2 className="text">¿Aun no te has registrado?</h2>
        <div className="re">
          <a href="register.html">Registrarse</a>
        </div>
      </div>
    </form>
  </div>
   
  &gt;
  <footer>
    <p>© 2024 Keiner Bertel. Todos los derechos reservados.</p>
  </footer> 
      
    </>
  )
}

export default App
