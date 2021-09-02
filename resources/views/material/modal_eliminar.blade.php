  <!-- Modal -->
  <div class="modal fade" id="modalEliminarMaterial-{{ $material->m_id }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel-{{ $material->m_id }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form method="POST" action="{{ route('materiales.eliminar', $material->m_id) }}">
              @csrf
              @method('DELETE')
              <div class="modal-content">
                  <h3>Confirmar eliminacion de material {{ $material->m_nom }}</h3>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Eliminar</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
