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
      max-width: 1060px;
      margin-left: auto;
      margin-right: auto;
    }

    .scheme-info {
        background-color: white;    /* White background */
        border-radius: 10px;        /* Rounded corners */
        padding: 25px;              /* Padding around the content */
        text-align: justify;        /* Justify the text */
        font-size: 17px;            /* Font size */
        color: #333;                /* Text color */
        line-height: 1.5;           /* Line height for readability */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);  /* Optional: Add a subtle shadow for a floating effect */
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

    h4 {
        font-size: 22px;
        /* font-weight: bold; */
        color: #2c3e50;
        margin-bottom: 10px;
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
      <a href="index.html">Home</a>
    </div>
  </header>
  <main>
    <div class="list">
    <?php
        include('connection.php');
        if (isset($_GET['id'])) {
            $scheme_id = $_GET['id']; 
            $scheme_id = mysqli_real_escape_string($conn, $scheme_id);
            $sql = "SELECT * FROM scheme_details WHERE id = '$scheme_id';";  
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo '<div class="scheme-info">';
                echo '<h4>Scheme: </h4>' . htmlspecialchars($row["scheme_name"]);
                echo '<h4>Details: </h4>' . htmlspecialchars($row["details"]);
                echo '<h4>Benefits: </h4>' . htmlspecialchars($row["benefits"]);
                echo '<h4>Documents Required: </h4>' . htmlspecialchars($row["documents_required"]);
                echo '<h4>Place to Apply: </h4>' . htmlspecialchars($row["place_to_apply"]);
                echo '</div>';
            } else {
                echo 'No scheme found with the given ID.';
            }
        } else {
            echo 'No ID specified.';
        }?>
    </div>
  </main>
  
</body>
</html>




















 