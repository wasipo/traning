<?
//----------------------------------------------------------------
// 経路検索
//----------------------------------------------------------------
    //  発見経路数
    $numPath = 0;
    //  移動可能点の定義
    $ar = array( "A"=>array( "D", "E" ),
                 "B"=>array( "A", "C", "D" ),
                 "C"=>array( "A", "E", "D" ),
                 "D"=>array( "B", "E" ),
                 "E"=>array( "A", "B", "C", "D" ) );

    $start = "B";
    $goal  = "E";
    print "$start から $goal までの経路を検索します<br><br>\n";
    searchPath( array( $start ), $goal );

    if ( $numPath > 0 ) {
        print "<br>[$numPath] 経路見つかりました<br>\n";
    } else {
        print "$start から $goal までの経路はありません<br>\n";
    }

//----------------------------------------------------------------
function searchPath( $pathArray, $goal ) {
//----------------------------------------------------------------
    global $ar;
    global $numPath;

    $lastPoint = $pathArray[count( $pathArray ) - 1];
    foreach( $ar[$lastPoint] as $point ) {
        // ゴール判定
        if ( strcmp( $point, $goal ) == 0 ) {
            printPath( array_merge( $pathArray, array( $goal ) ) );
            $numPath++;
        // すでに通過した点でなければ先を検索
        } else if ( !in_array( $point, $pathArray ) ){
            searchPath( array_merge( $pathArray, array( $point ) ), $goal );
        }
    }
}

//----------------------------------------------------------------
function printPath( $pathArray ) {
//----------------------------------------------------------------
// 配列の経路を表示
    print $pathArray[0];
    for( $i=1 ; $i<count( $pathArray ) ; $i++ ) {
        print "　⇒　".$pathArray[$i];
    }
    print "<br>\n";
}
?>