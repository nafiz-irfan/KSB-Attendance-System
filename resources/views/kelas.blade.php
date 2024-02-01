<title>
    Home - Dashboard
  </title>
@include('layout.header')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <div class="row">
      @for($i = 1; $i < 10; $i++)
      <div class="col-xl-2 col-sm-5 mb-xl-6 mb-6">
      <a href="" class="btn-link">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
              <b>Tahun {{$id}}</b>
                <p class="text-sm mb-0 text-capitalize">Kelas {{$i}}</p>
                @php
                    $total_student = 12;
                    $total_student = $total_student*$i;

                    $total_student_tidakhadir = $total_student - $i
                @endphp
                <h5 class="mb-0">{{$total_student }} Orang Pelajar</h5>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{$total_student_tidakhadir}}</span> pelajar tidak hadir</p>
            </div>
          </div>
      </a>
      </div>
      @endfor
      <div class="row mt-4">
        <div class="col-lg-12 mt-4 mb-4">
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
      
      @include('layout.layout')

</html>