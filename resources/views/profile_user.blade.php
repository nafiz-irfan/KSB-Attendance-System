<title>
  Profil 
  </title>
@include('layout.header')

<div class="col-lg-5 col-md-8 col-12 mx-auto" style="width: 70%">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-4 mx-md-4 mt-n8">
        <div class="row gx-3 mb-0 p-3">
          <div class="col-auto">
            <div class="h-100">
                <div class="card-body p-3">
                  <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/book.gif" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                  </div>
                  <h5 class="mb-1">
                    Hi {{$user->name}}
                  </h5>
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama:</strong> &nbsp; {{$user->name}}</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Peranan:</strong> &nbsp; {{$user->role}}</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{$user->email}}</li>
                  </ul>
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class=" mb-0 px-0 py-1  " >
                    <!-- <i class="material-icons text-lg position-relative">home</i> -->
                    <span class="">Kemaskini Nama Profil, Email dan Kata Laluan.</span>
                  </a>
                </li>
              </ul>
            </div>
            <form method="POST" id="registrationForm">
              @csrf
              @method('PUT')
            
              <div class="input-group input-group-outline my-3">
                <label class="form-label" for="name"></label>
                <input class="form-control" value = "{{$user->name}}" id="name" type="name" name="name" placeholder="Nama" required>
              </div>

            <div class="input-group input-group-outline my-3">
              <label class="form-label" for="email"></label>
              <input class="form-control" value = "{{$user->email}}" id="email" type="email" name="email" placeholder="Email" required>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <div class="input-group input-group-outline my-3">
                <label class="form-label" for="password"></label>
                <input class="form-control" id="password" type="password" name="password" placeholder="Kata Laluan Baharu" required autocomplete="new-password">
            </div>

            <div class="input-group input-group-outline my-3">
                <label class="form-label" for="password_confirmation"></label>
                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Sahkan Kata Laluan Baharu" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn bg-gradient-primary w-100  mb-2">Simpan</button>

            </form>
          </div>
        </div>
        </div>
      </div>
    </div>

    <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('password_confirmation').value;

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            event.preventDefault(); 
        } else {
            // Display success notification using SweetAlert2
            Swal.fire({
                icon: 'success',
                title: 'Profile Updated Successfully!',
                showConfirmButton: false
            });
            
        }
    });
</script>