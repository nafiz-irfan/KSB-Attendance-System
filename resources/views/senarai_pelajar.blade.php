<title>
    Sistem - Senarai Pelajar
  </title>

  
@include('layout.header')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-8">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Senarai Pelajar Kelas {{ $namakelas->class_name }}</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline mx-3">
                    <label class="form-label">Taip nama pelajar di sini....</label>
                    <input type="text" size="10" class="form-control">
                    </div>
                </div>

                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelajar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Kehadiran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kehadiran Hari Ini</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak Penjaga</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($listpelajar as $pelajar)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{{ $pelajar->profile_image_path }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user6">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $pelajar->name }}</h6>
                            <!-- <p class="text-xs text-secondary mb-0">Johan</p> -->
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">100%</p>
                        <!-- <p class="text-xs text-secondary mb-0">Developer</p> -->
                      </td>
                      <td class="align-middle text-center text-sm">
                          @if(count($semakkehadiran[$pelajar->id]) != 0)
                            <span class="badge badge-sm bg-gradient-success">Hadir</span>
                          @else
                            <span class="badge badge-sm bg-gradient-danger">Tidak Hadir</span>
                        @endif
                    </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">012-934 5617</span>
                      </td>
                      <td class="align-middle">
                        <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
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
                <p class="mb-0 text-sm"> 15 pelajar purata tidak hadir </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

@include('layout.layout')

