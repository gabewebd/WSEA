<?php
$pageTitle = "Danono's Doughnuts and Brownies | Home";
$metaDesc = "Welcome to Danono's! Home of the best brioche doughnuts and brownies in Angeles City. Freshly baked daily.";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- HERO SECTION -->
<section class="flex flex-col md:flex-row items-stretch min-h-[85vh] bg-[#FFEDD4] relative overflow-hidden after:content-[''] after:absolute after:right-0 after:bottom-0 after:w-[300px] after:h-[300px] after:bg-[rgba(239,125,50,0.05)] after:rounded-[50%_0_0_0] after:z-0">
    <!-- Floating Background Shapes -->
    <div class="floating-shape absolute rounded-full blur-[60px] z-0 opacity-70 transition-transform duration-100 ease-linear pointer-events-none top-[-100px] left-[-50px] w-[500px] h-[500px] bg-[#FFE4D1] max-sm:w-[250px] max-sm:h-[250px] max-sm:top-[-50px] max-sm:left-[-30px]" data-speed="2"></div>
    <div class="floating-shape absolute rounded-full blur-[60px] z-0 opacity-70 transition-transform duration-100 ease-linear pointer-events-none bottom-[-50px] right-[20%] w-[350px] h-[350px] bg-[#FFF0E0] max-sm:w-[180px] max-sm:h-[180px] max-sm:bottom-[-30px] max-sm:right-[5%]" data-speed="-1"></div>

    <div class="flex-1 min-w-0 z-[2] p-8 md:p-[0_40px_0_80px] flex flex-col justify-center text-center md:text-left order-2 md:order-1 max-sm:p-[40px_20px]">
        <h1 class="text-[44px] lg:text-[68px] leading-[1.15] mb-6 text-[#431407] font-bold tracking-tight max-sm:text-[32px]" data-aos="fade-up">More Choices,<br><span class="pop-out-text text-[48px] lg:text-[70px] max-sm:text-[36px]">MORE VALUE.</span></h1>
        <p class="text-[18px] text-[#666] mb-8 max-w-[500px] mx-auto md:mx-0 max-sm:text-[15px]" data-aos="fade-up" data-aos-delay="100">Indulge in our famous Glazed Donuts and refreshing Spanish Latte.
            Crafted fresh daily in Angeles City.</p>
        <div class="flex flex-wrap gap-4 mb-8 justify-center md:justify-start max-sm:flex-col max-sm:items-stretch" data-aos="fade-up" data-aos-delay="200">
            <a href="menu" class="flex items-center justify-center gap-2 bg-[#EF7D32] text-white px-8 py-3 rounded-full font-bold transition-all duration-300 hover:translate-y-[-2px] hover:shadow-[0_5px_15px_rgba(239,125,50,0.3)]"><i class="ph ph-bicycle text-xl"></i> Order Delivery</a>
            <a href="locations" class="flex items-center justify-center gap-2 border-2 border-[#431407] text-[#431407] px-8 py-3 rounded-full font-bold transition-all duration-300 hover:translate-y-[-2px] hover:bg-[#FAD8AA] hover:border-[#FAD8AA]"><i class="ph ph-map-pin text-xl"></i> Find a branch</a>
        </div>
        <p class="font-bold text-[#431407] max-sm:text-[12px]" data-aos="fade-in" data-aos-delay="400">
            AVAILABLE ON: <span class="text-[#00B14F] font-black text-xl [text-shadow:0_2px_10px_rgba(0,177,79,0.2)]">GrabFood</span>
        </p>
    </div>
    <div class="flex-[0_0_50%] min-w-0 z-[2] relative order-1 md:order-2 w-full max-h-[380px] md:max-h-none overflow-hidden" data-aos="zoom-in-left" data-aos-duration="1000">
        <img src="assets/img/danonos.jpg" alt="Danono's Donuts" class="animate-float w-full h-full object-cover">
    </div>
</section>

