<?php

    class MTGwidgets {

        public static function renderResults($results) {
           foreach($results as $row) {
            $art = $row['art'];
            $name = $row['name'];
            $html = "<img src='{$art}'/>";
            $html .= "<br> $name";
            echo $html;
           }
        }
    }