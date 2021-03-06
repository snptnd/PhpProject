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
        background-color: #2B1616;
        box-shadow: inset 0px 0px 2px 5px #3A0909;
        margin: 5px 0 5px 0;
    }

    .statTbl{
        width: 100%;
        margin: 1vw;
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
        font-size: 2.2vw;
        margin: 5px 0 5px 0;
        color: white;
    }

    .willScreen {
        font-size: 2.2vw;
        margin: 5px 0 5px 0;
        color: white;
    }

    .playerScreen {
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
    .g-col:active {
        background-color: black !important;
    }
    .g-col:hover {
        background-color: #8A3838;
    }
    .g-col{
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        cursor: pointer;
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

<div class="noWrap" id="gameLayout">
    <div class="col-xs-2 leftScreen">
        <div class="row buttonScreen g-table" style="height: 23.6px;">
            <div class="g-row">
                <div id="statsBtn" class="g-col">Stats</div><div id="invBtn" class="g-col">Inv</div><div id="equipBtn" class="g-col">Equip</div>
            </div>
            <div class="g-row">
                <div id="skillsBtn" class="g-col">Skills</div><div id="peopleBtn" class="g-col">People</div><div id="partyBtn" class="g-col">Party</div>
            </div>
        </div>
        <div class="row multiScreen" style="height: 295px;">
            <div id="multiStats"></div>
            <div id="multiInv"></div>
            <div id="multiEquip"></div>
            <div id="multiSkills"></div>
            <div id="multiPeople"></div>
            <div id="multiParty"></div>
        </div>
    </div>
    <div class="col-xs-6 middleScreen">
        <div class="row mapScreen" id="mapScreen" style="height: 280.5px;">

        </div>
        <div class="row messageScreen" style="height: 93.5px;">
            
        </div>
    </div>
    <div class="col-xs-4 rightScreen">
        <div class="row hpMpScreen" style="height: 24.6px;">
            HP: Stamina:
        </div>
        <div class="row willScreen" style="height: 24.6px;">
            MP: Will:
        </div>
        <div class="row playerScreen" style="height: 320.046px;">
        </div>
    </div>
</div>





<?php
?>