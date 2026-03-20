<?php
// --- 1. INITIALIZE VARIABLES & DB ---
$pageTitle = "Menu - Danono's Donuts | Best Flavored Brioche Donuts Pampanga";
$metaDesc = "Explore Danono's menu: premium brioche donuts, Biscoff donuts, Ube donuts, and gourmet brownies. The best flavored donuts in the Philippines available now.";
$customCss = "menu.css";
$lcpImage = "assets/img/danonos-menu.webp";

include 'includes/db_connect.php';

// --- 2. SETUP BASE URL FOR SCHEMA ---
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$baseUrl = $protocol . "://" . $host . ($scriptDir == '/' ? '' : $scriptDir);
if (substr($baseUrl, -1) !== '/') {
    $baseUrl .= '/';
}

// --- 3. FETCH MENU DATA & BUILD SCHEMA ---
$sql = "SELECT * FROM menu_items WHERE (is_visible = 1 OR is_visible IS NULL) ORDER BY category, name";
$result = $conn->query($sql);
$hasDbItems = ($result && $result->num_rows > 0);

$schemaItems = [];
$position = 1;

// Fallback items stored once to be used for both Schema and Grid if DB is empty
$fallbackMenuItems = [
    ["name" => "Sweet Bavarian Crunch", "category" => "doughnuts", "price" => "30", "desc" => "Bavarian-filled brioche donut dipped in crispy, roasted sugar."],
    ["name" => "Rainbow Crunch", "category" => "doughnuts", "price" => "30", "desc" => "Brioche donut dipped in chocolate and topped with Froot Loops."],
    ["name" => "Gleaming Glaze", "category" => "doughnuts", "price" => "30", "desc" => "Classic glazed brioche donut."],
    ["name" => "Choco Gleaming Glaze", "category" => "doughnuts", "price" => "50", "desc" => "Classic glazed brioche donut with rich chocolate."],
    ["name" => "Dusted Berry Dream", "category" => "doughnuts", "price" => "30", "desc" => "Strawberry jam-filled brioche donut coated in powdered sugar."],
    ["name" => "Coffee Crunch", "category" => "doughnuts", "price" => "40", "desc" => "Cappuccino-dipped brioche donut with chocolate and wafer toppings."],
    ["name" => "Double Choco Delight", "category" => "doughnuts", "price" => "40", "desc" => "Cocoa and chocolate powder-dusted brioche donut with chocolate cream filling."],
    ["name" => "Melty Marshmallow", "category" => "doughnuts", "price" => "40", "desc" => "Brioche donut dipped in chocolate and topped with roasted marshmallows."],
    ["name" => "Pistachio Crunch", "category" => "doughnuts", "price" => "65", "desc" => "Gourmet brioche donuts Mexico Pampanga spread with pistachio crunch and melted white chocolate."],
    ["name" => "Choco Haven Supreme", "category" => "doughnuts", "price" => "60", "desc" => "A decadent combination of 5 kinds of premium chocolates in 1 artisan doughnut."],
    ["name" => "Classic Fudge Brownie", "category" => "brownies", "price" => "45", "desc" => "Rich, dense chocolate fudge brownie with a moist center."],
    ["name" => "Salted Caramel Brownie", "category" => "brownies", "price" => "55", "desc" => "Decadent brownie with salted caramel swirl and crushed sea salt."],
    ["name" => "Nutella Dream", "category" => "brownies", "price" => "50", "desc" => "Chocolate brownie with Nutella filling and hazelnut bits."],
    ["name" => "Double Chocolate Stack", "category" => "brownies", "price" => "60", "desc" => "Dark and milk chocolate layered brownie perfection."],
    ["name" => "Danono's Chocolate (Hot)", "category" => "beverages", "price" => "100", "desc" => "Signature chocolate drink served hot with velvety texture."],
    ["name" => "Danono's Chocolate (Iced)", "category" => "beverages", "price" => "110", "desc" => "Signature chocolate drink served refreshingly cold."],
    ["name" => "Seasalt Latte", "category" => "beverages", "price" => "120", "desc" => "Smooth latte with a sophisticated touch of sea salt."],
    ["name" => "White Mocha Latte", "category" => "beverages", "price" => "120", "desc" => "Creamy white chocolate mocha latte."],
    ["name" => "Hot Cappuccino", "category" => "beverages", "price" => "100", "desc" => "Classic espresso with velvety steamed milk and thick foam."],
    ["name" => "Iced Americano", "category" => "beverages", "price" => "100", "desc" => "Refreshing espresso with cold water over ice."],
    ["name" => "Strawberry Lemonade", "category" => "beverages", "price" => "120", "desc" => "Freshly made lemonade with fresh strawberry juice."],
    ["name" => "Matcha Latte", "category" => "beverages", "price" => "110", "desc" => "Premium specialty matcha in Angeles City - creamy latte with traditional green tea."]
];

