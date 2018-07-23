var list = []
var desc = []
var result = []
for(var i = 0; i < list.length; i++){
    result.push({
        id: i+1,
        nom: list[i],
        description: desc[i]
    });
}
console.log(result);
console.log(JSON.stringify(result));