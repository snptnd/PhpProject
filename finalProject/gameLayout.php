<?php ?>

<style type="text/css">
    @font-face {
        font-family: 'segeoScript';
        src: url('fonts/segoesc.ttf');  
    }
    .noWrap{
        background-color: brown;
    }
    .middleScreen,.leftScreen,.rightScreen{
        padding-right: 5px;
        padding-left: 5px;
    }
    .noWrap {
        flex-wrap: nowrap !important;
    }

    .buttonScreen {
        margin: 5px 0 5px 0;
    }

    .multiScreen {
        background-color: red;
        box-shadow: 0 0 2px 2px black;
        margin: 5px 0 5px 0;
    }

    .mapScreen {
        background-repeat: no-repeat;
        margin: 5px 0 5px 0;
        background-size: contain;
    }

    .messageScreen {
        padding-left: 1vw;
        padding-top: 0.4vw;
        font-weight: bold;
        color: black;
        font-family: 'segeoScript', sans-serif;
        background-image: url("images/parchment.png");
        background-repeat: no-repeat;
        background-size: contain;
        box-shadow: 0 0 2px 2px black;
        margin: 5px 0 5px 0;
        font-size: 1.4vw;
    }

    .hpMpScreen {
        font-size: 2.6vw;
        margin: 5px 0 5px 0;
        color: white;
    }

    .willScreen {
        font-size: 2.6vw;
        margin: 5px 0 5px 0;
        color: white;
    }

    .playerScreen {
        background-color: red;
        box-shadow: 0 0 2px 2px black;
        margin: 5px 0 5px 0;
    }

    .middleScreen{
    }
    .g-table{
        display:table;         
        width:100%;
        height:100%;
        color: white;
        text-align: center;

    }
    .g-row{
        display:table-row;
        width:auto;
        clear:both;
    }
    .g-col{
        float:left;/*fix for  buggy browsers*/
        display:table-column;         
        width:33%;  
        background: #291616;
        font-weight: bold;
        font-size: 1.2vw;
        border: 1px solid rgba(255, 0, 0, 0.15);
        -moz-box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(0, 0, 0, .4);
        -webkit-box-shadow: inset 2px 2px 2px rgba(255, 255, 255, .4), inset -2px -2px 2px rgba(0, 0, 0, .4);
        box-shadow: inset 2px 2px 2px rgba(245, 158, 158, 0.46), inset -2px -2px 2px rgba(0, 0, 0, .4);
    }
</style>




<script type="text/javascript">//<![CDATA[
    window.onload = function () {

        // Set aspect ratio of #my_div
        var map_ratio = 0.75;
        var message_ratio = 0.25;
        var button_ratio = 0.20;
        var multi_ratio = 2.5;
        var hpMp_ratio = 0.10;
        var will_ratio = 0.10;
        var player_ratio = 1.301;

        // Store the jQuery object for future reference
        var $map_div = jQuery("#mapScreen");
        var $message_div = jQuery(".messageScreen");
        var $button_div = jQuery(".buttonScreen");
        var $multi_div = jQuery(".multiScreen");
        var $hpMp_div = jQuery(".hpMpScreen");
        var $will_div = jQuery(".willScreen");
        var $player_div = jQuery(".playerScreen");


        // initial resize
        $(document).ready(function () {
            $map_div.height($map_div.width() * map_ratio);
            $message_div.height($message_div.width() * message_ratio);
            $button_div.height($button_div.width() * button_ratio);
            $multi_div.height($multi_div.width() * multi_ratio);
            $hpMp_div.height($hpMp_div.width() * hpMp_ratio);
            $will_div.height($will_div.width() * will_ratio);
            $player_div.height($player_div.width() * player_ratio);
        });

        // Resize on browser resize
        jQuery(window).resize(function () {
            $map_div.height($map_div.width() * map_ratio);
            $message_div.height($message_div.width() * message_ratio);
            $button_div.height($button_div.width() * button_ratio);
            $multi_div.height($multi_div.width() * multi_ratio);
            $hpMp_div.height($hpMp_div.width() * hpMp_ratio);
            $will_div.height($will_div.width() * will_ratio);
            $player_div.height($player_div.width() * player_ratio);
        });
    };



</script>

<div class="noWrap">
    <div class="col-xs-2 leftScreen">
        <div class="row buttonScreen g-table" style="height: 23.6px;">
            <div class="g-row">
                <div class="g-col">Stats</div><div class="g-col">Inv</div><div class="g-col">Equip</div>
            </div>
            <div class="g-row">
                <div class="g-col">Skills</div><div class="g-col">People</div><div class="g-col">Party</div>
            </div>
        </div>
        <div class="row multiScreen" style="height: 295px;">
            multi pane
        </div>
    </div>
    <div class="col-xs-6 middleScreen">
        <div class="row mapScreen" id="mapScreen" style="height: 280.5px;">
            map
        </div>
        <div class="row messageScreen" style="height: 93.5px;">
            Necessary ye contented newspaper zealously breakfast he prevailed. Melancholy middletons yet understood decisively boy law she. Answer him easily are its barton little. Oh no though mother be things simple itself. Dashwood horrible he strictly on as. Home fine in so am.
        </div>
    </div>
    <div class="col-xs-4 rightScreen">
        <div class="row hpMpScreen" style="height: 24.6px;">
            hp: mp:
        </div>
        <div class="row willScreen" style="height: 24.6px;">
            will:
        </div>
        <div class="row playerScreen" style="height: 320.046px;">
            player
        </div>
    </div>
</div>





<?php
?>