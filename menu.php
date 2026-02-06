<?php
$pageTitle = "Our Menu - Danono's";
$metaDesc = "Explore Danono's delicious menu of premium brioche doughnuts, brownies, and refreshing drinks.";
$customCss = "menu.css";
include 'includes/db_connect.php';
?>
<?php include 'includes/header.php'; ?>
<style>
    /* --- CARD STYLING --- */
    .card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #FFF8F0;
        /* Very light cream border */
        box-shadow: 0 10px 30px rgba(67, 20, 7, 0.03);
        /* Soft shadow */
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
        /* Ensures all cards in a row are same height */
        position: relative;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(67, 20, 7, 0.08);
        border-color: #EF7D32;
        /* Orange border on hover */
    }

    /* Image */
    .card img {
        width: 100%;
        height: 260px;
        /* Fixed height for uniformity */
        object-fit: cover;
        background-color: #FFF8F0;
        transition: transform 0.5s ease;
    }

    .card:hover img {
        transform: scale(1.05);
        /* Subtle zoom effect */
    }

    /* Text Content */
    .card h3 {
        font-size: 22px;
        margin: 20px 25px 10px;
        color: #431407;
        font-weight: 700;
    }

    .card p {
        font-size: 15px;
        color: #666;
        margin: 0 25px 20px;
        line-height: 1.6;
        flex-grow: 1;
        /* Pushes the price to the bottom */
    }

    /* Price Tag */
    .price {
        margin-top: auto;
        /* Forces to bottom */
        padding: 20px 25px;
        background-color: #FFFDF9;
        border-top: 1px solid #FFF0E0;
        color: #EF7D32 !important;
        /* Force Orange */
        font-weight: 800;
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .price i {
        font-size: 20px;
    }

    /* --- ANIMATION STYLES --- */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes fadeOutDown {
        from {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        to {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }
    }

    .card.animating-in {
        animation: fadeInUp 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) forwards;
    }

    .card.hidden {
        display: none;
    }

</style>

<div class="container">
    <!-- Page Header -->
    <div class="section-header">
        <span class="section-label">Fresh Daily</span>
        <h1 class="page-title">Most Loved <span>Treats</span></h1>
    </div>

    <!-- Menu Filters -->
    <div class="menu-filters">
        <button class="filter-btn active" onclick="filterMenu('all', this)">All</button>
        <button class="filter-btn" onclick="filterMenu('doughnuts', this)">Doughnuts</button>
        <button class="filter-btn" onclick="filterMenu('brownies', this)">Brownies</button>
        <button class="filter-btn" onclick="filterMenu('coffee', this)">Beverages</button>
    </div>

    <!-- Menu Grid -->
    <div class="grid" id="menuGrid">
        <?php
        $sql = "SELECT * FROM menu_items WHERE (is_visible = 1 OR is_visible IS NULL) ORDER BY category, name";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = htmlspecialchars($row["name"]);
                $price = number_format($row["price"], 2);
                $description = isset($row["description"]) ? htmlspecialchars($row["description"]) : "A delicious treat made fresh daily.";
                $image = isset($row["image"]) && !empty($row["image"]) ? "uploads/" . $row["image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=300&h=200&fit=crop";
                $cat = strtolower($row["category"]);
                // Use DB alt_text if available, otherwise fallback to name
                $altText = !empty($row["alt_text"]) ? htmlspecialchars($row["alt_text"]) : $name;
                ?>
                <div class="card" data-category="<?php echo $cat; ?>">
                    <img src="<?php echo $image; ?>" alt="<?php echo $altText; ?>"
                        onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=300&h=200&fit=crop'">
                    <h3><?php echo $name; ?></h3>
                    <p><?php echo $description; ?></p>
                    <p class="price"><i class="ph ph-tag"></i> ₱<?php echo $price; ?></p>
                </div>
                <?php
            }
        } else {
            // Fallback static menu items if database is empty
            $menuItems = [
                // Premium doughnuts 
                ["name" => "Sweet Bavarian Crunch", "category" => "doughnuts", "price" => "₱30", "desc" => "Bavarian-filled brioche donut dipped in crispy, roasted sugar."],
                ["name" => "Rainbow Crunch", "category" => "doughnuts", "price" => "₱30", "desc" => "Brioche donut dipped in chocolate and topped with Froot Loops."],
                ["name" => "Gleaming Glaze", "category" => "doughnuts", "price" => "₱30", "desc" => "Classic glazed brioche donut"],
                ["name" => "Choco Gleaming Glaze", "category" => "doughnuts", "price" => "₱50", "desc" => "Classic glazed brioche donut."],
                ["name" => "Dusted Berry Dream", "category" => "dougnuts", "price" => "₱30", "desc" => "Strawberry jam-filled brioche donut coated in powdered sugar."],
                ["name" => "Coffee Crunch", "category" => "doughnuts", "price" => "₱40", "desc" => "Cappuccino-dipped brioche donut with chocolate and wafer toppings."],
                ["name" => "Double Choco Delight", "category" => "doughnuts", "price" => "₱40", "desc" => "Cocoa and chocolate powder-dusted brioche donut with a chocolate cream filling."],
                ["name" => "Melty Marshmallow", "category" => "doughnuts", "price" => "₱40", "desc" => "Brioche donut dipped in chocolate and topped with roasted marshmallows."],
                ["name" => "Whipped Oreo Wonder", "category" => "doughnuts", "price" => "₱40", "desc" => "Cream and Oreo-filled brioche donuts topped with whipped cream and crushed Oreos."],
                ["name" => "Choco Caviar Creation", "category" => "doughnuts", "price" => "₱40", "desc" => "Brioche donut dipped in chocolate topped with chocolate caviar."],
                ["name" => "So Matcha Love", "category" => "doughnuts", "price" => "₱40", "desc" => "Brioche donut dipped and filled with matcha and topped with matcha crumbs."],
                ["name" => "Almond Amore", "category" => "doughnuts", "price" => "₱40", "desc" => "Brioche donut dipped in semi-sweet white chocolate and topped with almond slices."],
                ["name" => "Ube Bliss", "category" => "doughnuts", "price" => "₱40", "desc" => "Brioche donut filled with creamy ube, coated with semi-sweet ube dipping, and drizzled with ube and cream combination."],
                ["name" => "Nutty Choco Nirvana", "category" => "doughnuts", "price" => "₱40", "desc" => "Brioche donut topped with almond choco crunch, drizzled with almond chocolate and caramel fudge."],
                ["name" => "Sweet Cherry Crave", "category" => "doughnuts", "price" => "₱50", "desc" => "Brioche donut with whipped cream spread, topped with cherry and chocolate curls."],
                ["name" => "Milky Cheese Dream", "category" => "doughnuts", "price" => "₱15", "desc" => "Cheddar cheese-filled brioche donuts dusted with powdered milk."],
                ["name" => "Ube Cheese Fantasy", "category" => "doughnuts", "price" => "₱20", "desc" => "Brioche donut filled with ube and cheese, dusted with powdered milk."],

                // Danono's doughnuts
                ["name" => "Pistachio Crunch", "category" => "doughnuts", "price" => "₱65", "desc" => "Brioche donut spread with pistachio crunch drizzled with melted white chocolate."],
                ["name" => "Choco Haven Supreme", "category" => "doughnuts", "price" => "₱60", "desc" => "Combination of 5 kinds of chocolates in 1 doughnut drizzled with Hershey's chocolate syrup."],
                ["name" => "Biscoff Bite", "category" => "doughnuts", "price" => "₱60", "desc" => "Smooth Biscoff spread-dipped brioche donut topped with Lotus Biscoff biscuits."],
                ["name" => "Sans Rival Temptation", "category" => "doughnuts", "price" => "₱60", "desc" => "Brioche donut with alternate layers of buttercream, sansrival base, and donut bread, topped with cashew."],
                ["name" => "Cheesy Overload", "category" => "doughnuts", "price" => "₱50", "desc" => "Brioche donut with torched glaze, cream cheese, and grated toppings."],
                ["name" => "Decadent Choco Trio", "category" => "doughnuts", "price" => "₱50", "desc" => "Brioche donut filled with chocolate filling, chocolate-dipped, topped with chocolate chips."],
                ["name" => "Fluffy Floss Fantasy", "category" => "doughnuts", "price" => "₱50", "desc" => "Savory brioche donuts with Japanese mayo spread and chicken floss on top."],
                ["name" => "Toasty Ovalmaltine Dream", "category" => "doughnuts", "price" => "₱50", "desc" => "Brioche donut spread with Ovomaltine crunch top with torched marshmallows and sprinkled with crushed Biscoff biscuit."],
                ["name" => "Mango Crunch", "category" => "doughnuts", "price" => "₱50", "desc" => "Chocolate-dipped brioche donut with mango filling and topped with graham cracker bits."],

                // Signature Drinks
                ["name" => "Danono's Chocolate (Hot)", "category" => "beverages", "price" => "₱100", "desc" => "Signature chocolate drink served hot."],
                ["name" => "Danono's Chocolate (Iced)", "category" => "beverages", "price" => "₱110", "desc" => "Signature chocolate drink served over ice."],
                ["name" => "Danono's Coffee", "category" => "beverages", "price" => "₱120", "desc" => "Signature coffee blend."],
                ["name" => "Seasalt Latte", "category" => "beverages", "price" => "₱120", "desc" => "Signature latte with a touch of sea salt."],
                ["name" => "White Mocha Latte", "category" => "beverages", "price" => "₱120", "desc" => "Signature white chocolate mocha latte."],

                // Hot Coffee
                ["name" => "Hot Americano (8oz)", "category" => "beverages", "price" => "₱55", "desc" => "Classic hot espresso with water."],
                ["name" => "Hot Americano (12oz)", "category" => "beverages", "price" => "₱80", "desc" => "Classic hot espresso with water."],
                ["name" => "Hot Capuccino (12oz)", "category" => "beverages", "price" => "₱100", "desc" => "Espresso with steamed milk and foam."],
                ["name" => "Hot Caramel Macchiato (12oz)", "category" => "beverages", "price" => "₱110", "desc" => "Espresso with steamed milk and caramel."],
                ["name" => "Hot Cafe Mocha (12oz)", "category" => "beverages", "price" => "₱110", "desc" => "Espresso with chocolate and steamed milk."],
                ["name" => "Hot Salted Caramel Latte (12oz)", "category" => "beverages", "price" => "₱120", "desc" => "Latte with salted caramel syrup."],

                // Iced Coffee (16oz)
                ["name" => "Iced Americano", "category" => "beverages", "price" => "₱100", "desc" => "Chilled espresso with water over ice."],
                ["name" => "Iced Capuccino", "category" => "beverages", "price" => "₱110", "desc" => "Chilled espresso with milk and foam."],
                ["name" => "Iced Caramel Macchiato", "category" => "beverages", "price" => "₱120", "desc" => "Chilled espresso with milk and caramel."],
                ["name" => "Iced Cafe Mocha", "category" => "beverages", "price" => "₱120", "desc" => "Chilled espresso with chocolate and milk."],
                ["name" => "Iced Spanish Latte", "category" => "beverages", "price" => "₱120", "desc" => "Creamy iced latte with a sweet twist."],
                ["name" => "Iced Salted Caramel Latte", "category" => "beverages", "price" => "₱130", "desc" => "Chilled latte with salted caramel over ice."],

                // Iced Non-Coffee (16oz)
                ["name" => "Iced Strawberry Milk", "category" => "beverages", "price" => "₱110", "desc" => "Creamy milk with strawberry flavor."],
                ["name" => "Iced Matcha Latte", "category" => "beverages", "price" => "₱110", "desc" => "Chilled green tea matcha with milk."],
                ["name" => "Iced White Chocolate", "category" => "beverages", "price" => "₱100", "desc" => "Creamy white chocolate over ice."],

                // Frappe (16oz)
                ["name" => "Espresso Frappe", "category" => "beverages", "price" => "₱130", "desc" => "Blended coffee-based frozen drink."],
                ["name" => "Cookies and Cream Frappe", "category" => "beverages", "price" => "₱120", "desc" => "Blended cookies and cream frozen drink."],
                ["name" => "Chocolate Chip Frappe", "category" => "beverages", "price" => "₱120", "desc" => "Blended chocolate chip frozen drink."],

                // Refreshers (16oz)
                ["name" => "Strawberry Lemonade", "category" => "beverages", "price" => "₱120", "desc" => "Freshly squeezed lemon with strawberry."],
                ["name" => "Lychee Lemonade", "category" => "beverages", "price" => "₱120", "desc" => "Freshly squeezed lemon with lychee."],
                ["name" => "Blueberry Breeze", "category" => "beverages", "price" => "₱90", "desc" => "Refreshing blueberry lemon drink."],
                ["name" => "Strawberry Blush", "category" => "beverages", "price" => "₱90", "desc" => "Refreshing strawberry lemon drink."],
                ["name" => "Lychee Lush", "category" => "beverages", "price" => "₱90", "desc" => "Refreshing lychee lemon drink."],
                ["name" => "Golden Peach Passion", "category" => "beverages", "price" => "₱90", "desc" => "Refreshing peach lemon drink."],
                ["name" => "Green Apple Zing", "category" => "beverages", "price" => "₱90", "desc" => "Refreshing green apple lemon drink."],

                // Hot Tea (12oz)
                ["name" => "Honey Ginger Tea", "category" => "beverages", "price" => "₱100", "desc" => "Soothing hot honey and ginger tea."],
            ];

            foreach ($menuItems as $item) {
                ?>
                <div class="card" data-category="<?php echo $item['category']; ?>">
                    <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=300&h=200&fit=crop"
                        alt="<?php echo $item['name']; ?>">
                    <h3><?php echo $item['name']; ?></h3>
                    <p><?php echo $item['desc']; ?></p>
                    <p class="price"><i class="ph ph-tag"></i> ₱<?php echo $item['price']; ?></p>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <script>
        function filterMenu(category, btn) {
            // 1. Update Active Button State
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // 2. Get all cards
            const cards = document.querySelectorAll('.card');
            
            // 3. Animation Logic
            let delayCounter = 0; // To stagger the entrance of new items

            cards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                
                // Determine if this card should show
                const shouldShow = (category === 'all') || 
                                   (category === cardCat) || 
                                   (category === 'coffee' && (cardCat === 'beverages'));

                if (shouldShow) {
                    // If hidden, remove hidden class and animate in
                    if (card.classList.contains('hidden')) {
                        card.classList.remove('hidden');
                        card.style.animationDelay = `${delayCounter * 0.05}s`; // Stagger effect
                        card.classList.add('animating-in');
                        delayCounter++;

                        // Clean up animation class after it runs
                        card.addEventListener('animationend', () => {
                            card.classList.remove('animating-in');
                            card.style.animationDelay = '0s';
                        }, { once: true });
                    } 
                } else {
                    // Hide immediately (or you could add a fadeOut animation here too)
                    card.classList.add('hidden');
                }
            });
        }

        // Optional: Trigger 'All' animation on page load for a nice entrance
        document.addEventListener('DOMContentLoaded', () => {
             const firstBtn = document.querySelector('.filter-btn.active');
             if(firstBtn) filterMenu('all', firstBtn);
        });
    </script>
</div>




<?php include 'includes/footer.php'; ?>