let rows = document.querySelectorAll('.recordRow');

function iseven(num) {
    return num % 2 == 0;
}

let num = 0

rows.forEach(row => {
    if(!iseven(num)){
        row.style.backgroundColor = "#ffffff";
    }
    else {
        row.style.backgroundColor = "00ffff";
    }
    num++;
});