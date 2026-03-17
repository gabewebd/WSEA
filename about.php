<?php
$pageTitle = "About Us - Danono's Doughnuts and Brownies";
$metaDesc = "Learn about Danono's story - from a small home kitchen in 2019 to Angeles City's favorite doughnut destination.";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- HERO SECTION -->
<section class="relative h-[450px] flex items-center justify-center overflow-hidden bg-[#431407] max-md:h-[350px] max-sm:h-[300px]">
    <div class="floating-shape absolute rounded-full blur-[60px] z-[2] opacity-60 transition-transform duration-100 ease-linear pointer-events-none top-[-50px] left-[-50px] w-[300px] h-[300px] bg-[#EF7D32] max-sm:w-[200px] max-sm:h-[200px] max-sm:top-[-30px] max-sm:left-[-30px]" data-speed="4"></div>
    <div class="floating-shape absolute rounded-full blur-[60px] z-[2] opacity-60 transition-transform duration-100 ease-linear pointer-events-none bottom-[-50px] right-[10%] w-[250px] h-[250px] bg-[#FFC107] max-sm:w-[150px] max-sm:h-[150px] max-sm:bottom-[-30px]" data-speed="-2"></div>

    <div class="relative z-[3] text-center text-white px-5">
        <span class="block tracking-[4px] text-sm mb-4 opacity-90 font-bold max-sm:text-[11px] max-sm:tracking-[2px]" data-aos="fade-down">ESTABLISHED 2019</span>
        <h1 class="text-[44px] md:text-[56px] leading-[1.1] font-bold max-sm:text-[32px]" data-aos="fade-up" data-aos-delay="100">Spreading Happiness,<br>One <span class="pop-out-text text-[48px] md:text-[56px] max-sm:text-[36px]">DOUGHNUT</span> at a Time.</h1>
    </div>
    <div class="absolute inset-0 z-[1] opacity-40">
        <img src="assets/img/danonos-hero.jpg" alt="Danonos Bakery Background" class="w-full h-full object-cover"
            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=1200&h=600&fit=crop'">
    </div>
</section>

<!-- STORY SECTION -->
<section class="py-24 px-5 bg-transparent max-sm:py-16">
    <div class="flex flex-col md:flex-row items-center gap-16 lg:gap-20 max-w-[1200px] mx-auto text-center md:text-left">
        <div class="flex-1 max-w-[450px] relative rounded-[30px] max-sm:max-w-[280px]" data-aos="fade-right">
            <img src="assets/img/about-story.jpg" alt="Danono's humble beginnings"
                class="w-full h-auto block object-cover rounded-[30px] border-[8px] border-[#431407] shadow-2xl max-sm:border-[5px]"
                onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=300&fit=crop'">

            <div class="absolute bottom-[-20px] left-1/2 -translate-x-1/2 bg-[#FFC107] border-[5px] border-[#431407] w-24 h-24 rounded-[18px] flex flex-col justify-center items-center text-[#431407] z-[4] shadow-lg transition-transform duration-300 hover:scale-110 hover:rotate-6 max-sm:w-20 max-sm:h-20 max-sm:border-4 max-sm:bottom-[-15px]">
                <span class="text-[10px] font-extrabold uppercase tracking-widest mb-[-2px]">SINCE</span>
                <span class="text-[26px] font-black leading-none max-sm:text-[20px]">2019</span>
            </div>
        </div>

        <div class="flex-[1.2] min-w-0" data-aos="fade-left">
            <span class="block text-[12px] font-bold tracking-[2px] text-[#EF7D32] mb-3 uppercase">OUR JOURNEY</span>
            <h2 class="text-[36px] lg:text-[48px] leading-[1.1] text-[#431407] font-bold mb-8 max-sm:text-[28px]">From Nono's to <span class="pop-out-text-sm text-[40px] lg:text-[48px] max-sm:text-[32px]">DANONO'S</span></h2>
            <p class="text-[17px] text-[#666] mb-6 leading-relaxed max-sm:text-[15px]">What started as a passionate home kitchen project has blossomed into Angeles City’s favorite destination for premium treats. We didn't just want to make doughnuts; we wanted to elevate them.</p>
            <p class="text-[17px] text-[#666] mb-8 leading-relaxed max-sm:text-[15px]">Using our signature brioche dough recipe—rich, fluffy, and buttery—we spent months perfecting the balance of texture and flavor. Today, Danono's is more than just a bakery; it's a place where friends gather.</p>

            <div class="text-[#EF7D32] text-[24px] font-[cursive] -rotate-2 w-fit mx-auto md:mx-0 max-sm:text-[20px]" data-aos="zoom-in" data-aos-delay="300">
                <p>The Danono's Team</p>
            </div>
        </div>
    </div>
