<?php
$pageTitle = "Our Locations | Donut Shop Near Me in Pampanga & Angeles City";
$metaDesc = "Find a Danono's donut shop near you in Angeles City, San Fernando, Mexico, and across Pampanga. Visit us for the best brioche donuts and pasalubong.";
$customCss = "locations.css";
?>
<?php include 'includes/header.php'; ?>

<style>
    /* Refined Action Bar Layout */
    .card-footer-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        width: 100%;
    }

    .btn-primary.flex-main {
        flex: 1;
        justify-content: center;
        padding: 12px 15px;
        font-size: 0.9rem;
        margin: 0; /* Remove top margin from original w-full */
    }

    .secondary-actions {
        display: flex;
        gap: 8px;
    }

    .action-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #f5f5f5;
        color: #431407;
        font-size: 18px;
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .action-icon:hover {
        background: white;
        color: #EF7D32;
        border-color: #EF7D32;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(239, 125, 50, 0.15);
    }
</style>

<div class="locations-container">
    <div class="section-header">
        <span class="section-label">Visit Us</span>
        <h1 class="page-title">Your Neighborhood <span class="pop-out-text">DONUT SHOP</span> in Pampanga</h1>
        <p class="header-subtitle">Discover the <strong>best brioche donuts near you</strong> across
            Angeles City, San Fernando, and Mabalacat. Visit our Danono's branches for fresh treats daily.</p>
    </div>

    <div class="locations-map-wrapper" data-aos="fade-up" data-aos-delay="100">
        <!-- Generic map search for Danono's Doughnuts Pampanga to show multiple locations -->
        <iframe id="locationsMapFrame" src="https://maps.google.com/maps?q=Danono's+Doughnuts+Pampanga&t=&z=11&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Google Maps showing Danono's Doughnuts locations in Pampanga"></iframe>
    </div>

    <!-- Search Bar Below Map -->
    <div class="map-search-below" data-aos="fade-up" data-aos-delay="200">
        <div class="search-bar-wrapper">
            <i class="ph ph-magnifying-glass"></i>
            <input type="text" id="branchSearch" placeholder="Search for a branch or city...">
        </div>
    </div>

    <div class="locations-grid">

        <div class="location-card premium">
            <div class="card-badge">Popular</div>
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Mexico</h2>
            <div class="card-meta-row">
                <span class="category">Food & Drink</span>
            </div>
            <p class="address">Masangsang, Sto. Cristo, Mexico, Philippines</p>
            <p class="description">Treat yourself to the finest delights at Nono's Doughnuts. Enjoy fresh, irresistibly delicious brioche donuts made daily.</p>
            <div class="card-footer-actions">
                <a href="https://maps.app.goo.gl/9FKdQQpCh3PrGiqv5" target="_blank" class="btn btn-primary flex-main"><i class="ph ph-map-pin"></i> View Map</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/p/Danonos-Doughnuts-Brownies-Mexico-Branch-61562705884536/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="mailto:nonosdoughnut@gmail.com" class="action-icon" title="Email Us"><i class="ph-fill ph-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card premium">
            <div class="card-badge">Flagship</div>
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - San Fernando</h2>
            <div class="card-meta-row">
                <span class="category">Donut Shop</span>
                <span class="status-badge open">Open Now</span>
            </div>
            <p class="address">Mac Arthur Highway, Brgy. San Isidro, San Fernando, Philippines</p>
            <p class="description">Started as Nono's. Still your favorite brioche doughnuts. Now growing — with more treats on the way.</p>
            <div class="card-footer-actions">
                <a href="tel:+639625585616" class="btn btn-primary flex-main"><i class="ph ph-phone"></i> Call Us</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/danonosdoughnuts/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="mailto:nonosdoughnuts@gmail.com" class="action-icon" title="Email Us"><i class="ph-fill ph-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Angeles</h2>
            <div class="card-meta-row">
                <span class="category">Donut Shop / Cafe</span>
                <span class="status-badge open">Open Now</span>
            </div>
            <p class="address">372 McArthur Highway, Salapungan, Angeles City, Philippines</p>
            <p class="description">Pasalubong from Pampanga! Take home joy and gift delight with Danono's Brioche Doughnuts & Brownies!</p>
            <div class="card-footer-actions">
                <a href="https://maps.app.goo.gl/geysJzJ5SCBbmi75A" target="_blank" class="btn btn-primary flex-main"><i class="ph ph-map-pin"></i> View Map</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/nonosangelesnew/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="https://www.instagram.com/nonosdoughnuts.ac" target="_blank" class="action-icon" title="Instagram"><i class="ph-fill ph-instagram-logo"></i></a>
                    <a href="mailto:nonosdoughnutsauf@gmail.com" class="action-icon" title="Email Us"><i class="ph-fill ph-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Mabalacat</h2>
            <div class="card-meta-row">
                <span class="category">Donut Shop</span>
                <span class="status-badge open">Open Now</span>
            </div>
            <p class="address">278 MacArthur Highway, Brgy. Dau, Mabalacat, Philippines</p>
            <p class="description">Fluffy and flavorful, our delectable brioche doughnuts and fudgy brownies are an absolute must-try.</p>
            <div class="card-footer-actions">
                <a href="https://maps.app.goo.gl/SVsjRgkUGfCiSVhQA" target="_blank" class="btn btn-primary flex-main"><i class="ph ph-map-pin"></i> View Map</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/danonosmabalacat/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="tel:09983325344" class="action-icon" title="Call Us"><i class="ph-fill ph-phone"></i></a>
                    <a href="mailto:danonos.mabalacat@gmail.com" class="action-icon" title="Email Us"><i class="ph-fill ph-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Magalang</h2>
            <div class="card-meta-row">
                <span class="category">Donut Shop</span>
                <span class="status-badge open">Open Now</span>
            </div>
            <p class="address">Lot 168-A-2-A, P. LUCIANO ST., STA CRUZ , Magalang, Philippines</p>
            <p class="description">Your neighborhood doughnut destination for fresh treats and happy moments.</p>
            <div class="card-footer-actions">
                <a href="https://maps.app.goo.gl/Wfh5dC9B6EfPQJN47" target="_blank" class="btn btn-primary flex-main"><i class="ph ph-map-pin"></i> View Map</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/NonosMagalangbranch/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="mailto:nonosdoughnuts.magalangbranch@gmail.com" class="action-icon" title="Email Us"><i class="ph-fill ph-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Porac</h2>
            <div class="card-meta-row">
                <span class="category">Cafe</span>
            </div>
            <p class="address">Cangatba, Porac, Philippines</p>
            <p class="description">Take home joy and gift delight with Nono's Brioche Doughnuts</p>
            <div class="card-footer-actions">
                <a href="https://maps.app.goo.gl/b5BDD9f23kCRa3NF7" target="_blank" class="btn btn-primary flex-main"><i class="ph ph-map-pin"></i> View Map</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/p/Danonos-Doughnuts-Brownies-Porac-61560415810617/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="tel:09624154704" class="action-icon" title="Call Us"><i class="ph-fill ph-phone"></i></a>
                    <a href="mailto:nonosporac@gmail.com" class="action-icon" title="Email Us"><i class="ph-fill ph-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Apalit</h2>
            <div class="card-meta-row">
                <span class="category">Food & Drink</span>
                <span class="status-badge open">Open Now</span>
            </div>
            <p class="address">600 Sampaloc, Apalit, Philippines</p>
            <p class="description">Take home joy and gift delight with Nono's Brioche Doughnuts</p>
            <div class="card-footer-actions">
                <a href="tel:09171551618" class="btn btn-primary flex-main"><i class="ph ph-phone"></i> Call Us</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/nonosdoughnutsapalit/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="https://www.instagram.com/nonosdoughnuts_apalit" target="_blank" class="action-icon" title="Instagram"><i class="ph-fill ph-instagram-logo"></i></a>
                    <a href="mailto:mjcd.enterprises@gmail.com" class="action-icon" title="Email Us"><i class="ph-fill ph-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Capas</h2>
            <div class="card-meta-row">
                <span class="category">Donut Shop</span>
            </div>
            <p class="address">Del Pilar St, Capas, 2315 Tarlac</p>
            <p class="description">Fresh and irresistible delights brioche donuts! Get your favorites at our Capas location.</p>
            <div class="card-footer-actions">
                <a href="https://maps.google.com/?q=Danono's+doughnuts+and+brownies+Capas" target="_blank" class="btn btn-primary flex-main"><i class="ph ph-map-pin"></i> View Map</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/p/Danonos-Doughnuts-Brownies-Capas-61567108017067/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - NLEX MEGA</h2>
            <div class="card-meta-row">
                <span class="category">Donut Shop</span>
                <span class="status-badge always-open">Always Open</span>
            </div>
            <p class="address">NLEX Mega Station, San Fernando, Philippines</p>
            <p class="description">Always open! Stop by during your travels for your favorite brioche doughnuts.</p>
            <div class="card-footer-actions">
                <a href="#" class="btn btn-primary flex-main" target="_blank"><i class="ph ph-map-pin"></i> View Map</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/p/Danonos-Doughnuts-Brownies-NLEX-MEGA-Station-61582454580456/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                    <a href="mailto:danonosmegastation18@gmail.com" class="action-icon" title="Email Us"><i class="ph-fill ph-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card premium">
            <div class="card-badge">New</div>
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Imus</h2>
            <div class="card-meta-row">
                <span class="category">Food & Drink</span>
            </div>
            <p class="address">Tyniz 2 Building, Aguinaldo Highway, Palico IV, Imus City, Cavite</p>
            <p class="description">Experience the famous doughnuts and the irresistible goodness of brioche doughnuts from Pampanga! THE FIRST EVER BRANCH IN THE SOUTH!</p>
            <div class="card-footer-actions">
                <a href="tel:09271848397" class="btn btn-primary flex-main"><i class="ph ph-phone"></i> Call Us</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/p/Danonos-Doughnuts-and-Brownies-Imus-Branch-61570079288790/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-icon"><i class="ph ph-map-pin"></i></div>
            <h2>Danonos - Guagua</h2>
            <div class="card-meta-row">
                <span class="category">Donut Shop</span>
            </div>
            <p class="description">Visit our newest branch bringing the best brioche donuts to Guagua!</p>
            <div class="card-footer-actions">
                <a href="https://maps.app.goo.gl/ZnwZ8JaVibPXqpeSA" target="_blank" class="btn btn-primary flex-main"><i class="ph ph-map-pin"></i> View Map</a>
                <div class="secondary-actions">
                    <a href="https://www.facebook.com/p/Nonos-Doughnuts-Guagua-61568206081740/" target="_blank" class="action-icon" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                </div>
            </div>
        </div>

    </div>
