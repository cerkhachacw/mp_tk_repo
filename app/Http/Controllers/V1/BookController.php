<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\CategoryGroup;
use App\Models\Publisher;
use Faker\Factory;
use Illuminate\Http\Request;

class BookController extends Base
{
    public $model = Book::class;

    public $storeValidator = StoreBookRequest::class;
    public $updateValidator = UpdateBookRequest::class;

    public $resource = BookResource::class;

    public function bookSeeder(Request $request)
    {
        $pass = $request->input('seeder_pass');
        if ($pass != env('SEEDER_PASS')) {
            return response()->json(['message' => 'Lanjut'], 200);
        }

        $faker = Factory::create();
        $this->createAuthor($faker);
        $this->createPublisher($faker);
        $this->createCategoryGroup($faker);

        return $this->__success();
    }

    private function createAuthor($faker)
    {
        $authors = [
            'J. K. Rowling',
            'J. R. R. Tolkien',
            'C. S. Lewis',
            'George R. R. Martin',
            'J. D. Salinger',
            'Stephenie Meyer',
            'Harper Lee',
        ];

        foreach ($authors as $author) {
            Author::create([
                'name' => $author,
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'avatar' => $faker->imageUrl(),
                'dob' => $faker->dateTimeThisCentury(),
            ]);
        }
    }

    private function createPublisher($faker)
    {
        $publishers = [
            'Penguin Random House',
            'Hachette Livre',
            'HarperCollins',
            'Simon & Schuster',
            'Macmillan',
            'Penguin Books',
            'Scholastic',
            'Wiley',
            'Pearson',
            'Houghton Mifflin Harcourt',
            'John Wiley & Sons',
            'Bloomsbury Publishing',
            'Oxford University Press',
            'Cengage Learning',
            'Elsevier',
        ];

        foreach ($publishers as $publisher) {
            Publisher::create([
                'name' => $publisher,
                'description' => $faker->text(),
            ]);
        }
    }

    private function createCategoryGroup($faker)
    {
        $categoryGroups = [
            [
                "title" => "Books",
                "categories" => [
                    "Fiction",
                    "Nonfiction",
                    "Biography",
                    "Poetry",
                    "Children's",
                    "Young Adult",
                    "Romance",
                    "Mystery",
                    "Thriller",
                    "Science Fiction",
                    "Fantasy",
                    "Horror",
                    "History",
                    "Cookbooks",
                    "Art",
                    "Music",
                    "Photography",
                    "Travel",
                    "Sports",
                    "Religion",
                    "Self-Help",
                    "Health",
                    "Psychology",
                    "Parenting",
                    "Humor",
                    "Comics",
                    "Graphic Novels",
                ]
            ],
            [
                "title" => "News",
                "categories" => [
                    "Business",
                    "Entertainment",
                    "Health",
                    "Science",
                    "Sports",
                    "Technology",
                    "World",
                    "U.S.",
                    "Politics",
                    "Opinion",
                    "Arts",
                    "Style",
                    "Food",
                    "Travel",
                    "Magazine",
                    "Real Estate",
                    "Automobiles",
                    "Education",
                ]
            ],
        ];

        foreach ($categoryGroups as $categoryGroup) {
            $categoryGroupRecord = CategoryGroup::create([
                'name' => $categoryGroup['title'],
                'slug' => strtolower($categoryGroup['title']),
                'description' => $faker->text(),
            ]);

            foreach ($categoryGroup['categories'] as $category) {
                $category = $categoryGroupRecord->categories()->create([
                    'name' => $category,
                    'slug' => strtolower($category),
                    'description' => $faker->text(),
                ]);

                for ($i = 0; $i < 10; $i++) {
                    $category->books()->create([
                        'title' => $faker->sentence(),
                        'description' => $faker->text(),
                        'price' => $faker->randomFloat(2, 1, 100),
                        'quantity' => $faker->numberBetween(0, 100),
                        'cover' => $faker->imageUrl(),
                        'author_id' => Author::inRandomOrder()->first()->id,
                        'publish_date' => $faker->dateTimeThisCentury(),
                        'publisher_id' => Publisher::inRandomOrder()->first()->id,
                    ]);
                }
            }
        }
    }
}
