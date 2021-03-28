$(".timeline-grid-x").slice(0,6).show()
$(".progressbar-line").slice(0,1).show()
$(".round-x").slice(0,3).show()

$(".progressbar-end").on("click", function(){
    $(".timeline-grid-x:hidden").slice(0,6).show()
    $(".progressbar-line:hidden").slice(0,1).show()
    $(".round-x:hidden").slice(0,3).show()

    if($(".timeline-grid-x:hidden").length == 0) {
        $(".progressbar-end").fadeOut();
    }
})
