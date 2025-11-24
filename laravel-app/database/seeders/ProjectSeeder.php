<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Enterprise RAG System',
                'slug' => 'enterprise-rag-system',
                'description' => 'Built a production-ready RAG system using LangChain, Pinecone, and GPT-4. Processes 10M+ documents with 95% accuracy in information retrieval.',
                'tags' => ['RAG', 'LangChain', 'Pinecone', 'GPT-4'],
                'link' => 'https://github.com/BilawalDeveloper/enterprise-rag-system',
                'order' => 1,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Multi-Agent AI System',
                'slug' => 'multi-agent-ai-system',
                'description' => 'Developed an autonomous multi-agent system with specialized agents for research, writing, and coding. Orchestrates complex workflows with 80% task completion rate.',
                'tags' => ['AI Agents', 'LangGraph', 'Claude', 'Python'],
                'link' => 'https://github.com/BilawalDeveloper/multi-agent-system',
                'order' => 2,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Semantic Search Engine',
                'slug' => 'semantic-search-engine',
                'description' => 'Created a neural search engine using sentence transformers and ChromaDB. Achieves 92% relevance in search results with sub-50ms query latency.',
                'tags' => ['Embeddings', 'ChromaDB', 'FastAPI', 'React'],
                'link' => 'https://github.com/BilawalDeveloper/semantic-search',
                'order' => 3,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'AI Code Assistant',
                'slug' => 'ai-code-assistant',
                'description' => 'Built an intelligent code assistant powered by GPT-4 with function calling. Provides context-aware suggestions and automates development workflows.',
                'tags' => ['GPT-4', 'Function Calling', 'TypeScript', 'VSCode'],
                'link' => 'https://github.com/BilawalDeveloper/ai-code-assistant',
                'order' => 4,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Voice AI Platform',
                'slug' => 'voice-ai-platform',
                'description' => 'Developed a voice-enabled AI platform using Whisper for STT and ElevenLabs for TTS. Supports 50+ languages with 98% transcription accuracy.',
                'tags' => ['Whisper', 'TTS', 'WebRTC', 'Next.js'],
                'link' => 'https://github.com/BilawalDeveloper/voice-ai-platform',
                'order' => 5,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'AI Image Generator',
                'slug' => 'ai-image-generator',
                'description' => 'Created a web-based AI image generator using Stable Diffusion XL and DALL-E 3. Features advanced prompt engineering and style transfer capabilities.',
                'tags' => ['Stable Diffusion', 'DALL-E', 'PyTorch', 'FastAPI'],
                'link' => 'https://github.com/BilawalDeveloper/ai-image-generator',
                'order' => 6,
                'is_featured' => true,
                'is_published' => true,
            ],
        ];

        foreach ($projects as $project) {
            \App\Models\Project::create($project);
        }
    }
}
