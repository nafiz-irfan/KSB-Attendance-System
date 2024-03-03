<title>
  Profile 
  </title>
@include('layout.header')

<div class="col-lg-5 col-md-8 col-12 mx-auto">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-4 mx-md-4 mt-n8">
        <div class="row gx-3 mb-0 p-3">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/book.gif" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
            <div class="h-100">
              <h5 class="mb-1">
              {{$user->name}}
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
              {{$user->role}}
              </p>
                <div class="card-body p-3">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{$user->name}}</li>
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Role:</strong> &nbsp; {{$user->role}}</li>
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
                    <span class="">Ubah informasi di ruangan ini</span>
                  </a>
                </li>
              </ul>
            </div>
            <form id="registrationForm" action="your_action_url" method="POST">
            <div class="input-group input-group-outline my-3">
              <label class="form-label" for="email"></label>
              <input class="form-control" id="email" type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group input-group-outline my-3">
                <label class="form-label" for="password"></label>
                <input class="form-control" id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password">
            </div>

            <div class="input-group input-group-outline my-3">
                <label class="form-label" for="password_confirmation"></label>
                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn bg-gradient-primary w-100  mb-2">Submit</button>
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
            event.preventDefault(); // Prevent form submission
        }
    });
</script>