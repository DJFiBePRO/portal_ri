<div class="modal fade" id="staticBackdrop-{{$idCovenant}}" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdrop-{{$idCovenant}}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdrop-{{$idCovenant}}Label">View Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-8 col-sm-6">
              <p><b>ID</b></p>
              <p><b>Caracter</b></p>
              <p><b>Universidad</b></p>
              <p><b>País</b></p>
              <p><b>Continente</b></p>
              <p><b>Resolución</b></p>
              <p><b>Validez</b></p>
              <p><b>Fecha de creación</b></p>
              <p><b>Última Modificación</b></p>
            </div>
            <div class="col-4 col-sm-6">
              <p> {{$idCovenant}}</p>
              <p> {{$covenant->caracter}} </p>
              <p> {{$covenant->university}} </p>
              <p> {{$covenant->country}} </p>
              <p> {{$covenant->continent}} </p>
              <p>{{$covenant->resolution}} </p>
              <p>{{$covenant->is_validity}} </p>
              <p> {{$covenant->created_at}} </p>
              <p> {{$covenant->updated_at}} </p>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> --}}
    </div>
  </div>
</div>