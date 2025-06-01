function calcular_ingreso() {
  const sueldo = parseFloat(document.getElementById('sueldo').value) || 0;
  const bonos = parseFloat(document.getElementById('bonos').value) || 0;
  const hora_25 = parseFloat(document.getElementById('horas25').value) || 0;
  const hora_50 = parseFloat(document.getElementById('horas50').value) || 0;
  const hora_100 = parseFloat(document.getElementById('horas100').value) || 0;

  const hora_n = sueldo / 160;
  const total_25 = hora_n * hora_25 * 1.25;
  const total_50 = hora_n * hora_50 * 1.5;
  const total_100 = hora_n * hora_100 * 2;
  const total_ingresos = sueldo + bonos + total_25 + total_50 + total_100;
  const bono = bonos*0.5;

  document.getElementById('temp_total_ingreso').value = total_ingresos.toFixed(2);
   document.getElementById('hora25').value = total_25.toFixed(2);  
  document.getElementById('hora50').value = total_50.toFixed(2);
  document.getElementById('hora100').value = total_100.toFixed(2);
  document.getElementById('bono').value = bono.toFixed(2);
}
['sueldo', 'bonos', 'horas25', 'horas50', 'horas100'].forEach(id => {
  document.getElementById(id).addEventListener('input', calcular_ingreso);
});

// Calcular al cargar la página
window.addEventListener('DOMContentLoaded', calcular_ingreso);

function calcular_egreso() {
  const sueldo = parseFloat(document.getElementById('sueldo').value) || 0;
  const iess = sueldo * 9.45 / 100;
  document.getElementById('iess').value = iess;

  const multas = parseFloat(document.getElementById('multas').value) || 0;
  const atrasos = parseFloat(document.getElementById('atrasos').value) || 0;
  const anticipos = parseFloat(document.getElementById('anticipos').value) || 0;
  const alimentacion = parseFloat(document.getElementById('alimentacion').value) || 0;
  const otros = parseFloat(document.getElementById('otros').value) || 0;

  const total_egresos = iess + multas + atrasos + anticipos + alimentacion + otros;
  const total_ingresos = parseFloat(document.getElementById('temp_total_ingreso').value) || 0;

  document.getElementById('temp_total_egreso').value = total_egresos.toFixed(2);
  document.getElementById('total_ingresos').value = total_ingresos.toFixed(2);
  document.getElementById('total_egresos').value = total_egresos.toFixed(2);
  document.getElementById('temp_iess').value = iess.toFixed(2);
  document.getElementById('temp_multas').value = multas.toFixed(2);
  document.getElementById('temp_atrasos').value = atrasos.toFixed(2);
  document.getElementById('temp_anticipos').value = anticipos.toFixed(2);
  document.getElementById('temp_alimentacion').value = alimentacion.toFixed(2);
  document.getElementById('temp_otros').value = otros.toFixed(2);
}

function calcular_total_neto() {
  const total_ingresos = parseFloat(document.getElementById('temp_total_ingreso').value) || 0;
  const total_egresos = parseFloat(document.getElementById('temp_total_egreso').value) || 0;
  const total_neto = total_ingresos - total_egresos;

  document.getElementById('total_neto').value = total_neto.toFixed(2);
  document.getElementById('temp_total_neto').value = total_neto.toFixed(2);
}

const formulario = document.getElementById('rolPagos');
formulario.addEventListener('submit', function (event) {
  event.preventDefault();
  calcular_ingreso();
  calcular_egreso();
  calcular_total_neto();
  formulario.submit(); 
});
