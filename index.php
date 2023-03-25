<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Website Admin</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>

  <h1>Welcome to My Website!</h1>
  <p>This is the website frontend!</p>

  <?php

  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>

  <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

  <hr>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <div>

      <h2><?php echo $record['title']; ?></h2>
      <?php echo $record['content']; ?>

      <?php if($record['photo']): ?>

        <p>This is a project image</p>

        <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>&width=200&height=200">

      <?php else: ?>

        <p>This record does not have an image!</p>

      <?php endif; ?>

    </div>

    <hr>

  <?php endwhile; ?>



  <?php
  // education section
  $query = 'SELECT *
    FROM education
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>


  <h1>Education</h1>
  <p>There are <?php echo mysqli_num_rows($result); ?> education history in the database!</p>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

<div>

  <h2><?php echo $record['degree']; ?></h2>
  <?php echo $record['major']; ?><br />
  <?php echo $record['school']; ?><br />
  <?php echo $record['date']; ?><br />
  <?php echo $record['course']; ?>


</div>
<hr>

<?php endwhile; ?>

<?php

  $query = 'SELECT *
    FROM skills
    ORDER BY percent DESC';
  $result = mysqli_query($connect, $query);

  ?>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

    <h2><?php echo $record['name']; ?></h2>

    <p>Percent: <?php echo $record['percent']; ?>%</p>

    <div style="background-color: grey;">
      <div style="background-color: red; width:<?php echo $record['percent']; ?>%; height: 20px;"></div>
    </div>

  <?php endwhile; ?>

</body>
</html>
