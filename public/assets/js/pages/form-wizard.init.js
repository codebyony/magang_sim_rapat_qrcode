var currentTab = 0;

function showTab(e) {
	var t = document.getElementsByClassName("wizard-tab");
	t[e].style.display = "block", document.getElementById("prevBtn").style.display = 0 == e ? "none" : "inline", e == t.length - 1 ? document.getElementById("nextBtn").innerHTML = "Submit" : document.getElementById("nextBtn").innerHTML = "Next", fixStepIndicator(e)
}

function nextPrev(e) {
	var t = document.getElementsByClassName("wizard-tab");
	t[currentTab].style.display = "none";

    if (currentTab === t.length - 1) {
        // Jika kita berada di halaman terakhir, kirim formulir
        var form = document.getElementById("addRapat"); // Ganti dengan ID formulir Anda
        form.submit();
      } else {
        currentTab += e;
        showTab(currentTab);
    }
}

function fixStepIndicator(e) {
	for (var t = document.getElementsByClassName("list-item"), n = 0; n < t.length; n++) t[n].className = t[n].className.replace(" active", "");
	t[e].className += " active"
}
showTab(currentTab);