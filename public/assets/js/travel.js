let btn = document.querySelector("#addStep");
let divStep = document.querySelector("#divStep");
let deleteBtn = document.querySelectorAll(".deleteStep");

btn.addEventListener("click", (e) => {
    divStep.innerHTML +=
        '<div class="d-flex justify-content-between align-items-center mb-2 gap-2 cityAutocomplete"><input type="text" class="form-control" id="inputStep" name="step[]" value="" placeholder="Etape du trajet" required></input> <button type="button" class="btn btn-danger deleteStep"> X </button></div>';

    deleteBtn = document.querySelectorAll(".deleteStep");
    console.log(deleteBtn);

    for (const Dbtn of deleteBtn) {
        Dbtn.addEventListener("click", (e) => {
            e.target.parentElement.remove();
        });
    }
});
