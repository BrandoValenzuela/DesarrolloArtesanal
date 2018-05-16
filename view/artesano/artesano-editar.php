<div class="container-fluid">
  <ol class="breadcrumb">
    <li><a href="?c=Principal">Página principal</a></li>
    <li><a href="?c=Principal&a=IndexArtesanos">Artesanos</a></li>
    <li class="active"><?php echo $artesano->folio != null ? 'Folio '.$artesano->folio : 'Artesano'; ?></li>
  </ol>
</div>
<div class="container">
  <h1 class="text-center"><?php echo $artesano->curp != null ? $artesano->nombre.' '.$artesano->aPaterno.' '.$artesano->aMaterno : 'Nuevo registro de artesano'; ?></h1>
  <div class="row">
    <form id="frm-artesano" name="frm-artesano" action="?c=Artesano&a=Guardar" method="post" enctype="multipart/form-data">
      <input type="hidden" id="registrar-actualizar" name="registrar-actualizar" value="<?php echo $registrar_actualizar; ?>" />
      <input type="hidden" id="folio-artesano" name="folio-artesano" value="<?php echo $artesano->folio; ?>" />
      <fieldset>
        <legend>Datos personales</legend>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>CURP:</label>
            <input type="text" <?php echo $registrar_actualizar == 1 ? 'disabled' : '';?> id="curp-artesano" name="curp-artesano" value="<?php echo $artesano->curp; ?>" class="form-control" placeholder="Ingrese la CURP" data-validacion-tipo="requerido|curp" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Nombre(s):</label>
            <input type="text" id="nombre-artesano" name="nombre-artesano" value="<?php echo $artesano->nombre; ?>" class="form-control" placeholder="Ingrese nombre(s)" data-validacion-tipo="requerido" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Apellido paterno</label>
            <input type="text" id="aPaterno-artesano" name="aPaterno-artesano" value="<?php echo $artesano->aPaterno; ?>" class="form-control" placeholder="Ingrese el apellido paterno" data-validacion-tipo="requerido" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Apellido Materno:</label>
            <input type="text" id="aMaterno-artesano" name="aMaterno-artesano" value="<?php echo $artesano->aMaterno; ?>" class="form-control" placeholder="Ingrese el apellido materno" data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Direccion (Calle, número y colonia):</label>
            <input type="text" id="direccion-artesano" name="direccion-artesano" value="<?php echo $artesano->domicilio; ?>" class="form-control" placeholder="Ingrese calle, número y colonia" data-validacion-tipo="requerido" />
          </div>     
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Localidad:</label>
            <input type="text" id="localidad-artesano" name="localidad-artesano" value="<?php echo $artesano->localidad; ?>" class="form-control" placeholder="Ingrese la localidad." data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Municipio:</label>
            <input type="text" id="municipio-artesano" name="municipio-artesano" value="<?php echo $artesano->municipio; ?>" class="form-control" placeholder="Ingrese el municipio." data-validacion-tipo="requerido" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Grupo étnico:</label>
            <input type="text" id="grupo-etnico-artesano" name="grupo-etnico-artesano" value="<?php echo $artesano->grupoEtnico; ?>" class="form-control" placeholder="Ingrese el grupo étnico" data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Sexo:</label>
            <select id="sexo-artesano" name="sexo-artesano" class="form-control">
              <option <?php echo $artesano->sexo == 1 ? 'selected' : ''; ?> value="1">Femenino</option>
              <option <?php echo $artesano->sexo == 2 ? 'selected' : ''; ?> value="2">Masculino</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Edad:</label>
            <input type="text" id="edad-artesano" name="edad-artesano" value="<?php echo $artesano->edad; ?>" class="form-control" placeholder="Ingrese la edad" data-validacion-tipo="requerido|numero|min:2:max:2" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Tel. Fijo:</label>
            <input type="text" id="telefono-fijo-artesano" name="telefono-fijo-artesano" value="<?php echo $artesano->telefonoFijo; ?>" class="form-control" placeholder="Número telefónico" data-validacion-tipo="numero" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Tel. Celular:</label>
            <input type="text" id="telefono-cel-artesano" name="telefono-cel-artesano" value="<?php echo $artesano->telefonoCel; ?>" class="form-control" placeholder="Número telefónico" data-validacion-tipo="numero|min:10:max:10" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Correo electrónico:</label>
            <input type="text" id="email-artesano" name="email-artesano" value="<?php echo $artesano->email; ?>" class="form-control" placeholder="Ingrese un correo" data-validacion-tipo="email" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Facebook:</label>
            <input type="text" id="facebook-artesano" name="facebook-artesano" value="<?php echo $artesano->facebook; ?>" class="form-control" placeholder="Nombre en Facebook" data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Twitter:</label>
            <input type="text" id="twitter-artesano" name="twitter-artesano" value="<?php echo $artesano->twitter; ?>" class="form-control" placeholder="Nombre en Twitter" data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Instagram:</label>
            <input type="text" id="instagram-artesano" name="instagram-artesano" value="<?php echo $artesano->instagram; ?>" class="form-control" placeholder="Nombre en Instagram" data-validacion-tipo="" />
          </div>
        </div>
      </fieldset><br>
      <fieldset>
        <legend>Datos sobre el oficio</legend>
        <div class="col-md-3">
          <div class="form-group">
            <label>Rama artesanal:</label>
            <select id="rama-artesanal-artesano" name="rama-artesanal-artesano" class="form-control">
              <?php foreach ($ramas as $opcion): ?>
                <option <?php echo $artesano->idRamaArtesanal == $opcion->idRamaArtesanal ? 'selected' : ''; ?> value="<?php echo $opcion->idRamaArtesanal ?>"><?php echo $opcion->nombre; ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Año Inicio Oficio: </label>
            <input type="text" id="inicio-oficio" name="inicio-oficio" value="<?php echo $artesano->anioInicioOficio; ?>" class="form-control" placeholder="Ejemplo: 2000" data-validacion-tipo="requerido|numero|min:4:max:4" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Tipo de actividad:</label>
            <select id="tipo-actividad" name="tipo-actividad" id="tipo-actividad" class="form-control">
              <option <?php echo $artesano->tipoActividad == 1 ? 'selected' : ''; ?> value="1">Primaria</option>
              <option <?php echo $artesano->tipoActividad == 2 ? 'selected' : ''; ?> value="2">Secundaria</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>¿Cuál es su actividad primaria?</label>
            <input type="text" id="actividad-primaria" name="actividad-primaria" value="<?php echo $artesano->actividadPrincipal; ?>" class="form-control" placeholder="Ingrese la actividad primaria" disabled="disabled" data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
              <span class="obligatorio">* </span><label>¿Cómo aprendió el oficio?</label>
              <select id="aprendizaje-oficio" name="aprendizaje-oficio" class="form-control">
                <option <?php echo $artesano->aprendizajeOficio == 1 ? 'selected' : ''; ?> value="1">Autodidacta</option>
                <option <?php echo $artesano->aprendizajeOficio == 2 ? 'selected' : ''; ?> value="2">Cursos</option>
                <option <?php echo $artesano->aprendizajeOficio == 3 ? 'selected' : ''; ?> value="3">Talleres</option>
                <option <?php echo $artesano->aprendizajeOficio == 4 ? 'selected' : ''; ?> value="4">Herencia familiar</option>
              </select>
            </div>
          </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Perioricidad:</label>
            <select id="perioricidad" name="perioricidad" class="form-control">
              <option <?php echo $artesano->perioricidad == 1 ? 'selected' : ''; ?> value="1">Temporal</option>
              <option <?php echo $artesano->perioricidad == 2 ? 'selected' : ''; ?> value="2">Permanente</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">          
          <div class="form-group">
            <span class="obligatorio">* </span><label>Ingreso mensual:</label>
            <input type="text" id="ingreso-mensual-artesano" name="ingreso-mensual-artesano" value="<?php echo $artesano->ingresoMensual; ?>" class="form-control" placeholder="Ingrese el monto" data-validacion-tipo="requerido|numero" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Gasto mensual:</label>
            <input type="text" id="gasto-mensual-artesano" name="gasto-mensual-artesano" value="<?php echo $artesano->gastoMensual; ?>" class="form-control" placeholder="Ingrese el monto." data-validacion-tipo="requerido|numero" />
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <span class="obligatorio">* </span><label>¿Pertenece a un taller?</label>
            <select id="pertenencia-taller" name="pertenencia-taller" class="form-control">
              <option <?php echo $artesano->perteneceTaller == 1 ? 'selected' : ''; ?> value="1">No</option>
              <option <?php echo $artesano->perteneceTaller == 2 ? 'selected' : ''; ?> value="2">Si</option>
            </select>
          </div>
        </div>
        <div id="no-pertenece-taller">
          <div class="col-md-3">
            <div class="form-group">
              <label>¿Trabaja en su domicilio?</label>
              <select id="lugar-trabajo" name="lugar-trabajo" class="form-control">
                <option <?php echo $artesano->trabajoDomicilio == 0 ? 'selected' : ''; ?> value="0"></option>
                <option <?php echo $artesano->trabajoDomicilio == 1 ? 'selected' : ''; ?> value="1">No</option>
                <option <?php echo $artesano->trabajoDomicilio == 2 ? 'selected' : ''; ?> value="2">Si</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>El lugar donde trabaja es:</label>
              <select id="prop-lugar-trabajo" name="prop-lugar-trabajo" class="form-control">
                <option <?php echo $artesano->propiedadLugarTrabajo == 0 ? 'selected' : ''; ?> value="0"></option>
                <option <?php echo $artesano->propiedadLugarTrabajo == 1 ? 'selected' : ''; ?> value="1">Propio</option>
                <option <?php echo $artesano->propiedadLugarTrabajo == 2 ? 'selected' : ''; ?> value="2">Prestado</option>
                <option <?php echo $artesano->propiedadLugarTrabajo == 3 ? 'selected' : ''; ?> value="3">Rentado</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Tipo de venta:</label>
              <select id="tipo-venta" name="tipo-venta" class="form-control">
                <option <?php echo $artesano->tipoVenta == 0 ? 'selected' : ''; ?> value="0"></option>
                <option <?php echo $artesano->tipoVenta == 1 ? 'selected' : ''; ?> value="1">Consumidor final</option>
                <option <?php echo $artesano->tipoVenta == 2 ? 'selected' : ''; ?> value="2">Comercializadores</option>
                <option <?php echo $artesano->tipoVenta == 3 ? 'selected' : ''; ?> value="3">Casa de artesanías</option>
                <option <?php echo $artesano->tipoVenta == 4 ? 'selected' : ''; ?> value="4">Paisanos (USA)</option>
              </select>
            </div>
          </div>
        </div>
        <div class="oculto" id="si-pertenece-taller">       
            <div class="col-md-9">
              <br>
              <h4>La información referente al taller será capturada al guardar los datos de este formulario.<h4>
            </div>
          </div>
        </div>
      </fieldset><br>
      <fieldset>
        <legend>Datos adicionales</legend>
        <div class="col-md-6">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Año de registro en la Subsecretaria:</label>
            <input type="text" id="fecha-registro-da" name="fecha-registro-da" value="<?php echo $artesano->anioInicioSDA; ?>" class="form-control" placeholder="Ejemplo: 2000" data-validacion-tipo="requerido|numero|min:4:max:4" />
          </div>
          <div class="form-group">
            <label>CUIS SEDESOL:</label>
            <input type="text" id="cadena-cuis" name="cadena-cuis" value="<?php echo $artesano->quiz; ?>" class="form-control" placeholder="Ingrese el CUIS" data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>RFC:</label>
            <input type="text" id="cadena-rfc" name="cadena-rfc" value="<?php echo $artesano->rfc; ?>" class="form-control" placeholder="Ingrese el RFC" data-validacion-tipo="" />
          </div>
          <div class="form-group">
            <label>Fecha de obtención del RFC:</label>
            <input type="text" readonly id="fecha-registro-rfc" name="fecha-registro-rfc" value="<?php echo $artesano->fechaAltaRFC; ?>" class="form-control" placeholder="Selecciona la fecha de obtención" data-validacion-tipo="" />
          </div>
        </div>
      </fieldset><br>
      <fieldset>
        <legend>Entrevista</legend>
        <div class="col-md-4">
          <div class="form-group">
            <label>¿Ha participado en una asociación en el pasado?</label>
            <select  id="asociacion-pasada" name="asociacion-pasada" class="form-control">
              <option <?php echo $artesano->participacionAsocPasada == 1 ? 'selected' : ''; ?> value="1">No</option>
              <option <?php echo $artesano->participacionAsocPasada == 2 ? 'selected' : ''; ?> value="2">Si</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>¿Actualmente pertenece a una asociación?</label>
            <select id="asociacion-actual" name="asociacion-actual" class="form-control">
              <option <?php echo $artesano->participacionAsocActual == 1 ? 'selected' : ''; ?> value="1">No</option>
              <option <?php echo $artesano->participacionAsocActual == 2 ? 'selected' : ''; ?> value="2">Si</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>¿Cual asociación?:</label>
            <input type="text" id="nombre-asoc-actual" name="nombre-asoc-actual" value="<?php echo $artesano->nombreAsocActual; ?>" disabled="disabled" class="form-control" placeholder="Nombre de la asociación" data-validacion-tipo="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Fidelidad a la rama artesanal:</label>
            <select id="fidelidad" name="fidelidad" class="form-control">
              <option <?php echo $artesano->fidelidadRamaArtesanal == 1 ? 'selected' : ''; ?> value="1">Muy baja</option>
              <option <?php echo $artesano->fidelidadRamaArtesanal == 2 ? 'selected' : ''; ?> value="2">Baja</option>
              <option <?php echo $artesano->fidelidadRamaArtesanal == 3 ? 'selected' : ''; ?> value="3">Normal</option>
              <option <?php echo $artesano->fidelidadRamaArtesanal == 4 ? 'selected' : ''; ?> value="4">Alta</option>
              <option <?php echo $artesano->fidelidadRamaArtesanal == 5 ? 'selected' : ''; ?> value="5">Muy alta</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <span class="obligatorio">* </span><label>Satisfaccion con ser artesano:</label>
            <select id="satisfaccion" name="satisfaccion" class="form-control">
              <option <?php echo $artesano->satisfaccion == 1 ? 'selected' : ''; ?> value="1">Muy baja</option>
              <option <?php echo $artesano->satisfaccion == 2 ? 'selected' : ''; ?> value="2">Baja</option>
              <option <?php echo $artesano->satisfaccion == 3 ? 'selected' : ''; ?> value="3">Normal</option>
              <option <?php echo $artesano->satisfaccion == 4 ? 'selected' : ''; ?> value="4">Alta</option>
              <option <?php echo $artesano->satisfaccion == 5 ? 'selected' : ''; ?> value="5">Muy alta</option>
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <span class="obligatorio">* </span><label>¿Cuáles son sus necesidades prioritarias?(Describa):</label>
            <textarea id="necesidades" name="necesidades" cols="30" rows="2" data-validacion-tipo="requerido" placeholder="Ingrese una descripción" class="form-control"><?php echo $artesano->necesidadesPrioritarias; ?></textarea>
          </div>
        </div> 
      </fieldset>
      <div class="text-right">
        <button id="btn-submit-frm-artesano" class="btn btn-success" onclick="javascript:return confirm('¿Quieres guardar los datos capturados?');">Guardar</button>
      </div>
    </form>
</div>
</div>