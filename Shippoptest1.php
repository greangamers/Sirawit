<!DOCTYPE HTML>  
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>  
    
    <?php
        $Ar = $number  = $option = $Ar2 =  $size = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Ar = test_input($_POST["Ar"]);
            $Ar2 = str_split(str_replace(",","",$Ar));
            $size = sizeof($Ar2);
            $number = test_input($_POST["number"]);
            $option = test_input($_POST["option"]); 
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Linear Search
        function insertionSort(&$arr, $n) { 
            for ($i = 1; $i < $n; $i++) { 
                $key = $arr[$i]; 
                $j = $i-1; 

                while ($j >= 0 && $arr[$j] > $key) { 
                    $arr[$j + 1] = $arr[$j]; 
                    $j = $j - 1; 
                } 
                    
                 $arr[$j + 1] = $key; 
            } 
        } 

        //Binary Search
        function bubble_Sort($my_array ){
            do
            {
                $swapped = false;
                for( $i = 0, $c = count( $my_array ) - 1; $i < $c; $i++ )
                {
                    if( $my_array[$i] > $my_array[$i + 1] )
                    {
                        list( $my_array[$i + 1], $my_array[$i] ) =
                                array( $my_array[$i], $my_array[$i + 1] );
                        $swapped = true;
                    }
                }
            }
            while( $swapped );
        return $my_array;
        }

        //Binary Search
        function binarySearch(Array $arr, $x) { 
            // check for empty array 
            if (count($arr) === 0) return false; 
            $low = 0; 
            $high = count($arr) - 1; 
            
            while ($low <= $high) { 
                
                // compute middle index 
                $mid = floor(($low + $high) / 2); 
        
                // element found at mid 
                if($arr[$mid] == $x) { 
                    return true; 
                } 
        
                if ($x < $arr[$mid]) { 
                    // search the left side of the array 
                    $high = $mid -1; 
                } 
                else { 
                    // search the right side of the array 
                    $low = $mid + 1; 
                } 
            } 
            
            // If we reach here element x doesnt exist 
            return false; 
        } 

        //แสดง Array
        function printArray(&$arr, $n) { 
            for ($i = 0; $i < $n; $i++) 
                echo $arr[$i]." "; 
            echo "\n"; 
        } 

    ?>
    <br><br>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        List : <input type="text" class="form-control" name="Ar">  
        <br>
        ค้นหา : <input type="text" class="form-control"  name="number"> 
        <br>
        <div class="form-group">
            <label for="sel1">ประเภทการค้นหา:</label>
                    <select class="form-control" name="option">
                        <option value="Linear Search">1.Linear Search</option>
                        <option value="Binary Search">2.Binary Search</option>
                        <option value="Bubble Search">3.Bubble Search</option>
                    </select>
        </div>
        <br>
        <input type="submit" name="submit" value="Submit">  

        <br><br>
    
        <div class="form-group ">
                    <label for="comment">ผลลัพธ:</label>
                    <textarea class="form-control text-center" rows="5" >
                        <?php
                            echo "List : { ". $Ar ." } "." \n";
                            echo "Scarch : ".$number ." \n";
                            echo "Result :::";
                            echo $option ." \n";

                            if($option == "Linear Search"){
                                insertionSort($Ar2, $size); 
                                printArray($Ar2, $size); 
                                echo "\n";
                            }else 
                                if ($option == "Binary Search") {
                                    $Ar2 = implode(bubble_Sort($Ar2));
                                    echo $Ar2. PHP_EOL;
                                    echo "\n";
                                }else
                                    if ($option == "Bubble Search") {
                                        if(binarySearch($Ar2, $number) == true) { 
                                            echo $number." Exists"."\n"; 
                                        } 
                                        else { 
                                            echo $number." Doesnt Exist"."\n"; 
                                        } 
                                        printArray($Ar2, $size);
                                        echo "\n";
                                    }
                                                
                            for($y=0;$y<$size;$y++){
                                if ($Ar2[$y] == $number) {
                                    echo "Result : ". $y." ====> " .$number ." = ". $Ar2[$y] ." found !! \n";
                                    exit();
                                } 
                                echo "Result : ". $y." ====> " .$number ." != ". $Ar2[$y] ."\n";
                            }
                        ?>
                    </textarea>
            </div>
        </form>
    </div>
    </body>
</html>