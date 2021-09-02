  <!-- Modal -->
  <div class="modal fade" id="modalReporte-{{ $participa->id_pa }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel-{{ $participa->id_pa }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form method="POST" action="{{ route('reporte.guardar', $participa->id_pa) }}">
              @csrf
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel-{{ $participa->id_pa }}">
                          Crear reporte para el proyecto {{ $participa->proyecto->p_nom }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <label for="floatingInput">Descripcion:</label>
                      <textarea class="form-control" required rows="3" name="descripcion"></textarea>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
