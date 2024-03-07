<title>Dashboard {{ $school->school_name }}</title>
@include('layout.header')

<div class="container-fluid py-4">
    <div class="row">
      @php
            $semuakelasCollection = collect($semuakelas);
        @endphp
        @if ($semuakelasCollection->isEmpty())
            <div class="col-12">
                <p>No classes available right now.</p>
            </div>
        @else
            @foreach ($semuakelas as $kelas)
                @if ($kelas->totalPelajar > 0)
                    <div class="col-xl-2 col-sm-2 mb-xl-5 mb-4">
                        <a href="/senarai/{{ $kelas->class_id }}" class="btn-link">
                            <div class="card">
                                <div class="card-header mx-4 p-3 text-center">
                                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                        <i class="material-icons opacity-10">person</i>
                                    </div>
                                </div>
                                <div class="card-body pt-0 p-3 text-center">
                                    <h6 class="text-center mb-0">Tahun {{ $kelas->class_name }}</h6>
                                    <span class="text-xs">{{ $school->school_name }}</span>
                                    <hr class="horizontal dark my-3">
                                    <h5 class="mb-1">{{ $kelas->totalPelajar }} Pelajar</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>

@include('layout.layout')
