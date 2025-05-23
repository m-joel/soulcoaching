<x-landing-layout>
    @section('title', 'Online-Shop – Produkte zur persönlichen Unterstützung & Inspiration')
    @section('description', 'Entdecke ausgewählte Begleiter für deinen Alltag – zur Förderung von Klarheit, innerem Gleichgewicht und persönlicher Entwicklung.')
    @include('pages.landing._partials._background')
    <!--begin::Landing hero-->
    <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
        <div class="cloud">
            <div style="position:absolute;border-radius:inherit;top:0;right:0;bottom:0;left:0"
                data-framer-background-image-wrapper="true">
                <img decoding="async" loading="lazy"
                    src="https://framerusercontent.com/images/dDB4JCGfoX5DJBUD3qohcdOK9U.png" alt=""
                    style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover">
            </div>
        </div>
        <!--begin::Heading-->
        <div class="d-flex flex-column flex-center text-center mb-lg-10 py-10 py-lg-20 h-100 z-index-2 container">
            <!--begin::Title-->
            <h1 class="text-dark lh-base fs-2x fs-md-3x fs-lg-4x font-cinzel">Online Shop
                <span
                    style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                </span>
            </h1>
            <p class="fs-1 fs-md-1x fs-lg-2x font-archivo container">
                In meinem Online Shop findest du sorgfältig ausgewählte spirituelle Produkte, die dich auf deinem Weg
                der Selbstheilung, Energiearbeit und spirituellen Entwicklung begleiten.<br /><br />
                Ob Kristalle, Pendelkarten, Räucherwerk, Chakra-Sets oder gechannelte Botschaften – hier findest du
                alles, was deine Seele stärkt.
            </p>
            <!--end::Title-->
        </div>
        <!--end::Heading-->
    </div>
    <!--end::Landing hero-->

    <!--begin::Pricing Section-->
    <div class="position-relative mt-20 mb-20">
        <div class="clouds-4"></div>
        <!--begin::Wrapper-->
        <div class="landing-light-bg position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Plans-->
                <div class="d-flex flex-column pt-lg-20">
                    <!--begin::Pricing-->
                    <div class="row g-5" id="products-container">
                        @forelse ($products as $product)
                            <div class="col-lg-4 p-5" data-aos="fade-up" data-aos-easing="linear"
                                data-aos-duration="500" data-aos-delay="0">
                                <div class="card card-stretch shadow card-borderless mb-5">
                                    <div class="card-header py-5">
                                        <div class="w-100 h-200px"
                                            style="background-repeat: no-repeat;background-size: contain;background-position:center;background-image: url({{ $product->image ? asset('storage/' . $product->image) : asset(theme()->getMediaUrlPath() . 'svg/files/blank-image.svg') }})">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--begin::Heading-->
                                        <div class="mb-5 text-start">
                                            <a href="{{ route('shop.show', $product->slug) }}"
                                                class="text-decoration-none">
                                                <!--begin::Title-->
                                                <h1 class="text-gray-900 text-hover-primary mb-3 fw-bold">
                                                    {{ $product->name }}
                                                </h1>
                                                <!--end::Title-->
                                            </a>
                                            <!--begin::Price-->
                                            <div class="text-start">
                                                <span class="fs-2 fw-bold text-primary">
                                                    @chf($product->price)
                                                </span>
                                                @if ($product->compare_price)
                                                    <span class="text-muted text-decoration-line-through ms-2">
                                                        @chf($product->compare_price)
                                                    </span>
                                                @endif
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100">
                                            <div class="text-gray-600 fw-semibold fs-5 description-text">
                                                @php
                                                    $shortText =
                                                        strlen($product->description) > 150
                                                            ? substr($product->description, 0, 150) . '...'
                                                            : $product->description;
                                                @endphp
                                                <span class="short-text">{{ $shortText }}</span>
                                                <span class="full-text"
                                                    style="display: none;">{{ $product->description }}</span>
                                            </div>
                                            <a href="#" class="text-primary show-more-link">Mehr anzeigen</a>
                                        </div>
                                        <!--end::Features-->
                                    </div>
                                    <div class="card-footer">
                                        <div class="card-toolbar text-center">
                                            <form
                                                class="add-to-cart-form d-flex align-items-center justify-content-between"
                                                data-product-id="{{ $product->id }}" method="POST"
                                                action="{{ route('cart.add', ['productId' => $product->id]) }}">
                                                @csrf
                                                <div class="input-group me-2 w-auto">
                                                    <button class="btn btn-outline-secondary btn-sm" type="button"
                                                        onclick="decrementQuantity(this)">-</button>
                                                    <input type="number" class="form-control text-center"
                                                        name="quantity" value="1" min="1"
                                                        style="width: 50px;">
                                                    <button class="btn btn-outline-secondary btn-sm" type="button"
                                                        onclick="incrementQuantity(this)">+</button>
                                                </div>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ki-duotone ki-basket fs-2 me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    In den Warenkorb
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <div class="alert alert-info">
                                    Keine Produkte gefunden.
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!--end::Pricing-->

                    @if($products->hasMorePages())
                        <div class="text-center mt-10">
                            <button type="button" class="btn btn-primary" id="load-more-products">
                                <span class="indicator-label">Mehr Produkte laden</span>
                                <span class="indicator-progress" style="display: none;">
                                    Bitte warten... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    @endif
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Pricing Section-->
</x-landing-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showMoreLinks = document.querySelectorAll('.show-more-link');
        const addToCartForms = document.querySelectorAll('.add-to-cart-form');

        showMoreLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const descriptionText = this.previousElementSibling;
                const shortText = descriptionText.querySelector('.short-text');
                const fullText = descriptionText.querySelector('.full-text');
                const isExpanded = fullText.style.display !== 'none';

                if (isExpanded) {
                    fullText.style.display = 'none';
                    shortText.style.display = 'inline';
                    this.textContent = 'Mehr anzeigen';
                } else {
                    fullText.style.display = 'inline';
                    shortText.style.display = 'none';
                    this.textContent = 'Weniger anzeigen';
                }
            });
        });

        addToCartForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const form = this;
                const submitButton = form.querySelector('button[type="submit"]');
                const originalButtonText = submitButton.innerHTML;

                // Show loading state
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                    Wird hinzugefügt...
                `;

                const productId = form.dataset.productId;
                const quantity = form.querySelector('input[name="quantity"]').value;
                const csrfToken = document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content');

                // Create form data
                const formData = new FormData();
                formData.append('_token', csrfToken);
                formData.append('quantity', quantity);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => {
                        // if (response.status === 401) {
                        //     // Store current URL in session storage for redirect after login
                        //     sessionStorage.setItem('redirect_after_login', window.location.href);
                        //     // Redirect to login page
                        //     window.location.href = '/login';
                        //     return;
                        // }
                        console.log(response);
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            // Update cart count in profile dropdown
                            document.querySelectorAll('.cart-count').forEach(element => {
                                element.textContent = `${data.cartCount}`;
                            });

                            // Show success message
                            const toast = document.createElement('div');
                            toast.className = 'position-fixed top-0 end-0 p-3';
                            toast.style.zIndex = '5';
                            toast.innerHTML = `
                            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <i class="ki-duotone ki-check-circle fs-2x text-success me-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <strong class="me-auto">Erfolg</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    ${data.message}
                                    ${!data.isAuthenticated ? '<br><small>Sie können als Gast bestellen oder sich während des Bezahlvorgangs registrieren.</small>' : ''}
                                </div>
                            </div>
                        `;
                            document.body.appendChild(toast);

                            // Remove toast after 3 seconds
                            setTimeout(() => {
                                toast.remove();
                            }, 3000);
                        } else {
                            throw new Error(data.message || 'Failed to add item to cart');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Show error message
                        const toast = document.createElement('div');
                        toast.className = 'position-fixed top-0 end-0 p-3';
                        toast.style.zIndex = '5';
                        toast.innerHTML = `
                        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <i class="ki-duotone ki-cross-circle fs-2x text-danger me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <strong class="me-auto">Fehler</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                ${error.message}
                            </div>
                        </div>
                    `;
                        document.body.appendChild(toast);

                        // Remove toast after 3 seconds
                        setTimeout(() => {
                            toast.remove();
                        }, 3000);
                    })
                    .finally(() => {
                        // Reset button state
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalButtonText;
                    });
            });
        });

        // Load More Products functionality
        const loadMoreButton = document.getElementById('load-more-products');
        if (loadMoreButton) {
            let currentPage = 1;
            const productsContainer = document.getElementById('products-container');

            loadMoreButton.addEventListener('click', function() {
                const button = this;
                const indicatorLabel = button.querySelector('.indicator-label');
                const indicatorProgress = button.querySelector('.indicator-progress');

                // Show loading state
                indicatorLabel.style.display = 'none';
                indicatorProgress.style.display = 'inline-block';
                button.disabled = true;

                // Increment page number
                currentPage++;

                // Fetch next page of products
                fetch(`/shop?page=${currentPage}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    // Create a temporary container to parse the HTML
                    const tempContainer = document.createElement('div');
                    tempContainer.innerHTML = html;

                    // Get the products from the response
                    const newProducts = tempContainer.querySelector('#products-container').innerHTML;

                    // Append new products to the container
                    productsContainer.insertAdjacentHTML('beforeend', newProducts);

                    // Check if there are more pages
                    const hasMorePages = tempContainer.querySelector('#load-more-products') !== null;
                    if (!hasMorePages) {
                        button.remove();
                    }

                    // Reinitialize AOS for new elements
                    AOS.refresh();

                    // Reattach event listeners to new product cards
                    initializeNewProductCards();
                })
                .catch(error => {
                    console.error('Error loading more products:', error);
                    // Show error message
                    const toast = document.createElement('div');
                    toast.className = 'position-fixed top-0 end-0 p-3';
                    toast.style.zIndex = '5';
                    toast.innerHTML = `
                        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <i class="ki-duotone ki-cross-circle fs-2x text-danger me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <strong class="me-auto">Fehler</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Fehler beim Laden weiterer Produkte. Bitte versuchen Sie es später erneut.
                            </div>
                        </div>
                    `;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                })
                .finally(() => {
                    // Reset button state
                    indicatorLabel.style.display = 'inline-block';
                    indicatorProgress.style.display = 'none';
                    button.disabled = false;
                });
            });
        }

        function initializeNewProductCards() {
            // Reinitialize show more/less functionality for new products
            const newShowMoreLinks = document.querySelectorAll('.show-more-link:not(.initialized)');
            newShowMoreLinks.forEach(link => {
                link.classList.add('initialized');
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const descriptionText = this.previousElementSibling;
                    const shortText = descriptionText.querySelector('.short-text');
                    const fullText = descriptionText.querySelector('.full-text');
                    const isExpanded = fullText.style.display !== 'none';

                    if (isExpanded) {
                        fullText.style.display = 'none';
                        shortText.style.display = 'inline';
                        this.textContent = 'Mehr anzeigen';
                    } else {
                        fullText.style.display = 'inline';
                        shortText.style.display = 'none';
                        this.textContent = 'Weniger anzeigen';
                    }
                });
            });

            // Reinitialize add to cart functionality for new products
            const newAddToCartForms = document.querySelectorAll('.add-to-cart-form:not(.initialized)');
            newAddToCartForms.forEach(form => {
                form.classList.add('initialized');
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // ... existing add to cart form submission code ...
                });
            });
        }
    });

    function incrementQuantity(button) {
        const input = button.parentElement.querySelector('input');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQuantity(button) {
        const input = button.parentElement.querySelector('input');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
