<title>
    Laporan Pelajar
  </title>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@include('layout.header')
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3">Jana Laporan mengikut ketetapan tarikh</h6>
                    </div>
                </div>
                <form>
                <div class="card-body px-0 pb-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-sm-6">
                            <label for="startDate">Start</label>
                            <input id="startDate" class="form-control" type="date" required />
                            <span id="startDateSelected"></span>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <label for="endDate">End</label>
                            <input id="endDate" class="form-control" type="date" required/>
                            <span id="endDateSelected"></span>
                        </div>
                    </div>
                    <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                    <div id="myDropdown" class="dropdown-content">
                        <input type="text" placeholder="Search.." id="myInput" >
                        @foreach ($kelas as $kelas)
                        <a href="#">{{ $kelas->class_name }}</a>
                        @endforeach

                        {{-- <a href="#about">About</a>
                        <a href="#base">Base</a>
                        <a href="#blog">Blog</a>
                        <a href="#contact">Contact</a>
                        <a href="#custom">Custom</a>
                        <a href="#support">Support</a>
                        <a href="#tools">Tools</a> --}}
                    </div>
                        </div>
                        </form>
                    <hr class="dark horizontal">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-sm-6">
                            <input class="btn btn-success" type="submit" value="Jana Laporan">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.layout')



<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Search functionality
    document.getElementById('myInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#myDropdown a');

        rows.forEach(row => {
            const name = row.textContent.toLowerCase();
            if (name.includes(searchValue)) {
                row.style.display = 'block';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
