<title>
    Profile Pelajar {{$id}}
  </title>

  
@include('layout.header')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-8">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">John Appipol</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarikh</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Masa Prod In</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Kehadiran</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  </tr>
                </thead>
                <tbody>
                @for($i = 1; $i < 7; $i++)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1 text-sm">
                        <div>
                          <p>1/1/2024</p>
                        </div>
                      </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center d-flex px-2 py-1">
                            <h6 class="mb-0 text-sm">07:18:23 AM</h6>
                            <p class="text-xs text-secondary mb-0">OnTime</p>
                        </div>
                    </td>
                    @if ($i % 2 == 0)
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success">Hadir</span>
                        </td>
                    @else
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-danger">Tidak Hadir</span>
                        </td>
                    @endif
                    <td class="align-middle text-center">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit
                        </button>
                    </td>
                  </tr>
                @endfor
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
              <img src="../assets/img/team-4.jpg" class="rounded-3" style="width: 150px;" alt="user6">
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">John Appipol Paus</h6>
            <hr class="dark horizontal">
            <p class="text-sm ">Id Pelajar : {{$id}}</p>
            <p class="text-sm ">Kelas : 1 Kawdu</p>
            <p class="text-sm ">Kontak Penjaga : +6016-6888299</p>
            <p class="text-sm "> Jumlah Hadir Kelas : 2/2</p>
            <p class="text-sm "> Peratusan Kehadiran : 100%</p>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <p class="mb-0 text-sm"> Boleh ltak graph for percent dtg n x dtg sk</p>
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
              <h5 class="modal-title" id="exampleModalLabel">Ubah status kehadiran pelajar?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              details pelajar yg nk diubah status kehadiran exp nama , kelas, peratusan kehadiran, guru kelas n then highlightkn hari apa nk diubah n status terkini sblum diubah.
              <hr class="dark horizontal">
              Sila Pilih status dibawah
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak Hadir</button>
              <button type="button" class="btn btn-success">Hadir</button>
            </div>
          </div>
        </div>
    </div>


@include('layout.layout')
