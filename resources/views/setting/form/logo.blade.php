<form class="row g-3 needs-validation" action="{{ route('updateAjustes', $ajuste->id) }}" method="post" id="add_sell_form"
    novalidate="" enctype="multipart/form-data">
    @csrf {{ method_field('PUT') }}
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Logo</label><br>
                <input id="logo" name="logo" class="d-none logo" type="file" onchange="changePreview(this);">
                <label for="logo">
                    <div class="media align-items-center">
                        <div class="mr-3">
                            <div class="avatar avatar-xl">
                                <img id="file-prev" src="{{  !empty($ajuste->logo) ?  asset($ajuste->logo) : 'assets/images/account-add-photo.svg' }}"
                                    class="avatar-img rounded">
                            </div>
                        </div>
                        <div class="media-body">
                            <a class="btn btn-sm btn-light choose-button">Seleccione imagen</a>
                        </div>
                    </div>
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>favicon</label><br>
                <input id="favicon" name="favicon" class="d-none favicon" type="file"
                    onchange="changePreview(this);">
                <label for="favicon">
                    <div class="media align-items-center">
                        <div class="mr-3">
                            <div class="avatar avatar-xl">
                                <img id="file-prev" src="{{  !empty($ajuste->favicon) ?  asset($ajuste->favicon) : 'assets/images/account-add-photo.svg' }}"
                                    class="avatar-img rounded">
                            </div>
                        </div>
                        <div class="media-body">
                            <a class="btn btn-sm btn-light choose-button">Seleccione imagen</a>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <div class="row g-3 col-md-3">
        <button class="btn btn-secondary" type="submit">Actualizar</button>
    </div>
</form>
