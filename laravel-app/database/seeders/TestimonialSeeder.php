<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'client_name' => 'Sarah Johnson',
                'client_title' => 'CTO',
                'client_company' => 'TechCorp Solutions',
                'content' => 'Working with this developer was transformative for our business. The RAG system they built processes millions of documents with incredible accuracy. Their expertise in LLMs and vector databases is unmatched. Delivered ahead of schedule!',
                'rating' => 5,
                'project_type' => 'RAG System',
                'order' => 1,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'client_name' => 'Michael Chen',
                'client_title' => 'VP of Engineering',
                'client_company' => 'DataFlow AI',
                'content' => 'Exceptional AI engineer with deep knowledge of modern LLM architectures. Built a multi-agent system that reduced our manual workload by 70%. Communication was excellent throughout, and they provided comprehensive documentation.',
                'rating' => 5,
                'project_type' => 'Multi-Agent System',
                'order' => 2,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'client_name' => 'Emily Parker',
                'client_title' => 'Product Manager',
                'client_company' => 'SearchPro Inc',
                'content' => 'Brilliant developer who truly understands the intersection of AI and practical business applications. The semantic search engine they developed has transformed how our users find information. Performance is outstanding - sub-50ms query times!',
                'rating' => 5,
                'project_type' => 'Semantic Search',
                'order' => 3,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'client_name' => 'David Kim',
                'client_title' => 'Founder & CEO',
                'client_company' => 'VoiceGen',
                'content' => 'A true expert in fullstack development and AI integration. Built our voice AI platform from scratch with Whisper and custom models. The quality is production-grade, and the multi-language support is flawless. Highly recommend!',
                'rating' => 5,
                'project_type' => 'Voice AI Platform',
                'order' => 4,
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'client_name' => 'Lisa Martinez',
                'client_title' => 'Creative Director',
                'client_company' => 'PixelAI Studio',
                'content' => 'Outstanding work on our AI image generation platform. Integrated Stable Diffusion XL with custom LoRAs and prompt engineering. The results exceeded our expectations. Professional, responsive, and technically brilliant.',
                'rating' => 5,
                'project_type' => 'AI Image Generation',
                'order' => 5,
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'client_name' => 'Robert Brown',
                'client_title' => 'Lead Developer',
                'client_company' => 'InnovateTech',
                'content' => 'Best AI engineer I\'ve worked with. Deep understanding of LangChain, vector embeddings, and production deployment. The code quality is excellent, well-documented, and maintainable. A pleasure to collaborate with!',
                'rating' => 5,
                'project_type' => 'AI Development',
                'order' => 6,
                'is_featured' => false,
                'is_published' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            \App\Models\Testimonial::create($testimonial);
        }
    }
}
