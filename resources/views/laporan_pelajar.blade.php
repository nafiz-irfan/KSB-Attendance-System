<title>
    Laporan Pelajar
  </title>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@include('layout.header')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3">Jana Laporan mengikut ketetapan tarikh</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-sm-6">
                            <label for="startDate">Start</label>
                            <input id="startDate" class="form-control" type="date" />
                            <span id="startDateSelected"></span>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <label for="endDate">End</label>
                            <input id="endDate" class="form-control" type="date" />
                            <span id="endDateSelected"></span>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        {{-- <button class="btn btn-secondary" type="button"
                            id="dropdownMenuButton1"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu pt-0"
                            aria-labelledby="dropdownMenuButton1">
                            <input type="text"
                            class="form-control border-0 border-bottom 
                            shadow-none mb-2" placeholder="Search..."
                                oninput="handleInput()">
                        </ul> --}}
                        <div class="input-group input-group-outline mb-3">
                            <select name="kelas" id="kelas" class="form-select input spaces" required>
                                <option selected disabled>Pilih Kelas</option>
                                <option selected disabled>
                                    <input type="text" class="form-control border-0 border-bottom shadow-none mb-2" placeholder="Search..." oninput="handleInput()">
                                </option>
                            </select>
                        </div>
                        </div>
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
    <div class="row">
        <p>test 1 2 3</p>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown button
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
    </div>
</div>

@include('layout.layout')

<script>

// const handleInput = () => {
// 	const inputValue =
// 		document
// 			.querySelector('.form-control').value;
// 	const results =
// 		["apple", "banana", "cherry",
// 			"date", "elderberry"];
// 	const parentElement =
// 		document
// 			.querySelector(".dropdown-menu");
// 	const elementsToRemove =
// 		document.querySelectorAll("li");
// 	elementsToRemove.forEach(element => {
// 		element.remove();
// 	});
// 	if (inputValue) {
// 		const matchingWords =
// 			results
// 				.filter(word => word
// 					.includes(inputValue));
// 		matchingWords.sort((a, b) => {
// 			const indexA =
// 				a.indexOf(inputValue);
// 			const indexB =
// 				b.indexOf(inputValue);
// 			return indexA - indexB;
// 		});
// 		matchingWords.forEach(word => {
// 			const listItem =
// 				document.createElement("li");
// 			const link =
// 				document.createElement("a");
// 			link.classList.add("dropdown-item");
// 			link.href = "#";
// 			link.textContent = word;
// 			listItem.appendChild(link);
// 			parentElement.appendChild(listItem);
// 		});
// 		if (matchingWords.length == 0) {
// 			const listItem =
// 				document.createElement('li');
// 			listItem.textContent = "No Item";
// 			listItem.classList.add('dropdown-item');
// 			parentElement.appendChild(listItem);
// 		}
// 	} else {
// 		results.forEach(word => {
// 			const listItem =
// 				document.createElement("li");
// 			const link =
// 				document.createElement("a");
// 			link.classList.add("dropdown-item");
// 			link.href = "#";
// 			link.textContent = word;
// 			listItem.appendChild(link);
// 			parentElement.appendChild(listItem);
// 		});
// 	}
// }
// handleInput();


</script>