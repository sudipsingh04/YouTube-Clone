# Youtube 🛰 Clone

This is a clone of video straming application Youtube built with the [Laravel](https://laravel.com/) and [Vuejs](https://vuejs.org/).

## Usage

1. Clone this repository
`git clone https://github.com/sudipsingh04/YouTube-Clone.git`
2. Download and install [FFMpeg](http://ffmpeg.org/download.html) in your local machine and setup the path of FFMpeg in environment variables  
2. `composer install`
3. `npm install`
4. `php artisan key:generate`
5. Configure your database in `.env` file and change `QUEUE_CONNECTION=sync` to `database`.
6. Run migration to create tables in database.
`php artisan migrate --seed`
7. Final step run project server.
`php artisan serve`,
`npm run watch`
`php artisan queue:work`

Now test it in your browser.
