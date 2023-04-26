
<?php

    class MTGwidgets {

        public static function renderResults($results) {
           foreach($results as $row) {
            $art = $row['art'];
            $name = $row['name'];
            $rules = $row['rules'];
            $type = $row['type_desc'];
            $html = "<div class='card'>
                <div class='card-image' style='background-image: url({$art})'></div>
                <a href='card.php?name={$name}'><div class='card-name'>$name</div>
                <div class='card-rules'>Card type = $type<br><br>$rules</div>
              </div>";
            echo $html;
           }
        }
    }