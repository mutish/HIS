// Age calculation from DOB
function calculateAge(dob) {
    const birthDate = new Date(dob);
    const today = new Date();

    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    return age;
}

// Validate required fields on form submission
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;

        const requiredFields = form.querySelectorAll("input[required], select[required]");
        requiredFields.forEach(field => {
            const errorSpan = field.nextElementSibling;
            if (!field.value.trim()) {
                field.classList.add("invalid");
                field.classList.remove("valid");
                if (errorSpan && errorSpan.classList.contains("error-message")) {
                    errorSpan.textContent = "This field is required";
                }
                valid = false;
            } else {
                field.classList.remove("invalid");
                field.classList.add("valid");
                if (errorSpan && errorSpan.classList.contains("error-message")) {
                    errorSpan.textContent = "";
                }
            }
        });

        if (!valid) {
            e.preventDefault(); // prevent form submission
        }
    });

    // Live age calculation (optional)
    const dobInput = document.getElementById("dob");
    const ageInput = document.getElementById("age");
    if (dobInput && ageInput) {
        dobInput.addEventListener("change", () => {
            const dob = dobInput.value;
            const age = calculateAge(dob);
            ageInput.value = age;
        });
    }

    // Clear confirmation (optional)
    const clearButtons = document.querySelectorAll("button[type='reset']");
    clearButtons.forEach(btn => {
        btn.addEventListener("click", (e) => {
            const confirmClear = confirm("Are you sure you want to clear the form?");
            if (!confirmClear) e.preventDefault();
        });
    });
});
