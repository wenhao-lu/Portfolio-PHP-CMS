<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM education
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Education has been deleted' );
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM education
  ORDER BY date DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Education</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">Degree</th>
    <th align="center">Major</th>
    <th align="center">School</th>
    <th align="center">Date</th>
    <th align="center">Course</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['degree'] ; ?></td>
      <td align="center"><?php echo $record['major']; ?></td>
      <td align="center"><?php echo $record['school']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['date'] ); ?></td>
      <td align="center"><?php echo $record['course']; ?></td>
      <td align="center"><a href="education_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="education.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this education?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="education_add.php"><i class="fas fa-plus-square"></i> Add Education</a></p>


<?php

include( 'includes/footer.php' );

?>