<div class="modal fade" id="editRoomModal" tabindex="-1" role="dialog" aria-labelledby="editRoomModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editRoomForm" action="functions/edit_room.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="editRoomName">Room Name</label>
            <input type="text" class="form-control" id="editRoomName" name="editRoomName" required>
          </div>
          <input type="text" name="room_id">
          <input type="text" name="old_image1">
          <input type="text" name="old_image2">
          <input type="text" name="old_image3">
          <div class="form-group">
            <label for="editPrice">Price</label>
            <input type="number" class="form-control" id="editPrice" name="editPrice" required>
          </div>
          <div class="form-group">
            <label for="editCapacity">Capacity</label>
            <select class="form-control" id="editCapacity" name="editCapacity" required>
              <option value="">Select Capacity</option>
              <option value="2 Pax">2 Pax</option>
              <option value="3 Pax">3 Pax</option>
              <option value="4 Pax">4 Pax</option>
              <option value="5 Pax">5 Pax</option>
              <option value="6 Pax">6 Pax</option>
              <option value="7 Pax">7 Pax</option>
              <option value="8 Pax">8 Pax</option>
              <option value="9 Pax">9 Pax</option>
              <option value="10 Pax">10 Pax</option>
              <option value="11 Pax">11 Pax</option>
              <option value="12 Pax">12 Pax</option>
            </select>
          </div>
          <div class="form-group">
            <label for="editBedrooms">Bedrooms</label>
            <select class="form-control" id="editBedrooms" name="editBedrooms" required>
              <option value="">Select Bedrooms</option>
              <option value="1 Bedroom">1 Bedroom</option>
              <option value="2 Bedrooms">2 Bedrooms</option>
              <option value="3 Bedrooms">3 Bedrooms</option>
              <option value="4 Bedrooms">4 Bedrooms</option>
              <option value="5 Bedrooms">5 Bedrooms</option>
            </select>
          </div>
          <div class="form-group">
            <label for="editServices">Services</label>
            <input type="text" class="form-control" id="editServices" name="editServices" required>
          </div>
          <div class="form-group">
            <label for="editDescription">Description</label>
            <textarea class="form-control" id="editDescription" name="editDescription" rows="3" required></textarea>
          </div>
          <!-- Image placeholders -->
          <div class="form-group mb-1">
                      <label for="image1">Image 1</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image1" name="image1" accept="image/*">

                      </div>
                    </div>
                    <div class="form-group  mb-1">
                      <label for="image2">Image 2</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image2" name="image2" accept="image/*">

                      </div>
                    </div>
                    <div class="form-group  mb-1">
                      <label for="image3">Image 3</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image3" name="image3" accept="image/*">

                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="saveEditRoomBtn" id="saveEditRoomBtn">Save changes</button>
                    </div>
        </form>
      </div>

    </div>
  </div>
</div>
