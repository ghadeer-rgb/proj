<?php
$coupons = [
  [
    "title" => "Get 20% OFF on Electrical Services",
    "description" => "Use this coupon at checkout to receive a discount on your next electrical task.",
    "code" => "ELECTRO20",
    "valid_until" => "May 30, 2025"
  ],
  [
    "title" => "Free Consultation for First-Time Users",
    "description" => "New here? Enjoy a free consultation with your first task booking!",
    "code" => "WELCOME100",
    "valid_until" => "June 15, 2025"
  ]
];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Coupons & Promotions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    
    .coupon-card {
      border: 2px dashed rgb(245, 143, 11);
      border-radius: 10px;
      padding: 20px;
      background-color:rgb(247, 247, 233);
      position: relative;
    }

    .coupon-code {
      font-size: 1.5rem;
      font-weight: bold;
      color:rgb(245, 143, 11);
    }

    .btn-copy {
      position: absolute;
      top: 20px;
      right: 20px;
      background-color:rgb(245, 143, 11);
      border-color:  rgb(245, 143, 11);;
    }
  </style>
</head>

<body style="background-color:rgb(250, 237, 196);">


  <div class="container my-5 background-color: color:rgb(196, 170, 136);">
    <h2 class="mb-4  text-center">🎁 Current Promotions & Coupons</h2>

  </div>
  <?php include 'db.php' ?>
  <?php
  $sql = "SELECT * FROM Coupons";
  $result = $conn->query($sql);

  $coupons = [];

  if ($result->num_rows > 0) {
    // Fetch each row one by one
    while ($row = $result->fetch_assoc()) {
      $coupons[] = $row;
    }
  }

  $conn->close();




  foreach ($coupons as $coupon): ?>
   <div class="row g-4 justify-content-center">
    <div class="col-md-6  mb-4">
      <div class="coupon-card  text-center">
        <h5><?= htmlspecialchars($coupon['title']) ?></h5>
        <p><?= htmlspecialchars($coupon['descriptions']) ?></p>
        <div class="coupon-code"><?= htmlspecialchars($coupon['codes']) ?></div>
        <button class="btn btn-success btn-sm btn-copy"
          onclick="navigator.clipboard.writeText('<?= htmlspecialchars($coupon['codes']) ?>')">Copy</button>
        <p class="mt-2 text-muted">Valid until: <?= htmlspecialchars($coupon['valid_until']) ?></p>
      </div>
    </div>
   </div>
  <?php endforeach;

  ?>
  <script src="/js/loadCoupons.js"></script>
</body>

</html>