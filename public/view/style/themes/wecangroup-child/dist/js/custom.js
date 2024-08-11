jQuery(document).ready(function () {
    jQuery(".open-menu").click(function () {
      jQuery(".menu-sidebar").addClass("showmenu");
      jQuery(".header").find(".overlay").addClass("blur");
    });
    jQuery(".close-menu").click(function () {
      jQuery(".menu-sidebar").removeClass("showmenu");
      jQuery(".header").find(".overlay").removeClass("blur");
    });
  
    jQuery(document).ready(function () {
      var elements = document.getElementsByClassName("list-thumb");
      for (let item of elements) {
        lightGallery(item, {
          share: false,
          plugins: [lgThumbnail, lgFullscreen],
        });
      }
    });
    jQuery(function () {
      var $ul = jQuery(".drop-menu-mobi > ul");
  
      $ul.find("li a").click(function (e) {
        var $li = jQuery(this).parent();
  
        if ($li.find("ul").length > 0) {
          e.preventDefault();
  
          if ($li.hasClass("selected")) {
            $li.removeClass("selected").find("li").removeClass("selected");
            $li.find("ul").slideUp(400);
            $li.find("a i").removeClass("i-up");
          } else {
            if ($li.parents("li.selected").length == 0) {
              $ul.find("li").removeClass("selected");
              $ul.find("ul").slideUp(400);
              $ul.find("li a i").removeClass("i-up");
            } else {
              $li.parent().find("li").removeClass("selected");
              $li.parent().find("> li ul").slideUp(400);
              $li.parent().find("> li a i").removeClass("i-up");
            }
  
            $li.addClass("selected");
            $li.find(">ul").slideDown(400);
            $li.find(">a>i").addClass("i-up");
          }
        }
      });
      var t = " li > ul ";
      for (var i = 1; i <= 10; i++) {
        jQuery(".drop-menu-mobi > ul > " + t.repeat(i)).addClass(
          "subMenuColor" + i
        );
      }
  
      var activeLi = jQuery("li.selected");
      if (activeLi.length) {
        opener(activeLi);
      }
  
      function opener(li) {
        var ul = li.closest("ul");
        if (ul.length) {
          li.addClass("selected");
          ul.addClass("open");
          li.find(">a>i").addClass("i-up");
  
          if (ul.closest("li").length) {
            opener(ul.closest("li"));
          } else {
            return false;
          }
        }
      }
    });
  });
  jQuery(document).ready(function () {
    if (jQuery(".slide-inner").length) {
      jQuery(".slide-inner").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: true,
        cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",
        fade: true,
        speed: 2000,
        autoplay: true,
        touchThreshold: 100,
        draggable: true,
        prevArrow:
          '<button class="slick-prev slick-arrow"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow:
          '<button class="slick-next slick-arrow"><i class="fa fa-long-arrow-right"></i></button>',
        responsive: [
          {
            breakpoint: 767,
            settings: {
              arrows: false,
            },
          },
        ],
      });
    }
    if (jQuery(".slide-hc").length) {
      jQuery(".slide-hc").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      });
    }
    if (jQuery(".parter-homepage").length) {
      jQuery(".parter-homepage").slick({
        slidesToShow: 6,
        slidesToScroll: 2,
        infinite: true,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 3000,
        arrows: false,
        dots: false,
        responsive: [
          {
            breakpoint: 1280,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      });
    }
    if (jQuery(".list-slide").length) {
      jQuery(".list-slide").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        infinite: true,
        centerMode: false,
        variableWidth: true,
        prevArrow:
          '<button class="slick-prev slick-arrow"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow:
          '<button class="slick-next slick-arrow"><i class="fa fa-long-arrow-right"></i></button>',
        responsive: [
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              variableWidth: false,
            },
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              variableWidth: false,
            },
          },
        ],
      });
    }
    if (jQuery(".hp__slide-inner").length) {
      jQuery(".hp__slide-inner").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
      });
    }
    if (jQuery(".item-inner").length) {
      jQuery(".item-inner").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 3000,
        arrows: true,
        dots: false,
        infinite: false,
        centerMode: false,
        variableWidth: false,
        prevArrow:
          '<button class="slick-prev slick-arrow"><i class="fa fa-long-arrow-left"></i></button>',
        nextArrow:
          '<button class="slick-next slick-arrow"><i class="fa fa-long-arrow-right"></i></button>',
        responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });
    }
    if (jQuery(".activity-slide").length) {
      jQuery(".activity-slide").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 3000,
        fade: true,
        arrows: true,
        dots: false,
        prevArrow:
          '<button class="slick-prev slick-arrow"><i class="fa fa-long-arrow-left"></i>Trước</button>',
        nextArrow:
          '<button class="slick-next slick-arrow">Tiếp<i class="fa fa-long-arrow-right"></i></button>',
      });
    }
  });
  
  jQuery(document).ready(function () {
    jQuery(".button-search").click(function () {
      jQuery(".drop-search").slideToggle();
    });
    jQuery(".current-lang").on("click", function (e) {
      e.preventDefault();
      jQuery(this).next().toggleClass("change-lang");
    });
    jQuery(document).click(function (e) {
      var lang = jQuery(".current-lang, .language");
      if (!lang.is(e.target) && lang.has(e.target).length === 0) {
        lang.removeClass("change-lang");
      }
    });
  });
  
  jQuery(document).ready(function () {
    jQuery(".gnws-click_loadmore").click(function () {
      jQuery(this).find(".gnws-book-loading").removeClass("d-none");
      var number = parseInt(jQuery(this).attr("data-number"));
      var posttype = jQuery(this).attr("data-posttype");
      var search = jQuery(this).attr("data-search");
      var total = parseInt(jQuery(this).find(".gnws-ajax_count").text());
      var catid = jQuery(this).attr("data-taxid");
      var $t = jQuery(this);
      jQuery.ajax({
        type: "POST",
        url: ajax.ajax_url,
        data: {
          action: "loadmore",
          number: number,
          posttype: posttype,
          search: search,
          catid: catid,
        },
        success: function (response) {
          $t.find(".gnws-book-loading").addClass("d-none");
          $t.closest(".gnws-ajax_wrap")
            .find(".gnws-ajax_display")
            .append(response);
          number = number + 12;
          total = total - 12;
          console.log(total);
          if (total <= 0) {
            $t.addClass("d-none");
          } else {
            $t.find(".gnws-ajax_count").text(total);
          }
          $t.attr("data-offset", number);
        },
      });
    });
  });
  
  jQuery(document).ready(function () {
    jQuery(".content-tab .item").hide();
    jQuery(".content-tab .item:first").show();
    jQuery(".title-tab ul li").click(function () {
      jQuery(".content-tab .item").hide();
      var activeTab = jQuery(this).attr("rel");
      jQuery("#" + activeTab).fadeIn();
      if (jQuery(this).attr("rel") == "tab2") {
        jQuery(".title-tab").addClass("slide");
      } else {
        jQuery(".title-tab").removeClass("slide");
      }
      jQuery(".title-tab ul li").removeClass("actab");
      jQuery(this).addClass("actab");
    });
  
    jQuery(".ab-content-tab > div").addClass("hidden-tab");
    jQuery(".ab-content-tab > div:first-of-type").removeClass("hidden-tab");
    jQuery(".tabs-partner li").click(function (e) {
      e.preventDefault();
      var $this = jQuery(this),
        tabgroup = "#" + $this.parents(".tabs-partner").data("tabgroup"),
        others = $this.closest("li").siblings();
      target = $this.attr("rel");
      others.removeClass("active-tab");
      $this.addClass("active-tab");
      jQuery(tabgroup).children("div").addClass("hidden-tab");
      jQuery(target).removeClass("hidden-tab");
    });
  });
  jQuery(document).ready(function ($) {
    var galleryText = new Swiper(".item-text", {
      loop: true,
      loopedSlides: 3,
    });
    var galleryImages = new Swiper(".item-img", {
      effect: "creative",
      loop: true,
      loopedSlides: 3,
      creativeEffect: {
        prev: {
          translate: ["-100%", 0, -400],
        },
        next: {
          translate: ["100%", 0, -400],
        },
      },
      navigation: {
        nextEl: ".swiper-button-next-1",
        prevEl: ".swiper-button-prev-1",
      },
    });
    galleryImages.controller.control = galleryText;
    galleryText.controller.control = galleryImages;
  });
  
  jQuery(document).ready(function ($) {
    var swiper = new Swiper(".product-slide", {
      effect: "fade",
      loop: false,
      navigation: {
        nextEl: ".swiper-button-next-2",
        prevEl: ".swiper-button-prev-2",
      },
    });
  });
  
  jQuery(document).ready(function () {
    const $lgContainer = document.getElementById("js-gallery");
    const lg = lightGallery($lgContainer, {
      animateThumb: true,
      allowMediaOverlap: true,
      toggleThumb: true,
      download: false,
      speed: 500,
      slideShowAutoplay: true,
      plugins: [lgThumbnail, lgFullscreen],
      fullScreen: true,
      showZoomInOutIcons: false,
      actualSize: true,
    });
  });
  jQuery(document).ready(function () {
    jQuery(".vertical-slide").slick({
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      vertical: true,
      verticalSwiping: true,
    });
    (function (jQuery) {
      jQuery(".accordion > .item-tab:eq(0) .tab-title")
        .addClass("showtab")
        .next()
        .slideDown();
  
      jQuery(".accordion .tab-title").click(function (j) {
        var dropDown = jQuery(this).closest(".item-tab").find(".tab-content");
  
        jQuery(this)
          .closest(".accordion")
          .find(".tab-content")
          .not(dropDown)
          .slideUp();
  
        if (jQuery(this).hasClass("showtab")) {
          jQuery(this).removeClass("showtab");
        } else {
          jQuery(this)
            .closest(".accordion")
            .find(".tab-title.showtab")
            .removeClass("showtab");
          jQuery(this).addClass("showtab");
        }
  
        dropDown.stop(false, true).slideToggle();
  
        j.preventDefault();
      });
    })(jQuery);
  });
  jQuery(document).ready(function () {
    AOS.init();
    // jQuery(".language").on("click", ".current-lang", function () {
    //   jQuery(this)
    //     .closest(".language")
    //     .children("li:not(.current-lang)")
    //     .toggle();
    // });
    // var allOptions = jQuery(".language").children("li:not(.current-lang)");
    // jQuery(".language").on("click", "li:not(.current-lang)", function () {
    //   allOptions.removeClass("selected");
    //   jQuery(this).addClass("selected");
    //   jQuery(".language").children(".current-lang").html(jQuery(this).html());
    //   allOptions.toggle();
    // });
  });
  (function ($) {
    $(document).on("click", ".download_tailieu", function () {
      var id = $(this).attr("data-id");
      $.ajax({
        type: "POST",
        url: ajax.ajax_url,
        data: {
          action: "add_download_count",
          post_id: id,
        },
        success: function (data, textStatus, jqXHR) {},
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        },
      });
    });
    $(document).on("change", "#filter_nam_ph", function () {
      var url = location.protocol + "//" + location.host + location.pathname;
      var val = $(this).val();
      if (val > 0) {
        window.location = url + "?nam_ph=" + $(this).val();
      } else {
        window.location = url;
      }
    });
  })(jQuery);
  
  jQuery(document).ready(function () {
    jQuery(function () {
      jQuery(".file-input").on("change", function (e) {
        var file = this.files[0];
        jQuery("#file-list-" + jQuery(this).data("id")).append(
          "<span>" + file.name + "</span>"
        );
      });
  
      jQuery(".file-input-button").on("click", function (e) {
        jQuery("#file-input-" + jQuery(this).data("id")).trigger("click");
      });
    });
  });