<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // will be used to create a book
        // Book::factory()->count(1000)->create();
        $this->createAuthor();
        $this->createPublisher();
        $this->createCategoryGroup();
    }

    private function createAuthor()
    {
        $authors = [
            'J. K. Rowling',
            'J. R. R. Tolkien',
            'C. S. Lewis',
            'George R. R. Martin',
            'J. D. Salinger',
            'Stephenie Meyer',
            'Harper Lee',
            'John Green',
            'Jane Austen',
            'William Shakespeare',
            'Mark Twain',
            'Charles Dickens',
            'Agatha Christie',
        ];

        foreach ($authors as $author) {
            Author::create([
                'name' => $author,
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'avatar' => fake()->imageUrl(),
                'dob' => fake()->dateTimeThisCentury(),
            ]);
        }
    }

    private function createPublisher()
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
            'Cambridge University Press',
            'Springer Nature',
            'Taylor & Francis',
            'W. W. Norton & Company',
            'DK',
            'Wiley-Blackwell',
            'Routledge',
            'SAGE Publications',
            'McGraw-Hill Education',
            'Lippincott Williams & Wilkins',
            'Thomson Reuters',
            'John Wiley & Sons',
            'Bloomsbury Publishing',
            'Oxford University Press',
            'Cengage Learning',
        ];

        foreach ($publishers as $publisher) {
            Publisher::create([
                'name' => $publisher,
                'description' => fake()->text(),
            ]);
        }
    }

    private function createCategoryGroup()
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
                    "Food and Drink",
                    "Business",
                    "Reference",
                    "Science",
                    "Math",
                    "Social Sciences",
                    "Computers",
                    "Technology",
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
                'description' => fake()->text(),
            ]);

            if ($categoryGroup['title'] === 'Books') {
                foreach ($categoryGroup['categories'] as $category) {
                    $category = Category::create([
                        'name' => $category,
                        'slug' => strtolower($category),
                        'description' => fake()->text(),
                        'category_group_id' => $categoryGroupRecord->id,
                    ]);

                    for ($i = 0; $i < 50; $i++) {
                        Book::create([
                            'title' => fake()->sentence(),
                            'description' => fake()->text(),
                            'price' => fake()->randomFloat(2, 1, 100),
                            'cover' => fake()->imageUrl(),
                            'author_id' => Author::inRandomOrder()->first()->id,
                            'publish_date' => fake()->dateTimeThisCentury(),
                            'publisher_id' => Publisher::inRandomOrder()->first()->id,
                            'category_id' => $category->id,
                        ]);
                    }
                }
            }
        }
    }
}