<!-- TREATS SECTION -->
<section class="py-20 px-5 bg-[#FFFDF9] text-center relative max-sm:py-12">
    <div class="mb-12 relative" data-aos="fade-up">
        <span class="block text-[12px] font-bold tracking-[2px] text-[#EF7D32] mb-3 uppercase">FEATURED FAVORITES</span>
        <h2 class="text-[36px] lg:text-[48px] leading-[1.1] text-[#431407] font-bold mb-10 max-sm:text-[28px]">Most Loved <span class="pop-out-text-sm text-[40px] lg:text-[48px] max-sm:text-[32px]">TREATS</span></h2>
        <a href="menu" class="md:absolute top-0 right-[5%] text-[#EF7D32] font-bold text-sm no-underline block mt-4 md:mt-0 transition-opacity hover:opacity-80">View full menu <span>→</span></a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-[1200px] mx-auto px-4 max-sm:gap-6">

        <div class="bg-white p-8 rounded-[20px] shadow-[0_5px_15px_rgba(67,20,7,0.05)] border-2 border-[#FFF8F0] transition-all duration-300 flex flex-col h-full hover:translate-y-[-8px] hover:border-[#EF7D32] hover:shadow-[0_15px_30px_rgba(67,20,7,0.1)]" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/choco-caviar.jpg" alt="Choco Caviar Creation" class="w-full h-44 object-cover rounded-[15px] mb-6">
            <h3 class="text-xl mb-3 text-[#431407] font-bold">Choco Caviar Creation</h3>
            <p class="text-sm text-[#888] mb-6 leading-relaxed grow">Our ultimate choco-loaded treat that's rich, crunchy, and irresistibly indulgent.</p>
            <a href="menu" class="btn-small px-8 py-3 text-2xl bg-[#EF7D32] text-white rounded-full font-bold transition-all duration-200 hover:opacity-90 inline-block w-fit mx-auto">₱40</a>
        </div>

        <div class="bg-white p-8 rounded-[20px] shadow-[0_5px_15px_rgba(67,20,7,0.05)] border-2 border-[#FFF8F0] transition-all duration-300 flex flex-col h-full hover:translate-y-[-8px] hover:border-[#EF7D32] hover:shadow-[0_15px_30px_rgba(67,20,7,0.1)]" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/biscoff.jpg" alt="Biscoff Bite" class="w-full h-44 object-cover rounded-[15px] mb-6">
            <h3 class="text-xl mb-3 text-[#431407] font-bold">Biscoff Bite</h3>
            <p class="text-sm text-[#888] mb-6 leading-relaxed grow">Fluffy brioche donut, rich peanut butter glaze, and a generous topping of Lotus Biscoff.</p>
            <a href="menu" class="btn-small px-8 py-3 text-2xl bg-[#EF7D32] text-white rounded-full font-bold transition-all duration-200 hover:opacity-90 inline-block w-fit mx-auto">₱60</a>
        </div>

        <div class="bg-white p-8 rounded-[20px] shadow-[0_5px_15px_rgba(67,20,7,0.05)] border-2 border-[#FFF8F0] transition-all duration-300 flex flex-col h-full hover:translate-y-[-8px] hover:border-[#EF7D32] hover:shadow-[0_15px_30px_rgba(67,20,7,0.1)]" data-aos="fade-up" data-aos-delay="300">
            <img src="assets/img/double-choco-delight.jpg" alt="Double Choco Delight" class="w-full h-44 object-cover rounded-[15px] mb-6">
            <h3 class="text-xl mb-3 text-[#431407] font-bold">Double Choco Delight</h3>
            <p class="text-sm text-[#888] mb-6 leading-relaxed grow">Double Choco Delight is here, and it's everything your chocolate dreams are made of.</p>
            <a href="menu" class="btn-small px-8 py-3 text-2xl bg-[#EF7D32] text-white rounded-full font-bold transition-all duration-200 hover:opacity-90 inline-block w-fit mx-auto">₱40</a>
        </div>

        <div class="bg-white p-8 rounded-[20px] shadow-[0_5px_15px_rgba(67,20,7,0.05)] border-2 border-[#FFF8F0] transition-all duration-300 flex flex-col h-full hover:translate-y-[-8px] hover:border-[#EF7D32] hover:shadow-[0_15px_30px_rgba(67,20,7,0.1)]" data-aos="fade-up" data-aos-delay="400">
            <img src="assets/img/almond-amore.jpg" alt="Almond Amore" class="w-full h-44 object-cover rounded-[15px] mb-6">
            <h3 class="text-xl mb-3 text-[#431407] font-bold">Almond Amore</h3>
            <p class="text-sm text-[#888] mb-6 leading-relaxed grow">Light, fluffy, and loaded with almond love, this one's a certified heart-stealer.</p>
            <a href="menu" class="btn-small px-8 py-3 text-2xl bg-[#EF7D32] text-white rounded-full font-bold transition-all duration-200 hover:opacity-90 inline-block w-fit mx-auto">₱40</a>
        </div>

    </div>
</section>

