$(document).ready(function(){

    $(".face-two").hide();

    $(document).on("mouseenter",".face-one",function(){
        var card = $(this).closest(".single-book");
        var faceone = card.find(".face-one");
        var facetwo = card.find(".face-two");
        faceone.hide();
        facetwo.show();
    });

    $(document).on("mouseleave",".face-two",function(){
        var card = $(this).closest(".single-book");
        var faceone = card.find(".face-one");
        var facetwo = card.find(".face-two");
        faceone.show();
        facetwo.hide();
    });

});