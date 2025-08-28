function openForm() {
  Swal.fire({
    title: 'Enter Food Details',
    html:
      '<input id="food-name" class="swal2-input" style="width: 84%; font-size: 18px;" placeholder="Food Name">' +
      '<input id="food-price" class="swal2-input" style="width: 84%; font-size: 18px;" placeholder="Price">' +
      '<select id="food-status" class="swal2-select" style="width: 84%; font-size: 18px;">' +
      '<option value="display">Display</option>' +
      '<option value="hide">Hide</option>' +
      '</select>' +
      '<div id="photoPreviewContainer" style="margin-top: 5px; width:70%; margin-left:15%;"></div>' +
      '<input type="file" id="foodImage" class="swal2-input" name="photo" accept="image/*" style="width: 84%; font-size: 18px; color: #111111; border: none;" onchange="displaySelectedPhoto(this)" required>' +
      '<style>.swal2-file[type=file]::-webkit-file-upload-button { background-color: #488aec; color: #ffffff; }</style>',

    focusConfirm: false,
    showCancelButton: true,
    confirmButtonText: 'Submit',
    preConfirm: () => {
      const foodName = Swal.getPopup().querySelector('#food-name').value;
      const price = Swal.getPopup().querySelector('#food-price').value;
      const status = Swal.getPopup().querySelector('#food-status').value;
      const foodImage = Swal.getPopup().querySelector('#foodImage').files[0];
      if (!foodName || !price || !status || !foodImage) {
        Swal.showValidationMessage('Please fill in all fields and select an image');
      }
      return { foodName: foodName, price: price, status: status, foodImage: foodImage };
    }
  }).then((result) => {
    if (result.isConfirmed) {
      const formData = new FormData();
      formData.append('foodName', result.value.foodName);
      formData.append('price', result.value.price);
      formData.append('status', result.value.status);
      formData.append('foodImage', result.value.foodImage);

      // Send data via AJAX
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'functions/insert_food.php', true);
      xhr.onload = function() {
        if (xhr.status === 200) {
          Swal.fire('Success', xhr.responseText, 'success');
        } else {
          Swal.fire('Error', 'An error occurred while inserting data', 'error');
        }
      };
      xhr.send(formData);
    }
  });
}

function displaySelectedPhoto(input) {
  const photoPreviewContainer = document.getElementById('photoPreviewContainer');
  const photoPreview = document.createElement('img');
  photoPreview.id = 'editPhotoPreview';
  photoPreview.style.width = '100%';

  const file = input.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      photoPreview.src = e.target.result;
    };
    reader.readAsDataURL(file);

    // Clear previous content
    while (photoPreviewContainer.firstChild) {
      photoPreviewContainer.removeChild(photoPreviewContainer.firstChild);
    }

    // Append the preview image
    photoPreviewContainer.appendChild(photoPreview);
  }
}
