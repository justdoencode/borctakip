
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
  <form action="{{'borcekle'}}" method="post">
    @csrf

  <div class="borcortala">
              <div class="card-header">
                <h2 class="card-title">Borç Bilgileri</h2>
              </div>
              <div class="card-body">

                      <!-- select -->
                          <div class="form-group">
                            <label>İsim :</label>
                            <select class="form-control" name="isim">
                              @foreach ($veriler as $veri)
                                <option>{{$veri['ad']." ".$veri['soyad']." (".$veri['kurum'].")"}}</option>
                              @endforeach
                            </select>
                          </div>


                          <input type="number" class="form-control" name="id" style="display: none;" value="{{$veri->id}}"></input>

                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Borç Başlangıç Tarihi:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" name="borcBaslangic">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Borç Bitiş Tarihi:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" name="borcBitis">
                  </div>
                  <!-- /.input group -->
                </div>



                <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Para Türü</label>
                        <select class="form-control" name="paraTuru">
                          <option>TL</option>
                          <option>Dolar</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Borç Tutarı:</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="number" class="form-control" name="borcTutari">
                      </div>
                      <!-- /.input group -->
                    </div>

                    <div class="form-group">
                      <label>Borç Açıklaması:</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <textarea rows="6" cols="60" name="aciklama"></textarea>
                      </div>
                      <!-- /.input group -->
                    </div>

                <div>
                  <input type="submit" name="ekle" class="btn btn-primary" value="Borç Ekle"></input>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
          </form>
@endsection
