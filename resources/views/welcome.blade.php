<title>
    Dashboard Utama SK Kari
  </title>
@include('layout.header')

    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <div class="row">
       @foreach ($semuakelas as $kelas)
      <div class="col-xl-2 col-sm-2 mb-xl-5 mb-4">
      <a href="/senarai/{{$kelas->class_id}}" class="btn-link">
       <div class="card">
         <div class="card-header mx-4 p-3 text-center">
          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
           <i class="material-icons opacity-10">person</i>
             </div>
             </div>
        <div class="card-body pt-0 p-3 text-center">
            <h6 class="text-center mb-0">Tahun {{$kelas->class_name}}</h6>
                <span class="text-xs">{{ $school->school_name }}</span>
                <hr class="horizontal dark my-3">
                <h5 class="mb-1">{{ $kelas->totalPelajar }} Pelajar</h5>
            </div>
         </div>
        </a>
        </div>
        @endforeach
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
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
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Kehadiran Mingguan </h6>
              <p class="text-sm "> SK Kari </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">person</i>
                <p class="mb-0 text-sm"> 25 orang pelajar purata tidak hadir </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
            <h6 class="mb-0 "> Kehadiran Bulanan </h6>
              <p class="text-sm "> SK Kari berhad </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">person</i>
                <p class="mb-0 text-sm"> 35 orang pelajar purata tidak hadir </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      @include('layout.layout')

