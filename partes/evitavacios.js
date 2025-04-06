window.addEventListener('keydown', function(event) {
  if (event.key === 'F5') {
      event.preventDefault(); // Evita la recarga de la página
      window.location.href = 'index.php'; // Te manda a la parte principal
  }
});
