var App = ns("NSWD.App");

App.Loader = {
    windowReady: function () {
        (function () {
            "use strict";

            /**
             * Easy selector helper function
             */
            const select = (el, all = false) => {
                el = el.trim();
                if (all) {
                    return [...document.querySelectorAll(el)];
                } else {
                    return document.querySelector(el);
                }
            };

            /**
             * Easy event listener function
             */
            const on = (type, el, listener, all = false) => {
                let selectEl = select(el, all);
                if (selectEl) {
                    if (all) {
                        selectEl.forEach((e) => e.addEventListener(type, listener));
                    } else {
                        selectEl.addEventListener(type, listener);
                    }
                }
            };

            /**
             * Easy on scroll event listener
             */
            const onscroll = (el, listener) => {
                el.addEventListener("scroll", listener);
            };

            /**
             * Navbar links active state on scroll
             */
            let navbarlinks = select("#navbar .scrollto", true);
            const navbarlinksActive = () => {
                let position = window.scrollY + 200;
                navbarlinks.forEach((navbarlink) => {
                    if (!navbarlink.hash) return;
                    let section = select(navbarlink.hash);
                    if (!section) return;
                    if (
                        position >= section.offsetTop &&
                        position <= section.offsetTop + section.offsetHeight
                    ) {
                        navbarlink.classList.add("active");
                    } else {
                        navbarlink.classList.remove("active");
                    }
                });
            };

            /**
             * Scrolls to an element with header offset
             */
            const scrollto = (el) => {
                let header = select("#header");
                let offset = header.offsetHeight;

                if (!header.classList.contains("header-scrolled")) {
                    offset -= 16;
                }

                let elementPos = select(el).offsetTop;
                window.scrollTo({
                    top: elementPos - offset,
                    behavior: "smooth",
                });
            };

            /**
             * Toggle .header-scrolled class to #header when page is scrolled
             */
            let selectHeader = select("#header");
            if (selectHeader) {
                const headerScrolled = () => {
                    if (window.scrollY > 100) {
                        selectHeader.classList.add("header-scrolled");
                    } else {
                        selectHeader.classList.remove("header-scrolled");
                    }
                };
                headerScrolled();
                onscroll(document, headerScrolled);
            }

            /**
             * Back to top button
             */
            let backtotop = select(".back-to-top");
            if (backtotop) {
                const toggleBacktotop = () => {
                    if (window.scrollY > 100) {
                        backtotop.classList.add("active");
                    } else {
                        backtotop.classList.remove("active");
                    }
                };
                toggleBacktotop();
                onscroll(document, toggleBacktotop);
            }

            /**
             * Mobile nav toggle
             */
            on("click", ".mobile-nav-toggle", function (e) {
                select("#navbar").classList.toggle("navbar-mobile");
                this.classList.toggle("bi-list");
                this.classList.toggle("bi-x");
            });

            /**
             * Mobile nav dropdowns activate
             */
            on(
                "click",
                ".navbar .dropdown > a",
                function (e) {
                    if (select("#navbar").classList.contains("navbar-mobile")) {
                        e.preventDefault();
                        this.nextElementSibling.classList.toggle("dropdown-active");
                    }
                },
                true
            );

            /**
             * Scrool with ofset on links with a class name .scrollto
             */
            on(
                "click",
                ".scrollto",
                function (e) {
                    if (select(this.hash)) {
                        e.preventDefault();

                        let navbar = select("#navbar");
                        if (navbar.classList.contains("navbar-mobile")) {
                            navbar.classList.remove("navbar-mobile");
                            let navbarToggle = select(".mobile-nav-toggle");
                            navbarToggle.classList.toggle("bi-list");
                            navbarToggle.classList.toggle("bi-x");
                        }
                        scrollto(this.hash);
                    }
                },
                true
            );

            /**
             * Scroll with ofset on page load with hash links in the url
             */
            if (window.location.hash) {
                if (select(window.location.hash)) {
                    scrollto(window.location.hash);
                }
            }

            /**
             * Initiate glightbox
             */
            const glightbox = GLightbox({
                selector: ".glightbox",
            });

            /**
             * Porfolio isotope and filter
             */
            let portfolioContainer = select(".portfolio-container");
            if (portfolioContainer) {
                let portfolioIsotope = new Isotope(portfolioContainer, {
                    itemSelector: ".portfolio-item",
                });

                let portfolioFilters = select("#portfolio-flters li", true);

                on(
                    "click",
                    "#portfolio-flters li",
                    function (e) {
                        e.preventDefault();
                        portfolioFilters.forEach(function (el) {
                            el.classList.remove("filter-active");
                        });
                        this.classList.add("filter-active");

                        portfolioIsotope.arrange({
                            filter: this.getAttribute("data-filter"),
                        });
                    },
                    true
                );
            }

            /**
             * Initiate portfolio lightbox
             */
            const portfolioLightbox = GLightbox({
                selector: ".portfolio-lightbox",
            });

            /**
             * Portfolio details slider
             */
            new Swiper(".portfolio-details-slider", {
                speed: 400,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "bullets",
                    clickable: true,
                },
            });

            /**
             * Testimonials slider
             */
            new Swiper(".testimonials-slider", {
                speed: 600,
                loop: true,
                autoplay: {
                    delay: 2700,
                    disableOnInteraction: true,
                },
                slidesPerView: "auto",
                pagination: {
                    el: ".swiper-pagination",
                    type: "bullets",
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },

                    1200: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                },
            });

            /**
             * Initiate Pure Counter
             */
            new PureCounter();
        })();

        // HERE YOU HAVE THE CODE FOR FAQ
        window.addEventListener("DOMContentLoaded", function () {
            try {
                const questions = document.querySelectorAll('.question');

                questions.forEach(function (question) {
                    question.addEventListener('click', function (e) {
                        try {
                            e.preventDefault();
                            const parent = this.closest('.question-answer-section');
                            const answer = parent.querySelector('.answer');

                            // Toggle class "question-answer-section--active" on the parent element
                            if (parent.classList.contains('question-answer-section--active')) {
                                parent.classList.remove('question-answer-section--active');
                                answer.style.display = 'none'; // Hide the answer
                            } else {
                                parent.classList.add('question-answer-section--active');
                                answer.style.display = 'block'; // Show the answer
                            }

                            const otherImages = document.querySelectorAll('.question img:not(.darker)');
                            otherImages.forEach(function (img) {
                                img.classList.remove('darker');
                            });

                            const images = this.querySelectorAll('img');
                            images.forEach(function (img) {
                                img.classList.toggle('darker');
                            });
                        } catch (error) {
                            NSWD.Logger(error);
                        }
                    });

                    question.querySelectorAll('*').forEach(function (element) {
                        element.addEventListener('click', function (e) {
                            try {
                                e.stopPropagation();
                            } catch (error) {
                                NSWD.Logger(error);
                            }
                        });
                    });
                });
            } catch (error) {
                NSWD.Logger(error);
            }
        });

        // HERE YOU HAVE THE CODE FOR CREATE THE ACTIVE CLASS ON CLICKING ON BOXINPUT ON ESTIMARE COST
        const radioInputs = document.querySelectorAll('input[name="options"]');
        const squareExpeditionOptions = document.querySelectorAll('.square-expedition-option');

        radioInputs.forEach(function (input) {
            input.addEventListener('change', function () {
                squareExpeditionOptions.forEach(function (option) {
                    if (option === this.parentNode) {
                        option.classList.add('active');
                    } else {
                        option.classList.remove('active');
                    }
                }, this);
            });
        });

        // HERE YOU HAVE THE CODE FOR CREATE THE ACTIVE CLASS ON CLICKING ON Personalizat ON ESTIMARE COST
        const radioInput = document.getElementById('option5');
        const longExpeditionOption = document.querySelector('.long-expedition-option');

        if (radioInput) {
            radioInput.addEventListener('change', function () {
                if (this.checked) {
                    longExpeditionOption.classList.add('active');
                } else {
                    longExpeditionOption.classList.remove('active');
                }
            });
        }

        // HERE YOU HAVE THE CODE FOR CREATE THE ACTIVE CLASS ON CLICKING ON Livrare Sambata ON ESTIMARE COST
        const radioInputDoi = document.getElementById('option6');
        const livrareSambata = document.querySelector('.livrare-sambata');

        if (radioInputDoi && livrareSambata) {
            const livrareSambataChild = livrareSambata.querySelector('.livrare-sambata-child');

            radioInputDoi.addEventListener('change', function () {
                if (this.checked) {
                    livrareSambataChild.classList.add('active');
                } else {
                    livrareSambataChild.classList.remove('active');
                }
            });
        }
    },


};


App.Loader.windowReady();
