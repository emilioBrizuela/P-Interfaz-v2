<script></script>

<script src="js/Usuarios.js"></script>
<div class="container rounded w-25 bg-info rounded mt-5 pt-3 pb-3">
    <div class="container m-auto">

        <form id="formularioLogin" name="formularioLogin" action="#" method="POST">
            <div class="form-group ">
                <label for="exampleInputEmail1" class="text-white h5">Iniciar Sesion</label>
                <input type="email" class="form-control" name ="login" id="login" aria-describedby="emailHelp"
                    placeholder="Ingresar usuario">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
            </div>
            <div id="error"></div>
            <button type="button" class="btn btn-dark btn-block" onclick="loginUsuario('Usuarios','logearUsuario');">Ingresar</button>
        </form>
    </div>
</div>