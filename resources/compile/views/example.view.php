<?# // You can use <?# instead of <?php
    echo "Hello world!";
    $a = ["a","b"];
?>


<!#-- Including a template file (in directory templates), defines var title to Welcome (Passes it threw) --#>
@template(("header.php", ["title"=>"Welcome"]))!

@if((false))#
    hi
@else
    hallool
@endif

@foreach(($a as $v))#
    {{ $v }}
@endforeach

@comp(("components/error", ["err"=>"You're not logged in!"]))!

@template(("footer.php"))!