(function($) {
  "use strict"

  
  // NAVIGATION
  var responsiveNav = $('#responsive-nav'),
  catToggle = $('#responsive-nav .category-nav .category-header'),
  catList = $('#responsive-nav .category-nav .category-list'),
  menuToggle = $('#responsive-nav .menu-nav .menu-header'),
  menuList = $('#responsive-nav .menu-nav .menu-list');

  catToggle.on('click', function() {
    menuList.removeClass('open');
    catList.toggleClass('open');
  });

  menuToggle.on('click', function() {
    catList.removeClass('open');
    menuList.toggleClass('open');
  });

  $(document).click(function(event) {
    if (!$(event.target).closest(responsiveNav).length) {
      if (responsiveNav.hasClass('open')) {
        responsiveNav.removeClass('open');
        $('#navigation').removeClass('shadow');
      } else {
        if ($(event.target).closest('.nav-toggle > button').length) {
          if (!menuList.hasClass('open') && !catList.hasClass('open')) {
            menuList.addClass('open');
          }
          $('#navigation').addClass('shadow');
          responsiveNav.addClass('open');
        }
      }
    }
  });

  
  // HOME SLICK
  $('#home-slick').slick({
    autoplay: true,
    infinite: true,
    speed: 300,
    arrows: true,
  });

  
  // PRODUCTS SLICK
  $('#product-slick-1').slick({
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplay: true,
    infinite: true,
    speed: 300,
    dots: true,
    arrows: false,
    appendDots: '.product-slick-dots-1',
    responsive: [{
      breakpoint: 991,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
    ]
  });

  $('#product-slick-2').slick({
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplay: true,
    infinite: true,
    speed: 300,
    dots: true,
    arrows: false,
    appendDots: '.product-slick-dots-2',
    responsive: [{
      breakpoint: 991,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        dots: false,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
    ]
  });

  
  // PRODUCT DETAILS SLICK
  $('#product-main-view').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-view',
  });

  $('#product-view').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
    asNavFor: '#product-main-view',
  });

  
  // PRODUCT ZOOM
  $('#product-main-view .product-view').zoom();

  
  // PRICE SLIDER
  var slider = document.getElementById('price-slider');
  if (slider) {
    noUiSlider.create(slider, {
      start: [1, 999],
      connect: true,
      tooltips: [true, true],
      format: {
        to: function(value) {
          return value.toFixed(2) + '$';
        },
        from: function(value) {
          return value
        }
      },
      range: {
        'min': 1,
        'max': 999
      }
    });
  }

  
  // PAGINATION
  $(document).ready(function (){
    $('ul.pagination').addClass('store-pages').prepend('<li><span class="text-uppercase">Страница:</span></li>');
  });

  
  //CART
  function showCart(cart){
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
  }

  
  $('.shopping-cart-btns .main-btn').on('click', function () {
    $.ajax({
      url: '/cart/show',
      type: 'GET',
      success: function(res){
        if(!res) alert('Ошибка!');
        showCart(res);
      },
      error: function(){
        alert('Error!');
      }
    });
    return false;
  });

  
  $('#cart .btn.btn-danger').on('click', function () {
    $.ajax({
      url: '/cart/clear',
      type: 'GET',
      success: function(res){
        if(!res) alert('Ошибка!');
        showCart(res);
      },
      error: function(){
        alert('Error!');
      }
    });

    $('.header-btns-icon>span').text(0);    
    $('.header-cart>.dropdown-toggle>span').text((0)+'$');
    $('.product.product-widget').remove();
    $('#shopping-cart .shopping-cart-btns').hide();
    $('#shopping-cart .empty-cart').show();

  });

  
  $('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    var priceItem = parseFloat($('.product.product-widget[data-id = "'+id+'"] .product-price').text());
    var qty = $('.product.product-widget[data-id = "'+id+'"] .product-price>span').text();   
    $.ajax({
      url: '/cart/del-item',
      data: {id: id},
      type: 'GET',
      success: function(res){
        if(!res) alert('Ошибка!');
        showCart(res);
      },
      error: function(){
        alert('Error!');
      }
    });
    
    $('.header-btns-icon>span').text(parseInt($('.header-btns-icon>span').text())-parseInt(qty));    
    var price = parseFloat($('.header-cart>.dropdown-toggle>span').text())-priceItem*qty;
    $('.header-cart>.dropdown-toggle>span').text((price)+'$');
    $('.product.product-widget[data-id = "'+id+'"]').remove();
    if ($("#shopping-cart").find(".product.product-widget").length == 0) {
      $('#shopping-cart .empty-cart').show();
      $('#shopping-cart .shopping-cart-btns').hide();
    }
    else{
      $('#shopping-cart .empty-cart').hide();
      $('#shopping-cart .shopping-cart-btns').show();
    } 

  });
  
  
  $('.product-body.main-view .add-to-cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var font = (parseInt($('.num-font>input').val()) > 0) ? $('.num-font>input').val() : 1;
    var text = $('.txt-input>input').val();
    var qty = (parseInt($('.qty-input>input').val()) > 0) ? $('.qty-input>input').val() : 1;
    var idNew = id+'&'+font+text;
    var priceItem = parseFloat($('.product-body.main-view>.product-price').text());
    var name = $('.product-body.main-view>.product-name').text();
    $.ajax({
      url: '/cart/add',
      data: {id: id, font: font, text: text, qty: qty},
      type: 'GET',
      success: function(res){
        if(!res) alert('Ошибка!');
        showCart(res);
      },
      error: function(){
        alert('Error!');
      }
    });

    if($('#shopping-cart').find('.product.product-widget[data-id = "'+idNew+'"]').length != 0){
      var qtyOld = parseInt($('.product.product-widget[data-id = "'+idNew+'"] .product-price>span').text());      
      $('.product.product-widget[data-id = "'+idNew+'"] .product-price>span').text(qtyOld+parseInt(qty));      
    }
    else{
      var img = $('#product-main-view img').attr('src');
      $('#shopping-cart>.shopping-cart-list').prepend('\
        <div class="product product-widget" data-id="'+idNew+'">\
        <div class="product-thumb">\
        <img src="'+img+'" alt="" height="40">\
        </div>\
        <div class="product-body">\
        <h3 class="product-price">'+priceItem+'$ x <span class="qty">'+qty+'</span></h3>\
        <h2 class="product-name"><a href="#">'+name+'</a></h2>\
        </div>\
        </div>\
        ')
    }

    $('.header-btns-icon>span').text(parseInt($('.header-btns-icon>span').text())+parseInt(qty));    
    var price = parseFloat($('.header-cart>.dropdown-toggle>span').text())+priceItem*qty;
    $('.header-cart>.dropdown-toggle>span').text((price)+'$');
    $('#shopping-cart .empty-cart').hide();
    $('#shopping-cart .shopping-cart-btns').show();

  });


  var shipping = parseFloat($('.shiping-methods input:checked').val());  
  $('.shiping-methods input').on('click', function () {
    var subTotal = parseFloat($('.order-summary tfoot .sub-total').text());
    shipping = parseFloat($(this).val());
    (!shipping) ? $('.order-summary tfoot .shipping>td').text('Бесплатная доставка') : $('.order-summary tfoot .shipping>td').text(shipping+'$');
    $('.order-summary tfoot .total').text((subTotal+shipping)+'$');
    $('.order-summary input[name = "shipping"]').val(shipping);    
  });


  $(document).ready(function (){
    if ($("#shopping-cart").find(".product.product-widget").length == 0) {
      $('#shopping-cart .empty-cart').show();
      $('#shopping-cart .shopping-cart-btns').hide();
    }
    else{
      $('#shopping-cart .empty-cart').hide();
      $('#shopping-cart .shopping-cart-btns').show();
    }

    var subTotal = parseFloat($('.order-summary tfoot .sub-total').text());
    (!shipping) ? $('.order-summary tfoot .shipping>td').text('Бесплатная доставка') : $('.order-summary tfoot .shipping>td').text(shipping+'$');    
    $('.order-summary tfoot .total').text((subTotal+shipping)+'$');
    $('.order-summary input[name = "shipping"]').val(shipping);  
  });


  $('#shopping-cart .shopping-cart-btns .primary-btn').on('click', function () {
    location = checkout;
  });


  $('.order-summary .del-item').on('click', function () {
    var id = $(this).data('id');
    var totalItem = parseFloat($('.order-summary tr[data-id = "'+id+'"] .total>strong').text());  
    $.ajax({
      url: '/cart/del-item-view',
      data: {id: id},
      type: 'GET',
      success: function(res){
        if(!res) alert('Ошибка!');
        if ($('.order-summary').find('tbody>tr').length == 0) location = checkout;
      },
      error: function(){
        alert('Error!');
      }
    });

    var price = parseFloat($('.order-summary tfoot .sub-total').text())-totalItem;
    $('.order-summary tfoot .sub-total').text((price)+'$');
    $('.order-summary tfoot .total').text((price+shipping)+'$');   
    $('.order-summary tr[data-id = "'+id+'"]').remove();    
  });


  })(jQuery);
