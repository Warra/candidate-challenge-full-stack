# Full Stack Candidate Challenge Project
## INTRODUCTION

This is my project for the full stack candidate challenge.

## PREREQUISITES

- Mysql 5.7 (with utf8mb4 collated database)
- PHP 8+
- Node 14+ (preferrably 16)

### SETUP
- git clone git@github.com:Warra/candidate-challenge-full-stack.git
- cd candidate-challenge-full-stack
- composer install
- `yarn` or `npm install`
- setup env vars (see .env.example)
- `cp .env.example .env` - this creates your .env file with example vars
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed` (This can create duplicate listings)
- `php artisan serve`
- `yarn dev` or `npm run dev`

### Features
- Home page - search for listings and filter by category
- Details page - contact listing owner (requires authed user)
- Create listings (requires authed user)
- Auth - register, login etc.

### Testing
- `php artisan test`
- The following tests are included - Route tests, Create contact tests, Create listing tests

### Technical features
- Uses TALL stack
- Uses factories for seeders

### Caveats
- I did minor styling on this project and focused more on functionality
- This is my first time using the TALL stack (I switched to TALL stack half way through the project)
- I only wrote tests at the end because I was figuring out how everything in the TALL stack fit together
- There was minor AlpineJS work done. I only used it to count characters on text areas
- I worked more than 8 hours on this project

### Future work
- Better looking frontend (more styling to be done)
- Mechanism for selling listings (offline_at)
- Localisation
- Changing the listing amount to cents, then converting to Rands for display