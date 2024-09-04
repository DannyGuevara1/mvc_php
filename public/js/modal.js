const btnOpenModal = document.querySelector("[data-id='abrir-modal']");
const btnCloseModal = document.querySelector("[data-id='cerrar-modal']");
const modal = document.querySelector(".modal");

btnOpenModal.addEventListener("click", () => {
    modal.showModal();
});

btnCloseModal.addEventListener("click", () => {
    modal.setAttribute("close", "");
    modal.addEventListener("animationend", () => {
        modal.removeAttribute("close");
        modal.close();
    }, { once: true });
});
