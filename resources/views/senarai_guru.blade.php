<title>
    Senarai Guru {{ $school->school_name }}
  </title>

  
@include('layout.header')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                <h6 class="text-white text-capitalize ps-3">Senarai Guru {{ $school->school_name }}</h6>

              </div>
            </div>
            <div class="card-body px-0 pb-2">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline mx-3">
                    <label class="form-label">Cari guru</label>
                    <input type="text" id="searchInput" class="form-control">
                    </div>
                </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="teacherTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Guru</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">Role</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">Kontak Nombor</th> 
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($guru as $guru)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user6">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $guru->name }}</h6>
                            <!-- <p class="text-xs text-secondary mb-0">Johan</p> -->
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $guru->role }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $guru->email }}</span>
                      </td>
                      <td class="align-middle">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModalGuru">
                          Edit
                      </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-4 mt-4 mb-4"> 
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Kehadiran Harian</h6>
              <p class="text-sm ">SK Kari</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">person</i>
                <p class="mb-0 text-sm"> xtau nk buh apa for this section, jumlah guru?? gambar sk? </p>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      </div>
    </div>
@include('layout.layout')

<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#teacherTable tbody tr');

        rows.forEach(row => {
            const name = row.querySelector('h6').textContent.toLowerCase();
            if (name.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>


<!-- Modal -->
<div class="modal fade" id="exampleModalGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $guru->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $guru->name }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $guru->email }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Kata Laluan Lama</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Kata Laluan Baru</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
