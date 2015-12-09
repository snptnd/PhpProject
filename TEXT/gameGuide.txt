<?php
require("classes/dbutils.php");
$pageTitle = "Game Guide";
require("header.php");
?>
<div class='row' style='width:100%;height:100%;'>
    <div class="col-xs-2"></div>
    <div class="col-xs-8 GGpanel" style="background-color: #251919;margin: auto;">
        <h1>
            Game Guide
        </h1>
        <br>
        <h2>
            Movement
        </h2>
        <p>
            Movement is made simple with just a single click. Simply click on a 
            blue button or building within the map screen and you will move to 
            that location on the board. Movement between separate game maps is 
            done in a similar fashion, though only green buttons allow this.

            Upon entering a room, returning to the map screen can be done by
            pressing the "Leave" button.
        </p>
        <br>
        <h2>
            Stats
        </h2>
        <p style="font-weight:bold;">HP</p>
        <p>
            HP is a simple stat but the most important. If this value reaches zero,
            you die. Expect for this to occur often.
        </p>
        <p style="font-weight:bold;">MP</p>
        <p>
            MP is used to cast spells. If you don't have enough of it, 
            a spell will fail.
        </p>
        <p style="font-weight:bold;">Agility</p>
        <p>
            Every attack has a chance to crit, miss, or be a glancing blow. Agility
            positively effects all of these chances. In addition, agility also 
            increases your chance to dodge incoming attacks. It is also worth noting
            that turn order is determined by agility levels. Those with higher agility 
            will always attack first. Also increases your stamina regeneration slightly.
        </p>
        <p style="font-weight:bold;">Strength</p>
        <p>
            Strength effects your raw physical damage before modifiers. It also effects
            your block effectiveness and your maximum carry weight. Strength also increases
            your chance to induce bleeding and increases your stamina regeneration slightly.
        </p>
        <p style="font-weight:bold;">Stamina</p>
        <p>
            Stamina is used to perform attacks. Some attacks cost more stamina than 
            others. It's regeneration rate is determined by both agility and strength.
            If you run out of stamina you will enter a state of exhaustion, but will still
            be able to perform attacks with a large damage penalty.
        </p>
        <p style="font-weight:bold;">Intellect</p>
        <p>
            Intellect makes your spells stronger
        </p>
        <p style="font-weight:bold;">Wisdom</p>
        <p>
            Wisdom increases your MP regeneration. In addition it also governs your 
            critical chance with spells.
        </p>
        <p style="font-weight:bold;">Will</p>
        <p>
            Willpower is used to perform feats of strength. By clicking your willpower 
            button you can increase your next attack's or spell's effectiveness, damage, 
            and critical chance. In addition, if you're health falls to zero and you 
            have at least one point of willpower left, you're health will be recovered 
            by the same amount of willpower you have remaining, expending the used points.
            This cannot happen if the attack that killed you is equal to or greater than 
            50% of your maximum HP. Willpower can only be recovered by sleeping.
        </p>
        <h2>
            Combat
        </h2>
        <p>
            Combat is turn based. Players and enemies take turns selecting attacks.
            Both may use skills and spells that they have learned. A combat scenario 
            ends when one party's HP reaches zero or if a combatant successfully flees.
        </p>

        <h2>
            Death
        </h2>
        <p>
            Death is harsh in Brand. Upon death your character will be deleted and you 
            will be required to begin again. You may party up with other players to reduce 
            the risk of combat, but be careful who you choose to fight with as player's
            may initiate combat with one another at any time.
        </p>

    </div>
    <div class="col-xs-2"></div>
</div>



<?php
require("footer.php");
?>

