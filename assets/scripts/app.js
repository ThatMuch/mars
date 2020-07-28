// Styling H1 on homepage
if (document.querySelector("h1.section__title")) {
    var str = document.querySelector("h1.section__title").textContent.toLowerCase();

    var strReplaced = str.replace("ubuntu".toLowerCase(), '<span class="primary">ubuntu</span>');
    document.querySelector("h1.section__title").innerHTML = strReplaced;

    var strReplaced2 = strReplaced.replace("france".toLowerCase(), '<span class="light">france</span>');
    document.querySelector("h1.section__title").innerHTML = strReplaced2
}

// Add * for required fields
var inputs = document.querySelectorAll(".wpcf7 .wpcf7-form-control:not([type='submit'])");

inputs.forEach(function(input) {
    if (input.classList.contains("wpcf7-validates-as-required")) {
        if (input.placeholder) {
            input.placeholder += " *";
        } else if (input[0]) {
            input.parentElement.classList.add("select-span");
            input[0].textContent += " *";
            input[0].setAttribute("disabled", true);
        }
    }
})

// 2 line title
var titles = document.querySelectorAll("h2");
titles.forEach(function (title) {
    var titleLength = title.textContent.split(' ').length;

    if (titleLength > 1 && !title.classList.contains("inline")) {
        var newTitle = title.textContent.replace(' ', "<br>");

        title.innerHTML = newTitle;
    }
})