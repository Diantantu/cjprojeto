if(!!(window.addEventListener)) window.addEventListener('DOMContentLoaded', main);
else window.attachEvent('onload', main);

function main() {
    lineChart();
    barsChart();
    pieChart();
    doughnutChart();
    polarArea();
    radarArea();
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

//ESTATISTICA VENDAS

let vendasmes = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

let vendasArray = (getCookie("totalvenda")).split('-')
let mesArray = (getCookie("totalmes")).split('-')
let A = 0
let B = 0

for( var i = 0; i <= vendasArray.length; i++){
    A = parseInt(mesArray[i])
    B = parseInt(vendasArray[i])
    vendasmes[A - 1] = B
}



//ESTATISTICA ALUGUER
let aluguermes = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

let aluguerArray = (getCookie("totalaluguervalor")).split('-')
let aluguermesArray = (getCookie("totalaluguermes")).split('-')
A = 0
B = 0

for( var i = 0; i <= aluguerArray.length; i++){
    A = parseInt(aluguermesArray[i])
    B = parseInt(aluguerArray[i])
    aluguermes[A - 1] = B
}

//ESTATISTICA Imoveis
let imoveismes = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

let imoveisArray = (getCookie("totalimoveisvalor")).split('-')
let imoveismesArray = (getCookie("totalimoveismes")).split('-')
A = 0
B = 0

for( var i = 0; i <= imoveisArray.length; i++){
    A = parseInt(imoveismesArray[i])
    B = parseInt(imoveisArray[i])
    imoveismes[A - 1] = B
}
//ESTATISTICA interacoes
let interacoesmes = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

let interacoesArray = (getCookie("totalinteracoesvalor")).split('-')
let interacoesmesArray = (getCookie("totalinteracoesmes")).split('-')
A = 0
B = 0

for( var i = 0; i <= interacoesArray.length; i++){
    A = parseInt(interacoesmesArray[i])
    B = parseInt(interacoesArray[i])
    interacoesmes[A - 1] = B
}


function lineChart() {
    var data = {
        labels : ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
        datasets : [
            {
            fillColor : "rgb(19, 175, 247)",
            strokeColor : "rgb(19, 175, 247)",
            pointColor : "rgba(151,187,205,8)",
            pointStrokeColor : "#fff",
            data : vendasmes,
            label : 'Vendidas'
        },
        {
            fillColor : "rgba(61, 175, 46, 0.5)",
            strokeColor : "rgba(61, 175, 46, 0.7)",
            pointColor : "rgba(151,187,205,8)",
            pointStrokeColor : "#fff",
            data : aluguermes,
            label : 'Alugadas'
        }
        ]
    };

    var ctx = document.getElementById("lineChart").getContext("2d");
    new Chart(ctx).Line(data);

    legend(document.getElementById("lineLegend"), data);
}

function barsChart() {
    var data = {
        labels : ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
        datasets : [
            {
            fillColor : "rgba(255,135,0 ,0.8)",
            strokeColor : "rgba(255,135,0 ,0.8)",
            pointColor : "rgba(220,220,220,1)",
            pointStrokeColor : "#fff",
            data : imoveismes,
            label : 'Imoveis'
        },
        {
            fillColor : "rgba(226, 51, 51, 0.8)",
            strokeColor : "rgba(226, 51, 51, 0.8)",
            pointColor : "rgba(151,187,205,1)",
            pointStrokeColor : "#fff",
            data : interacoesmes,
            label : 'Interações'
        }
        ]
    };

    var ctx = document.getElementById("barsChart").getContext("2d");
    new Chart(ctx).Bar(data);

    legend(document.getElementById("barsLegend"), data);
}
function pieChart() {
    var data = [
        {
            value: 30,
            color:"#F38630",
            label: 'Bears'
        },
        {
            value : 50,
            color : "#E0E4CC",
            label: 'Lynxes'
        },
        {
            value : 100,
            color : "#69D2E7",
            label: 'Reindeer'
        }
    ];

    var ctx = document.getElementById("pieChart").getContext("2d");
    var pieChart = new Chart(ctx).Pie(data);

    legend(document.getElementById("pieLegend"), data, pieChart);
}

function doughnutChart() {
    var data = [
        {
            value: 40,
            color:"#F38630",
            label: 'Animals'
        },
        {
            value : 20,
            color : "#E0E4CC",
            label: 'People'
        },
        {
            value : 30,
            color : "#69D2E7",
            label: 'Aliens'
        }
    ];

    var ctx = document.getElementById("doughnutChart").getContext("2d");
    var doughnutChart = new Chart(ctx).Doughnut(data);

    legend(document.getElementById("doughnutLegend"), data, doughnutChart);
}


function polarArea() {
	var data = [
		{
			value: 300,
			color:"#F7464A",
			highlight: "#FF5A5E",
			label: "Red"
		},
		{
			value: 50,
			color: "#46BFBD",
			highlight: "#5AD3D1",
			label: "Green"
		},
		{
			value: 100,
			color: "#FDB45C",
			highlight: "#FFC870",
			label: "Yellow"
		},
		{
			value: 40,
			color: "#949FB1",
			highlight: "#A8B3C5",
			label: "Grey"
		},
		{
			value: 120,
			color: "#4D5360",
			highlight: "#616774",
			label: "Dark Grey"
		}

	];

	var ctx = document.getElementById("polarChart").getContext("2d");
	var polarChart = new Chart(ctx).PolarArea(data);

	legend(document.getElementById("polarLegend"), data, polarChart);

}


function radarArea() {
	var data = {
		labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
		datasets: [
			{
				label: "My First dataset",
				fillColor: "rgba(220,220,220,0.2)",
				strokeColor: "rgba(220,220,220,1)",
				pointColor: "rgba(220,220,220,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(220,220,220,1)",
				data: [65,59,90,81,56,55,40]
			},
			{
				label: "My Second dataset",
				fillColor: "rgba(151,187,205,0.2)",
				strokeColor: "rgba(151,187,205,1)",
				pointColor: "rgba(151,187,205,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(151,187,205,1)",
				data: [28,48,40,19,96,27,100]
			}
		]
	};

	
	var ctx = document.getElementById("radarChart").getContext("2d");
	var radarChart = new Chart(ctx).Radar(data,{responsive: true});

	legend(document.getElementById("radarLegend"), data, radarChart);
}