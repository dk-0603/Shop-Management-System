function openUpdateModal(productId) {
    // Set the modal content based on the selected product
    document.getElementById("productName").placeholder = "Loading...";

    // Set the hidden input value in the modal form
    document.getElementById("updateProductId").value = productId;

    // Fetch product details from the server
    // You may need to adjust this based on your actual API or server-side logic
    fetch('/get-product-details/' + productId)
        .then(response => response.json())
        .then(data => {
            // Update the modal content with product details
            document.getElementById("productName").value = data.name;
            // Update other fields as needed
        })
        .catch(error => console.error('Error fetching product details:', error));

    // Show the modal
    document.getElementById("updateModal").style.display = "block";
}

function closeUpdateModal() {
    // Close the modal
    document.getElementById("updateModal").style.display = "none";
}