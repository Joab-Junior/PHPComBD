const dropdownToggle1 = document.getElementById("button1");
const dropdownToggle2 = document.getElementById("button2");
const dropdownMenu1 = document.getElementById("menu1");
const dropdownMenu2 = document.getElementById("menu2");

dropdownToggle1.addEventListener("click", () => {

    toggle(dropdownMenu1);

});

dropdownToggle2.addEventListener("click", () => {

    toggle(dropdownMenu2);

});

function toggle(dropdownMenu) {

    let isVisible = dropdownMenu.classList.contains("dropdownMenuVisible")

    if (isVisible) {

        dropdownMenu.classList.replace("dropdownMenuVisible", "dropdownMenu");

    } else {

        dropdownMenu.classList.replace("dropdownMenu", "dropdownMenuVisible");

    }

}