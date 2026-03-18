<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Certification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Profile
        $profile = Profile::create([
            'name' => 'Prajwal Bhandari',
            'role' => 'QA Automation Engineer | SDET',
            'bio' => '<p>Meticulous QA Engineer with 5+ years of experience in manual and automated testing. Specialized in building robust automation frameworks and ensuring high-quality software delivery through comprehensive testing strategies.</p>',
            'email' => 'prajwal@example.com',
            'phone' => '+977-9800000000',
            'location' => 'Kathmandu, Nepal',
            'linkedin' => 'https://linkedin.com/in/prajwalbhandari',
            'github' => 'https://github.com/prajwal-qa',
            'principles' => '<ul><li><strong>Continuous Quality:</strong> Testing is not a phase; it\'s a continuous process throughout the SDLC.</li><li><strong>Automate Wisely:</strong> Focus on high-ROI test cases for automation while maintaining strong manual exploratory testing.</li><li><strong>Bug Prevention:</strong> Strategic testing starts with requirement analysis to prevent bugs before they are coded.</li><li><strong>User-Centric Testing:</strong> Always validate software from the end-user\'s perspective.</li></ul>',
        ]);

        // Skills
        $skills = [
            ['name' => 'Selenium WebDriver', 'category' => 'Automation Testing', 'proficiency' => 9],
            ['name' => 'Cypress', 'category' => 'Automation Testing', 'proficiency' => 8],
            ['name' => 'Playwright', 'category' => 'Automation Testing', 'proficiency' => 7],
            ['name' => 'JUnit / TestNG', 'category' => 'Tools', 'proficiency' => 9],
            ['name' => 'Postman', 'category' => 'API Testing', 'proficiency' => 9],
            ['name' => 'RestAssured', 'category' => 'API Testing', 'proficiency' => 8],
            ['name' => 'JMeter', 'category' => 'Performance Testing', 'proficiency' => 7],
            ['name' => 'Jenkins / GitHub Actions', 'category' => 'Tools', 'proficiency' => 8],
            ['name' => 'Exploratory Testing', 'category' => 'Manual Testing', 'proficiency' => 10],
            ['name' => 'Agile Methodologies', 'category' => 'Soft Skills', 'proficiency' => 9],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Experience
        Experience::create([
            'company' => 'Tech Solutions Inc.',
            'position' => 'Senior QA Automation Engineer',
            'duration' => '2021 - Present',
            'description' => 'Lead the QA team in transition from manual to 80% automation coverage. Implemented CI/CD pipelines for automated regression suites.',
        ]);

        Experience::create([
            'company' => 'Innova Soft',
            'position' => 'QA Analyst',
            'duration' => '2018 - 2021',
            'description' => 'Focused on manual testing of complex web applications and API validation using Postman.',
        ]);

        // Projects
        Project::create([
            'title' => 'E-Commerce Automation Framework',
            'description' => 'Built a scalable Page Object Model (POM) based framework using Java, Selenium, and TestNG for an enterprise e-commerce site.',
            'role' => 'Lead SDET',
            'tools_used' => 'Java, Selenium, TestNG, Maven, Jenkins',
            'link' => 'https://github.com/prajwal-qa/ecommerce-auto',
        ]);

        Project::create([
            'title' => 'API Testing Suite for Fintech',
            'description' => 'Developed a comprehensive API test suite using RestAssured with automated reporting and Slack integration.',
            'role' => 'Automation Engineer',
            'tools_used' => 'RestAssured, Java, ExtentReports, Postman',
        ]);

        // Certifications
        Certification::create([
            'name' => 'ISTQB Certified Tester Foundation Level (CTFL)',
            'issuing_organization' => 'ISTQB - International Software Testing Qualifications Board',
            'issue_date' => '2019-05-20',
        ]);

        Certification::create([
            'name' => 'Selenium Automation Specialist',
            'issuing_organization' => 'Test Automation University',
            'issue_date' => '2020-11-15',
        ]);
    }
}
