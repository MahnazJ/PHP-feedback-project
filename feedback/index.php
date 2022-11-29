<?php include 'inc/header.php'; ?>

<?php 
  $name = $email = $body = '';
  $nameErr = $emailErr = $bodyErr = '';

  if(isset($_POST['submit'])) {
    if(empty($_POST['name'])){
      $nameErr = 'Name is required';
    }else {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($_POST['email'])){
      $emailErr = 'Email is required';
    }else {
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);    
    }

    if(empty($_POST['body'])){
      $bodyeErr = 'Feedback is required';
    }else {
      $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    }

      if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
      
        $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";
        if (mysqli_query($connect, $sql)) {
          function redirect_to($url){
      if (headers_sent()){
        echo "<script>document.location.href='" . htmlspecialchars($url) . "';</script>\n";
      }else{
        header('HTTP/1.1 303 See other');
        header('Location: ' . $url);
        }
      }
      redirect_to('feedback.php');
        }    
      }
    }
?>
      <img src="#" class="w-20" alt="">
      <h2>Home</h2>
      <p class="lead text-center">Leave feedback for us</p>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ;?> " method="POST" class="mt-4 w-75">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control <?php echo !$nameErr ? 'is-invalid': null; ?>" id="name" name="name" placeholder="Enter your name">
          <div class="invalid-feedback">
            <?php echo $nameErr; ?>
        </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control <?php echo !$emailErr ? 'is-invalid': null; ?>" id="email" name="email" placeholder="Enter your email">
          <div class="invalid-feedback">
       <?php echo $emailErr; ?>
        </div>
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Feedback</label>
          <textarea class="form-control <?php echo !$bodyErr ? 'is-invalid': null; ?>"" id="body" name="body" placeholder="Enter your feedback"></textarea>
        </div>
        <div class="mb-3">
          <input type="submit" name="submit" value="Send" class="btn btn-secondary w-100">
          <div class="invalid-feedback">
        <?php echo $bodyErr; ?>
         </div>
          </div>
      </form>

<?php include 'inc/footer.php'; ?>
