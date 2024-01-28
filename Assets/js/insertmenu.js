document.addEventListener("DOMContentLoaded", function() {
    const addButton = document.getElementById("addButton");
    const modal = document.getElementById("myModal");
    const closeButton = document.getElementsByClassName("close")[0];
    const productForm = document.getElementById("productForm");
  
    addButton.addEventListener("click", function() {
      modal.style.display = "block";
    });
  
    closeButton.addEventListener("click", function() {
      modal.style.display = "none";
    });
  
    window.addEventListener("click", function(event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  
    // productForm.addEventListener("submit", function(event) {
    //   event.preventDefault();

    //   // Reset the form and hide the modal
    //   productForm.reset();
    //   modal.style.display = "none";
    // });
  });
  