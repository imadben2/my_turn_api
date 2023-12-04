<div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-start">
                <div class="modal-title" id="exampleModalLabel">
                    <div class="mb">
                        <h3>Confirmation</h3>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="dropcap square">Êtes-vous</span> sûr(e) de vouloir supprimer les données sélectionnées ?
            </div>
            <form action="{{ route('doctors.destroy', 'test') }}" method="post">
                {{ method_field('Delete') }}
                @csrf
                <input id="id" type="hidden" name="id" class="form-control"
                       value="{{ $item->id }}">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button  type="submit" class="btn btn-danger" data-bs-dismiss="modal">Supprimer</button>
            </div>
            </form>
        </div>
    </div>
</div>

