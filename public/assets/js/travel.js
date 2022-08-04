let btn = document.querySelector("#addStep");
let divStep = document.querySelector("#divStep");
let deleteBtn = document.querySelectorAll(".deleteStep");

btn.addEventListener("click", (e) => {
    var template = document.querySelector("#add-step");
    var clone = document.importNode(template.content, true);
    divStep.appendChild(clone);

    deleteBtn = document.querySelectorAll(".deleteStep");
    console.log(deleteBtn);

    for (const Dbtn of deleteBtn) {
        Dbtn.addEventListener("click", (e) => {
            e.target.parentElement.remove();
        });
    }
});
