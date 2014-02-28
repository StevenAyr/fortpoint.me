"use strict"

# One-line jQuery
window.$ = (args...)-> document.querySelectorAll.apply(document, args)

if (/home/).test(document.body.className) then do ()->

  do slider = ()->
    current_slide_index = 0
    timer = null

    slides = $("#slides li")
    slider_nav = $("#slider-nav")[0]

    set_current_slide = (index)->
      clearTimeout(timer)
      current_slide_index = if index < 0 then slides.length - 1 else index % slides.length
      $("#slides .current")[0]?.className = ""
      $("#slider-nav .current")[0]?.className = ""
      slides[current_slide_index].className = "current"
      $("#slider-nav li")[current_slide_index].className = "current"

      advance_timer()

    build_slide_nav = (slide, index)->
      slider_nav_block = document.createElement('li')
      slider_nav_block.onclick = ()->
        set_current_slide(index)
      slider_nav.appendChild slider_nav_block

    build_slide_nav(slide, index) for slide, index in slides
    $("#slider-nav li")[0].className = "current"

    next_slide = ()->
      set_current_slide(current_slide_index + 1)

    prev_slide = ()->
      set_current_slide(current_slide_index - 1)

    do advance_timer = ()->
      timer = setTimeout next_slide, 8000

    $("#slider-prev")[0].onclick = prev_slide
    $("#slider-next")[0].onclick = next_slide