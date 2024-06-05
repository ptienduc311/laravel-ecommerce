const stars = document.querySelectorAll(".my-rating li");
stars.forEach((star) => {
    star.addEventListener("click", function () {
        let rating = this.getAttribute("data-value");
        document.getElementById("rating").value = rating;

        stars.forEach((s) =>
            s.querySelector("i").classList.remove("theme-color")
        );

        for (let i = 0; i < rating; i++) {
            stars[i].querySelector("i").classList.add("theme-color");
        }
    });
});
