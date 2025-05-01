document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const requiredFields = form.querySelectorAll("input[required], select[required]");

    form.addEventListener("submit", function (e) {
        let hasError = false;

        requiredFields.forEach(field => {
            const errorSpan = field.nextElementSibling;

            if (!field.value.trim()) {
                e.preventDefault(); // Stop form
                field.classList.add("invalid");
                field.classList.remove("valid");
                if (errorSpan && errorSpan.classList.contains("error-message")) {
                    errorSpan.textContent = "This field is required";
                }
                hasError = true;
            } else {
                field.classList.remove("invalid");
                field.classList.add("valid");
                if (errorSpan && errorSpan.classList.contains("error-message")) {
                    errorSpan.textContent = "";
                }
            }
        });

        if (!hasError) {
            // Optionally allow form to submit
            // or show success message
        }
    });
});
