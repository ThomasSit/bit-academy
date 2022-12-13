window.addEventListener("load", () => {
    // load roept de fucntie op dat canvas execute
    // hier haal je de canvas
    const canvas = document.querySelector("#canvas");
    // ctx staat voor context
    // hier laten we zien welke context we werken nu werken we met 2d
    const ctx = canvas.getContext("2d");
    // automatische height 
    canvas.height = window.innerHeight;
    canvas.width = window.innerWidth;

    //de Circles op bepaalde posities
    ctx.strokeStyle = "blue";
    ctx.beginPath();
    ctx.arc(586, 50, 50, 0, 2 * Math.PI);
    ctx.stroke();

    ctx.strokeStyle = "black";
    ctx.beginPath();
    ctx.arc(200, 220, 50, 0, 2 * Math.PI);
    ctx.stroke();

    ctx.strokeStyle = "black";
    ctx.beginPath();
    ctx.arc(972, 220, 50, 0, 2 * Math.PI);
    ctx.stroke();

    ctx.strokeStyle = "black";
    ctx.beginPath();
    ctx.arc(972, 400, 50, 0, 2 * Math.PI);
    ctx.stroke();

    ctx.strokeStyle = "black";
    ctx.beginPath();
    ctx.arc(1084, 580, 50, 0, 2 * Math.PI);
    ctx.stroke();

    ctx.strokeStyle = "black";
    ctx.beginPath();
    ctx.arc(860, 580, 50, 0, 2 * Math.PI);
    ctx.stroke();

    // hieronder komen de lijnen
    ctx.beginPath();
    ctx.moveTo(246, 200);
    ctx.lineTo(536, 50);
    ctx.strokeStyle = "black";
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(636, 50);
    ctx.lineTo(927, 195);
    ctx.strokeStyle = "black";
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(972, 270);
    ctx.lineTo(972, 350);
    ctx.strokeStyle = "black";
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(1000, 442);
    ctx.lineTo(1060, 537);
    ctx.strokeStyle = "black";
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(940, 440);
    ctx.lineTo(890, 540);
    ctx.strokeStyle = "black";
    ctx.stroke();

    ctx.font = "15px";
    ctx.strokeStyle = "blue";
    ctx.strokeText("HTML/CSS - Adventurer", 530, 115);
    //red circle 56 * 60

    ctx.font = "12px";
    ctx.strokeText("HTML/CSS - Adventurer", 140, 285);
    // green

    ctx.font = "12px";
    ctx.strokeText("HTML/CSS - Adventurer", 917, 285);
    // blue

    ctx.font = "12px";
    ctx.strokeText("HTML/CSS - Adventurer", 915, 465);
    // yellow

    ctx.font = "12px";
    ctx.strokeText("HTML/CSS - Adventurer", 1030, 650);

    ctx.font = "12px";
    ctx.strokeText("HTML/CSS - Adventurer", 800, 650);




});







