$(document).ready(function() {
    // Get the initial price value and parse it to an integer
    const initialPrice = parseInt($('#price').text());

    // Function to update the total price
    function updateTotalPrice() {
    const quantity = parseInt($('.qty').val()); // Get the quantity value as an integer
    const totalPrice = initialPrice * quantity; // Calculate the total price
    $('#price').text(totalPrice + ' tg'); // Update the price on the screen
}

    // Add event listener for the quantity input
    $('.qty').on('input', function() {
    let quantity = parseInt($(this).val()); // Get the quantity value as an integer
    quantity = Math.max(quantity, 1); // Ensure the quantity is at least 1
    $(this).val(quantity); // Update the quantity input value
    updateTotalPrice(); // Update the total price
});

    // Add event listener for the plus button
    $('.qtyplus').on('click', function() {
    let quantity = parseInt($('.qty').val()); // Get the current quantity value as an integer
    quantity += 1; // Increment the quantity by 1
    $('.qty').val(quantity); // Update the quantity input value
    updateTotalPrice(); // Update the total price
});

    // Add event listener for the minus button
    $('.qtyminus').on('click', function() {
    let quantity = parseInt($('.qty').val()); // Get the current quantity value as an integer
    quantity = Math.max(quantity - 1, 1); // Decrement the quantity by 1, but ensure it's at least 1
    $('.qty').val(quantity); // Update the quantity input value
    updateTotalPrice(); // Update the total price
});
});


