document.getElementById("form").addEventListener("submit", function(e) {
  let fname = document.getElementById("fname").value;
  let lname = document.getElementById("lname").value;

  if (fname === "" || lname === "") {
    alert("Fields cannot be empty");
    e.preventDefault();
  }

  if (fname.length < 2 || lname.length < 2) {
    alert("Minimum 2 characters required");
    e.preventDefault();
  }
});