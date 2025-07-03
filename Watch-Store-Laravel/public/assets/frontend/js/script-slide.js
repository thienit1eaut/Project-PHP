var V_SLIDER = (function () {
    var _initSlideBannerHome = function () {
      if ($('.slide_banner_h').length > 0) {
        const mySliderBanner = new Swiper(".slide_banner_h", {
          slidesPerView: 1,
          loop: false,
          speed: 600,
          autoHeight: true,
          autoplay: true,
          speed: 1000,
          autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
          },
          pagination: {
            el: ".slide_banner_h .swiper-pagination",
            clickable: true,
          },
        });
      }
    };

    var _initSlideProductHot = function(){
	    if ($('.slide_list_product').length > 0) {
	      const mySliderProduct = new Swiper('.slide_list_product', {
	        spaceBetween: 12,
          autoHeight:false,
          slidesPerView: 4,
          draggable: true,
          loop: true,
          autoplay: {
            delay: 5000,
            disableOnInteraction:false,
            pauseOnMouseEnter:true,
          },
          navigation: {
            nextEl: ".product-host .btn_control_slide.next",
            prevEl: ".product-host .btn_control_slide.prev",
          },
	      	breakpoints: {
            0: {
                slidesPerView: 1.5,
                spaceBetween: 5,
                freeMode:true,
            },
            575: {
                slidesPerView: 1.5,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10
            },
            991: {
                slidesPerView: 4,
                spaceBetween: 15
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 15
            }
          },
	      });
	    }
 	  };

    var _initSlideProduct = function(){
      var slideProductRelated = new Swiper('.product-slide-1', {
        slidesPerView: 4,
        spaceBetween: 15,
        autoplay: true,
        speed: 500,
        loop:true,
        autoplay: {
            delay: 3000,
            disableOnInteraction:false,
            pauseOnMouseEnter:true,
        },
        pagination: {
            el: ".product-slide-1 .swiper-pagination",
            clickable: true,
        },
        breakpoints: {
          0: {
              slidesPerView: 1
          },
          576: {
              slidesPerView: 2
          },
          768: {
              slidesPerView: 3
          },
          1200: {
              slidesPerView: 4
          },
          1440: {
              slidesPerView: 4
          }
        }
      });
 	  };

    var _initSlideCategory = function(){
      var allCategory = document.querySelectorAll(".slide_category");
      allCategory.forEach(function(element,index) {
        var id = allCategory[index].getAttribute("data-id");
        var name = 'slide-category-'+id;
        var parent = allCategory.parentElement;
        var name = new Swiper('.slide-category-'+id, {
          spaceBetween: 12,
          autoHeight:false,
          slidesPerView: 4,
          draggable: true,
          loop: true,
          autoplay: {
          delay: id == 0 ? 5000 : 8000*(id*0.8),
          disableOnInteraction:false,
          pauseOnMouseEnter:true,
          },
           navigation:{
            nextEl: ".category-product-"+id+" .btn_control_slide.next",
            prevEl: ".category-product-"+id+" .btn_control_slide.prev"
          },
          breakpoints: {
                  0: {
                      slidesPerView: 1.5,
                      spaceBetween: 5,
                      freeMode:true,
                  },
                  575: {
                      slidesPerView: 1.5,
                      spaceBetween: 10
                  },
                  768: {
                      slidesPerView: 3,
                      spaceBetween: 10
                  },
                  991: {
                      slidesPerView: 4,
                      spaceBetween: 15
                  },
                  1200: {
                      slidesPerView: 4,
                      spaceBetween: 15
                  }
          }
        });
      });
    };

    var _initSlideRivewCustomer = function(){
	    if ($('.slide_review_customer').length > 0) {
	      var slideRivewCustomer = new Swiper(".slide_review_customer", {
          slidesPerView: 3,
          spaceBetween: 20,
          pagination: {
            el: ".slide_review_customer .swiper-pagination-review",
            clickable: true,
          },
          breakpoints: {
            0: {
              slidesPerView: 1,
              spaceBetween: 20,
            },
            375: {
              slidesPerView: 2,
              spaceBetween: 5,
            },
            768: {
              slidesPerView: 3,
              spaceBetween: 20,
            },
          },
        });
	    }
 	  };
    
    var _initSlideLibProduct = function () {
      var slideLibProductThumbs = new Swiper(".nav_thumbs_gallery_product", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var slideLibProduct = new Swiper(".for_image_gallery_product", {
        loop: true,
        spaceBetween: 0,
        navigation: {
          nextEl: ".control_image_gallery.swiper-button-next",
          prevEl: ".control_image_gallery.swiper-button-prev",
        },
        thumbs: {
          swiper: slideLibProductThumbs,
        },
      });
    };

    return {
      _: function () {
        _initSlideBannerHome();
        _initSlideProductHot();
        _initSlideCategory();
        _initSlideProduct();
        // _initSlideLibProduct();
      },
    };
  })();
  window.addEventListener("DOMContentLoaded", (event) => {
    V_SLIDER._();
  });
  