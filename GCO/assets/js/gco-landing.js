document.addEventListener("DOMContentLoaded", function () {
  document.documentElement.removeAttribute("data-bs-theme");

  if (typeof Swiper === "undefined") {
    return;
  }

  new Swiper("#eventsSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    grabCursor: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true
    },
    pagination: {
      el: "#eventsSwiper .swiper-pagination",
      clickable: true,
      dynamicBullets: true
    },
    breakpoints: {
      768: { slidesPerView: 2, spaceBetween: 25 },
      1024: { slidesPerView: 3, spaceBetween: 30 }
    }
  });

  new Swiper("#allTeamSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    grabCursor: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
      pauseOnMouseEnter: true
    },
    pagination: {
      el: "#allTeamSwiper .swiper-pagination",
      clickable: true,
      dynamicBullets: true
    },
    breakpoints: {
      640: { slidesPerView: 2, spaceBetween: 20 },
      992: { slidesPerView: 3, spaceBetween: 25 },
      1200: { slidesPerView: 4, spaceBetween: 30 }
    }
  });
});
