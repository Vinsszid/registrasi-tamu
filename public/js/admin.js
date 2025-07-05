document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("select-all")
        .addEventListener("change", function () {
            const checkboxes = document.querySelectorAll(
                'input[name="selected_ids[]"]'
            );
            for (let checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });

    const bulkDownloadForm = document.querySelector(
        'form[name="bulk-download-form"]'
    );
    if (bulkDownloadForm) {
        bulkDownloadForm.addEventListener("submit", function (e) {
            const checkboxes = document.querySelectorAll(
                'input[name="selected_ids[]"]:checked'
            );
            if (checkboxes.length === 0) {
                alert("Pilih setidaknya satu data untuk diunduh.");
                e.preventDefault();
            } else {
                checkboxes.forEach(function (checkbox) {
                    const hiddenInput = document.createElement("input");
                    hiddenInput.type = "hidden";
                    hiddenInput.name = "selected_ids[]";
                    hiddenInput.value = checkbox.value;
                    e.target.appendChild(hiddenInput);
                });
            }
        });
    }
});
