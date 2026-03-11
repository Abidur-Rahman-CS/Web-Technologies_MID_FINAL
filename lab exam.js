let registrants = [];
const form = document.getElementById('registrationForm');
const fullNameInput = document.getElementById('fullName');
const emailInput = document.getElementById('email');
const companyInput = document.getElementById('company');
const attendanceInputs = document.getElementsByName('attendance');
const nameError = document.getElementById('nameError');
const emailError = document.getElementById('emailError');
const attendanceError = document.getElementById('attendanceError');
function validateName() {
    const value = fullNameInput.value.trim();
    if (value.length < 6 || value.length > 100) {
        nameError.textContent = "Name must be between 6 and 100 characters.";
        return false;
    }
    nameError.textContent = "";
    return true;
}
function validateEmail() {
    const value = emailInput.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    if (!emailPattern.test(value)) {
        emailError.textContent = "Please enter a valid professional email address.";
        return false;
    }
    emailError.textContent = "";
    return true;
}
function validateCompany() {
    const value = companyInput.value.trim();
    if (value.length > 100) {
        companyInput.value = value.substring(0, 100); 
    }
    return true;
}
function validateAttendance() {
    let selected = false;
    for (const radio of attendanceInputs) {
        if (radio.checked) {
            selected = true;
            break;
        }
    }
    if (!selected) {
        attendanceError.textContent = "Please select your attendance type.";
        return false;
    }
    attendanceError.textContent = "";
    return true;
}
fullNameInput.addEventListener('input', validateName);
emailInput.addEventListener('input', validateEmail);
companyInput.addEventListener('input', validateCompany);
attendanceInputs.forEach(radio => radio.addEventListener('change', validateAttendance));
form.addEventListener('submit', function(e) {
    e.preventDefault(); 

    const isNameValid = validateName();
    const isEmailValid = validateEmail();
    const isAttendanceValid = validateAttendance();

    if (isNameValid && isEmailValid && isAttendanceValid) {
        let attendanceValue = "";
        for (const radio of attendanceInputs) {
            if (radio.checked) {
                attendanceValue = radio.value;
                break;
            }
        }
        registrants.push({
            name: fullNameInput.value.trim(),
            email: emailInput.value.trim(),
            company: companyInput.value.trim(),
            attendance: attendanceValue
        });
        form.reset();
        alert("Registration successful!");
        updateAnalytics();
    }
});
const analyticsBtn = document.getElementById('analyticsToggleBtn');
const statsPanel = document.getElementById('statsPanel');
const totalCountSpan = document.getElementById('totalCount');
const virtualCountSpan = document.getElementById('virtualCount');
const inPersonCountSpan = document.getElementById('inPersonCount');
function updateAnalytics() {
    totalCountSpan.textContent = registrants.length;
    let virtual = 0;
    let inPerson = 0;
    registrants.forEach(reg => {
        if (reg.attendance === "Virtual") virtual++;
        if (reg.attendance === "In-Person") inPerson++;
    });
    virtualCountSpan.textContent = virtual;
    inPersonCountSpan.textContent = inPerson;
}
analyticsBtn.addEventListener('click', function() {
    if (statsPanel.style.display === "none" || statsPanel.style.display === "") {
        statsPanel.style.display = "block";
        analyticsBtn.textContent = "Hide Event Analytics";
    } else {
        statsPanel.style.display = "none";
        analyticsBtn.textContent = "Show Event Analytics";
    }
});