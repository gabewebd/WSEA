<?php
$pageTitle = "Blogs - Danono's Doughnuts and Brownies";
$metaDesc = "Read the latest news, recipes, and stories from Danono's Doughnuts & Brownies.";
include 'includes/header.php';
include 'includes/db_connect.php';
?>

<!-- Blog Hero Section -->
<section class="blog-hero relative h-[450px] flex items-center justify-center overflow-hidden bg-[#431407] max-md:h-[380px] max-sm:h-[350px]">
    <!-- Floating Shapes -->
    <div class="floating-shape absolute rounded-full blur-[60px] z-[2] opacity-60 transition-transform duration-100 ease-linear pointer-events-none top-[-50px] left-[-50px] w-[300px] h-[300px] bg-[#EF7D32] max-md:w-[200px] max-md:h-[200px] max-sm:top-[-20px] max-sm:left-[-20px]" data-speed="4"></div>
    <div class="floating-shape absolute rounded-full blur-[60px] z-[2] opacity-60 transition-transform duration-100 ease-linear pointer-events-none bottom-[-50px] right-[10%] w-[250px] h-[250px] bg-[#FFC107] max-md:w-[150px] max-md:h-[150px] max-sm:bottom-[-20px] max-sm:right-[5%]" data-speed="-2"></div>

    <div class="blog-hero-content relative z-[3] text-center text-white px-5 max-w-[800px]">
        <span class="section-subtitle block tracking-[4px] text-[14px] mb-[15px] opacity-90 font-bold max-sm:text-[10px] max-sm:tracking-[1.5px]" data-aos="fade-down">FROM OUR KITCHEN</span>
        <h1 class="text-[56px] leading-[1.1] font-bold max-md:text-[32px] max-sm:text-[26px]" data-aos="fade-up" data-aos-delay="100">Sweet Stories &<br>Latest <span class="pop-out-text">NEWS</span></h1>
        <p class="hero-description text-[16px] opacity-0.9 mt-5 leading-[1.7] max-w-[600px] mx-auto max-sm:text-[13px]" data-aos="fade-up" data-aos-delay="200">Stay updated with the sweetest news, new flavor launches, and behind-the-scenes stories from the Danono's kitchen.</p>
    </div>
    <div class="blog-hero-bg absolute inset-0 z-[1] opacity-40 transition-transform duration-100 ease-linear" data-speed="1">
        <img src="assets/img/danonos-craving.jpg" alt="Danono's Blog Background" class="w-full h-full object-cover"
            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=1200&h=600&fit=crop'">
    </div>
</section>

