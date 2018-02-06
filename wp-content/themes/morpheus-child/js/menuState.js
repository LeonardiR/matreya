(function ($) {
   var menuState = {
       elements: {
           menu: $('#menu-primary-menu'),
           menuItem: $('.menu-item'),
       },
       cssClasses:{
           currentItem: 'current-menu-item'
       },

       menuSelected: function (menu, item) {
           menu.find(item).click(function () {
               item.removeClass(menuState.cssClasses.currentItem);
               $(this).addClass(menuState.cssClasses.currentItem);
           });
       },

       init: function () {
           menuState.menuSelected(menuState.elements.menu, menuState.elements.menuItem);
       }
   };
    menuState.init();
}(jQuery));