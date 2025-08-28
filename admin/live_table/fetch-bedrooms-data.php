<?php

   include "conn.php";

   $sql = "SELECT * FROM rooms_tbl";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
   ?>
           <tr>
               <th scope='row'>
                 <a href='#' class='image-link' onclick='enlargeImages("<?php echo $row['id']; ?>", "room_img/<?php echo $row['image1']; ?>", "room_img/<?php echo $row['image2']; ?>", "room_img/<?php echo $row['image3']; ?>")'>
                    <img src='<?php echo $row['image1']; ?>' alt=''>
                </a>

               </th>
               <td><a href='#' class='text-primary fw-bold'><?php echo $row['room_name']; ?></a></td>
               <td><?php echo $row['price']; ?></td>
               <td class='fw-bold'><?php echo $row['capacity']; ?></td>
               <td><?php echo $row['bed']; ?></td>
               
               <td><?php echo $row['services']; ?></td>
               <td><?php echo $row['category']; ?></td>
               
               <td>
               <button class='btn btn-primary btn-sm edit-btn' data-room-id='<?php echo $row['id']; ?>'><i class="ri-edit-box-line"></i>Edit</button>

                <button class='btn btn-danger btn-sm delete-btn' data-room-id='<?php echo $row['id']; ?>'><i class="ri-delete-bin-line"></i>Delete</button>
               </td>
           </tr>
   <?php
       }
   } else {
   ?>
           <tr><td colspan='7'>0 results</td></tr>
   <?php
   }
   ?>