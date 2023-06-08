//INTERESSES

let dataInteresses = document.getElementById("dados_interesses_imoveis").textContent
let obj = JSON.parse(dataInteresses)

let imoveis= [];
let interessesCount = [];
let counter = 0;
let barColors = ['red','yellow','orange', 'brown','red','yellow','orange', 'brown','red','yellow','orange', 'brown'];
function showdata(item){
    imoveis[counter] = obj[counter].municipio+"-"+obj[counter].preco
    interessesCount[counter] = parseInt(obj[counter].interesseCount)
    counter++
}

let dataReceitas = document.getElementById("dados_receitas_imoveis").textContent
let objReceitas = JSON.parse(dataReceitas)

let receitas = []
let receitasCount = []
let counterReceitas = 0;
function countReceitas(item)
{
    receitas[counterReceitas] = objReceitas[counterReceitas].municipio+"-"+
    objReceitas[counterReceitas].preco;
    receitasCount[counterReceitas] =
    parseInt(objReceitas[counterReceitas].qtd_meses) *
     parseInt(objReceitas[counterReceitas].preco)
    counterReceitas++;
}

obj.forEach(showdata);

objReceitas.forEach(countReceitas);


new Chart("interesses_imoveis", {
    type: "bar",
    data: {
        labels: imoveis,
        datasets: [{
            backgroundColor: barColors,
            data: interessesCount
        }]
    },
    options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Contagens dos Interesses por imoveis"
        }
    }
});
new Chart("receitas_imoveis", {
    type: "bar",
    data: {
        labels: receitas,
        datasets: [{
            backgroundColor: barColors,
            data: receitasCount
        }]
    },
    options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Receitas geradas pelos seus imoveis"
        }
    }
});

