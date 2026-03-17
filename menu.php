<?php
$pageTitle = "Our Menu - Danono's Doughnuts and Brownies";
$metaDesc = "Explore Danono's delicious menu of premium brioche doughnuts, brownies, and refreshing drinks.";
include 'includes/header.php';
include 'includes/db_connect.php';
?>

<!-- Menu Hero Section -->
<section
    class="menu-hero relative h-[450px] flex items-center justify-center overflow-hidden bg-[#431407] max-md:h-[350px] max-sm:h-[300px]">
    <!-- Floating Shapes (Interactive) -->
    <div class="floating-shape absolute rounded-full blur-[60px] z-[2] opacity-60 transition-transform duration-100 ease-linear pointer-events-none top-[-50px] left-[-50px] w-[300px] h-[300px] bg-[#EF7D32] max-md:w-[250px] max-md:h-[250px] max-sm:w-[150px] max-sm:h-[150px] max-sm:top-[-20px] max-sm:left-[-20px]"
        data-speed="4"></div>
    <div class="floating-shape absolute rounded-full blur-[60px] z-[2] opacity-60 transition-transform duration-100 ease-linear pointer-events-none bottom-[-50px] right-[10%] w-[250px] h-[250px] bg-[#FFC107] max-md:w-[200px] max-md:h-[200px] max-sm:w-[120px] max-sm:h-[120px] max-sm:bottom-[-20px] max-sm:right-[5%]"
        data-speed="-2"></div>

    <div class="menu-hero-content relative z-[3] text-center text-white px-5">
        <span
            class="section-subtitle block tracking-[4px] text-[14px] mb-[15px] opacity-90 font-bold max-md:text-[12px] max-md:tracking-[3px] max-sm:text-[10px] max-sm:tracking-[1.5px]"
            data-aos="fade-down">FRESH DAILY</span>
        <h1 class="text-[56px] leading-[1.1] font-bold max-md:text-[32px] max-sm:text-[26px]" data-aos="fade-up"
            data-aos-delay="100">Discover Our<br>Most Loved <span class="pop-out-text">TREATS</span></h1>
    </div>
    <div class="menu-hero-bg absolute inset-0 z-[1] opacity-40 transition-transform duration-100 ease-linear"
        data-speed="1">
        <img src="assets/img/danonos-menu.jpg" alt="Danono's Menu Background" class="w-full h-full object-cover"
            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=1200&h=600&fit=crop'">
    </div>
</section>

