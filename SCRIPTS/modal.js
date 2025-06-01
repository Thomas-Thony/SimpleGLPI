window.onload = function () {
    const modalButtons = document.querySelectorAll("[data-toggle=modal]");

    for (let button of modalButtons) {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            let targetSelector = this.dataset.target;
            let modal = document.querySelector(targetSelector);

            if (!modal) return;

            modal.classList.add("show");

            const modalClose = modal.querySelectorAll("[data-dismiss=dialog]");
            for (let close of modalClose) {
                close.addEventListener("click", (e) => {
                    e.preventDefault();
                    modal.classList.remove("show");
                });
            }

            modal.addEventListener("click", function () {
                modal.classList.remove("show");
            });

            const modalContent = modal.querySelector(".modal-content");
            if (modalContent) {
                modalContent.addEventListener("click", function (e) {
                    e.stopPropagation();
                });
            }
        });
    }
}
