<title>
    @if ($user->role != 'superadmin' && isset($school))
        Senarai Guru {{ $school->school_name }}
    @else
        Senarai Admin
    @endif
</title>

@include('layout.header')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        @if ($user->role != 'superadmin' && isset($school))
                            <h6 class="text-white text-capitalize ps-3">Senarai Guru {{ $school->school_name }}</h6>
                        @else
                            <h6 class="text-white text-capitalize ps-3">Senarai Admin</h6>
                        @endif
                    </div>
                </div>
                  <div class="card-body px-0 pb-2">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline mx-3">
                            <label class="form-label">Cari </label>
                            <input type="text" id="searchInput" class="form-control">
                        </div>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="teacherTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Guru</th>
                                    
                                     @if ($user->role != 'superadmin')
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">Role</th>
                                    @else
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">Sekolah</th>
                                    @endif
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 align-middle text-center">Kontak Nombor</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hapus Rekod</th>
                                    {{-- <th class="text-secondary opacity-7">Hapus Rekod</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($guru as $guruItem)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user6">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $guruItem->name }}</h6>
                                                    <!-- <p class="text-xs text-secondary mb-0">Johan</p> -->
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                             @if ($user->role != 'superadmin')
                                             <span class="text-secondary text-xs font-weight-bold">{{ $guruItem->role }}</span>
                                            @else
                                            <span class="text-secondary text-xs font-weight-bold"> {{ $namasekolah[$guruItem->id] }}</span>
                                            @endif
                                            
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $guruItem->email }}</span>
                                        </td>
                                        <td class="align-middle">
                                        <button type="button" class="btn btn-outline-info editButton" data-bs-toggle="modal" data-bs-target="#editTeacherModal" data-teacher-id="{{ $guruItem->id }}">
                                                Edit
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('edit.destroyGuru',$guruItem->id) }}" method="post" id="deleteGuru">
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
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="editTeacherModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTeacherModalLabel">Edit Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if(isset($guruItem))
          <!-- Form for editing teacher details -->
          <form id="editTeacherForm">
            <div class="mb-3">
              <label for="editTeacherName" class="form-label">Name</label>
              <input type="text" class="form-control" id="editTeacherName" value="{{ $guruItem->name }}">
            </div>
            <div class="mb-3">
              <label for="editTeacherEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="editTeacherEmail" value="{{ $guruItem->email }}">
            </div>
            <!-- You can add more fields here for editing -->
          </form>
        @else
          <p>No teacher data available.</p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChangesButton">Save changes</button>
      </div>
    </div>
  </div>
</div>

@include('layout.layout')

<script>
//sewwt alert
document.getElementById('deleteGuru').addEventListener('submit', function(event) {
        // Prevent form submission
        event.preventDefault();

        // Display success notification using SweetAlert2
        Swal.fire({
            icon: 'success',
            title: 'Rekod telah ditambah!',
            showConfirmButton: 'OK'
        }).then(function() {
            // Once the notification is closed, submit the form
            document.getElementById('deleteGuru').submit();
        });
});


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