<!-- DRINKS SECTION -->
<section class="py-24 px-5 bg-[#FFF8F0] max-sm:py-16">
    <div class="flex flex-col md:flex-row items-center gap-12 max-w-[1200px] mx-auto">
        <div class="flex-[0_0_30%] rounded-[30px] overflow-hidden border-[8px] border-[#431407] shadow-xl w-60 max-sm:w-40 max-sm:border-[5px]" data-aos="fade-right">
            <img src="assets/img/Refreshers.jpg" alt="Danono's Refreshers" class="w-full block h-auto">
        </div>
        <div class="flex-1 text-center" data-aos="fade-up">
            <span class="block text-[12px] font-bold tracking-[2px] text-[#EF7D32] mb-3 uppercase">PERFECT PAIRING</span>
            <h2 class="text-[32px] lg:text-[48px] leading-tight mb-6 text-[#431407] font-bold max-sm:text-[26px]">Refreshers & Choco Circles<br><span class="pop-out-text-sm text-[32px] lg:text-[48px] max-sm:text-[32px]">PERFECT MATCH</span></h2>
            <p class="text-[17px] text-[#666] leading-relaxed mb-8 max-w-2xl mx-auto">Beat the heat with our ice-cold, sparkling Refreshers, crafted to pair flawlessly with the rich, velvety indulgence of our signature Choco Circle doughnuts.</p>
            <a href="menu" class="bg-[#431407] text-white px-8 py-3 rounded-full font-semibold inline-block transition-all duration-300 hover:opacity-90"><i class="ph ph-cookie"></i> See Full Menu</a>
        </div>
        <div class="flex-[0_0_30%] rounded-[30px] overflow-hidden border-[8px] border-[#431407] shadow-xl w-60 max-sm:w-40 max-sm:border-[5px]" data-aos="fade-left">
            <img src="assets/img/choco-circle.jpg" alt="Choco Circle Donuts" class="w-full block h-auto">
        </div>
    </div>
</section>

<!-- STORY SECTION -->
<section class="py-24 px-5 bg-transparent relative max-sm:py-16">
    <div class="flex flex-col md:flex-row items-center justify-center gap-16 lg:gap-24 max-w-[1200px] mx-auto text-center md:text-left">
        <div class="flex-1 max-w-[450px] relative rounded-[30px] border-[8px] border-[#431407] overflow-hidden shadow-2xl max-sm:max-w-[280px] max-sm:border-[5px]" data-aos="fade-right">
            <img src="assets/img/danonos-kitchen.jpg" alt="Danonos Kitchen" class="w-full h-auto block object-cover">
            <div class="absolute bottom-5 left-1/2 -translate-x-1/2 bg-[#FFC107] border-[5px] border-[#431407] w-24 h-24 rounded-[18px] flex flex-col justify-center items-center text-[#431407] z-[2] shadow-lg max-sm:w-20 max-sm:h-20 max-sm:border-4">
                <div class="text-[10px] font-extrabold uppercase tracking-widest mb-[-2px]">SINCE</div>
                <div class="text-[26px] font-black leading-none max-sm:text-[20px]">2018</div>
            </div>
        </div>
        <div class="flex-[1.2] min-w-0" data-aos="fade-left">
            <span class="block text-[12px] font-bold tracking-[2px] text-[#EF7D32] mb-3 uppercase">OUR STORY</span>
            <h2 class="text-[32px] lg:text-[48px] leading-[1.1] mb-8 text-[#431407] font-bold max-sm:text-[28px]">From Nono's to<br><span class="pop-out-text-sm text-[36px] lg:text-[48px] max-sm:text-[32px]">DANONO'S</span></h2>
            <p class="text-[17px] leading-relaxed text-[#666] mb-6 max-sm:text-[15px]">What started as a small home kitchen project in 2018 has grown into Danono's Doughnuts. Our mission: to create treats that bring happiness and sweetness in every bite.</p>
            <p class="text-[17px] leading-relaxed text-[#666] mb-8 max-sm:text-[15px]">Every morning at 6AM we'll be baking hand-cut donuts with pride, using, filling, and frying in small batches.</p>
            <a href="about" class="flex items-center justify-center md:justify-start gap-2 bg-[#EF7D32] text-white px-8 py-3 rounded-full font-bold transition-all duration-300 hover:translate-y-[-2px] hover:shadow-[0_5px_15px_rgba(239,125,50,0.3)] w-fit mx-auto md:mx-0">Read Our Full Story <span>→</span></a>
        </div>
    </div>
</section>

