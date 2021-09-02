  <!-- Modal -->
  <div class="modal fade" id="modalEliminarParticipa-{{ $participa->id_pa }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel-{{ $participa->id_pa }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form method="POST" action="{{ route('participa.eliminar', $participa->id_pa) }}">
              @csrf
              @method('DELETE')
              <div class="modal-content">
                  <h3>Confirmar eliminacion del participante  {{ $participa->usuario_dato->ud_nom }} {{ $participa->usuario_dato->ud_app }} en el proyecto {{ $participa->proyecto->p_nom }}</h3>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Eliminar</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
