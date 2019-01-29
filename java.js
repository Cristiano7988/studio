var colaborador = " ";


	
		function trocar(t){
			if(t=="t1"){				
				return colaborador = "Elizabeth";
			}
			if(t=="t2"){
				return colaborador = "Sonia";
			}
			if(t=="t3"){
				return colaborador = "Julia";
			}
		}





		function subtrai(c, d, m){
			var str = document.getElementById(c+""+d+""+m).innerHTML;
			inner = str.substring(0,3);

			document.getElementById(c+""+d+""+m).innerHTML = " ";	
			if(inner=="Son"){
				document.getElementById('ctSonia').innerHTML = (conta1[0] -= 1) + totalhorasonia;
				document.getElementById('ctSonia2').innerHTML = (conta1[1] -= 30) + totalaluguelsonia;

				document.getElementsByClassName('barra')[0].style.width = totalbarrasonia + (cresce1[0] -= 10) + "px";
				document.getElementsByClassName('barra')[1].style.width = totalbarra2sonia + (cresce1[1] -= 30) + "px";
			}

			if(inner=="Eli"){
				document.getElementById('ctElizabeth').innerHTML = totalhoraelizabeth + (conta2[0] -= 1);
				document.getElementById('ctElizabeth2').innerHTML = totalaluguelelizabeth + (conta2[1] -= 30);

				document.getElementsByClassName('barra')[2].style.width = totalbarraelizabeth + (cresce2[0] -= 10) + "px";
				document.getElementsByClassName('barra')[3].style.width = totalbarra2elizabeth + (cresce2[1] -= 30) + "px";
			}			
			if(inner=="Jul"){
				document.getElementById('ctJulia').innerHTML = totalhorajulia + (conta3[0] -= 1);
				document.getElementById('ctJulia2').innerHTML = totalalugueljulia + (conta3[1] -= 30);

				document.getElementsByClassName('barra')[4].style.width = totalbarrajulia + (cresce3[0] -= 10) + "px";
				document.getElementsByClassName('barra')[5].style.width = totalbarra2julia + (cresce3[1] -= 30) + "px";
			}
		}


		var
		conta1 = [0, 0, 0],
		conta2 = [0, 0, 0],
		conta3 = [0, 0, 0],
		conta4 = [0, 0, 0],				
		k = 1,
		mostra;

var cresce1 = [0,0, 0];
var cresce2 = [0,0, 0];
var cresce3 = [0,0, 0];
var cresce4 = [0,0, 0];
 


