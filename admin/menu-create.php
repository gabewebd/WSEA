<?php
session_start();
include '../includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Handle Form Submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image_filename = "";

    // Image Upload
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
        $file = $_FILES['image'];
        $uploadDir = '../uploads/';

        // 1. Clean filename (Keep it SEO friendly)
        $rawName = pathinfo($file['name'], PATHINFO_FILENAME);
        $cleanName = preg_replace('/[^a-zA-Z0-9_-]/', '-', $rawName);
        $cleanName = preg_replace('/-+/', '-', $cleanName);
        $cleanName = trim(strtolower($cleanName), '-');

        // 2. Keep Original Extension (Crucial for quality!)
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // 3. Handle duplicates
        $fileName = $cleanName . '.' . $ext;
        $counter = 1;
        while (file_exists($uploadDir . $fileName)) {
            $fileName = $cleanName . '-' . $counter . '.' . $ext;
            $counter++;
        }
        $destination = $uploadDir . $fileName;

        // 4. UPLOAD EXACT FILE (No resizing, No quality loss)
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $image_filename = $fileName;
        } else {
            // Error handling (optional)
        }
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO menu_items (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdss", $name, $description, $price, $category, $image_filename);

    if ($stmt->execute()) {
        header("Location: dashboard.php?tab=menu");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item | Danono's Admin</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Fredoka:wght@500;600&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="admin-style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-family: 'Fredoka', sans-serif;
            color: var(--dark);
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: 'Barlow', sans-serif;
            font-size: 15px;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Barlow', sans-serif;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: var(--gray);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="page-header">
            <h1>Add Menu Item</h1>
            <p style="color: var(--gray); margin-top: 5px;">Create a new menu item</p>
        </div>

        <div class="form-card">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Item Name *</label>
                    <input type="text" name="name" placeholder="e.g. Glazed Doughnut" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Price (₱) *</label>
                        <input type="number" name="price" step="0.01" min="0" placeholder="0.00" required>
                    </div>
                    <div class="form-group">
                        <label>Category *</label>
                        <select name="category" required>
                            <option value="">Select Category</option>
                            <option value="Doughnuts">Doughnuts</option>
                            <option value="Brownies">Brownies</option>
                            <option value="Beverages">Beverages</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" placeholder="Short description of the item..."></textarea>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <button type="submit" name="submit" class="btn-submit">
                    <i class="ph ph-plus"></i> Add Item
                </button>
            </form>
        </div>

        <a href="dashboard.php?tab=menu" class="back-link">
            <i class="ph ph-arrow-left"></i> Back to Menu
        </a>
    </div>
</body>

</html>