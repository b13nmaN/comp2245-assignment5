const lookupBtn = document.getElementById("lookup");
const lookupCitiesBtn = document.getElementById("lookup-cities");
const inputVal = document.getElementById("country");
const results = document.getElementById("result");

lookupBtn.addEventListener("click", async () => {
    try {
        await lookupCountry();
    } catch (error) {
        console.log(error);
    }
});

lookupCitiesBtn.addEventListener("click", async () => {
    try {
        await lookupCities();
    } catch (error) {
        console.log(error);
    }
})

// search for a country
async function lookupCountry() {
    try {
        const res = await fetch("world.php?country=" 
        + inputVal.value );
        
        const data = await res.text(); 
        console.log("This is the data: ", data);
        displayResult(data);
    } catch (error) {
        console.log(error);
    }
}

// search for cities

async function lookupCities() {
    try {
        const res = await fetch("world.php?country=" 
        + inputVal.value + "&lookup=cities");
        
        const data = await res.text(); 
        console.log("This is the data: ", data);
        displayResult(data);
    } catch (error) {
        console.log(error);
    }
}
function displayResult(data) {
    results.innerHTML = data;
}