</section>

<!-- VALUES SECTION -->
<section class="py-20 px-5 bg-[#FFF9F2] max-sm:py-16">
    <div class="text-center mb-16" data-aos="fade-up">
        <span class="block text-[12px] font-bold tracking-[2px] text-[#EF7D32] mb-3 uppercase">WHY CHOOSE US</span>
        <h2 class="text-[36px] lg:text-[48px] leading-[1.1] text-[#431407] font-bold max-sm:text-[28px]">The Danono's <span class="pop-out-text-sm text-[40px] lg:text-[48px] max-sm:text-[32px]">DIFFERENCE</span></h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-[1200px] mx-auto px-4">
        <div class="bg-white p-10 rounded-[20px] text-center border-2 border-[#FFF8F0] shadow-[0_5px_15px_rgba(67,20,7,0.05)] transition-all duration-300 hover:translate-y-[-10px] hover:border-[#EF7D32] hover:shadow-xl group max-sm:p-8" data-aos="fade-up" data-aos-delay="100">
            <div class="text-5xl text-[#EF7D32] mb-6 transition-transform duration-300 group-hover:scale-110">
                <i class="ph ph-bread"></i>
            </div>
            <h3 class="text-xl text-[#431407] mb-4 font-bold">Signature Brioche</h3>
            <p class="text-[15px] text-[#666] leading-relaxed">We don't use shortcuts. Our dough is fermented for 24 hours to achieve that distinctively light, airy, and buttery brioche texture.</p>
        </div>

        <div class="bg-white p-10 rounded-[20px] text-center border-2 border-[#FFF8F0] shadow-[0_5px_15px_rgba(67,20,7,0.05)] transition-all duration-300 hover:translate-y-[-10px] hover:border-[#EF7D32] hover:shadow-xl group max-sm:p-8" data-aos="fade-up" data-aos-delay="200">
            <div class="text-5xl text-[#EF7D32] mb-6 transition-transform duration-300 group-hover:scale-110">
                <i class="ph ph-heart"></i>
            </div>
            <h3 class="text-xl text-[#431407] mb-4 font-bold">Made Fresh Daily</h3>
            <p class="text-[15px] text-[#666] leading-relaxed">No leftovers here. Our bakers start at 4 AM every single morning to ensure your box is fresh, warm, and perfect.</p>
        </div>

        <div class="bg-white p-10 rounded-[20px] text-center border-2 border-[#FFF8F0] shadow-[0_5px_15px_rgba(67,20,7,0.05)] transition-all duration-300 hover:translate-y-[-10px] hover:border-[#EF7D32] hover:shadow-xl group max-sm:p-8" data-aos="fade-up" data-aos-delay="300">
            <div class="text-5xl text-[#EF7D32] mb-6 transition-transform duration-300 group-hover:scale-110">
                <i class="ph ph-star"></i>
            </div>
            <h3 class="text-xl text-[#431407] mb-4 font-bold">Premium Ingredients</h3>
            <p class="text-[15px] text-[#666] leading-relaxed">From Belgian chocolates to real fruit preserves, we source only the finest ingredients to top our creations.</p>
        </div>
    </div>
</section>