<!-- NAV CARDS -->
<section class="py-20 px-5 bg-[#FFFDF9] max-sm:py-12">
    <div class="flex flex-col md:flex-row gap-8 max-w-[1200px] mx-auto">
        <div class="flex-1 relative rounded-[20px] overflow-hidden h-[350px] shadow-xl border-[5px] border-white group max-sm:h-[250px]" data-aos="zoom-in-up" data-aos-delay="100">
            <img src="assets/img/danonos-branches.jpg" alt="Our Locations" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center flex-col transition-all duration-300 group-hover:bg-black/50">
                <h3 class="text-white text-[28px] lg:text-[32px] font-bold mb-6 uppercase tracking-wider [text-shadow:0_2px_10px_rgba(0,0,0,0.3)]">Our Locations</h3>
                <a href="locations" class="bg-[#EF7D32] text-white px-8 py-3 rounded-full font-bold transition-all duration-300 hover:translate-y-[-2px] hover:shadow-lg"><i class="ph ph-map-pin"></i> Find a Branch</a>
            </div>
        </div>
        <div class="flex-1 relative rounded-[20px] overflow-hidden h-[350px] shadow-xl border-[5px] border-white group max-sm:h-[250px]" data-aos="zoom-in-up" data-aos-delay="300">
            <img src="assets/img/three-girls-danonos.png" alt="The Danono's Team" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center flex-col transition-all duration-300 group-hover:bg-black/50">
                <h3 class="text-white text-[28px] lg:text-[32px] font-bold mb-6 uppercase tracking-wider [text-shadow:0_2px_10px_rgba(0,0,0,0.3)]">Our Blogs</h3>
                <a href="blogs" class="bg-[#EF7D32] text-white px-8 py-3 rounded-full font-bold transition-all duration-300 hover:translate-y-[-2px] hover:shadow-lg"><i class="ph ph-read-cv-logo"></i> Read Blogs</a>
            </div>
        </div>
    </div>
</section>

<!-- FAMILY BANNER (CTA) -->
<section class="py-20 px-5 text-center bg-[linear-gradient(90deg,#EF7D32_0%,#FFC107_25%,#D8651E_50%,#FFC107_75%,#EF7D32_100%)] bg-[length:300%_100%] animate-family-gradient text-white relative overflow-hidden flex flex-col items-center justify-center before:content-[''] before:absolute before:inset-0 before:bg-[url('data:image/svg+xml,%3Csvg_width=%2250%22_height=%2250%22_viewBox=%220_0_50_50%22_xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg_fill=%22%23000000%22_fill-opacity=%220.05%22%3E%3Ccircle_cx=%2212%22_cy=%2212%22_r=%221.5%22/%3E%3Ccircle_cx=%2237%22_cy=%2212%22_r=%221%22/%3E%3Ccircle_cx=%2212%22_cy=%2237%22_r=%221%22/%3E%3Ccircle_cx=%2237%22_cy=%2237%22_r=%221.5%22/%3E%3Ccircle_cx=%2225%22_cy=%2225%22_r=%221%22/%3E%3C/g%3E%3C/svg%3E')] before:pointer-events-none before:z-0 max-sm:py-16">
    <div class="relative z-[2] max-w-[750px]" data-aos="fade-up">
        <h2 class="text-[32px] lg:text-[58px] font-bold leading-tight mb-6 tracking-tight [text-shadow:2px_2px_0_rgba(0,0,0,0.1)]">Be Part of Our <span class="text-white [text-shadow:2px_2px_0_rgba(0,0,0,0.15),-1px_-1px_0_rgba(255,255,255,0.1)]">FAMILY</span></h2>
        <p class="text-[18px] leading-relaxed opacity-95 mb-10 max-sm:text-[16px]">Ready to taste the handmade? Join a box today and make your day a little sweeter.</p>
        <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
            <a href="franchise" class="bg-white text-[#EF7D32] px-10 py-4 rounded-full font-bold text-[15px] flex items-center gap-3 transition-all duration-300 border-2 border-white hover:translate-y-[-3px] hover:shadow-2xl"><i class="ph ph-handshake text-xl"></i> Partner With Us</a>
            <a href="locations" class="bg-transparent text-white px-10 py-4 rounded-full font-bold text-[15px] flex items-center gap-3 transition-all duration-300 border-2 border-white hover:bg-white hover:text-[#EF7D32] hover:translate-y-[-3px] hover:shadow-2xl"><i class="ph ph-map-pin text-xl"></i> Find a Branch</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // 1. Initialize Moving Scroll (AOS)
    AOS.init({
        once: true,
        offset: 120,
        duration: 800,
        easing: 'ease-out-back',
    });

    // 2. Mouse Parallax for Hero Shapes
    document.addEventListener("mousemove", parallax);
    function parallax(e) {
        document.querySelectorAll(".floating-shape").forEach(function (move) {
            var moving_value = move.getAttribute("data-speed");
            var x = (e.clientX * moving_value) / 250;
            var y = (e.clientY * moving_value) / 250;
            move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        });
    }
</script>
</body>

</html>
