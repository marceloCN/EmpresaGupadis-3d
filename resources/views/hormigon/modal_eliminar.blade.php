  <!-- Modal -->
  <div class="modal fade" id="modalEliminarHormigon-{{ $datos->h_id }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel-{{ $datos->h_id }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form method="POST" action="{{ route('hormigon.eliminar', $datos->h_id) }}">
              @csrf
              @method('DELETE')
              <div class="modal-content">
                  <h3>Confirmar de eliminacion del hormigon  {{ $datos->h_nom }} </h3>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Eliminar</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