<!-- GALLERY SECTION -->
<section class="py-24 px-5 max-w-[1200px] mx-auto flex flex-col lg:flex-row items-center justify-center gap-16 lg:gap-24 overflow-visible max-sm:py-16">
    <div class="flex-1 max-w-[450px] z-[10] text-center lg:text-left" data-aos="fade-right">
        <h2 class="text-[36px] lg:text-[48px] text-[#431407] mb-6 leading-tight font-bold max-sm:text-[28px]">Sweet <span class="pop-out-text-sm text-[40px] lg:text-[48px] max-sm:text-[32px]">MOMENTS</span></h2>
        <p class="text-[17px] text-[#666] leading-relaxed mb-8 max-sm:text-[15px]">From our kitchen to your hands. See the treats that made us Angeles City's favorite.</p>
        <a href="menu" class="relative inline-flex items-center justify-center gap-2 bg-[#EF7D32] text-white px-10 py-3.5 rounded-full font-bold transition-all duration-300 overflow-hidden group hover:translate-y-[-3px] hover:shadow-lg max-sm:w-full">
            Order Now
            <span class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-white/30 to-transparent transition-all duration-500 group-hover:left-[100%]"></span>
        </a>
    </div>

    <div class="flex-1.2 relative h-[450px] md:h-[550px] w-full max-w-[650px] flex items-center justify-center max-sm:h-[320px]" data-aos="zoom-in">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[90%] h-[90%] max-h-[500px] border-[8px] border-white rounded-[20px] shadow-2xl bg-white opacity-0 z-0 animate-container-pop max-sm:border-[5px] max-sm:rounded-2xl">
            <img src="assets/img/sans-rival-temptation.jpg" alt="Sans Rival Temptation" class="w-full h-full object-contain rounded-xl">
        </div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[90%] h-[90%] max-h-[500px] border-[8px] border-white rounded-[20px] shadow-2xl bg-white opacity-0 z-0 animate-container-pop [animation-delay:3s] max-sm:border-[5px] max-sm:rounded-2xl">
            <img src="assets/img/sweet-cherry-crave.jpg" alt="Sweet Cherry Crave" class="w-full h-full object-contain rounded-xl">
        </div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[90%] h-[90%] max-h-[500px] border-[8px] border-white rounded-[20px] shadow-2xl bg-white opacity-0 z-0 animate-container-pop [animation-delay:6s] max-sm:border-[5px] max-sm:rounded-2xl">
            <img src="assets/img/ube-bliss.jpg" alt="Ube Bliss" class="w-full h-full object-contain rounded-xl">
        </div>
    </div>
</section>

<!-- CTA BANNER -->
<section class="py-24 px-5 text-center bg-[linear-gradient(90deg,#EF7D32_0%,#FFC107_25%,#D8651E_50%,#FFC107_75%,#EF7D32_100%)] bg-[length:300%_100%] animate-family-gradient text-white relative overflow-hidden flex flex-col items-center justify-center before:content-[''] before:absolute before:inset-0 before:bg-[url('data:image/svg+xml,%3Csvg_width=%2250%22_height=%2250%22_viewBox=%220_0_50_50%22_xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg_fill=%22%23000000%22_fill-opacity=%220.05%22%3E%3Ccircle_cx=%2212%22_cy=%2212%22_r=%221.5%22/%3E%3Ccircle_cx=%2237%22_cy=%2212%22_r=%221%22/%3E%3Ccircle_cx=%2212%22_cy=%2237%22_r=%221%22/%3E%3Ccircle_cx=%2237%22_cy=%2237%22_r=%221.5%22/%3E%3Ccircle_cx=%2225%22_cy=%2225%22_r=%221%22/%3E%3C/g%3E%3C/svg%3E')] before:pointer-events-none before:z-0 max-sm:py-16">
    <div class="relative z-[2] max-w-[750px]" data-aos="fade-up">
        <h2 class="text-[32px] lg:text-[58px] font-bold leading-tight mb-6 tracking-tight [text-shadow:2px_2px_0_rgba(0,0,0,0.1)]">Taste the <span class="text-white [text-shadow:2px_2px_0_rgba(0,0,0,0.15),-1px_-1px_0_rgba(255,255,255,0.1)]">Love</span> Today</h2>
        <p class="text-[18px] leading-relaxed opacity-95 mb-10 max-sm:text-[16px]">Ready to experience the best brioche doughnuts in Pampanga?</p>
        <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
            <a href="menu" class="bg-white text-[#EF7D32] px-10 py-4 rounded-full font-bold text-[15px] flex items-center gap-3 transition-all duration-300 border-2 border-white hover:translate-y-[-3px] hover:shadow-2xl max-sm:w-full max-sm:max-w-[280px] max-sm:justify-center"><i class="ph ph-cookie text-xl"></i> View Menu</a>
            <a href="locations" class="bg-transparent text-white px-10 py-4 rounded-full font-bold text-[15px] flex items-center gap-3 transition-all duration-300 border-2 border-white hover:bg-white hover:text-[#EF7D32] hover:translate-y-[-3px] hover:shadow-2xl max-sm:w-full max-sm:max-w-[280px] max-sm:justify-center"><i class="ph ph-map-pin text-xl"></i> Find a Branch</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // 1. Initialize AOS
    AOS.init({
        once: true,
        offset: 100,
        duration: 800,
        easing: 'ease-out-cubic',
    });

    // 2. Mouse Parallax Logic
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