if ($hasDbItems) {
    while ($row = $result->fetch_assoc()) {
        $imagePath = isset($row["image"]) && !empty($row["image"]) ? $baseUrl . "uploads/" . $row["image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop";
        $schemaItems[] = [
            "@type" => "MenuItem",
            "position" => $position,
            "name" => htmlspecialchars($row['name']),
            "description" => isset($row['description']) ? htmlspecialchars(strip_tags($row['description'])) : "A delicious treat made fresh daily.",
            "image" => $imagePath,
            "offers" => [
                "@type" => "Offer",
                "price" => number_format((float) $row['price'], 2, '.', ''),
                "priceCurrency" => "PHP"
            ]
        ];
        $position++;
    }
    // Reset pointer so the grid loop below works
    $result->data_seek(0);
} else {
    foreach ($fallbackMenuItems as $item) {
        $schemaItems[] = [
            "@type" => "MenuItem",
            "position" => $position,
            "name" => htmlspecialchars($item['name']),
            "description" => htmlspecialchars($item['desc']),
            "image" => "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop",
            "offers" => [
                "@type" => "Offer",
                "price" => number_format((float) $item['price'], 2, '.', ''),
                "priceCurrency" => "PHP"
            ]
        ];
        $position++;
    }
}

include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $metaDesc; ?>">
    <title><?php echo $pageTitle; ?></title>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Menu",
      "name": "Danono's Donuts & Brownies Menu",
      "url": "<?php echo $baseUrl; ?>menu",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo $baseUrl; ?>menu"
      },
      "hasMenuSection": [
        {
          "@type": "MenuSection",
          "name": "Full Menu",
          "hasMenuItem": <?php echo json_encode($schemaItems, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
        }
      ]
    }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #D4945E;
            --primary-dark: #A67346;
            --primary-light: #E8B88D;
            --primary-orange: #EF7D32;
            --accent: #8B4513;
            --cream: #FFF9F3;
            --dark: #2C1810;
            --dark-brown: #431407;
            --text: #3D2817;
            --border: #E8D4C0;
            --gold: #FFC107;
            --success: #C67C4E;
            --shadow-sm: 0 4px 12px rgba(76, 34, 14, 0.08);
            --shadow-md: 0 12px 32px rgba(76, 34, 14, 0.12);
            --shadow-lg: 0 20px 48px rgba(76, 34, 14, 0.15);
        }

        body {
            background: linear-gradient(135deg, #FFF9F3 0%, #FFF3E6 100%);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        .menu-hero {
            position: relative;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: var(--dark-brown);
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            margin-right: calc(-50vw + 50%);
        }

        .menu-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            opacity: 0.5;
            transition: transform 0.1s linear;
        }

        .menu-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Floating Shapes */
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 1;
            opacity: 0.7;
            transition: transform 0.1s linear;
            pointer-events: none;
        }

        .shape-1 {
            top: -50px;
            left: -50px;
            width: 300px;
            height: 300px;
            background: #EF7D32;
        }

        .shape-2 {
            bottom: -50px;
            right: 10%;
            width: 250px;
            height: 250px;
            background: #FFC107;
        }

        .menu-hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            color: white;
            padding: 0 20px;
            max-width: 900px;
        }

        .menu-hero-content h1 {
            font-size: 56px;
            line-height: 1.1;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .menu-hero-content .section-subtitle {
            display: block;
            font-family: 'Barlow', sans-serif;
            letter-spacing: 4px;
            font-size: 14px;
            margin-bottom: 15px;
            opacity: 0.9;
            font-weight: 700;
        }

        /* ===== FILTER BUTTONS ===== */
        .filter-container {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin: 50px auto;
            flex-wrap: wrap;
            padding: 0 20px;
            animation: slideInUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.3s both;
        }

        .filter-btn {
            padding: 12px 28px;
            border: 2px solid var(--border);
            background: white;
            color: var(--text);
            font-size: 14px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            text-transform: capitalize;
            box-shadow: var(--shadow-sm);
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, var(--primary-orange) 0%, var(--gold) 100%);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .filter-btn:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary);
        }

        .filter-btn.active {
            color: white;
            border-color: var(--primary-orange);
            box-shadow: var(--shadow-lg);
        }

        .filter-btn.active::before {
            left: 0;
        }

        /* ===== MENU GRID ===== */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px 80px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 32px;
            margin-top: 40px;
        }

        @media (min-width: 768px) {
            .grid {
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                gap: 36px;
            }
        }

        @media (min-width: 1200px) {
            .grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 32px;
            }
        }

        /* ===== CARD STYLING ===== */
        .card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            border: 2px solid #F0DCCA;
            box-shadow: var(--shadow-md);
            transition: all 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            opacity: 0;
            animation: cardLoad 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .card.hidden {
            display: none;
        }

        .card.animating-in {
            animation: cardLoad 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        @keyframes cardLoad {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.92);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(212, 148, 94, 0.1) 0%, transparent 100%);
            pointer-events: none;
            z-index: 1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 280px;
            background: linear-gradient(135deg, #F5E6D3 0%, #E8D4C0 100%);
        }

        .card-image-wrapper::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.3) 0%, transparent 50%);
            pointer-events: none;
            z-index: 2;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
            filter: brightness(1.05) contrast(1.05);
        }

        .card:hover img {
            transform: scale(1.12) rotate(2deg);
            filter: brightness(1.15) contrast(1.1) saturate(1.1);
        }

        .card-content {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 28px;
            position: relative;
            z-index: 2;
        }

        .card h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
            line-height: 1.2;
            transition: all 0.3s ease;
        }

        .card:hover h2 {
            background: linear-gradient(to right, #EF7D32 0%, #FFC107 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card p {
            font-size: 14px;
            color: #666;
            margin: 0 0 20px;
            line-height: 1.7;
            flex-grow: 1;
            font-weight: 400;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid var(--border);
            margin-top: auto;
        }

        .price-tag {
            background: var(--primary-orange);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 12px rgba(212, 148, 94, 0.3);
            transition: all 0.3s ease;
        }

        .card:hover .price-tag {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--gold) 100%);
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(212, 148, 94, 0.4);
        }

        .card-icon {
            width: 32px;
            height: 32px;
            background: rgba(239, 125, 50, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
            color: var(--primary-orange);
        }

        .card-icon.active {
            color: #e74c3c;
        }

        .card:hover .card-icon {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--gold) 100%);
            color: white;
            transform: rotate(20deg);
        }

        /* ===== ANIMATIONS ===== */
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) translateX(0px);
            }

            50% {
                transform: translateY(30px) translateX(10px);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(212, 148, 94, 0.7);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(212, 148, 94, 0);
            }
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            opacity: 0;
            animation: fadeIn 0.8s ease 0.3s both;
        }

        .empty-state-icon {
            font-size: 80px;
            color: var(--primary);
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state h2 {
            font-size: 28px;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #999;
            font-size: 16px;
        }

        /* ===== LOADING STATE ===== */
        .card.skeleton {
            pointer-events: none;
        }

        .card.skeleton img {
            background: linear-gradient(90deg, #e0d5c8 0%, #f0e6d9 50%, #e0d5c8 100%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .menu-hero {
                height: 400px;
            }

            .menu-hero-content h1 {
                font-size: 42px;
            }
        }

        @media (max-width: 768px) {
            .menu-hero {
                height: 380px;
            }

            .menu-hero-content h1 {
                font-size: 32px;
                line-height: 1.2;
            }

            .menu-hero-content .section-subtitle {
                font-size: 11px;
                letter-spacing: 2px;
            }

            .floating-shape {
                display: none;
            }

            .grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            .card-content {
                padding: 20px;
            }

            .filter-container {
                gap: 8px;
            }

            .filter-btn {
                padding: 10px 20px;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .menu-hero {
                height: 320px;
            }

            .menu-hero-content h1 {
                font-size: 28px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .filter-container {
                flex-direction: column;
            }

            .filter-btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* ===== SCROLL ANIMATIONS ===== */
        .card {
            opacity: 0;
        }

        .card.in-view {
            animation: cardLoad 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        /* ===== SMOOTH TRANSITIONS ===== */
        button,
        a {
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
    </style>
</head>

<body>
    <section class="menu-hero">
        <div class="menu-hero-bg">
            <img src="assets/img/danonos-menu.webp" alt="Best Biscoff and Matcha Donuts in Pampanga Philippines"
                fetchpriority="high" loading="eager" width="1600" height="592"
                onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=1200&h=600&fit=crop'">
        </div>

        <div class="floating-shape shape-1" data-speed="4"></div>
        <div class="floating-shape shape-2" data-speed="-2"></div>

        <div class="menu-hero-content">
            <span class="section-subtitle" data-aos="fade-down">FRESH DAILY</span>
            <h1 data-aos="fade-up">Discover our Premium <span class="pop-out-text">FLAVORED DONUTS</span> & Artisan
                Treats</h1>
        </div>
    </section>

    <div class="container">

        <div class="filter-container">
            <button class="filter-btn active" onclick="filterMenu('all', this)" data-filter="all">
                <i class="fas fa-th"></i> All Items
            </button>
            <button class="filter-btn" onclick="filterMenu('doughnuts', this)" data-filter="doughnuts">
                <i class="fas fa-ring"></i> Donuts
            </button>
            <button class="filter-btn" onclick="filterMenu('brownies', this)" data-filter="brownies">
                <i class="fas fa-square"></i> Brownies
            </button>
            <button class="filter-btn" onclick="filterMenu('beverages', this)" data-filter="beverages">
                <i class="fas fa-mug-hot"></i> Beverages
            </button>
        </div>

        <div class="grid" id="menuGrid">
            <?php
            if ($hasDbItems) {
                while ($row = $result->fetch_assoc()) {
                    $name = htmlspecialchars($row["name"]);
                    $price = number_format($row["price"], 2);
                    $description = isset($row["description"]) ? htmlspecialchars($row["description"]) : "A delicious treat made fresh daily.";
                    $image = isset($row["image"]) && !empty($row["image"]) ? "uploads/" . $row["image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop";
                    $cat = strtolower($row["category"]);
                    $altText = !empty($row["alt_text"]) ? htmlspecialchars($row["alt_text"]) : $name;
                    ?>
                    <div class="card" data-category="<?php echo $cat; ?>">
                        <div class="card-image-wrapper">
                            <img src="<?php echo $image; ?>" alt="<?php echo $altText; ?>" loading="lazy"
                                onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop'">
                        </div>
                        <div class="card-content">
                            <h2><?php echo $name; ?></h2>
                            <p><?php echo $description; ?></p>
                            <div class="card-footer">
                                <div class="price-tag">₱<?php echo $price; ?></div>
                                <div class="card-icon" title="Add to cart">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                foreach ($fallbackMenuItems as $item) {
                    $cat = strtolower($item['category']);
                    ?>
                    <div class="card" data-category="<?php echo $cat; ?>">
                        <div class="card-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop"
                                alt="<?php echo htmlspecialchars($item['name']); ?>" loading="lazy">
                        </div>
                        <div class="card-content">
                            <h2><?php echo htmlspecialchars($item['name']); ?></h2>
                            <p><?php echo htmlspecialchars($item['desc']); ?></p>
                            <div class="card-footer">
                                <div class="price-tag">₱<?php echo $item['price']; ?></div>
                                <div class="card-icon" title="Add to cart">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <div class="empty-state" id="emptyState" style="display: none;">
            <div class="empty-state-icon">🍩</div>
            <h2>No Items Found</h2>
            <p>Try selecting a different category</p>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            once: true,
            offset: 100,
            duration: 800,
            easing: 'ease-out-cubic',
        });

        // Mouse Parallax Logic for floating shapes
        document.addEventListener("mousemove", parallax);
        function parallax(e) {
            document.querySelectorAll(".floating-shape").forEach(function (move) {
                var moving_value = move.getAttribute("data-speed");
                var x = (e.clientX * moving_value) / 250;
                var y = (e.clientY * moving_value) / 250;
                move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
            });
        }

        // Enhanced filter functionality
        function filterMenu(category, btn) {
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const cards = document.querySelectorAll('.card');
            let visibleCount = 0;
            let delayCounter = 0;

            cards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                const shouldShow = (category === 'all') ||
                    (category === cardCat) ||
                    (category === 'coffee' && cardCat === 'beverages');

                if (shouldShow) {
                    if (card.classList.contains('hidden')) {
                        card.classList.remove('hidden');
                        card.classList.add('animating-in');
                        card.style.animationDelay = `${delayCounter * 0.06}s`;
                        delayCounter++;

                        card.addEventListener('animationend', () => {
                            card.classList.remove('animating-in');
                        }, { once: true });
                    }
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            // Show/hide empty state
            document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
        }

        // Heart icon interaction
        document.addEventListener('click', (e) => {
            if (e.target.closest('.card-icon')) {
                const icon = e.target.closest('i');
                icon.classList.toggle('fa-heart');
                icon.classList.toggle('fa-regular');
                icon.classList.toggle('fa-solid');

                // Add pulse animation
                const cardIcon = e.target.closest('.card-icon');
                cardIcon.style.animation = 'pulse 0.6s ease-out';
                setTimeout(() => cardIcon.style.animation = '', 600);
            }
        });

        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('in-view')) {
                    entry.target.classList.add('in-view');
                }
            });
        }, observerOptions);

        // Initial load animation
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.05}s`;
                observer.observe(card);
            });
        });

        // Mouse follow effect on cards (subtle)
        document.addEventListener('mousemove', (e) => {
            document.querySelectorAll('.card').forEach(card => {
                if (!card.classList.contains('hidden')) {
                    const rect = card.getBoundingClientRect();
                    const cardCenterX = rect.left + rect.width / 2;
                    const cardCenterY = rect.top + rect.height / 2;

                    const mouseX = e.clientX;
                    const mouseY = e.clientY;

                    const distX = (mouseX - cardCenterX) * 0.01;
                    const distY = (mouseY - cardCenterY) * 0.01;

                    if (Math.abs(distX) < 5 && Math.abs(distY) < 5) {
                        card.style.transform = `perspective(1000px) rotateX(${distY}deg) rotateY(${distX}deg)`;
                    }
                }
            });
        });

        document.addEventListener('mouseleave', () => {
            document.querySelectorAll('.card').forEach(card => {
                card.style.transform = '';
            });
        });

        // Trigger initial filter
        window.addEventListener('load', () => {
            const firstBtn = document.querySelector('.filter-btn.active');
            if (firstBtn) filterMenu('all', firstBtn);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuGrid = document.getElementById('menuGrid');
            if (menuGrid) {
                menuGrid.addEventListener('click', function (e) {
                    const heartBtn = e.target.closest('.card-icon');
                    if (heartBtn) {
                        const card = heartBtn.closest('.card');
                        if (card) {
                            const itemName = card.querySelector('h3') ? card.querySelector('h3').textContent.trim() : 'Unknown Item';
                            const itemCategory = card.getAttribute('data-category') || 'Uncategorized';

                            if (typeof gtag === 'function') {
                                gtag('event', 'add_to_wishlist', {
                                    item_name: itemName,
                                    item_category: itemCategory
                                });
                            }
                        }
                    }
                });
            }
        });
    </script>

    <?php include 'includes/footer.php'; ?>
</body>

</html>