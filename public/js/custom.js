  $(document).ready(function(){
    // show hidden form
    $("button.recents").click(function(){
        $("ul.recents").toggle(1000);
    });
    $("button.total").click(function(){
        $("p.total").toggle(1000);
    });
    $("button.ongoing").click(function(){
        $("p.ongoing,ul.ongoing").toggle(1000);
    });
    $("button.pending").click(function(){
        $("p.pending,ul.pending").toggle(1000);
    });
    $("button.completed").click(function(){
        $("p.completed,ul.completed").toggle(1000);
    });
    $("button.due").click(function(){
        $("p.due,ul.due").toggle(1000);
    });
  });