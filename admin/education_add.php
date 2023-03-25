<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['degree'] ) )
{
  
  if( $_POST['degree'] and $_POST['school'] )
  {
    
    $query = 'INSERT INTO education (
        degree,
        major,
        school,
        date,
        course
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['degree'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['major'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['course'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="degree">Degree:</label>
  <input type="text" name="degree" id="degree">
    
  <br>
  
  <label for="major">Major:</label>
  <input type="text" name="major" id="major">
  
  <br>

  <label for="school">School:</label>
  <input type="text" name="school" id="school">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>

  <label for="course">Course:</label>
  <textarea type="text" name="course" id="course" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#course' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <input type="submit" value="Add Education">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>