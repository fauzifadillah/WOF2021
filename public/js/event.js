$(".timeline-grid-x").slice(0,4).show()
$(".progressbar-line").slice(0,2).show()

$(".progressbar-end").on("click", function(){
    $(".timeline-grid-x:hidden").slice(0,2).show()
    $(".progressbar-line:hidden").slice(0,1).show()

    if($(".timeline-grid-x:hidden").length == 0) {
        $(".progressbar-end").fadeOut();
    }
})

// $(document).ready(function() {
//     function checkWidth() {
//       var windowSize = $(window).width();
  
//       if (windowSize < 1080) {
//         $(".no").hide()
//       } else {
//         // $(".no").show()
//       }
//     }
//     // Execute on load
//     checkWidth();
//     // Bind event listener
//     $(window).resize(checkWidth);
// });