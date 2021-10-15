
@extends('home')
@section('css')
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/dropzone/min/dropzone.min.css">
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

  <div class="card card-info" style=" width: 300px; height: 750px;">


              <div class="card-header">
                <h2 class="card-title">Borç Bilgileri</h2>
              </div>

              <div class="card-body">
                @if(session()->has('successMessage'))
                  <div class="alert alert-success">
                    {{ session()->get('successMessage') }}
                  </div>
                @endif

                <!-- select -->
                <div class="form-group">
                  <label>İsim :</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="borclu_id">
                    @foreach ($veriler as $veri)
                      <option value="{{$veri['borclu_id']}}">{{$veri['borclu_ad']." ".$veri['borclu_soyad']." (".$veri['borclu_kurum'].")"}}</option>
                    @endforeach
                  </select>
                </div>



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
                        <select class="form-control" name="para_id">
                          @foreach ($paraTurleri as $paraTuru)
                            <option value="{{$paraTuru['para_id']}}">{{$paraTuru['para_adi']}}</option>
                          @endforeach
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

@section('js')
  <script src="{{asset('assets')}}/plugins/select2/js/select2.full.min.js"></script>

  <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })})

    // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
  </script>

  <script>
    $('#select').change(function () {
        var ID = $(this).val();
    })
</script>
@endsection
