<?php
$pageTitle = "Our Menu - Danono's Doughnuts and Brownies";
$metaDesc = "Explore Danono's delicious menu of premium brioche doughnuts, brownies, and refreshing drinks.";
$customCss = "menu.css";
include 'includes/header.php';
include 'includes/db_connect.php';
?>

<!-- Menu Hero Section -->
<section class="menu-hero">
    <div class="floating-shape shape-1" data-speed="4"></div>
    <div class="floating-shape shape-2" data-speed="-2"></div>

    <div class="menu-hero-content">
        <span class="section-subtitle" data-aos="fade-down">FRESH DAILY</span>
        <h1 data-aos="fade-up" data-aos-delay="100">Discover Our<br>Most Loved <span
                class="pop-out-text">TREATS</span></h1>
    </div>
    <div class="menu-hero-bg" data-speed="1">
        <img src="assets/img/danonos-menu.jpg" alt="Danono's Menu Background"
            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=1200&h=600&fit=crop'">
    </div>
</section>

<div class="container">

    <!-- Filter Section -->
    <div class="filter-container">
        <button class="filter-btn active" onclick="filterMenu('all', this)" data-filter="all">
            <i class="fas fa-th"></i> All Items
        </button>
        <button class="filter-btn" onclick="filterMenu('doughnuts', this)" data-filter="doughnuts">
            <i class="fas fa-ring"></i> Doughnuts
        </button>
        <button class="filter-btn" onclick="filterMenu('brownies', this)" data-filter="brownies">
            <i class="fas fa-square"></i> Brownies
        </button>
        <button class="filter-btn" onclick="filterMenu('beverages', this)" data-filter="beverages">
            <i class="fas fa-mug-hot"></i> Beverages
        </button>
    </div>

    <!-- Menu Grid -->
    <div class="grid" id="menuGrid">
        <?php
        $sql = "SELECT * FROM menu_items WHERE (is_visible = 1 OR is_visible IS NULL) ORDER BY category, name";
        $result = $conn->query($sql);

        $hasItems = false;

        if ($result && $result->num_rows > 0) {
            $hasItems = true;
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
                        <img src="<?php echo $image; ?>" alt="<?php echo $altText; ?>"
                            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop'">
                    </div>
                    <div class="card-content">
                        <h3><?php echo $name; ?></h3>
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
            // Fallback static menu items
            $menuItems = [
                // Doughnuts
                ["name" => "Sweet Bavarian Crunch", "category" => "doughnuts", "price" => "30", "desc" => "Bavarian-filled brioche donut dipped in crispy, roasted sugar."],
                ["name" => "Rainbow Crunch", "category" => "doughnuts", "price" => "30", "desc" => "Brioche donut dipped in chocolate and topped with Froot Loops."],
                ["name" => "Gleaming Glaze", "category" => "doughnuts", "price" => "30", "desc" => "Classic glazed brioche donut."],
                ["name" => "Choco Gleaming Glaze", "category" => "doughnuts", "price" => "50", "desc" => "Classic glazed brioche donut with rich chocolate."],
                ["name" => "Dusted Berry Dream", "category" => "doughnuts", "price" => "30", "desc" => "Strawberry jam-filled brioche donut coated in powdered sugar."],
                ["name" => "Coffee Crunch", "category" => "doughnuts", "price" => "40", "desc" => "Cappuccino-dipped brioche donut with chocolate and wafer toppings."],
                ["name" => "Double Choco Delight", "category" => "doughnuts", "price" => "40", "desc" => "Cocoa and chocolate powder-dusted brioche donut with chocolate cream filling."],
                ["name" => "Melty Marshmallow", "category" => "doughnuts", "price" => "40", "desc" => "Brioche donut dipped in chocolate and topped with roasted marshmallows."],
                ["name" => "Pistachio Crunch", "category" => "doughnuts", "price" => "65", "desc" => "Brioche donut spread with pistachio crunch drizzled with melted white chocolate."],
                ["name" => "Choco Haven Supreme", "category" => "doughnuts", "price" => "60", "desc" => "Combination of 5 kinds of chocolates in 1 doughnut."],

                // Brownies
                ["name" => "Classic Fudge Brownie", "category" => "brownies", "price" => "45", "desc" => "Rich, dense chocolate fudge brownie with a moist center."],
                ["name" => "Salted Caramel Brownie", "category" => "brownies", "price" => "55", "desc" => "Decadent brownie with salted caramel swirl and crushed sea salt."],
                ["name" => "Nutella Dream", "category" => "brownies", "price" => "50", "desc" => "Chocolate brownie with Nutella filling and hazelnut bits."],
                ["name" => "Double Chocolate Stack", "category" => "brownies", "price" => "60", "desc" => "Dark and milk chocolate layered brownie perfection."],

                // Beverages
                ["name" => "Danono's Chocolate (Hot)", "category" => "beverages", "price" => "100", "desc" => "Signature chocolate drink served hot with velvety texture."],
                ["name" => "Danono's Chocolate (Iced)", "category" => "beverages", "price" => "110", "desc" => "Signature chocolate drink served refreshingly cold."],
                ["name" => "Seasalt Latte", "category" => "beverages", "price" => "120", "desc" => "Smooth latte with a sophisticated touch of sea salt."],
                ["name" => "White Mocha Latte", "category" => "beverages", "price" => "120", "desc" => "Creamy white chocolate mocha latte."],
                ["name" => "Hot Cappuccino", "category" => "beverages", "price" => "100", "desc" => "Classic espresso with velvety steamed milk and thick foam."],
                ["name" => "Iced Americano", "category" => "beverages", "price" => "100", "desc" => "Refreshing espresso with cold water over ice."],
                ["name" => "Strawberry Lemonade", "category" => "beverages", "price" => "120", "desc" => "Freshly made lemonade with fresh strawberry juice."],
                ["name" => "Matcha Latte", "category" => "beverages", "price" => "110", "desc" => "Creamy latte with traditional matcha green tea."],
            ];

            $hasItems = true;
            foreach ($menuItems as $item) {
                $cat = strtolower($item['category']);
                ?>
                <div class="card" data-category="<?php echo $cat; ?>">
                    <div class="card-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop"
                            alt="<?php echo htmlspecialchars($item['name']); ?>">
                    </div>
                    <div class="card-content">
                        <h3><?php echo htmlspecialchars($item['name']); ?></h3>
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

    <!-- Empty State (hidden by default) -->
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

<?php include 'includes/footer.php'; ?>
