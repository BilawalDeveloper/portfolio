<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'role' => 'CTO',
                'company' => 'TechCorp Solutions',
                'company_url' => 'https://techcorp.example.com',
                'content' => 'Working with this developer was transformative for our business. The RAG system they built processes millions of documents with incredible accuracy. Their expertise in LLMs and vector databases is unmatched. Delivered ahead of schedule!',
                'avatar_url' => null,
                'rating' => 5,
                'project_related' => 'enterprise-rag-system',
                'featured' => true,
                'approved' => true,
                'order' => 1,
                'reviewed_at' => now()->subMonths(1),
            ],
            [
                'name' => 'Michael Chen',
                'role' => 'VP of Engineering',
                'company' => 'DataFlow AI',
                'company_url' => 'https://dataflowai.example.com',
                'content' => 'Exceptional AI engineer with deep knowledge of modern LLM architectures. Built a multi-agent system that reduced our manual workload by 70%. Communication was excellent throughout, and they provided comprehensive documentation.',
                'avatar_url' => null,
                'rating' => 5,
                'project_related' => 'multi-agent-ai-system',
                'featured' => true,
                'approved' => true,
                'order' => 2,
                'reviewed_at' => now()->subMonths(2),
            ],
            [
                'name' => 'Emily Parker',
                'role' => 'Product Manager',
                'company' => 'SearchPro Inc',
                'company_url' => 'https://searchpro.example.com',
                'content' => 'Brilliant developer who truly understands the intersection of AI and practical business applications. The semantic search engine they developed has transformed how our users find information. Performance is outstanding - sub-50ms query times!',
                'avatar_url' => null,
                'rating' => 5,
                'project_related' => 'semantic-search-engine',
                'featured' => true,
                'approved' => true,
                'order' => 3,
                'reviewed_at' => now()->subMonths(3),
            ],
            [
                'name' => 'David Kim',
                'role' => 'Founder & CEO',
                'company' => 'VoiceGen',
                'company_url' => 'https://voicegen.example.com',
                'content' => 'A true expert in fullstack development and AI integration. Built our voice AI platform from scratch with Whisper and custom TTS. The quality is production-grade, and they handled scaling challenges beautifully. Highly recommend!',
                'avatar_url' => null,
                'rating' => 5,
                'project_related' => 'voice-ai-platform',
                'featured' => true,
                'approved' => true,
                'order' => 4,
                'reviewed_at' => now()->subMonths(4),
            ],
            [
                'name' => 'Lisa Martinez',
                'role' => 'Creative Director',
                'company' => 'PixelAI Studio',
                'company_url' => 'https://pixelai.example.com',
                'content' => 'Outstanding work on our AI image generation platform. Integrated Stable Diffusion XL with custom LoRAs and prompt engineering. The results exceeded expectations. Professional, responsive, and delivered exactly what we needed.',
                'avatar_url' => null,
                'rating' => 5,
                'project_related' => 'ai-image-generator',
                'featured' => true,
                'approved' => true,
                'order' => 5,
                'reviewed_at' => now()->subMonths(5),
            ],
            [
                'name' => 'Robert Brown',
                'role' => 'Lead Developer',
                'company' => 'InnovateTech',
                'company_url' => 'https://innovatetech.example.com',
                'content' => "Best AI engineer I've worked with. Deep understanding of LangChain, vector embeddings, and production deployment. The code quality is exceptional with proper error handling and monitoring. A pleasure to collaborate with!",
                'avatar_url' => null,
                'rating' => 5,
                'project_related' => null,
                'featured' => true,
                'approved' => true,
                'order' => 6,
                'reviewed_at' => now()->subMonths(6),
            ],
        ];

        foreach ($testimonials as $testimonialData) {
            Testimonial::create($testimonialData);
        }
    }
}
