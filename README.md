# adw-assignment-2-WPtollemy

Name: Will Piears
University ID: U1558457
University Email: u1558457@unimail.hud.ac.uk
Framework: Laravel


Features:
Classic CRUD functions.
Registration/Login.
Searching: For specific DVD names.

Graphs/Graphing ability: Donut Chart of genres spread.
Validation/Authorisation: Checks emails, inputs exist etc, authorises user can see only their entries.
Social logins: Log in through Github, Facebook, or Discord.
Pagination: Happens automatically when more than 9 DVDs are present on the home page.

Emailing: Ability to send emails. Used through:
Command - Sends email to admin (me) of new user count, new dvd count.
Scheduled task: Above scheduled to go process every day.

Libraries:
Lavacharts
Socialite
Mailgun - Guzzle



Setup:
Initially run `composer install`

Run `php artisan migrate --seed`

Set up the `.env` file:
Set up a mail service one such as mailtrap (smtp) for dev.
For a production server another service is needed such as mailgun.

For social logins the laravel socialite plugin is used, it is installed through composer
and requires the id, and secret for: Github, Facebook, and Discord.

Run `php artisan serve` with desired host and port
