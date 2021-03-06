// Generated by CoffeeScript 1.6.3
(function() {
  "use strict";
  var __slice = [].slice;

  window.$ = function() {
    var args;
    args = 1 <= arguments.length ? __slice.call(arguments, 0) : [];
    return document.querySelectorAll.apply(document, args);
  };

  if (/home/.test(document.body.className)) {
    (function() {
      var slider;
      return (slider = function() {
        var advance_timer, build_slide_nav, current_slide_index, index, next_slide, prev_slide, set_current_slide, slide, slider_nav, slides, timer, _i, _len;
        current_slide_index = 0;
        timer = null;
        slides = $("#slides li");
        slider_nav = $("#slider-nav")[0];
        set_current_slide = function(index) {
          var _ref, _ref1;
          clearTimeout(timer);
          current_slide_index = index < 0 ? slides.length - 1 : index % slides.length;
          if ((_ref = $("#slides .current")[0]) != null) {
            _ref.className = "";
          }
          if ((_ref1 = $("#slider-nav .current")[0]) != null) {
            _ref1.className = "";
          }
          slides[current_slide_index].className = "current";
          $("#slider-nav li")[current_slide_index].className = "current";
          return advance_timer();
        };
        build_slide_nav = function(slide, index) {
          var slider_nav_block;
          slider_nav_block = document.createElement('li');
          slider_nav_block.onclick = function() {
            return set_current_slide(index);
          };
          return slider_nav.appendChild(slider_nav_block);
        };
        for (index = _i = 0, _len = slides.length; _i < _len; index = ++_i) {
          slide = slides[index];
          build_slide_nav(slide, index);
        }
        $("#slider-nav li")[0].className = "current";
        next_slide = function() {
          return set_current_slide(current_slide_index + 1);
        };
        prev_slide = function() {
          return set_current_slide(current_slide_index - 1);
        };
        (advance_timer = function() {
          return timer = setTimeout(next_slide, 8000);
        })();
        $("#slider-prev")[0].onclick = prev_slide;
        return $("#slider-next")[0].onclick = next_slide;
      })();
    })();
  }

}).call(this);
