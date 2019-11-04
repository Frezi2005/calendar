var correctCaptcha = function(response) {
    if (response != 0) {
        document.getElementById("registerBtn").removeAttribute("disabled");
        document.getElementById("registerBtn").style.fontWeight = "bold";
    } else {
        console.log("error");
    }
};

