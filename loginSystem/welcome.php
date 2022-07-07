<?php 
include './template.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome</title>
  <style>
    .typewriter h1 {
  font-family: monospace;
  letter-spacing: .17em;
  margin: 0 auto;
  overflow: hidden;
  white-space: nowrap;
  border-right: .17em solid pink;
  animation: typing 3.5s steps(30, end), blinking-cursor .5s step-end infinite;
}

@keyframes typing {
  from {
    width: 0
  }
  to {
    width: 100%
  }
}

@keyframes blinking-cursor {
  from,
  to {
    border-color: transparent
  }
  50% {
    border-color: pink;
  }
}
  </style>
</head>
<body>
  <!-- Background image -->
<div
  class="bg-image my-5"
  style="
    background-image: url('./partials/bgImg.jpg');
    height: 70.7vh;
    width: 88.7vh;
    margin: auto;
    border-radius: 20px;
  "
>
  <div class="mask" style="background-color: rgba(1, 1, 1, 0.6);">
    <div class="d-flex flex-column justify-content-center align-items-center h-100" class="typewriter">
      <h1 class="text-white mb-0">Welcome!</h1>
      <p class="text-white"></p>
    </div>
  </div>
</div>

<!-- Background image -->
</body>
<script>
  
  </script>
</body>
</html>