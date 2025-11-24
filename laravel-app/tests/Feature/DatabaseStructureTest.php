<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseStructureTest extends TestCase
{
    use RefreshDatabase;

    public function test_projects_table_exists_and_can_create_records(): void
    {
        $project = Project::create([
            'title' => 'Test Project',
            'slug' => 'test-project',
            'description' => 'Test description',
            'tags' => ['PHP', 'Laravel'],
            'order' => 1,
        ]);

        $this->assertDatabaseHas('projects', [
            'title' => 'Test Project',
            'slug' => 'test-project',
        ]);

        $this->assertEquals(['PHP', 'Laravel'], $project->tags);
    }

    public function test_services_table_exists_and_can_create_records(): void
    {
        $service = Service::create([
            'title' => 'Test Service',
            'slug' => 'test-service',
            'description' => 'Test description',
            'features' => ['Feature 1', 'Feature 2'],
        ]);

        $this->assertDatabaseHas('services', [
            'title' => 'Test Service',
        ]);

        $this->assertEquals(['Feature 1', 'Feature 2'], $service->features);
    }

    public function test_testimonials_table_exists_and_can_create_records(): void
    {
        $testimonial = Testimonial::create([
            'client_name' => 'John Doe',
            'content' => 'Great work!',
            'rating' => 5,
        ]);

        $this->assertDatabaseHas('testimonials', [
            'client_name' => 'John Doe',
            'rating' => 5,
        ]);
    }

    public function test_blog_posts_table_exists_and_can_create_records(): void
    {
        $post = BlogPost::create([
            'title' => 'Test Post',
            'slug' => 'test-post',
            'excerpt' => 'Test excerpt',
            'content' => 'Test content',
            'category' => 'AI & ML',
            'tags' => ['AI', 'Machine Learning'],
        ]);

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Test Post',
            'category' => 'AI & ML',
        ]);

        $this->assertEquals(['AI', 'Machine Learning'], $post->tags);
    }

    public function test_contact_messages_table_exists_and_can_create_records(): void
    {
        $message = ContactMessage::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'Hello!',
            'status' => 'new',
        ]);

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'status' => 'new',
        ]);
    }
}
