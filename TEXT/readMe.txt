Web Application read me file:

Service 1:
This service is a functional forum.
This services requires login to use and has fully functioning login controls with
register capabilities
The login possesses form validation. This page is both tablet and mobile responsive.
The page has topics, threads and posts.
This page passes all of Google's mobile friendly standards and requirements.

Service 2: 
This is a simple game guide to explain how the game is to be played.
This page passes all of Google's mobile friendly standards and requirements.

Service 3:
This is the meat of the application. Most of the magic happens in functions.js
The user is required to login from a fully validated login screen or registration form.
The login possesses security in the form of password validation through MD5 hash 
and if the password is incorrect more than 3 times the user is locked out from making 
further login attempts.

On a first time registration the player will be required to fill out a character 
creation form. This form allows the user to name their character, choose it's gender 
and allocate stats.

If the user already has a character or if they have completed the character creation 
screen, they are then sent to the game screen. This page includes several panes 
which are sized using screen size ratios according to the size of the window that
the game currently resides within. This was done to keep the game both tablet and
mobile compliant. This ratio pane size was achieved with JavaScript and actively changes 
pane sizes to fit the current window. The stats screen shows all of the players stats.
By clicking the inventory button you can view the items currently available to the 
user. By clicking the equip button you can see items currently equipped to the user.
By default new characters are equipped with two items. By clicking on the Unequip
link next to the item's name the item will be moved to the inventory screen. 
Once that item is in the inventory screen it should have an equip link to move it
back into the equip screen. 

The map screen is comprised of a background map image and points representing places
that can be visited on that map. The background image, point and point data are all
held in the database. Each point has an on click event that is dynamically assigned 
to it based on the information provided from the database. By hovering over a point 
the player can see the name of that point. By clicking that point flavor text is
produced in the message screen. Clicking the message screen clears any text from 
that screen.

In addition important info is held in the top right.