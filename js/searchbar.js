let availableKeywords = [
    'Restaurant 1',
    'Restaurant 2',
    'Restaurant 3',
    'Restaurant 4',
    'Restaurant 5',
    'Westlands',
    'Langata',
    'Lavington',
    'Karen',
    'Wangige',
    'Ruiru'
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");


inputBox.onkeyup = function(){
    let result = [];
    let input = inputBox.value;
    if(input.lenght){
        result = availableKeywords.filter((keyword)=>{
            return keyword.toLowerCase().includes(input.toLowerCase());
        });
        console.log(result);
    }
}