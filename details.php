<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GovConnect - Details</title>
  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
      min-height: 100vh;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: white;
      padding: 15px 40px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      border-top: 4px solid #FF9933;
      border-bottom: 4px solid #138808;
    }

    .logo-container {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .logo-container img {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }

    header .logo {
      font-size: 24px;
      font-weight: bold;
      color: #2D3748;
    }

    header a {
      text-decoration: none;
      color: #4A5568;
      margin-left: 20px;
      padding: 8px 16px;
      border-radius: 20px;
      transition: all 0.3s ease;
    }

    header a:hover {
      background: #EDF2F7;
      color: #FF9933;
    }

    main {
      max-width: 1200px;
      margin: 40px auto;
      display: flex;
      gap: 40px;
      padding: 0 20px;
    }

    .list {
      flex: 1;
      max-width: 600px;
    }

    .list .item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background: white;
      margin: 15px 0;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .list .item:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border-color: #FF9933;
    }

    .list .item.active {
      background: #FFF5EB;
      border-color: #FF9933;
    }

    .list .item span {
      flex: 1;
      font-weight: 500;
      color: #2D3748;
    }

    .list .item a {
      color: #FF9933;
      font-size: 20px;
      text-decoration: none;
    }

    .details {
      flex: 1;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    .detail-section {
      margin-top: 20px;
    }

    .detail-section p {
      margin: 15px 0;
      line-height: 1.6;
      color: #4A5568;
    }

    .detail-section strong {
      color: #2D3748;
      display: block;
      margin-bottom: 5px;
    }

    .apply-btn {
      background: #FF9933;
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 25px;
      font-weight: 600;
      margin-top: 20px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .apply-btn:hover {
      background: #F17722;
      transform: translateY(-1px);
    }

    .apply-btn::after {
      content: '→';
      font-size: 20px;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo-container">
      <img src="images\images\logo.png" alt="GovConnect">
      <div class="logo">GovConnect</div>
    </div>
    <div>
      <a href="#">Sign In</a>
      <a href="index.html">Home</a>
    </div>
  </header>
  <main>
    <div class="list">
        <!-- <span>NSAP - Indira Gandhi National Old Age Pension Scheme</span>
        <a href="#">&rarr;</a> -->
        <?php include_once 'connection.php';
          $gender = isset($_GET['gender']) ? $_GET['gender'] : null;
          $age = isset($_GET['age']) ? $_GET['age'] : null;
          $income = isset($_GET['income']) ? $_GET['income'] : null;

          // if($gender=='female' && $age=='senior' && $income=='medium'){
            $sql = "SELECT id, scheme_name FROM scheme_details WHERE income='$income' AND age='$age' AND gender='$gender';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="item">';
                    echo '<span>' . htmlspecialchars($row["scheme_name"]) . '</span>';
                    echo '<a href="http://localhost/gov_connect_new_3/scheme_details.php?id=' . urlencode($row["id"]) . '">→</a>';
                    echo '</div>';
                }
            } else {
                echo "No schemes found.";
            }
          // }
      ?>
    </div>

  </main>
    
</body>
</html>
