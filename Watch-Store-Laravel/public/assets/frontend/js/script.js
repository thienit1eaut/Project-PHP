var PROGRAM = (function() {
    var animation = function(){
        var wow = new WOW();
        wow.init();
    }
    var slimSelect = function(){
        var pageFilter = document.getElementsByClassName("slim_select");
        if(pageFilter.length > 0){
            var genderSl = new SlimSelect({
              select: '#gender',
              settings: {
                showSearch: false
              }
            });
            var materialSl = new SlimSelect({
              select: '#material',
              settings: {
                showSearch: false
              }
            });
            var sizeSl = new SlimSelect({
              select: '#size',
              settings: {
                showSearch: false
              }
            });
            var priceSl = new SlimSelect({
              select: '#price',
              settings: {
                showSearch: false
              }
            });
        }
    }
    

    return {
        _: function() {
            // animation();
            slimSelect();
        }
    };
})();

window.onload = function() {
    PROGRAM._();
};
