<title>
    Profile Pelajar {{ $murid->name }}
  </title>

  
@include('layout.header')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-8">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">{{ $murid->name }}</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Masa Hadir</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Kehadiran</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hapus Rekod</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($KehadiranMurid as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1 text-sm">
                          <div>
                            <p class="mb-0 text-sm">{{ $item->date }}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                          <div class="d-flex flex-column justify-content-center d-flex px-2 py-1">
                            {{-- <h6 class="mb-0 text-sm">{{ $item->aid }}</h6> --}}
                            <h6 class="mb-0 text-sm">{{ ($item->created_at)->timezone('Asia/Kuala_Lumpur')->format('h:i:s A') }}</h6>
                              <!-- <p class="text-xs text-secondary mb-0">OnTime</p> -->
                          </div>
                      </td>
                      {{-- @if ($i % 2 == 0) --}}
                          <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success">Hadir</span>
                          </td>
                      {{-- @else
                          <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-danger">Tidak Hadir</span>
                          </td>
                      @endif --}}
                      <td class="align-middle text-center">
                        <form action="{{ route('edit.destroy',$item->aid) }}" method="post" id="deleteData" class="destroyData">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger btn-sm">X</button>
                        </form>
                          
                      </td>
                    </tr>
                    @endforeach  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1" style="text-align: center">
              {{-- <img src="../assets/img/team-4.jpg" class="rounded-3" style="width: 150px;" alt="user6"> --}}
              <img src="{{ $murid->profile_image_path }}" class="rounded-3" style="width: 150px;" alt="user6">
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">{{ $murid->name }}</h6>
            <hr class="dark horizontal">
            <p class="text-sm ">No Kad : {{ $murid->card_no }}</p>
            <p class="text-sm ">Kelas : {{ $Kelas }}</p>
            <!-- <p class="text-sm "> Jumlah Hadir Kelas : 2/2</p>
            <p class="text-sm "> Peratusan Kehadiran : 100%</p> -->
            <hr class="dark horizontal">
            <div class="d-flex ">
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Rekod Kehadiran
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pilih Tarikh untuk tambah rekod kehadiran murid</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/edit/{{ $murid->id }}" method="post" id="tambahData">
                @csrf
                <strong>Nama Murid : {{ $murid->name }}</strong> <br>
                <strong>No Kad : {{ $murid->card_no }}</strong>
                <hr class="dark horizontal">
                <label for="amendDate">Pilih Tarikh</label>
                <input type="date" name="amendDate" id="amendDate"  class="form-control" required>
                <hr class="dark horizontal">
                <div>
                  <button type="submit" class="btn btn-success">Tambah Rekod</button>
                </div>

              </form>
              {{-- details pelajar yg nk diubah status kehadiran exp nama , kelas, peratusan kehadiran, guru kelas n then highlightkn hari apa nk diubah n status terkini sblum diubah.
              <hr class="dark horizontal">
              Sila Pilih status dibawah --}}
            </div>
            <div class="modal-footer">
              {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak Hadir</button>
              <button type="button" class="btn btn-success">Hadir</button> --}}
            </div>
          </div>
        </div>
    </div>


@include('layout.layout')

<script>
document.getElementsByClassName('destroyData').addEventListener('submit', function(event) {
    // Prevent form submission
    event.preventDefault();

    Swal.fire({
        title: 'Anda yakin ingin menghapus rekod ini?',
        text: "Tindakan ini tidak dapat dibatalkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Rekod telah dipadam!',
                showConfirmButton: 'OK'
            }).then(function() {
                // Once the notification is closed, submit the form
                document.getElementsByClassName('destroyData').submit();
            });
        }
    });
});


document.getElementById('tambahData').addEventListener('submit', function(event) {
        // Prevent form submission
        event.preventDefault();

        // Display success notification using SweetAlert2
        Swal.fire({
            icon: 'success',
            title: 'Rekod telah ditambah!',
            showConfirmButton: 'OK'
        }).then(function() {
            // Once the notification is closed, submit the form
            document.getElementById('tambahData').submit();
        });
});
</script>
