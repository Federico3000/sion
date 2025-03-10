<!-- actividades.php -->
<div class="row">
    <!-- Tarjeta 1: Crear Actividad -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Crear Actividad</h5>
                <p class="card-text">Crea una nueva actividad en el calendario.</p>
                <!-- Botón que abre el modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearActividadModal">
                    Crear
                </button>
            </div>
        </div>
    </div>
    <!-- Tarjeta 2 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Editar Actividad</h5>
                <p class="card-text">Edita la información de una actividad existente.</p>
                <a href="#" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
    <!-- Tarjeta 3 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Eliminar Actividad</h5>
                <p class="card-text">Elimina una actividad del calendario.</p>
                <!-- Botón que redirige a la página de eliminación de actividades -->
                <a href="eliminar_actividad.php" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
    <!-- Tarjeta 4 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ver Calendario</h5>
                <p class="card-text">Visualiza todas las actividades en el calendario.</p>
                <a href="#" class="btn btn-info">Ver</a>
            </div>
        </div>
    </div>
    <!-- Tarjeta 5 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Asignar Responsable</h5>
                <p class="card-text">Asigna un responsable a una actividad.</p>
                <a href="#" class="btn btn-success">Asignar</a>
            </div>
        </div>
    </div>
    <!-- Tarjeta 6 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Agregar Participantes</h5>
                <p class="card-text">Agrega participantes a una actividad.</p>
                <a href="#" class="btn btn-secondary">Agregar</a>
            </div>
        </div>
    </div>
    <!-- Tarjeta 7 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Generar Recordatorio</h5>
                <p class="card-text">Envía un recordatorio a los participantes.</p>
                <a href="#" class="btn btn-primary">Generar</a>
            </div>
        </div>
    </div>
    <!-- Tarjeta 8 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Exportar Actividades</h5>
                <p class="card-text">Exporta la lista de actividades a un archivo CSV.</p>
                <a href="#" class="btn btn-warning">Exportar</a>
            </div>
        </div>
    </div>
    <!-- Tarjeta 9 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Importar Actividades</h5>
                <p class="card-text">Importa actividades desde un archivo CSV.</p>
                <a href="#" class="btn btn-info">Importar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Crear Actividad (colócalo al final del archivo) -->
<div class="modal fade" id="crearActividadModal" tabindex="-1" aria-labelledby="crearActividadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="crearActividadForm">
        <div class="modal-header">
          <h5 class="modal-title" id="crearActividadModalLabel">Crear Actividad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <!-- Nombre de la Actividad -->
          <div class="mb-3">
            <label for="actividadNombre" class="form-label">Nombre de la Actividad</label>
            <input type="text" class="form-control" id="actividadNombre" placeholder="Ej: Reunión de Jóvenes">
          </div>
          <!-- Fecha y Hora -->
          <div class="mb-3">
            <label for="actividadFecha" class="form-label">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" id="actividadFecha">
          </div>
          <!-- Descripción -->
          <div class="mb-3">
            <label for="actividadDescripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="actividadDescripcion" rows="3" placeholder="Descripción de la actividad"></textarea>
          </div>
          <!-- Público Objetivo -->
          <div class="mb-3">
            <label class="form-label">Público Objetivo</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="ninos" id="publicoNinos">
              <label class="form-check-label" for="publicoNinos">Niños</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="jovenes" id="publicoJovenes">
              <label class="form-check-label" for="publicoJovenes">Jóvenes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="adultos" id="publicoAdultos">
              <label class="form-check-label" for="publicoAdultos">Adultos</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="ancianos" id="publicoAncianos">
              <label class="form-check-label" for="publicoAncianos">Ancianos</label>
            </div>
          </div>
          <!-- Ministerio -->
          <div class="mb-3">
            <label for="actividadMinisterio" class="form-label">Ministerio</label>
            <select class="form-select" id="actividadMinisterio">
              <option selected disabled>Selecciona un ministerio</option>
              <option value="ministerio1">Ministerio de Alabanza</option>
              <option value="ministerio2">Ministerio de Oración</option>
              <option value="ministerio3">Ministerio de Jóvenes</option>
              <!-- Más opciones según necesidad -->
            </select>
          </div>
          <!-- Responsable / Líder -->
          <div class="mb-3">
            <label for="actividadResponsable" class="form-label">Responsable / Líder de Área</label>
            <input type="text" class="form-control" id="actividadResponsable" placeholder="Nombre del responsable">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Crear Actividad</button>
        </div>
      </form>
    </div>
  </div>
</div>