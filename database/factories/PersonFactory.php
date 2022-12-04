<?php
namespace Database\Factories;
use App\Testing\JikanDataGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Person;
use MongoDB\BSON\UTCDateTime;


class PersonFactory extends Factory
{
    use JikanDataGenerator;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    public function definition(): array
    {
        $mal_id = $this->createMalId();
        $name = $this->faker->name();
        $given_name = $this->faker->firstName();
        $family_name = $this->faker->lastName();

        return [
            "mal_id" => $mal_id,
            "url" => $this->createUrl($mal_id, "people"),
            "website_url" => "https://webiste.example",
            "images" => [],
            "name" => $name,
            "given_name" => $given_name,
            "family_name" => $family_name,
            "alternate_names" => [],
            "birthday" => $this->createRandomDateTime("-80 years")->toAtomString(),
            "favorites" => $this->faker->randomDigitNotNull(),
            "about" => "test",
            "createdAt" => new UTCDateTime(),
            "modifiedAt" => new UTCDateTime(),
            "request_hash" => sprintf("request:%s:%s", "v4", sha1("http://localhost-test/v4/people/" . $mal_id))
        ];
    }
}