<div class="max-w-[1400px] mx-auto px-5 pb-20 max-md:pb-[60px] max-sm:pb-[30px] overflow-x-hidden">

    <!-- Unique Filter Section -->
    <div
        class="filter-container flex justify-center gap-2 my-[60px] mx-auto flex-wrap px-5 w-full max-sm:my-8 max-sm:flex-nowrap max-sm:overflow-x-auto max-sm:justify-start max-sm:pb-4 max-sm:px-5 [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]">

        <button
            class="filter-btn active shrink-0 group relative p-[14px_32px] bg-white border-2 border-[#F0DCCA] rounded-[20px] font-black text-[#431407] uppercase tracking-widest text-[13px] transition-all duration-500 overflow-hidden shadow-none sm:shadow-sm sm:hover:translate-y-[-5px] sm:hover:shadow-xl sm:hover:border-[#EF7D32] active:scale-95 [&.active]:text-white [&.active]:border-[#EF7D32] sm:[&.active]:shadow-[#EF7D32]/30 max-sm:p-[10px_20px] max-sm:text-[11px] max-sm:whitespace-nowrap"
            onclick="filterMenu('all', this)" data-filter="all">
            <span
                class="absolute inset-0 bg-gradient-to-br from-[#EF7D32] to-[#FFC107] translate-y-full transition-transform duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] -z-1 group-[.active]:translate-y-0"></span>
            <span class="flex items-center gap-2 relative z-10">
                <i class="ph-fill ph-grid-four text-[20px] max-sm:text-[16px]"></i> All Items
            </span>
        </button>

        <button
            class="filter-btn shrink-0 group relative p-[14px_32px] bg-white border-2 border-[#F0DCCA] rounded-[20px] font-black text-[#431407] uppercase tracking-widest text-[13px] transition-all duration-500 overflow-hidden shadow-none sm:shadow-sm sm:hover:translate-y-[-5px] sm:hover:shadow-xl sm:hover:border-[#EF7D32] active:scale-95 [&.active]:text-white [&.active]:border-[#EF7D32] sm:[&.active]:shadow-[#EF7D32]/30 max-sm:p-[10px_20px] max-sm:text-[11px] max-sm:whitespace-nowrap"
            onclick="filterMenu('doughnuts', this)" data-filter="doughnuts">
            <span
                class="absolute inset-0 bg-gradient-to-br from-[#EF7D32] to-[#FFC107] translate-y-full transition-transform duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] -z-1 group-[.active]:translate-y-0"></span>
            <span class="flex items-center gap-2 relative z-10">
                <i class="ph-fill ph-cookie text-[20px] max-sm:text-[16px]"></i> Doughnuts
            </span>
        </button>

        <button
            class="filter-btn shrink-0 group relative p-[14px_32px] bg-white border-2 border-[#F0DCCA] rounded-[20px] font-black text-[#431407] uppercase tracking-widest text-[13px] transition-all duration-500 overflow-hidden shadow-none sm:shadow-sm sm:hover:translate-y-[-5px] sm:hover:shadow-xl sm:hover:border-[#EF7D32] active:scale-95 [&.active]:text-white [&.active]:border-[#EF7D32] sm:[&.active]:shadow-[#EF7D32]/30 max-sm:p-[10px_20px] max-sm:text-[11px] max-sm:whitespace-nowrap"
            onclick="filterMenu('brownies', this)" data-filter="brownies">
            <span
                class="absolute inset-0 bg-gradient-to-br from-[#EF7D32] to-[#FFC107] translate-y-full transition-transform duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] -z-1 group-[.active]:translate-y-0"></span>
            <span class="flex items-center gap-2 relative z-10">
                <i class="ph-fill ph-squares-four text-[20px] max-sm:text-[16px]"></i> Brownies
            </span>
        </button>

        <button
            class="filter-btn shrink-0 group relative p-[14px_32px] bg-white border-2 border-[#F0DCCA] rounded-[20px] font-black text-[#431407] uppercase tracking-widest text-[13px] transition-all duration-500 overflow-hidden shadow-none sm:shadow-sm sm:hover:translate-y-[-5px] sm:hover:shadow-xl sm:hover:border-[#EF7D32] active:scale-95 [&.active]:text-white [&.active]:border-[#EF7D32] sm:[&.active]:shadow-[#EF7D32]/30 max-sm:p-[10px_20px] max-sm:text-[11px] max-sm:whitespace-nowrap"
            onclick="filterMenu('beverages', this)" data-filter="beverages">
            <span
                class="absolute inset-0 bg-gradient-to-br from-[#EF7D32] to-[#FFC107] translate-y-full transition-transform duration-500 ease-[cubic-bezier(0.23,1,0.32,1)] -z-1 group-[.active]:translate-y-0"></span>
            <span class="flex items-center gap-2 relative z-10">
                <i class="ph-fill ph-coffee text-[20px] max-sm:text-[16px]"></i> Beverages
            </span>
        </button>

    </div>

    <!-- Menu Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 mt-10 max-sm:gap-6" id="menuGrid">
        <?php
        $sql = "SELECT * FROM menu_items WHERE (is_visible = 1 OR is_visible IS NULL) ORDER BY category, name";
        $result = $conn->query($sql);

        $itemCount = 0;
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $itemCount++;
                $name = htmlspecialchars($row["name"]);
                $price = number_format($row["price"], 2);
                $description = isset($row["description"]) ? htmlspecialchars($row["description"]) : "A delicious treat made fresh daily.";
                $image = isset($row["image"]) && !empty($row["image"]) ? "uploads/" . $row["image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop";
                $cat = strtolower($row["category"]);
                $altText = !empty($row["alt_text"]) ? htmlspecialchars($row["alt_text"]) : $name;
                ?>
                <div class="card bg-white rounded-[30px] overflow-hidden border-2 border-transparent shadow-[0_15px_40px_rgba(67,20,7,0.05)] transition-all duration-500 cubic-bezier(0.34,1.56,0.64,1) flex flex-col h-full relative opacity-0 animate-card-load group hover:-translate-y-4 hover:scale-[1.02] hover:shadow-[0_25px_60px_rgba(67,20,7,0.12)] hover:border-[#EF7D32]/30 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-br before:from-[#EF7D32]/5 before:to-transparent before:pointer-events-none before:z-[1] before:opacity-0 before:transition-opacity before:duration-400 hover:before:opacity-100"
                    data-category="<?php echo $cat; ?>" style="animation-delay: <?php echo ($itemCount * 0.05); ?>s">
                    <div
                        class="card-image-wrapper relative overflow-hidden h-[260px] md:h-[300px] bg-[#FFF8F0] before:content-[''] before:absolute before:inset-0 before:bg-[radial-gradient(circle_at_30%_30%,rgba(255,255,255,0.2)_0%,transparent_60%)] before:pointer-events-none before:z-[2]">
                        <img src="<?php echo $image; ?>" alt="<?php echo $altText; ?>"
                            class="w-full h-full object-cover transition-transform duration-700 ease-in-out brightness-[1.05] contrast-[1.05] group-hover:scale-125 group-hover:rotate-6 group-hover:brightness-[1.15] group-hover:contrast-[1.1]"
                            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop'">
                    </div>
                    <div class="card-content flex flex-col grow p-6 md:p-8 relative z-[2]">
                        <h3
                            class="text-[20px] md:text-[24px] font-black text-[#431407] mb-3 leading-[1.2] transition-colors duration-300 group-hover:text-[#EF7D32]">
                            <?php echo $name; ?>
                        </h3>
                        <p class="text-[14px] md:text-[15px] text-[#6b5c55] m-0 mb-6 leading-relaxed grow font-medium">
                            <?php echo $description; ?>
                        </p>
                        <div class="card-footer flex justify-between items-center pt-5 border-t border-[#F0DCCA] mt-auto">
                            <div
                                class="price-tag bg-[#EF7D32] text-white px-4 md:px-6 py-2 md:py-2.5 rounded-full font-bold text-[16px] md:text-[18px] flex items-center gap-2 shadow-[0_8px_20px_rgba(239,125,50,0.3)] transition-all duration-300 group-hover:scale-110">
                                ₱
                                <?php echo $price; ?>
                            </div>
                            <div class="card-icon w-10 h-10 md:w-11 md:h-11 bg-[#fff0e6] text-[#EF7D32] rounded-[12px] md:rounded-[14px] flex items-center justify-center text-[20px] md:text-[22px] transition-all duration-300 cursor-pointer hover:bg-[#EF7D32] hover:text-white hover:rotate-[15deg]"
                                title="Add to favorites">
                                <i class="ph ph-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            // Fallback items with same responsive classes
            $menuItems = [
                ["name" => "Sweet Bavarian Crunch", "category" => "doughnuts", "price" => "30", "desc" => "Bavarian-filled brioche donut dipped in crispy, roasted sugar."],
                ["name" => "Rainbow Crunch", "category" => "doughnuts", "price" => "30", "desc" => "Brioche donut dipped in chocolate and topped with Froot Loops."],
                ["name" => "Classic Fudge Brownie", "category" => "brownies", "price" => "45", "desc" => "Rich, dense chocolate fudge brownie with a moist center."],
            ];

            foreach ($menuItems as $index => $item) {
                $cat = strtolower($item['category']);
                ?>
                <div class="card bg-white rounded-[30px] overflow-hidden border-2 border-transparent shadow-[0_15px_40px_rgba(67,20,7,0.05)] transition-all duration-500 cubic-bezier(0.34,1.56,0.64,1) flex flex-col h-full relative opacity-0 animate-card-load group hover:-translate-y-4 hover:scale-[1.02] hover:shadow-[0_25px_60px_rgba(67,20,7,0.12)] hover:border-[#EF7D32]/30 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-br before:from-[#EF7D32]/5 before:to-transparent before:pointer-events-none before:z-[1] before:opacity-0 before:transition-opacity before:duration-400 hover:before:opacity-100"
                    data-category="<?php echo $cat; ?>" style="animation-delay: <?php echo ($index * 0.05); ?>s">
                    <div
                        class="card-image-wrapper relative overflow-hidden h-[260px] md:h-[300px] bg-[#FFF8F0] before:content-[''] before:absolute before:inset-0 before:bg-[radial-gradient(circle_at_30%_30%,rgba(255,255,255,0.2)_0%,transparent_60%)] before:pointer-events-none before:z-[2]">
                        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop"
                            alt="<?php echo htmlspecialchars($item['name']); ?>"
                            class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-125 group-hover:rotate-6">
                    </div>
                    <div class="card-content flex flex-col grow p-6 md:p-8 relative z-[2]">
                        <h3
                            class="text-[20px] md:text-[24px] font-black text-[#431407] mb-3 leading-[1.2] transition-colors duration-300 group-hover:text-[#EF7D32]">
                            <?php echo htmlspecialchars($item['name']); ?>
                        </h3>
                        <p class="text-[14px] md:text-[15px] text-[#6b5c55] m-0 mb-6 leading-relaxed grow font-medium">
                            <?php echo htmlspecialchars($item['desc']); ?>
                        </p>
                        <div class="card-footer flex justify-between items-center pt-5 border-t border-[#F0DCCA] mt-auto">
                            <div
                                class="price-tag bg-gradient-to-br from-[#EF7D32] to-[#FFC107] text-white px-4 md:px-6 py-2 md:py-2.5 rounded-full font-black text-[16px] md:text-[18px] flex items-center gap-2 shadow-[0_8px_20px_rgba(239,125,50,0.3)] transition-all duration-300 group-hover:scale-110">
                                ₱
                                <?php echo $item['price']; ?>
                            </div>
                            <div class="card-icon w-10 h-10 md:w-11 md:h-11 bg-[#fff0e6] text-[#EF7D32] rounded-[12px] md:rounded-[14px] flex items-center justify-center text-[20px] md:text-[22px] transition-all duration-300 cursor-pointer hover:bg-[#EF7D32] hover:text-white hover:rotate-[15deg]"
                                title="Add to favorites">
                                <i class="ph ph-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <!-- Empty State -->
    <div class="empty-state text-center py-20 px-5 opacity-0 animate-fade-in" id="emptyState" style="display: none;">
        <div class="empty-state-icon text-[80px] text-[#EF7D32] mb-5 opacity-50">🍩</div>
        <h2 class="text-[28px] text-[#431407] font-black mb-2.5">No Items Found</h2>
        <p class="text-[#999] text-base">Try selecting a different category</p>
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

    // Mouse Parallax Logic
    document.addEventListener("mousemove", parallax);
    function parallax(e) {
        document.querySelectorAll(".floating-shape").forEach(function (move) {
            var moving_value = move.getAttribute("data-speed");
            var x = (e.clientX * moving_value) / 250;
            var y = (e.clientY * moving_value) / 250;
            move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        });
    }

    // Filter functionality
    function filterMenu(category, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const cards = document.querySelectorAll('.card');
        let visibleCount = 0;
        let delayCounter = 0;

        cards.forEach(card => {
            const cardCat = card.getAttribute('data-category');
            const shouldShow = (category === 'all') || (category === cardCat) || (category === 'coffee' && cardCat === 'beverages');

            if (shouldShow) {
                if (card.classList.contains('hidden')) {
                    card.classList.remove('hidden');
                    card.classList.add('animating-in');
                    card.style.animationDelay = `${delayCounter * 0.06}s`;
                    delayCounter++;
                    card.addEventListener('animationend', () => card.classList.remove('animating-in'), { once: true });
                }
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });
        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    // Heart interaction
    document.addEventListener('click', (e) => {
        const heartBtn = e.target.closest('.card-icon');
        if (heartBtn) {
            const icon = heartBtn.querySelector('i');
            icon.classList.toggle('ph-heart');
            icon.classList.toggle('ph-heart-fill');
            heartBtn.style.transform = 'scale(1.3) rotate(15deg)';
            setTimeout(() => heartBtn.style.transform = '', 200);
        }
    });

    // Initial load animation
    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.05}s`;
        });
    });

    window.addEventListener('load', () => {
        const firstBtn = document.querySelector('.filter-btn.active');
        if (firstBtn) filterMenu('all', firstBtn);
    });
</script>

<?php include 'includes/footer.php'; ?>