function validateForm() {
    var name = document.forms["covidForm"]["name"].value;
    var email = document.forms["covidForm"]["email"].value;

    //checking if blank spaces have been entered into the name field
    name = name.trim();
    if (name == "") {
        alert("Name is required");
        return false;
    }

    //checking for a valid email address
    const regExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!regExp.test(String(email).toLowerCase())) {
        alert("Please enter a valid email address");
        return false;
    }

}
