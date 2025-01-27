<?php require "index.html"
?>

<dialog id="dialogBox">
    <header>
        <h2 class="header">Uw Punten:</h2>
        <button onclick="closeDialog()" id="closeDialogHeader">sluiten</button>
    </header>

    <section>
        <p>
        xxxx</p>
    </section>

    <footer>
        <button onclick="closeDialog()" id="closeDialogFooter">&#x2716</button>
        <button id="deleteButton"></button>
    </footer>
</dialog>
<section>
    <button class=nav-button onclick="showDialog()" id="openDialogBox">Punten</button>
</section>
<style>

#dialogBox::backdrop {
opacity: 1;
background-color: rgb(25, 25, 170);
backdrop-filter: blur(5px);
}
#dialogBox {
box-shadow: 5px 10px #888888;
border-radius: 8px;
border: none;
}
#dialogBox header {
display: flex;
align-items: center;
justify-content: space-between;
}

#closeDialogFooter {
background-color: gray;
border: none;
color: white;
padding: 12px 32px;
font-size: 16px;
margin: 4px 2px;
cursor: pointer;
}

</style>
<script>let dialogBoxId=document.getElementById("dialogBox")

    function showDialog(){
        dialogBoxId.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                e.preventDefault();
            }
        });
        dialogBoxId.showDialog();
    }

    function closeDialog(){
        dialogBoxId.close();
    }
</script>