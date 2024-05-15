const form = document.getElementById("contact-form");
const actionUrl = form.getAttribute("action");

form.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    axios
        .post(actionUrl, formData)
        .then(function (response) {
            const message = response.data.message.replace(/<[^>]+>/g, "");
            document.getElementById("message").innerText = message;
            document.getElementById("errors").style.display = "none";
        })
        .catch(function (error) {
            const errorMessage = error.response.data.message;
            document.getElementById("errors").innerHTML = errorMessage;
            document.getElementById("errors").style.display = "block";
            document.getElementById("message").innerText = "";
        });
});
