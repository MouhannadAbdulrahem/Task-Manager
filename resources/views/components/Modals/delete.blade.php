@props([
    'message' => '',
    'title' => 'Delete',
])
<div class="modal fade" id="deleteModal" aria-hidden="true" aria-labelledby="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalToggleLabel">{{ ($title) }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="message" class="modal-body">
                <h4> {{ ($message) }} </h4>
            </div>
            <div class="modal-footer">
                <form  method="POST" id="deleteFormModal">
                    @csrf
                    @method('DELETE')
                    <button id="modal-title" class="btn btn-danger" >{{ ($title) }}</button>
                    <button type="button" class="btn btn-outline-secondary fw-bolder fs-5 waves-effect" data-bs-dismiss="modal"
                        aria-label="Close">{{ ('Close') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
