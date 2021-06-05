<?php
  function query($query,$conn) {
      mysqli_query($conn, $query) or die(mysqli_error($conn));
      if ($query) {echo "success";}
      else {echo ("ERROR :" . $query . "<br>" . mysqli_error($conn));}

      mysqli_close($conn);
  }
?>