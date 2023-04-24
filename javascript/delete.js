const deleteIcons = document.querySelectorAll('.del');

deleteIcons.forEach(icon => {
  icon.addEventListener('click', () => {
    const id = icon.dataset.id;
    const url = 'delete.php';
    
    fetch(url, {
      method: 'POST',
      body: JSON.stringify({ id })
    })
    .then(response => {
      if (response.ok) {
        // Refresh the page or update the UI to reflect the deleted data
      } else {
        throw new Error('Network response was not ok');
      }
    })
    .catch(error => console.error(error));
  });
});
