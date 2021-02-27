<script src="js/Permisos.js"></script>
<form id="formularioBuscar" name="formularioBuscar">
    <div class="form-group container p-3">
        <div class="p-3 " >
            <p class="h3 text-center font-weight-bold ">FILTRAR PERMISOS</p>
        </div>
        <div class="row ">
            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar" value="" />
            </div>

            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <select id="estado" name="estado" class="form-control">
                    <option value="">Estado</option>
                    <option value="S">Activos</option>
                    <option value="N">No Activos</option>
                </select>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <button type="button" class="btn btn-info" onclick="buscar(1);">Buscar</button>
                <button type="button" class="btn btn-secondary" onclick="editarNuevo('');">Nuevo</button>
            </div>
        </div>

        <div id="capaResultadosBusqueda" class="container-fluid"></div>
</form>
<div id="capaEdicionNuevo" class="container-fluid"></div>