</div>


<section class="family-banner family-banner-centered">
    <div class="family-banner-content" data-aos="fade-up">
        <h2>Best Pasalubong Destinations <br><span class="family-highlight">in Central Luzon</span></h2>
        <p>Interested in bringing Danonos to your area? Explore our franchise opportunities and be part of our growing
            family!</p>
        <div class="family-buttons">
            <a href="franchise" class="btn btn-white"><i class="ph ph-handshake"></i> Partner With Us</a>
            <a href="tel:+639625585616" class="btn btn-outline-white"><i class="ph ph-phone"></i> Contact Us</a>
        </div>
    </div>
</section>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        offset: 120,
        duration: 800,
        easing: 'ease-out-back'
    });

    // Real-time branch filtering and map updating
    const searchInput = document.getElementById('branchSearch');
    const locationCards = document.querySelectorAll('.location-card');
    const mapFrame = document.getElementById('locationsMapFrame');

    // Filter cards immediately as user types
    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase().trim();
        
        locationCards.forEach(card => {
            const title = card.querySelector('h2') ? card.querySelector('h2').textContent.toLowerCase() : '';
            const address = card.querySelector('.address') ? card.querySelector('.address').textContent.toLowerCase() : '';
            const category = card.querySelector('.category') ? card.querySelector('.category').textContent.toLowerCase() : '';
            
            if (title.includes(searchTerm) || address.includes(searchTerm) || category.includes(searchTerm)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Update map iframe location when user finishes typing and presses enter
    searchInput.addEventListener('change', function(e) {
        const searchTerm = e.target.value.trim();
        if (searchTerm !== "") {
            // Encode the search term to prevent malformed URLs
            mapFrame.src = `https://maps.google.com/maps?q=Danono's+Doughnuts+${encodeURIComponent(searchTerm)}&t=&z=13&ie=UTF8&iwloc=&output=embed`;
        } else {
            // Reset to default Pampanga view if search is cleared
            mapFrame.src = `https://maps.google.com/maps?q=Danono's+Doughnuts+Pampanga&t=&z=11&ie=UTF8&iwloc=&output=embed`;
        }
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('branchSearch');
        if (searchInput) {
            // Tracking search term on change (Enter pressed or focus lost after typing)
            searchInput.addEventListener('change', function() {
                const searchValue = this.value.trim();
                if (searchValue && typeof gtag === 'function') {
                    gtag('event', 'search', {
                        search_term: searchValue
                    });
                }
            });
        }
    });
</script>

<?php include 'includes/footer.php'; ?>