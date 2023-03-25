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
  
  <title>Wenhao Lu's Portfolio</title>
  
  <link href="styles.css" type="text/css" rel="stylesheet">
  
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>
  <section>
    <nav class="navbar">
      <ul class="navMenu">
        <li><a href="https://www.linkedin.com/in/wenhao-kevin-l-6290b2145/"><img src="linkedin.png" class="contactImg" alt="linkedin"></a></li>
        <li><a href="https://github.com/wenhao-lu/Portfolio-PHP-CMS"><img src="github.png" class="contactImg" alt="github"></a></li>
      </ul>
    </nav>
    <div class="introContainer">
      <div class="intro">
        <p>Hi, I'm <span style="color: rgb(9, 186, 130);">Kevin</span> - Wenhao Lu</p>
        <p>I'm a full stack developer.</p>
      </div>
      <div class="linkContainer">
        <ul class="introLink">
          <li><p class="linkBtn" style="color: rgb(9, 186, 130);border:1px solid rgb(9, 186, 130);text-align: center;"><a href="">Skills</a></p></li>
          <li><p class="linkBtn" style="color: rgb(9, 186, 130);border:1px solid rgb(9, 186, 130);text-align: center;"><a href="">Projects</a></p></li>
          <li><p class="linkBtn" style="color: rgb(9, 186, 130);border:1px solid rgb(9, 186, 130);text-align: center;"><a href="">Education</a></p></li>
          <li><p class="linkBtn" style="color: rgb(9, 186, 130);border:1px solid rgb(9, 186, 130);text-align: center;"><a href="">Contact</a></p></li>
        </ul>
      </div>
    </div>
  </section>


<section>
  <div class="skill">
    <p>My Stack</p>

    <?php
    // skills section
    // query for front-end skills
    $queryFront = 'SELECT *
      FROM skills
      WHERE url = "frontend"';
    $resultFront = mysqli_query($connect, $queryFront);
    // query for back-end skills
    $queryBack = 'SELECT *
      FROM skills
      WHERE url = "backend"';
    $resultBack = mysqli_query($connect, $queryBack);
    // query for tools skills
    $queryTools = 'SELECT *
      FROM skills
      WHERE url = "tools"';
    $resultTools = mysqli_query($connect, $queryTools);
    ?>
    
    <div class="skillContainer">
      <div class="skillFrontEnd">
        <p>Front End</p>
        <?php while($recordFront = mysqli_fetch_assoc($resultFront)): ?>
          <img src="admin/image.php?type=skills&id=<?php echo $recordFront['id']; ?>&width=100&height=100">
        <?php endwhile; ?>
      </div>

      <div class="skillBackEnd">
        <p>Back End</p>
        <?php while($recordBack = mysqli_fetch_assoc($resultBack)): ?>
          <img src="admin/image.php?type=skills&id=<?php echo $recordBack['id']; ?>&width=100&height=100">
        <?php endwhile; ?>
      </div>

      <div class="skillTools">
        <p>Tools</p>
        <?php while($recordTools = mysqli_fetch_assoc($resultTools)): ?>
          <img src="admin/image.php?type=skills&id=<?php echo $recordTools['id']; ?>&width=100&height=100">
        <?php endwhile; ?>
      </div>
    </div>
  </div>
 </section>

 <section>
  <?php
  // projects section
  $query = 'SELECT *
    FROM projects
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );
  ?>

  
  <?php while($record = mysqli_fetch_assoc($result)): ?>
    <div class="projectContainer">
      <div class="projectImg">
        <?php if($record['photo']): ?>
          <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>&width=200&height=200">
        <?php else: ?>
          <p>no image</p>
        <?php endif; ?>
      </div>

      <div>
        <h2><?php echo $record['title']; ?></h2>
        <?php echo $record['content']; ?>
      </div>
    </div>
  <?php endwhile; ?>
  </section>

  
  <section>
  <?php
  // education section
  $query = 'SELECT *
    FROM education
    ORDER BY date DESC';
  $result = mysqli_query( $connect, $query );

  ?>


  <h1>Education</h1>

  <?php while($record = mysqli_fetch_assoc($result)): ?>

<div>

  <h2><?php echo $record['degree']; ?></h2>
  <?php echo $record['major']; ?><br />
  <?php echo $record['school']; ?><br />
  <?php echo $record['date']; ?><br />
  <p>Courses: </p>
  <?php echo $record['course']; ?>

</div>

<?php endwhile; ?>
</section>

</body>
</html>
