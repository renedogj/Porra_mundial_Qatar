// Obtener los elementos del DOM
const scoreEl = document.getElementById('score');
const usernameEl = document.getElementById('username');
const solutionsBtn = document.getElementById('solutions-btn');

// Función para actualizar la puntuación
function updateScore(newScore) {
	scoreEl.textContent = newScore;
}

// Función para actualizar el nombre de usuario
function updateUsername(newUsername) {
	usernameEl.textContent = newUsername;
}

// Función para mostrar el menú de soluciones
function showSolutions() {
	// Lógica para mostrar el menú de soluciones
}

// Llamar a las funciones para actualizar la puntuación y el nombre de usuario
updateScore(0);
updateUsername('Usuario registrado');

// Agregar un evento al botón de soluciones
solutionsBtn.addEventListener('click', showSolutions);

function abrirDificultad(id) {
	window.location.assign("../dificultades/dif"+id);
}