<div class="blog-container max-w-[1400px] mx-auto px-5 pb-24 max-md:pb-16 max-sm:pb-10">

    <!-- Blog Grid -->
    <div class="blog-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-9 mt-[60px] max-sm:mt-8 max-sm:gap-4">
        <?php
        $sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY created_at DESC";
        $result = $conn->query($sql);

        $blogCount = 0;

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $blogCount++;
                $id = $row['id'];
                $title = htmlspecialchars($row["title"]);

                // Clean content for excerpt
                $clean_content = $row['content'];
                $clean_content = str_replace('&nbsp;', ' ', $clean_content);
                $clean_content = strip_tags($clean_content);
                $clean_content = html_entity_decode($clean_content);
                $excerpt = mb_substr($clean_content, 0, 120) . '...';

                $date = date('M d, Y', strtotime($row["created_at"]));
                $image = !empty($row["featured_image"]) ? "uploads/" . $row["featured_image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop";
                $slug = isset($row["slug"]) ? $row["slug"] : $id;
                ?>
                <div class="blog-card group bg-white rounded-[24px] shadow-[0_4px_12px_rgba(76,34,14,0.08)] border-2 border-transparent transition-all duration-500 cubic-bezier(0.34,1.56,0.64,1) flex flex-col h-full relative opacity-0 animate-card-load overflow-hidden hover:-translate-y-4 hover:scale-[1.02] hover:shadow-[0_20px_48px_rgba(76,34,14,0.15)] hover:border-[#E8B88D] before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-br before:from-[#D4945E]/15 before:to-transparent before:pointer-events-none before:z-[5] before:opacity-0 before:transition-opacity before:duration-400 hover:before:opacity-100 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-0 after:h-[4px] after:bg-gradient-to-r after:from-[#EF7D32] after:to-[#FFC107] after:transition-all after:duration-500 after:ease-[cubic-bezier(0.34,1.56,0.64,1)] after:z-10 hover:after:w-full" style="animation-delay: <?php echo ($blogCount * 0.05); ?>s">
                    <div class="relative overflow-hidden">
                        <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"
                            class="w-full h-[280px] object-cover block transition-transform duration-700 cubic-bezier(0.34,1.56,0.64,1) brightness-[1.05] contrast-[1.05] group-hover:scale-[1.25] group-hover:-rotate-6 group-hover:brightness-[1.2] group-hover:contrast-[1.15] group-hover:saturate-[1.15]"
                            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop'">
                    </div>
                    <div class="blog-card-content flex flex-col grow p-8 md:p-[32px_28px] relative z-[2] max-sm:p-[20px_18px]">
                        <p class="blog-card-meta flex items-center gap-2 text-[12px] font-semibold text-[#EF7D32] uppercase tracking-[1px] mb-3 transition-all duration-300 group-hover:translate-x-1">
                            <i class="fas fa-calendar-alt text-[14px]"></i> <?php echo $date; ?>
                        </p>
                        <h3 class="text-[26px] font-bold text-[#2C1810] mb-3.5 leading-[1.3] transition-colors duration-300 group-hover:text-[#EF7D32] line-clamp-2 max-sm:text-[18px]"><?php echo $title; ?></h3>
                        <p class="text-[14px] text-[#777] leading-[1.7] mb-5 grow font-normal line-clamp-3 max-sm:text-[12px]"><?php echo $excerpt; ?></p>
                        <a href="/blog/<?php echo urlencode($slug); ?>" class="btn-read-more group/btn relative inline-flex items-center gap-2 text-[#EF7D32] no-underline font-bold text-[13px] uppercase tracking-[1px] p-[12px_16px] rounded-full bg-[#EF7D32]/10 border-2 border-transparent transition-all duration-400 cubic-bezier(0.34,1.56,0.64,1) w-fit overflow-hidden hover:text-white hover:translate-x-1.5 hover:border-[#EF7D32] hover:shadow-[0_8px_20px_rgba(239,125,50,0.3)] hover:tracking-[1.5px]" aria-label="Read the full article: <?php echo $title; ?>">
                            <span class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-[#EF7D32] to-[#FFC107] -z-1 transition-all duration-400 cubic-bezier(0.34,1.56,0.64,1) group-hover/btn:left-0"></span>
                            <span class="relative z-10">Read More</span> <i class="ph-bold ph-arrow-right relative z-10 text-[16px] transition-transform duration-400 group-hover/btn:translate-x-1"></i>
                        </a>
                    </div>
                </div>
                <?php
            }
        }

        if ($blogCount === 0) {
            ?>
            <div class="no-posts col-span-full text-center py-24 px-10 opacity-0 animate-fade-in before:content-['📖'] before:block before:text-[80px] before:mb-5 before:opacity-30">
                <h3 class="text-[32px] text-[#2C1810] font-semibold mb-2.5 max-sm:text-[18px]">No blogs created yet</h3>
                <p class="text-[16px] text-[#999] font-normal">Check back soon for the latest news and stories from our kitchen</p>
            </div>
            <?php
        }
        ?>
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

    // Intersection Observer for scroll animations
    const observerOptions = { threshold: 0.15, rootMargin: '0px 0px -50px 0px' };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('in-view')) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.blog-card');
        cards.forEach(card => observer.observe(card));
    });

    // Enhanced hover effect with perspective
    document.addEventListener('mousemove', (e) => {
        document.querySelectorAll('.blog-card').forEach(card => {
            const rect = card.getBoundingClientRect();
            const cardCenterX = rect.left + rect.width / 2;
            const cardCenterY = rect.top + rect.height / 2;
            const mouseX = e.clientX;
            const mouseY = e.clientY;
            const distX = (mouseX - cardCenterX) * 0.015;
            const distY = (mouseY - cardCenterY) * 0.015;

            if (Math.abs(distX) < 8 && Math.abs(distY) < 8) {
                card.style.transform = `perspective(1200px) rotateX(${distY}deg) rotateY(${distX}deg) translateY(-16px) scale(1.02)`;
            }
        });
    });

    document.addEventListener('mouseleave', () => {
        document.querySelectorAll('.blog-card').forEach(card => {
            card.style.transform = '';
        });
    });
</script>

<?php include 'includes/footer.php'; ?>
