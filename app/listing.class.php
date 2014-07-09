<?php

class Listing {
    public function get($href, $name){
       
        $html = '
            <div class="listing subSection">
                <div class="img">
                <img src="/myProject/img/round-heads-type2.png">
                </div>
                <div class="subInfo">
                    <a href="' .$href. '">' .$name. '</a>
                </div>
            </div>
            ';

        return $html;

    }
}