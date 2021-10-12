
@extends('home')
@section('css')
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <style>
  .textboxclass {
    height: 200px;
    width: 200px;
  }
  .borcortala{
      display: flex;
      justify-content: center;
      align-items: center;
      display: table;
      margin: 5px auto;
  }
  </style>


@endsection

@section('govde')
  <form action="{{route('borcluekle')}}" method="post">
    @csrf

  <div class="borcortala">
              <div class="card-header">
                <h2 class="card-title">Borç Bilgileri</h2>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label>Adı :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" name="ad" class="form-control">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Soyadı :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" name="soyad" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label>Kurum :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                    <input type="text" name="kurum" class="form-control">
                  </div>
                </div>


                <div class="form-group">
                  <label>Telefon Numarası:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="telefon" maxlength="11" value="0">
                  </div>
                  <!-- /.input group -->
                </div>

                    <div class="form-group">
                      <label>Adres:</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <textarea name="adres" rows="6" cols="60"></textarea>
                      </div>
                      <!-- /.input group -->
                    </div>

                <div>
                  <input type="submit" name="borcluekle" class="btn btn-primary" value="Borçlu Ekle"></input>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
          </form>
@endsection
