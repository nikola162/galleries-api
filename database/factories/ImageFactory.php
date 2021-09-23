<?php

namespace Database\Factories;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    private $image_urls = [
        'https://www.heavenofhorror.com/wp-content/uploads/2019/12/the-witcher-review-netflix.jpg',
        'https://static1.thegamerimages.com/wordpress/wp-content/uploads/2019/12/witcher-kikimora.jpg',
        'https://todayinbermuda.com/wp-content/uploads/2021/07/The-Witcher-Season-2-Release-Date-1200x900-1.jpeg',
        'https://upload.wikimedia.org/wikipedia/sr/0/0c/Witcher_3_cover_art.jpg',
        'https://media.wired.com/photos/612e57f96b5b362697c4bf0b/1:1/w_746,h_746,c_limit/Games-The_Witcher_3_Wild_Hunt_They_messed_with_the_wrong_person_RGB.jpg',
        'https://cdn.cloudflare.steamstatic.com/steam/apps/292030/header.jpg?t=1621939214',
        'https://play.co.rs/wp-content/uploads/2020/12/Geralt-of-Rivia-Witcher-statua1.jpg',
        'https://cdn.pocket-lint.com/r/s/1200x630/assets/images/133845-games-review-the-witcher-3-wild-hunt-review-image1-07yik9ul5s.jpg',
        'https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F60e995c534eab10036d1225a%2FThe-Witcher-3%2F960x0.jpg%3Ffit%3Dscale',
        'https://thewitcher.com/build/images/witcher3/poster-4c23920e.jpg',
        'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2021/08/the-witcher-3-ciri-geralt.jpg',
        'https://data2.origin.com/content/dam/originx/web/app/games/witcher/the-witcher-wild-hunt/the-witcher-wild-hunt_gdp-logo.png',
        'https://storage.googleapis.com/gamebyte/2021/03/Witcher-3-thumbs-up.jpeg',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Image_Url' => $this->faker->randomElement($this->image_urls),
            'gallery_id' => Gallery::inRandomOrder()->first()->id,
        ];
    }
}
