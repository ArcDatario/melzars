function OpenAddFood(foodId, imageUrl, foodName, price) {
    Swal.fire({
        title: 'Order Details',
        html: `<div>
                    <img src="${imageUrl}" alt="${foodName}" style="width: 300px; height: 300px;">
                    <br><br>
                    <p><strong>${foodName}</strong></p>
                    <p><strong>Price:</strong> ₱${price}</p>
                </div>
                <hr>`,
        input: 'number',
        inputLabel: 'Quantity',
        inputValue: 1,
        inputAttributes: {
            min: 1,
            step: 1,
            style: 'margin-left:25%; font-size: 30px; width: 50%; text-align:center;',
            autofocus: true,
        },
        showCancelButton: true,
        confirmButtonText: 'Add',
        showLoaderOnConfirm: true,
        customClass: {
            input: 'swal2-input-xl', // class for larger input field
            increment: 'swal2-styled swal2-styled-lg', // class for larger increment button
            decrement: 'swal2-styled swal2-styled-lg' // class for larger decrement button
        },
        preConfirm: (quantity) => {
            // This function is not used since we're not processing each item individually
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Added to Cart!',
                icon: 'success'
            });

            // Check the checkbox after adding to cart
            document.getElementById('food_cbx').checked = true;
        }
    });
}
