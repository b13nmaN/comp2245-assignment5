const lookupBtn = document.getElementById("lookup");
const country = document.getElementById("country");
const results = document.getElementById("result");

lookupBtn.addEventListener("click", async () => {
    try {
        await lookupCountry();
    } catch (error) {
        console.log(error);
    }
});

// search for a country
async function lookupCountry() {
    try {
        const res = await fetch("world.php?country=" + country.value);
        const data = await res.text(); 
        console.log("This is the data: ", data);
        displayResult(data);
    } catch (error) {
        console.log(error);
    }
}

// search for cities

function displayResult(data) {
    results.innerHTML = data;
}
