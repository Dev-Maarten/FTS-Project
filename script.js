let dialogBoxId=document.getElementById("dialogBox")

function showDialog(){
    dialogBoxId.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            e.preventDefault();
        }
    });
    dialogBoxId.showModal();
}

function closeDialog(){
    dialogBoxId.close();
}